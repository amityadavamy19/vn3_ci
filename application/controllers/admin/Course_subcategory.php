<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Course_subcategory extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('coursesubcat_model');

    $this->isLoggedIn();
    $this->load->helper('url', 'form');
  }


  function index()
  {

    $this->load->model("coursesubcat_model");
    $data["fetch_data"] = $this->coursesubcat_model->subcategoryListing();

    //$this->addTestimonials();       
  }




  public function viewsubcategory()
  {

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $searchText = $this->security->xss_clean($this->input->post('searchText'));
      $data['searchText'] = $searchText;

      $this->load->library('pagination');

      $count = $this->coursesubcat_model->subcategoryListingCount($searchText);

      $returns = $this->paginationCompress("admin/viewsubcategory/", $count, 10);

      $data['galleryRecords'] = $this->coursesubcat_model->galleryListing($searchText, $returns["page"], $returns["segment"]);



      $this->global['pageTitle'] = 'vn24 : sub category';


      $this->loadViews("admin/course_subcategory/viewsubcategory", $this->global, $data, NULL);
    }
  }



  public function addsubcategory()
  {
    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {


      $data['roles'] = $this->coursesubcat_model->getUserRoles();

      $this->global['pageTitle'] = 'vn24 : sub category';

      $this->loadViews("admin/course_subcategory/addsubcategory", $this->global, $data, NULL);


      if ($this->input->post('submit') !== NULL) {


        $forminput = array(

          "cat_id" => $this->input->post('role'),
          "subcat_name" =>  $this->input->post('cat_name'),
          "url" => $this->make_slug($this->input->post('cat_name')),
          "status" => 'Active',
          "date_created" => date('Y-m-d H:i:s'),
          "date_modified" => date('Y-m-d H:i:s')
        );

        // print_r($forminput);
        $this->coursesubcat_model->insertsubcategory($forminput);
        $this->session->set_flashdata('success', 'record added successfully');
        redirect(base_url() . 'admin/course_subcategory/viewsubcategory');
      }
    }
  }



  public function editsubcategory()
  {


    $id = $this->uri->segment(4);
    //echo $id;
    // exit;
    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $this->global['pageTitle'] = 'vn24 | category';

      $data['subcat_data'] = $this->coursesubcat_model->getSubCatById($id);
      $data['cat_data'] = $this->coursesubcat_model->getAllCat();

      $this->loadViews("admin/course_subcategory/editsubcategory", $this->global, $data, NULL);
    }

    if ($this->input->post('submit') !== NULL) {


      $formArray = array();

      $formArray['cat_id'] = $this->input->post('role');
      $formArray['subcat_name'] = $this->input->post('subcat_name');
      $formArray['url'] = $this->make_slug($this->input->post('subcat_name'));
      $formArray['date_modified'] = date('Y-m-d H:i:s');


      $this->coursesubcat_model->updatesubcategory($this->input->post('id'), $formArray);
      $this->session->set_flashdata('success', 'record updated successfully');
      redirect(base_url() . 'admin/course_subcategory/viewsubcategory');
    }
  }

  public function deletesubcategory()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $sId = $this->input->post('sid');
      $userInfo = array('isDeleted' => 1, 'date_modified' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

      $result = $this->coursesubcat_model->deletesubcategory($sId, $userInfo);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }






  public function datatable_json()
  {
    $records = $this->coursesubcat_model->subcategory_data();



    $data = array();
    foreach ($records['data']  as $row) {

      $data[] = array(

        $username = $row['cat_name'],
        $row['subcat_name'],

        $row['date_created'],
        $row['date_modified'],
        $row['status'],

        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/course_subcategory/editsubcategory/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletecategory" href="#" data-sid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }


  private function make_slug($string)
  {
    $lower_case_string = strtolower($string);
    $string1 = preg_replace('/[^a-zA-Z0-9 ]/s', '', $lower_case_string);
    return strtolower(preg_replace('/\s+/', '-', $string1));
  }
}
