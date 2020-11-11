<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : Contact (HomeController)
 * Contact Class to control Contact Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class partner extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Partners_model');
        $this->load->library('email');
    }

    /**
     * This function used to load the first screen
     */
    public function index()
    {
        $this->load->helper('form');

        $data['contact'] = $this->Partners_model->getAllContact();
        ///		$data['product'] =  $this->contact_model->getproduct();
        $data['title'] = 'Techroutes | Partner Registation';
        $data['layout'] = 'partnerregistation';
        $this->load->view('layout', $data);
    }


    public function message()
    {




        $forminput = array(

            "cmp_name" => $this->input->post('cmp_name'),
            "country" =>  $this->input->post('country'),
            "phn" =>  $this->input->post('phn'),
            "email" =>  $this->input->post('email'),
            "skype" => $this->input->post('skype'),
            "cmp_address" => $this->input->post('cmp_address'),
            "messg" => $this->input->post('messg'),
            "status" => 'Active',
            "date" => date('Y-m-d H:i:s'),

        );

        $forminput1 = $this->security->xss_clean($forminput);
        $this->Partners_model->messagedata($forminput1);
        echo "Success";
    }
}
