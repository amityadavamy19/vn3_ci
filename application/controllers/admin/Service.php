<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Flower (FlowerController)
 * Flower Class to control all Flower related operations.
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Service extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service_model');

        $this->load->helper('form');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen Flower
     */
    public function index()
    {
    }

    /**
     * This function is used to load the Gallery list
     */
    function serviceListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->service_model->serviceListingCount($searchText);

            $returns = $this->paginationCompress("admin/serviceListing/", $count, 10);

            $data['serviceRecords'] = $this->service_model->serviceListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'vn24 : service Listing';

            $this->loadViews("admin/service/listService", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['scat'] = $this->service_model->getServiceCat();
            $this->global['pageTitle'] = 'vn24: Add New Service';
            $this->loadViews("admin/service/addService", $this->global, $data, NULL);
        }
    }



    /**
     * This function is used to add gallery to the system
     */
    function addNewService()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            //$this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            //$this->form_validation->set_rules('gimage','Image','trim|required');
            $this->form_validation->set_rules('cat', 'category', 'trim|required|numeric');


            if ($this->form_validation->run() == FALSE) {
                $this->addNew();
            } else {


                $catId = $this->input->post('cat');
                $des = $this->input->post('description');
                $name = $this->getCatName($catId);

                // upload Image 
                if (!empty($_FILES["simage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/service/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg",
                        'overwrite' => FALSE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["simage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('simage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/service/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                    }
                }



                $sInfo = array('title' => $name, 'description' => $des, 'cat_id' => $catId, 'status' => 'Active', 'image' => $file_data['upload_data']['file_name'], 'updatedBy' => 1, 'date' => date('Y-m-d H:i:s'), 'date_updated' => date('Y-m-d H:i:s'));

                $data = $this->security->xss_clean($sInfo);
                $result = $this->service_model->addNewService($data);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New service image inserted successfully');
                } else {
                    $this->session->set_flashdata('error', 'service Insertion failed');
                }

                redirect('admin/service/serviceListing');
            }
        }
    }


    function getCatName($id)
    {
        return $this->db->get_where('tbl_scategory', array('id' => $id))->row_array()['scatname'];
    }


    /**
     * This function is used load user edit information
     * @param number Gallery
     */
    function editOld($sId = NULL)
    {


        if ($sId == null) {
            redirect('admin/service/serviceListing');
        }

        $data['scat'] = $this->service_model->getServiceCat();
        $data['allData'] = $this->service_model->getServiceById($sId);

        $this->global['pageTitle'] = 'vn24 : Edit Service';

        $this->loadViews("admin/service/editService", $this->global, $data, NULL);
    }





    /**
     * This function is used to edit the user information
     */
    function editService()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $sId = $this->input->post('sid');

            //$this->form_validation->set_rules('name','Name','trim|required');
            $this->form_validation->set_rules('cat', 'Category', 'trim|required|numeric');


            if ($this->form_validation->run() == FALSE) {
                $this->editOld($sId);
            } else {
                $catId = $this->input->post('cat');
                $des = $this->input->post('description');
                $name = $this->getCatName($catId);


                // upload Image 
                if (!empty($_FILES["simage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/service/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["simage"]['name'];
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('simage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/service/addNew');
                    } else {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["simage"]['name'];
                    }
                } else {

                    $image = $this->db->get_where('tbl_services', array('id' => $sId))->row_array()['image'];
                }


                $serviceInfo = array('cat_id' => $catId, 'description' => $des, 'image' => $image, 'updatedBy' => 1, 'date_updated' => date('Y-m-d H:i:s'), 'title' => $name);

                $data = $this->security->xss_clean($serviceInfo);

                $result = $this->service_model->editService($data, $sId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'Service updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'Service updation failed');
                }

                redirect('admin/serviceListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteService()
    {
        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('sId');
            $serviceInfo = array('isDeleted' => 1, 'updatedBy' => 1, 'date_updated' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

            $result = $this->service_model->deleteService($sId, $serviceInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'vn24: 404 - Page Not Found';

        $this->loadViews("admin/404", $this->global, NULL, NULL);
    }
}
