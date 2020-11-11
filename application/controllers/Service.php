<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : About (AboutController)
 * About Class to control About Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Service extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/service_model');
    }

    /**
     * This function used to load the first screen
     */
    public function index()
    {
        //  $data['allData'] = $this->about_model->getAllItems();
        $data['contact'] = $this->service_model->getAllContact();
          $data['allData'] = $this->service_model->getAllContacts();
      //  $data['about'] = $this->about_model->getAllAbout();
        //		$data['product'] =  $this->about_model->getproduct();
        $data['title'] = '  Technoroutes | Service & Support';
        $data['layout'] = 'service';
        $this->load->view('layout', $data);
    }


  /*  public function message()
    {




        $forminput = array(

            "company" => $this->input->post('company'),
            "fname" =>  $this->input->post('fname'),
            "email" =>  $this->input->post('email'),
            "mobile" =>  $this->input->post('phone'),
            "message" => $this->input->post('message'),
            "status" => 'Active',
            "date" => date('Y-m-d H:i:s'),

        );

        $forminput1 = $this->security->xss_clean($forminput);
        $this->about_model->messagedata($forminput1);
        echo "Success";
    }*/

    
     
    public function request()
    {
        $this->load->library('email');
        
        
            $fullname = $this->input->post('fullname');
            $jobtitle =  $this->input->post('jobtitle');
            $companyname =  $this->input->post('companyname');
            $address =  $this->input->post('address');
            $city =  $this->input->post('city');
            $stateprovince =  $this->input->post('stateprovince');
            $country = $this->input->post('country');
            $zippostalcode = $this->input->post('zippostalcode');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $fax = $this->input->post('fax');
            $companytype = $this->input->post('companytype');
            $companywebsite = $this->input->post('companywebsite');
            $productslist = $this->input->post('productslist');
            $serialnoslist = $this->input->post('serialnoslist');
            $purchasecontractnoslist = $this->input->post('purchasecontractnoslist');
            $problemsdetails = $this->input->post('problemsdetails');
            $networkenvironmentdetails = $this->input->post('networkenvironmentdetails');




$htmlContent = '<h3>Fullname: ' . $fullname . ' </h3>';
$htmlContent .= '<h3>Jobtitle: ' . $jobtitle . ' </h3>';
$htmlContent .= '<h3>Company Name: ' . $companyname . ' </h3>';
$htmlContent .= '<h3>Address: ' . $address . ' </h3>';
$htmlContent .= '<h3>City: ' . $city . ' </h3>';
$htmlContent .= '<h3>State Province: ' . $stateprovince . ' </h3>';
$htmlContent .= '<h3>Country: ' . $country . ' </h3>';
$htmlContent .= '<h3>Zip postal code: ' . $zippostalcode . ' </h3>';
$htmlContent .= '<h3>Email: ' . $email . ' </h3>';
$htmlContent .= '<h3>Phone: ' . $phone . ' </h3>';
$htmlContent .= '<h3>Fax: ' . $fax . ' </h3>';
$htmlContent .= '<h3>Companytype: ' . $companytype . ' </h3>';
$htmlContent .= '<h3>Companywebsite: ' . $companywebsite . ' </h3>';
$htmlContent .= '<h3>Productslist: ' . $productslist . ' </h3>';
$htmlContent .= '<h3>Serialnoslist: ' . $serialnoslist . ' </h3>';

$htmlContent .= '<h3>Purchasecontractnoslist: ' . $purchasecontractnoslist . ' </h3>';
$htmlContent .= '<h3>Problemsdetails: ' . $problemsdetails . ' </h3>';
$htmlContent .= '<h3>Networkenvironmentdetails: ' . $networkenvironmentdetails . ' </h3>';

$config['mailtype'] = 'html';
$this->email->initialize($config);
$this->email->from($email, 'Reported Problem');
$this->email->to('sales@techroutes.com');
$this->email->subject('Reported Problem');
$this->email->message($htmlContent);
$this->email->send();
 echo "Success";
}
}
