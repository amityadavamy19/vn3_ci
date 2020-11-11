<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Benefits extends BaseController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('benefits_model');
    $this->load->library('session');

    $this->isLoggedIn();
    $this->load->helper('url', 'form');
  }


  function index()
  {

    $this->load->model("benefits_model");
    $data["fetch_data"] = $this->benefits_model->benefitsListing();

    //$this->addTestimonials();       
  }

  public function delete()
  {



    $this->benefits_model->delete_img($_GET['table'], $_GET['idcolom'], $_GET['id']);
  }


  public function viewbenefits()
  {

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {

      $this->global['pageTitle'] = 'vn24 | benefits';


      $this->loadViews("admin/benefits/viewbenefits", $this->global, NULL, NULL);
    }
  }



  public function addbenefits()
  {
    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $data['roles'] = $this->benefits_model->getcategory();
      $data['roless'] = $this->benefits_model->subcat3_data();
      //  $data['role'] = $this->training_model->getsubcategory();

      //    $data['rol'] = $this->training_model->getsubcategory2();



      $this->global['pageTitle'] = 'vn24 : benefits';

      $this->loadViews("admin/benefits/addbenefits", $this->global, $data, NULL);


      if ($this->input->post('submit') !== NULL) {

        if (!empty($_FILES["timage"]['name'])) {
          $config = array(
            'upload_path' => "./uploads/salary/",
            'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
            'overwrite' => TRUE,
            'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
          );
          //$config['file_name'] = $_FILES["timage"]['name'];
          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('timage')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/benefits/viewbenefits');
          } else {
            $file_data = array('upload_data' => $this->upload->data());
            $image = $_FILES["timage"]['name'];
          }
        }


        $forminput = array(

          "cat_id" => $this->input->post('role'),
          "subcat_id" =>  $this->input->post('subcatid'),
          "subcat2_id" =>  $this->input->post('subcatid2'),
          "designation_id" =>  $this->input->post('roles'),
          "sal_image" => $image,
          "status" => 'Active',
          "date_created" => date('Y-m-d H:i:s'),
          "date_updated" => date('Y-m-d H:i:s')
        );

        // print_r($forminput);
        $last_id =  $this->benefits_model->insertbenifits($forminput);

        $data = array();
        if (!empty($_FILES['companies']['name'])) {
          $filesCount = count($_FILES['companies']['name']);
          for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['companies']['name'][$i];
            $_FILES['file']['type']     = $_FILES['companies']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['companies']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['companies']['error'][$i];
            $_FILES['file']['size']     = $_FILES['companies']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/Hiring Companies/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if ($this->upload->do_upload('file')) {
              // Uploaded file data
              $fileData = $this->upload->data();
              $uploadData[$i]['c_image'] = $fileData['file_name'];
              $uploadData[$i]['date_created'] = date("Y-m-d H:i:s");
              $uploadData[$i]['status'] = "Active";
              $uploadData[$i]['b_id'] = $last_id;
            }
          }
          if (!empty($uploadData)) {
            // Insert files data into the database
            $insert = $this->benefits_model->insert($uploadData);

            // Upload status message

            $this->session->set_flashdata('success', 'record added successfully');
            redirect(base_url() . 'admin/benefits/viewbenefits');
          }
        }
      }
    }
  }

  function editbenefits()
  {


    $id = $this->uri->segment(4);

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $this->global['pageTitle'] = 'vn24 | Benefits';
      $data['training_data'] = $this->benefits_model->getbenefitsById($id);
      $data['cat_data'] = $this->benefits_model->getAllCat();
      $data['subcat_data'] = $this->benefits_model->getAllsub();
      $data['subcat2_data'] = $this->benefits_model->getAllsub2();
      $data['designation'] = $this->benefits_model->designation();

      $this->loadViews("admin/benefits/editbenefits", $this->global, $data, NULL);
    }

    if ($this->input->post('submit') !== NULL) {

      $id = $this->input->post('id');
      $formArray = array();

      $formArray['cat_id'] = $this->input->post('role');
      $formArray['subcat_id'] = $this->input->post('subcatid');
      $formArray['subcat2_id'] = $this->input->post('subcatid2');
      $formArray['designation_id'] = $this->input->post('roles');


      $formArray['date_updated'] = date('Y-m-d H:i:s');

      if (!empty($_FILES["timage"]['name'])) {
        $config = array(
          'upload_path' => "./uploads/salary/",
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

        $image = $this->db->get_where('tbl_benefits', array('id' => $id))->row_array()['sal_image'];
      }

      $formArray['sal_image'] = $image;

      $this->benefits_model->updatebenefits($this->input->post('id'), $formArray);

      $data = array();
      if (!empty($_FILES['companies']['name'])) {
        $filesCount = count($_FILES['companies']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
          $_FILES['file']['name']     = $_FILES['companies']['name'][$i];
          $_FILES['file']['type']     = $_FILES['companies']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['companies']['tmp_name'][$i];
          $_FILES['file']['error']     = $_FILES['companies']['error'][$i];
          $_FILES['file']['size']     = $_FILES['companies']['size'][$i];

          // File upload configuration
          $uploadPath = 'uploads/Hiring Companies/';
          $config['upload_path'] = $uploadPath;
          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          // Load and initialize upload library
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          // Upload file to server
          if ($this->upload->do_upload('file')) {
            // Uploaded file data
            $fileData = $this->upload->data();
            $uploadData[$i]['c_image'] = $fileData['file_name'];
            $uploadData[$i]['date_created'] = date("Y-m-d H:i:s");
            $uploadData[$i]['status'] = "Active";
            $b_id = $this->input->post('id');
          }
        }
        if (!empty($uploadData)) {
          // Insert files data into the database
          $insert = $this->benefits_model->updatess($b_id, $uploadData);

          // Upload status message

          $this->session->set_flashdata('success', 'record added successfully');
          redirect(base_url() . 'admin/benefits/viewbenefits');
        }
      }
    }
  }

  public function deletetrainingoptions()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $tId = $this->input->post('tid');
      $userInfo = array('isDeleted' => 1, 'date_updated' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

      $result = $this->training_model->deletetraining($tId, $userInfo);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }



  public function subcatdata()
  {

    $catid = $this->input->post('catid');
    $res = $this->benefits_model->subcat_data($catid);

    echo "<option>--select--</option>";
    foreach ($res as $r) {
      echo "<option value='" . $r['id'] . "'> " . $r['subcat_name'] . "</option>";
    }
  }




  public function subcatdata2()
  {

    $subcatid = $this->input->post('subcatid');
    $rese = $this->benefits_model->subcat2_data($subcatid);

    echo "<option>--select--</option>";
    foreach ($rese as $re) {
      echo "<option value='" . $re['id'] . "'> " . $re['subcat2_name'] . "</option>";
    }
  }



  public function subcatdata3()
  {

    $rese = $this->benefits_model->subcat3_data();

    echo "<option>--select--</option>";
    foreach ($rese as $re) {
      echo "<option value='" . $re['id'] . "'> " . $re['designation'] . "</option>";
    }
  }

  public function datatable_json()
  {
    $records = $this->benefits_model->benefits_data();

    $data = array();
    foreach ($records['data']  as $row) {

      $salary = '<img src="' . base_url() . 'uploads/salary/' . $row['sal_image'] . '" width="100" height="80">';
      $data[] = array(

        $username = $row['cat_name'],
        $row['subcat_name'],
        $row['subcat2_name'],
        $row['designation'],

        $salary,
        $row['date_created'],
        $row['date_updated'],
        $row['status'],

        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/benefits/editbenefits/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletetraining" href="#" data-sid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }
}
