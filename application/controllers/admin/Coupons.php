<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Coupons extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('coupon_model');

    $this->isLoggedIn();
    $this->load->helper('url', 'form');
  }


  function index()
  {

    $this->load->model("coupon_model");
    $data["fetch_data"] = $this->coupon_model->couponListing();

    //$this->addTestimonials();       
  }




  public function viewcoupons()
  {

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {

      $this->global['pageTitle'] = 'vn24 | Coupons';


      $this->loadViews("admin/coupons/viewcoupon", $this->global, NULL, NULL);
    }
  }



  public function addcoupons()
  {
    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      // $data['roles'] = $this->coupon_model->getcategory();
      //  $data['role'] = $this->training_model->getsubcategory();

      //    $data['rol'] = $this->training_model->getsubcategory2();



      $this->global['pageTitle'] = 'vn24 : Add Coupon ';

      $this->loadViews("admin/coupons/addcoupon", $this->global, NULL, NULL);


      if ($this->input->post('submit') !== NULL) {

        // upload Image 
        if (!empty($_FILES["cimage"]['name'])) {
          $config = array(
            'upload_path' => "./uploads/coupons/",
            'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
            'overwrite' => TRUE,
            'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
          );
          $config['file_name'] = $_FILES["cimage"]['name'];
          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('cimage')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/brands/listbrands');
          } else {
            $file_data = array('upload_data' => $this->upload->data());
            $image = $_FILES["cimage"]['name'];
          }
        }




        $forminput = array(

          "coupon" => $this->input->post('coupon'),
          "image" =>  $image,
          "date_created" =>  $this->input->post('actvdate'),
          "date_expired" =>  $this->input->post('expdate'),
          "status" => $this->input->post('status')
        );

        // print_r($forminput);
        $this->coupon_model->insertcoupons($forminput);
        $this->session->set_flashdata('success', 'record added successfully');
        redirect(base_url() . 'admin/coupons/viewcoupons');
      }
    }
  }



  public function editcoupons()
  {


    $id = $this->uri->segment(4);

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $this->global['pageTitle'] = 'vn24 | Edit coupon ';
      $data['coupon_data'] = $this->coupon_model->getcouponsById($id);


      $this->loadViews("admin/coupons/editcoupon", $this->global, $data, NULL);
    }

    if ($this->input->post('submit') !== NULL) {

      $id = $this->input->post('id');
      // upload Image 
      if (!empty($_FILES["cimage"]['name'])) {
        $config = array(
          'upload_path' => "./uploads/coupons/",
          'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
          'overwrite' => TRUE,
          'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
        );
        $config['file_name'] = $_FILES["cimage"]['name'];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('cimage')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect('admin/coupons/addNew');
        } else {
          $file_data = array('upload_data' => $this->upload->data());
          $image = $_FILES["cimage"]['name'];
        }
      } else {

        $image = $this->db->get_where('tbl_campain', array('id' => $id))->row_array()['image'];
      }

      $formArray['image'] = $image;


      $formArray = array();

      $formArray['coupon'] = $this->input->post('coupon');
      $formArray['image'] = $image;
      $formArray['date_created'] = $this->input->post('actvdate');
      $formArray['date_expired'] = $this->input->post('expdate');
      $formArray['status'] = $this->input->post('status');



      $this->coupon_model->updatecoupons($this->input->post('id'), $formArray);
      $this->session->set_flashdata('success', 'record updated successfully');
      redirect(base_url() . 'admin/coupons/viewcoupons');
    }
  }

  public function deletecoupons()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $tId = $this->input->post('tid');
      $userInfo = array('isDeleted' => 1);

      $result = $this->coupon_model->deletecoupon($tId, $userInfo);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }

  public function datatable_json()
  {
    $records = $this->coupon_model->coupons_data();



    $data = array();
    foreach ($records['data']  as $row) {
      $image = '<img src="' . base_url() . 'uploads/coupons/' . $row['image'] . '" width="100" height="80">';

      $data[] = array(

        $username = $row['coupon'],
        $image,
        $row['date_created'],
        $row['date_expired'],
        $row['status'],
        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/coupons/editcoupons/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletecoupon" href="#" data-tid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }
}
