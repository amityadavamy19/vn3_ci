<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Product extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'my_helper'));
        $this->load->library('email');
        $this->load->model('frontend/product_model');
    }

    public function index()
    {
        $url = $this->uri->segment(2);
        $data['product'] =  $this->product_model->getproduct();
        $data['contact'] =  $this->product_model->getContact();
        $data['proDet'] = $this->product_model->getProByUrl($url);
        $data['allImg'] = $this->product_model->getAllImg($url);
        $data['allCat'] = $this->product_model->getAllCat();
        $data['layout'] = 'product_detail';
        $data['title'] = 'Techroutes | ' . $url;
        $this->load->view('layout', $data);
    }



    public function message()
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
        $this->product_model->messagedata($forminput1);
        echo "Success";
    }
}
