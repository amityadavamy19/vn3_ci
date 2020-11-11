<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Conatct (UserController)
 * Conatct Class to control all Conatct related operations.
 * @author :Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Contact extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');

        $this->load->helper('form');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
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



            $data['allData'] = $this->contact_model->getContact();

            $this->global['pageTitle'] = 'vn24 | Edit Contact Page';

            $this->loadViews("admin/contact/editContact", $this->global, $data, NULL);
        }
    }



    public function uploadfilesamenamess($file, $tem)
    {
        $file = $file;
        $tmp = $tem;
        $test = strpos($file, '.');
        $ext = substr($file, $test);
        //$file=substr(self::uuid(), 1, 7);
        $attach = $file . $ext;
        $destN = "./uploads/RMA/" . $file;
        move_uploaded_file($tmp, $destN);
        return $file;
    }







    /**
     * This function is used to edit the user information
     */
    function editContact()
    {


        $phone = $this->input->post('phone');
        $mobile = $this->input->post('phone2');
        $add = $this->input->post('address');
        $email = $this->input->post('email');
        $facebook = $this->input->post('facebook');
        $instagram = $this->input->post('instagram');
        $skype = $this->input->post('skype');
        $youtube = $this->input->post('youtube');
        $twitter = $this->input->post('twitter');
        $id = $this->input->post('id');
        $about = $this->input->post('about_title');
        $form = $this->input->post('form');
        $liner = $this->input->post('liner');



        // upload Image 
        if (!empty($_FILES["logo"]['name'])) {
            $config = array(
                'upload_path' => "./uploads/logo/",
                'allowed_types' => "jpg|PNG|png|gif|jpeg",
                'overwrite' => FALSE,
                'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
            );
            $config['file_name'] = $_FILES["logo"]['name'];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/contact/editContactus');
            } else {
                $image = $_FILES["logo"]['name'];
            }
        } else {

            $image = $this->db->get_where('tbl_contact', array('id' => $id))->row_array()['logo'];
        }


        if (!empty($_FILES["form"]['name'])) {
            $form = $this->uploadfilesamenamess($_FILES["form"]['name'], $_FILES["form"]['tmp_name']);
        } else {

            $form = $this->db->get_where('tbl_contact', array('id' => $id))->row_array()['form'];
        }


        if (!empty($_FILES["demoform"]['name'])) {
            $dform = $this->uploadfilesamenamess($_FILES["demoform"]['name'], $_FILES["demoform"]['tmp_name']);
        } else {

            $dform = $this->db->get_where('tbl_contact', array('id' => $id))->row_array()['demoform'];
        }







        $contactInfo = array(
            'about_title' => $about,
            'phone' => $phone,
            'mobile' => $mobile,
            'address' => $add,
            'email' => $email,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'skype' => $skype,
            'youtube' => $youtube,
            'status' => 'Active',
            'logo' => $image,
            'form' => $form,
            'demoform' => $dform,
             'liner' => $liner,
            'date' => date('Y-m-d H:i:s')
        );

        $data = $this->security->xss_clean($contactInfo);

        $result = $this->contact_model->editContact($data, $id);

        if ($result == true) {
            $this->session->set_flashdata('success', 'Contact updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Contact updation failed');
        }

        redirect('admin/contact/edit');
    }
}
