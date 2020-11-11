<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : About (AboutController)
 * About Class to control About Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class solution extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/solution_model');
    }

    /**
     * This function used to load the first screen
     */
    public function index()
    {
        //  $data['allData'] = $this->about_model->getAllItems();
        $data['contact'] = $this->solution_model->getAllContact();
          $data['allData'] = $this->solution_model->getAllContacts();
      //  $data['about'] = $this->about_model->getAllAbout();
        //		$data['product'] =  $this->about_model->getproduct();
        $data['title'] = '  Technoroutes | Solutions';
        $data['layout'] = 'solution';
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
}
