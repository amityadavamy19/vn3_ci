<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Testimonials extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('testimonial_model');
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->helper('url', 'form');
    }


    function index()
    {

        $this->load->model("testimonial_model");
        $data["fetch_data"] = $this->testimonial_model->testimonialListing();

        //$this->addTestimonials();
    }
    function addTestimonials()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('testimonial_model');

            $data['roles'] = $this->testimonial_model->getUserRoles();

            $this->global['pageTitle'] = 'Techroutes | Add New Testimonial';

            $this->loadViews("admin/testimonial/addTestimonial", $this->global, $data, NULL);

            //   $this->inserttestinonial();




            if ($this->input->post('submit') !== NULL) {


                // upload Image 
                if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/testimonial/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('timage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/service/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                    }
                }


                $forminput = array(

                    "image" =>  $image,
                    "author" =>  $this->input->post('author'),
                    "content" => $this->input->post('content'),
                    "designation" => $this->input->post('designation'),
                    "status" => 'Active',
                    "date_modified" => date('Y-m-d H:i:s'),
                    "date" => date('Y-m-d')


                );

                $this->testimonial_model->inserttestimonial($forminput);
                $this->session->set_flashdata('success', 'record added successfully');
                redirect(base_url() . 'admin/testimonials/viewtestimonials');
            }
        }
    }

    function viewtestimonials()
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $this->global['pageTitle'] = 'Techroutes :Testimonials';


            $this->load->model("testimonial_model");
            $data["fetch_data"] = $this->testimonial_model->testimonialListing();


            $this->loadViews("admin/testimonial/viewtestimonial", $this->global, $data, NULL);
        }
    }

    function editTestimonials($id = NULL)
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {


            $this->load->model("testimonial_model");
            $this->global['pageTitle'] = 'Techroutes :Testimonials';
            $data['user'] = $this->testimonial_model->getTestbyId($id);

            $this->loadViews("admin/testimonial/editTestimonial", $this->global, $data, NULL);

            if ($this->input->post('submit') !== NULL) {
                $id = $this->input->post('id');
                $formArray = array();


                $formArray['author'] = $this->input->post('author');
                $formArray['content'] = $this->input->post('content');
                $formArray['designation'] = $this->input->post('designation');

                $formArray['date_modified'] = date('Y-m-d H:i:s');

                // upload Image 
                if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/testimonial/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('timage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/service/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                    }
                } else {

                    $image = $this->db->get_where('tbl_testimonials', array('id' => $id))->row_array()['image'];
                }

                $formArray['image'] = $image;


                $this->testimonial_model->updatetestimonial($id, $formArray);
                $this->session->set_flashdata('success', 'record updated successfully');
                redirect(base_url() . 'admin/testimonials/viewtestimonials');
            }
        }
    }


    function deleteTestimonials()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $tid = $this->input->post('tid');
            $serviceInfo = array('isDeleted' => 1, 'date_modified' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

            $result = $this->testimonial_model->deleteTestimonial($tid, $serviceInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }


    public function datatable_json()
    {
        $records = $this->testimonial_model->testimonial_data();
        $data = array();
        foreach ($records['data']  as $row) {
            $image = '<img src="' . base_url() . 'uploads/testimonial/' . $row['image'] . '" width="100" height="80">';
            $data[] = array(
                $username = $row['author'],
                $image,
                $row['content'],
                $row['designation'],
                $row['status'],
                $row['date'],

                '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/testimonials/editTestimonials/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteTestimonial" href="#" data-tid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        /*<a title="Delete" class="delete btn btn-danger" data-href="'.base_url('admin/delete_celebs/'.$row['id']).'" data-toggle="modal" data-target="#deletemodal"> <i class="fa fa-trash-o"></i></a> */
        $records['data'] = $data;
        echo json_encode($records);
    }
}
