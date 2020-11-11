<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Brands extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_model');

        $this->isLoggedIn();
        $this->load->helper('url', 'form');
    }


    function index()
    {

        $this->load->model("Brands_model");
        $data["fetch_data"] = $this->Brands_model->brandsListing();

        //$this->addTestimonials();       
    }




    function viewbrands()
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->global['pageTitle'] = 'vn24 : Brands';


            $this->loadViews("admin/brands/listBrands", $this->global, NULL, NULL);
        }
    }



    function addbrands()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('Brands_model');

            //   $data['roles'] = $this->Brands_model->getUserRoles();

            $this->global['pageTitle'] = 'FooDcHeM  :Brands';

            $this->loadViews("admin/brands/addbrands", $this->global, NULL, NULL);


            if ($this->input->post('submit') !== NULL) {


                // upload Image 
                if (!empty($_FILES["bimage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/Brands/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["bimage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('bimage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/brands/listbrands');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["bimage"]['name'];
                    }
                }


                $forminput = array(

                    "image" =>  $image,

                    "status" => 'Active',
                    "date" => date('Y-m-d H:i:s'),
                    "date_updated" => date('Y-m-d H:i:s')




                );

                //print_r($forminput);
                $this->Brands_model->insertbrands($forminput);
                $this->session->set_flashdata('success', 'record added successfully');
                redirect(base_url() . 'admin/brands/viewbrands');
            }
        }
    }



    function editbrands($id = NULL)
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {


            $this->load->model("brands_model");
            $this->global['pageTitle'] = 'vn24  : Brands';
            $data['user'] = $this->brands_model->getbrandsbyId($id);

            $this->loadViews("admin/brands/editbrands", $this->global, $data, NULL);

            if ($this->input->post('submit') !== NULL) {
                $id = $this->input->post('id');
                $formArray = array();




                $formArray['date_updated'] = date('Y-m-d H:i:s');

                // upload Image 
                if (!empty($_FILES["bimage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/brands/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["bimage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('bimage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/brands/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["bimage"]['name'];
                    }
                } else {

                    $image = $this->db->get_where('tbl_brands', array('id' => $id))->row_array()['image'];
                }

                $formArray['image'] = $image;


                $this->Brands_model->updatebrands($id, $formArray);
                $this->session->set_flashdata('success', 'record updated successfully');
                redirect(base_url() . 'admin/brands/viewbrands');
            }
        }
    }

    function deletebrands()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $bId = $this->input->post('bid');
            $userInfo = array('isDeleted' => 1, 'date_updated' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

            $result = $this->Brands_model->deletebrands($bId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }






    public function datatable_json()
    {
        $records = $this->Brands_model->brands_data();
        $data = array();
        foreach ($records['data']  as $row) {
            $image = '<img src="' . base_url() . 'uploads/brands/' . $row['image'] . '" width="100" height="80">';
            $data[] = array(

                $image,

                $row['status'],
                $row['date'],
                $row['date_updated'],


                '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/brands/editbrands/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletebrands" href="#" data-bid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }

        $records['data'] = $data;
        echo json_encode($records);
    }
}
