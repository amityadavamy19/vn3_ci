<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Sliders extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');

        $this->isLoggedIn();
        $this->load->helper('url', 'form');
    }


    function index()
    {

        $this->load->model("Slider_model");
        $data["fetch_data"] = $this->Slider_model->sliderListing();



        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress("admin/userListing/", $count, 10);

            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Techroutes | slider Listing';

            $this->loadViews("admin/slider/viewslider", $this->global, $data, NULL);
        }
    }

    function sliderListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->gallery_model->sliderListingCount($searchText);

            $returns = $this->paginationCompress("admin/galleryListing/", $count, 10);

            $data['galleryRecords'] = $this->slider_model->galleryListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Techroutes : Gallery Listing';

            $this->loadViews("admin/slider/viewslider", $this->global, $data, NULL);
        }
    }



    function viewsliders()
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {




            $this->global['pageTitle'] = 'Techroutes : slider';


            $this->loadViews("admin/slider/viewslider", $this->global, NULL, NULL);
        }
    }



    public function uploadfilesamenames($file, $tem)
    {
        $file = $file;
        $tmp = $tem;
        $test = strpos($file, '.');
        $ext = substr($file, $test);
        //$file=substr(self::uuid(), 1, 7);
        $attach = $file . $ext;
        $destN = "./uploads/slider/" . $file;
        move_uploaded_file($tmp, $destN);
        return $file;
    }



    function addSlider()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {




            $this->global['pageTitle'] = 'Techroutes | Add New slider';

            $this->loadViews("admin/slider/addSlider", $this->global, NULL, NULL);






            if ($this->input->post('submit') !== NULL) {


                $image = $this->uploadfilesamenames($_FILES["timage"]['name'], $_FILES["timage"]['tmp_name']);
                $img_bottom = $this->uploadfilesamenames($_FILES["img_bottom"]['name'], $_FILES["img_bottom"]['tmp_name']);



                $forminput = array(

                    "image" =>  $image,
                    "img_bottom" =>  $img_bottom,
                    "title" =>  $this->input->post('title'),
                    "title_bottom" =>  $this->input->post('title_bottom'),
                    "description" => $this->input->post('description'),

                    "status" => 'Active',
                    "date_modified" => date('Y-m-d H:i:s')



                );

                //print_r($forminput);
                $this->Slider_model->insertslider($forminput);
                $this->session->set_flashdata('success', 'record added successfully');
                redirect(base_url() . 'admin/sliders/viewsliders');
            }
        }
    }



    function editslider($id = NULL)
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {



            $this->global['pageTitle'] = 'Techroutes | slider';
            $data['slider'] = $this->Slider_model->getSliderBYId($id);

            $this->loadViews("admin/slider/editslider", $this->global, $data, NULL);

            if ($this->input->post('submit') !== NULL) {
                $id = $this->input->post('id');
                $formArray = array();


                $formArray['title'] = $this->input->post('title');
                $formArray['description'] = $this->input->post('description');
                $formArray['title_bottom'] = $this->input->post('title_bottom');


                $formArray['date_modified'] = date('Y-m-d H:i:s');

                // upload Image 
                if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/slider/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG|svg",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('timage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/slider/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                    }
                } else {

                    $image = $this->db->get_where('tbl_sliders', array('id' => $id))->row_array()['image'];
                }



                // upload Image 
                if (!empty($_FILES["img_bottom"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/slider/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG|svg",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["img_bottom"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('img_bottom')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/slider/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $images = $_FILES["img_bottom"]['name'];
                    }
                } else {

                    $images = $this->db->get_where('tbl_sliders', array('id' => $id))->row_array()['img_bottom'];
                }


                $formArray['img_bottom'] = $images;
                $formArray['image'] = $image;
                $this->Slider_model->updateslider($id, $formArray);
                $this->session->set_flashdata('success', 'record updated successfully');
                redirect(base_url() . 'admin/sliders/viewsliders');
            }
        }
    }

    function deletesliders()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('sid');
            $userInfo = array('isDeleted' => 1, 'date_modified' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

            $result = $this->Slider_model->deleteSlider($sId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }






    public function datatable_json()
    {
        $records = $this->Slider_model->slider_data();
        $data = array();
        foreach ($records['data']  as $row) {
            $image = '<img src="' . base_url() . 'uploads/slider/' . $row['image'] . '" width="100" height="80">';
            $data[] = array(
                $username = $row['title'],
                $image,
                $row['description'],

                $row['status'],
                $row['date_modified'],

                '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/Sliders/editslider/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteSlider" href="#" data-sid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }

        $records['data'] = $data;
        echo json_encode($records);
    }
}
