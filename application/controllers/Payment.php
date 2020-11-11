<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/third_party/razorpay-php/Razorpay.php');
// Create the Razorpay Order

use Razorpay\Api\Api;

class Payment extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('frontend/home_model');
    }

	
	public function index()
	{
	   // echo $this->session->userdata('oid');
		//exit;
	    $data['title'] = 'Payment Process | Vn24.in';
	    
	    $amt = '';
	    $total_amt = ''; 
	    $payment_det = $data['payment_info'] =  $this->general_model->getSingleRecord($this->session->userdata('oid'),'order_id','tbl_order');
	    
	    $amt = ($payment_det['amount']*18)/100;
	    $total_amt = $amt+$payment_det['amount']; 
	    
	    $agentId = $this->session->userdata('userId');
	    $data['agentInfo'] = $this->general_model->getUser($agentId);
	    
	    $api = new Api(API_KEY, API_SECRET);

			//
			// We create an razorpay order using orders api
			// Docs: https://docs.razorpay.com/docs/orders
			//
			$orderData = [
				'receipt'         => time(),
				'amount'          => $total_amt* 100, // 2000 rupees in paise
				'currency'        => 'INR',
				'payment_capture' => 1 // auto capture
			];

			$razorpayOrder = $api->order->create($orderData);

			$razorpayOrderId = $razorpayOrder['id'];

			$_SESSION['razorpay_order_id'] = $data['razorpayOrderId']= $razorpayOrderId ;

			$displayAmount = $amount = $data['amount'] = $_SESSION['amount']= $orderData['amount'];
			
			$displayCurrency = 'INR';
			
			if ($displayCurrency !== 'INR')
            {
                $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                $exchange = json_decode(file_get_contents($url), true);
            
                $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
            }


			$data['image']= base_url('uploads/logo/1.png');
			$data['itemInfo'] = array('description' => 'Courier Booking','address'=>$payment_det['pickup_address']);
		    $data['oid'] =  $this->session->userdata('oid');
		    
		    //Load View
			 $data['contact'] =  $this->home_model->getContact();
		     $data['layout'] = 'process';
             $this->load->view('layout', $data);
			
	
	}
	
	
	
	
	
}
