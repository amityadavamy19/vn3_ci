<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/third_party/razorpay-php/Razorpay.php');
// Create the Razorpay Order

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Verify extends CI_Controller {

		public function __construct()
			{
				parent::__construct();
				$this->load->model('general_model');
				$this->load->model('frontend/home_model');
			}

	
	public function index(){
	    
	 
	   
	
	    $success = true;
		$error = "Payment Failed";

		if (empty($_POST['razorpay_payment_id']) === false)
		{
			$api = new Api(API_KEY, API_SECRET);

			try
			{
				// Please note that the razorpay order ID must
				// come from a trusted source (session here, but
				// could be database or something else)
				$attributes = array(
					'razorpay_order_id' => $_POST['razorpayOrderId'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);

				$api->utility->verifyPaymentSignature($attributes);
			}
			catch(SignatureVerificationError $e)
			{
				$success = false;
				$error = 'Razorpay Error : ' . $e->getMessage();
			}
		}
		
		
		
		if ($success === true)
		{
			
			$data['title'] = 	$data['title'] = 'Payment Success | Vn24.in';  	
			$data['payment_info'] = 'Your payment was successful'	;	 
			$data['payment_id'] = $_POST['razorpay_payment_id']	;
			$data['status'] = $success ;

			//Order Update
			$ord_data = array(
			
			'pay_status' => 'Paid',
			'txn_id'         => $_POST['razorpay_payment_id'],
			'txn_date'         => date('Y-m-d h:i:s'),
			'amount'         => $_POST['amount']/100,
			
			);
			
			$this->general_model->updateRecord($_POST['oid'],'order_id','tbl_order',$ord_data);
			$agentId = $this->session->userdata('userId');
			
		    $agent_det = $this->general_model->getUser($agentId);
			
		
	    
			
			
			//Send Email with order Details
			
			        $to = $agent_det['email'];
					$to1 = 'info@vn24.in';
				
					$celeb_name = $agent_det['name'];
				
					
    				$subject = "Your payment has been successful";
    				$content =
							"Congratulations " .$agent_det['name']."! <br>".
							"Your order of amount Rs. ".($_POST['amount']/100)." was successfully placed on ".date('d-m-Y')." Your order id is ".$_POST['oid'].".\n<br><br>".
							
								
							"Customer satisfaction is our top priority. If you have any queries or concerns, feel free to get in touch with us at info@vn24.in \n<br><br>".
							
							"Best,\n<br>".
							"Team Vn24.in\n<br>".
							"<a href='".base_url()."'><img src='https://vn24.in/uploads/logo/".LOGO."' class='img-responsive sticky-logo pull-left' style='padding-top: 5px;width: 65px;' alt='rentmudra logo'></a>\n<br><br>".
							"<p style='font-size: 10px;'>Email received at : ".date("d/m/Y h:i:sa")."</p>"; 
                				
                				// Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                
                                // More headers
                                $headers .= 'From: info@vn24.in' . "\r\n";
				            	mail($to,$subject,$content,$headers);
					            mail($to1,$subject,$content,$headers);
			
					 
		}
		else
		{
			
			$data['title'] = 'Payment Failed | Vn24.in';  		 		 
			$data['payment_info'] = 'Your payment failed'	;	 
			$data['payment_id'] = $error ;	 
			$data['status'] = $success ;
				
		}
	
	
		 $data['contact'] =  $this->home_model->getContact();
		 $data['layout'] = 'success';
         $this->load->view('layout', $data);
		
	}
	

	
	

	
}
