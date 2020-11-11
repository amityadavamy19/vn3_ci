<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Blogs extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blogs_model');
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->helper('url', 'form');
    }


    function index()
    {

        $this->load->model("blogs_model");
        $data["fetch_data"] = $this->blogs_model->blogsListing();

        //$this->addTestimonials();       
    }




    function viewblogs()
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->blogs_model->blogsListingCount($searchText);

            $returns = $this->paginationCompress("admin/viewblogs/", $count, 10);

            $data['galleryRecords'] = $this->blogs_model->galleryListing($searchText, $returns["page"], $returns["segment"]);



            $this->global['pageTitle'] = 'vn24 : Blogs';


            $this->loadViews("admin/blogs/viewblogs", $this->global, $data, NULL);
        }
    }



    function addblogs()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('blogs_model');

            $data['roles'] = $this->blogs_model->getUserRoles();

            $this->global['pageTitle'] = 'vn24 : Blogs';

            $this->loadViews("admin/blogs/addblogs", $this->global, $data, NULL);

            //   $this->inserttestinonial();




            if ($this->input->post('submit') !== NULL) {


                // upload Image 
                if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/blogs/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('timage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/blogs/viewblogs');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                    }
                }


                $forminput = array(

                    "image" =>  $image,
                    "title" =>  $this->input->post('title'),
                    "author" =>  $this->input->post('author'),
                    "category" =>  $this->input->post('category'),
                    "description" => $this->input->post('description'),

                    "status" => 'Active',
                    "date_created" => date('Y-m-d H:i:s'),
                    "date_modified" => date('Y-m-d H:i:s')



                );

                //print_r($forminput);
                $this->blogs_model->insertblogs($forminput);
                $this->session->set_flashdata('success', 'record added successfully');
                redirect(base_url() . 'admin/blogs/viewblogs');
            }
        }
    }



    function editblogs($id = NULL)
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {


            $this->load->model("blogs_model");
            $this->global['pageTitle'] = 'vn24 : Blogs';
            $data['user'] = $this->blogs_model->getTestbyId($id);

            $this->loadViews("admin/blogs/editblogs", $this->global, $data, NULL);

            if ($this->input->post('submit') !== NULL) {
                $id = $this->input->post('id');
                $formArray = array();


                $formArray['title'] = $this->input->post('title');
                $formArray['author'] = $this->input->post('author');
                $formArray['category'] = $this->input->post('category');

                $formArray['description'] = $this->input->post('description');


                $formArray['date_modified'] = date('Y-m-d H:i:s');

                // upload Image 
                if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/blogs/",
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

                    $image = $this->db->get_where('tbl_blogs', array('id' => $id))->row_array()['image'];
                }












                $formArray['image'] = $image;


                $this->blogs_model->updateblogs($id, $formArray);
                $this->session->set_flashdata('success', 'record updated successfully');
                redirect(base_url() . 'admin/blogs/viewblogs');
            }
        }
    }

    function deleteblogs()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('sid');
            $userInfo = array('isDeleted' => 1, 'date_modified' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

            $result = $this->blogs_model->deleteblogs($sId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }






    public function datatable_json()
    {
        $records = $this->blogs_model->blogs_data();
        $data = array();
        foreach ($records['data']  as $row) {
            $image = '<img src="' . base_url() . 'uploads/blogs/' . $row['image'] . '" width="100" height="80">';
            $data[] = array(
                $username = $row['title'],
                $image,
                $row['description'],
                $row['author'],
                $row['category'],
                $row['status'],
                $row['date_created'],
                $row['date_modified'],

                '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/blogs/editblogs/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteblogs" href="#" data-sid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        /*<a title="Delete" class="delete btn btn-danger" data-href="'.base_url('admin/delete_celebs/'.$row['id']).'" data-toggle="modal" data-target="#deletemodal"> <i class="fa fa-trash-o"></i></a> */
        $records['data'] = $data;
        echo json_encode($records);
    }
}
