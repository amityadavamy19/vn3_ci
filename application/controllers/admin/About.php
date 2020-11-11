<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Abhishek singh
 * @version : 1.1
 * @since : 15 November 2016
 */
class About extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('about_model');

        $this->load->helper('form');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {


        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {

            $this->global['pageTitle'] = 'vn24 : About';
            $this->loadViews("admin/gallery/listGallery", $this->global, NULL, NULL);
        }
    }



    /**
     * This function is used load user edit information
     * @param number Gallery
     */
    function edit($id = NULL)
    {

        if ($this->isAdmin() == TRUE || $id == 1) {
            $this->loadThis();
        } else {



            $data['allData'] = $this->about_model->getAbout();

            $this->global['pageTitle'] = '  vn24 : Edit About Page';

            $this->loadViews("admin/about/editAbout", $this->global, $data, NULL);
        }
    }





    /**
     * This function is used to edit the user information
     */
    function editAbout()
    {


        $title = $this->security->xss_clean($this->input->post('title'));
        $des = $this->input->post('description');
        $id = $this->input->post('id');



        $aboutInfo = array('title' => $title, 'description' => $des, 'date_updated' => date('Y-m-d H:i:s'));

        $result = $this->about_model->editAbout($aboutInfo, $id);

        if ($result == true) {
            $this->session->set_flashdata('success', 'About updated successfully');
        } else {
            $this->session->set_flashdata('error', 'About updation failed');
        }

        redirect('admin/about/edit');
    }
}
