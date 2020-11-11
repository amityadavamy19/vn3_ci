<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Subcategory extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'my_helper'));
        $this->load->library('email');
        $this->load->model('frontend/Subcategory_model');
    }

    public function index()
    {
        $url = $this->uri->segment(3);
        $cat = $this->uri->segment(2);
        echo $url;
        echo $cat;


        $data['contact'] =  $this->Subcategory_model->getContact();
        $data['allsubcat'] = $this->Subcategory_model->getScatByUrl($cat);
        $data['allPro'] = $this->Subcategory_model->getProByUrl($url, $cat);
        $data['layout'] = 'subcategory';
        $data['title'] = 'Techroutes | Subcategory';
        $this->load->view('layout', $data);
    }
}
