<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Products extends BaseController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('products_model');
    $this->load->library('session');

    $this->isLoggedIn();
    $this->load->helper('url', 'form');
  }


  function index()
  {

    $this->load->model("products_model");
    $data["fetch_data"] = $this->products_model->productsListing();

    //$this->addTestimonials();       
  }

  public function delete()
  {



    $this->products_model->delete_img($_GET['table'], $_GET['idcolom'], $_GET['id']);
  }


  public function viewproducts()
  {

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {

      $this->global['pageTitle'] = 'vn24 | products';


      $this->loadViews("admin/products/viewproducts", $this->global, NULL, NULL);
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
    $destN = "./uploads/certi/" . $file;
    move_uploaded_file($tmp, $destN);
    return $file;
  }


  public function addproducts()
  {
    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {

      $data['roles'] = $this->products_model->getcategory();
      $data['role'] = $this->products_model->getsubcategory();


      $this->global['pageTitle'] = 'vn24 | products';

      $this->loadViews("admin/products/addproducts", $this->global, $data, NULL);


      if ($this->input->post('submit') !== NULL) {


        $image1 = $this->uploadfilesamenames($_FILES["c1image"]['name'], $_FILES["c1image"]['tmp_name']);
        $image2 = $this->uploadfilesamenames($_FILES["c2image"]['name'], $_FILES["c2image"]['tmp_name']);
        $image3 = $this->uploadfilesamenames($_FILES["c3image"]['name'], $_FILES["c3image"]['tmp_name']);
        $image4 = $this->uploadfilesamenames($_FILES["c4image"]['name'], $_FILES["c4image"]['tmp_name']);
        $image5 = $this->uploadfilesamenames($_FILES["c5image"]['name'], $_FILES["c5image"]['tmp_name']);





        $forminput = array(

          "cat_id" => $this->input->post('role'),
          "subcat_id" => $this->input->post('subcatid'),
          "title" => $this->input->post('title'),
          "type" => $this->input->post('type'),
          "url" => $this->make_slug($this->input->post('title')),
          "price" => $this->input->post('price'),
          "shorttitle" =>  $this->input->post('shorttitle'),
          "description" =>  $this->input->post('description'),

          "certi1" =>  $image1,
          "certi2" =>  $image2,
          "certi3" =>  $image3,
          "certi4" =>  $image4,
          "image" =>  $image5,
          "specs" =>  $this->input->post('specs'),
          "faq" =>  $this->input->post('faq'),

          "status" => 'Active',
          "date_created" => date('Y-m-d H:i:s'),
          "date_updated" => date('Y-m-d H:i:s')
        );

        // print_r($forminput);
        $this->products_model->insertproducts($forminput);

        /*  $data = array();
        if (!empty($_FILES['productimages']['name'])) {
          $filesCount = count($_FILES['productimages']['name']);
          for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['productimages']['name'][$i];
            $_FILES['file']['type']     = $_FILES['productimages']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['productimages']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['productimages']['error'][$i];
            $_FILES['file']['size']     = $_FILES['productimages']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/products/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if ($this->upload->do_upload('file')) {
              // Uploaded file data
              $fileData = $this->upload->data();
              $uploadData[$i]['productimages'] = $fileData['file_name'];
              $uploadData[$i]['date_created'] = date("Y-m-d H:i:s");
              $uploadData[$i]['status'] = "Active";
              $uploadData[$i]['p_id'] = $last_id;
            }
          }
          if (!empty($uploadData)) {
            // Insert files data into the database
            $insert = $this->products_model->insert($uploadData);

            // Upload status message

            $this->session->set_flashdata('success', 'record added successfully');
            redirect(base_url() . 'admin/products/viewproducts');
          }
        }*/
        $this->session->set_flashdata('success', 'record added successfully');
        redirect(base_url() . 'admin/products/viewproducts');
      }
    }
  }

  function editproducts()
  {


    $id = $this->uri->segment(4);

    if ($this->isAdmin() == TRUE) {
      $this->loadThis();
    } else {
      $this->global['pageTitle'] = 'vn24 :products';
      //$data['sub2cat_data'] = $this->products_model->getSubCat2ById($id);
      $data['cat_data'] = $this->products_model->getAllCat();
      $data['subcat_data'] = $this->products_model->getAllsub();
      $data['training_data'] = $this->products_model->getproductsById($id);
      $data['training_dataa'] = $this->products_model->getproductssById($id);
      $this->loadViews("admin/products/editproducts", $this->global, $data, NULL);
    }

    if ($this->input->post('submit') !== NULL) {

      $id = $this->input->post('id');

      if (!empty($_FILES["c1image"]['name'])) {
        $image1 = $this->uploadfilesamenames($_FILES["c1image"]['name'], $_FILES["c1image"]['tmp_name']);
      } else {

        $image1 = $this->db->get_where('tbl_products', array('id' => $id))->row_array()['certi1'];
      }

      if (!empty($_FILES["c2image"]['name'])) {
        $image2 = $this->uploadfilesamenames($_FILES["c2image"]['name'], $_FILES["c2image"]['tmp_name']);
      } else {

        $image2 = $this->db->get_where('tbl_products', array('id' => $id))->row_array()['certi2'];
      }


      if (!empty($_FILES["c3image"]['name'])) {

        $image3 = $this->uploadfilesamenames($_FILES["c3image"]['name'], $_FILES["c3image"]['tmp_name']);
      } else {

        $image3 = $this->db->get_where('tbl_products', array('id' => $id))->row_array()['certi3'];
      }

      if (!empty($_FILES["c4image"]['name'])) {

        $image4 = $this->uploadfilesamenames($_FILES["c4image"]['name'], $_FILES["c4image"]['tmp_name']);
      } else {

        $image4 = $this->db->get_where('tbl_products', array('id' => $id))->row_array()['certi4'];
      }

      if (!empty($_FILES["c5image"]['name'])) {

        $image5 = $this->uploadfilesamenames($_FILES["c5image"]['name'], $_FILES["c5image"]['tmp_name']);
      } else {

        $image5 = $this->db->get_where('tbl_products', array('id' => $id))->row_array()['image'];
      }

     

      $formArray = array();

      $formArray['cat_id'] = $this->input->post('role');
      $formArray['subcat_id'] = $this->input->post('subcatid');
      $formArray['title'] = $this->input->post('title');
      $formArray['type'] = $this->input->post('type');
      $formArray["url"] = $this->make_slug($this->input->post('title'));
      $formArray['price'] = $this->input->post('price');
      $formArray["shorttitle"] =  $this->input->post('shorttitle');
      $formArray['description'] = $this->input->post('description');
      $formArray["image"] =  $image5;
      $formArray["certi1"] =  $image1;
      $formArray["certi2"] =  $image2;
      $formArray["certi3"] =  $image3;
      $formArray["certi4"] =  $image4;
      $formArray["specs"] =  $this->input->post('specs');
  $formArray["faq"] =  $this->input->post('faq');
      $formArray['date_updated'] = date('Y-m-d H:i:s');


      $this->products_model->updateproducts($this->input->post('id'), $formArray);

      /* $data = array();
      if (!empty($_FILES['productimages']['name'])) {
        $filesCount = count($_FILES['productimages']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
          $_FILES['file']['name']     = $_FILES['productimages']['name'][$i];
          $_FILES['file']['type']     = $_FILES['productimages']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['productimages']['tmp_name'][$i];
          $_FILES['file']['error']     = $_FILES['productimages']['error'][$i];
          $_FILES['file']['size']     = $_FILES['productimages']['size'][$i];

          // File upload configuration
          $uploadPath = 'uploads/products/';
          $config['upload_path'] = $uploadPath;
          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          // Load and initialize upload library
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          // Upload file to server
          if ($this->upload->do_upload('file')) {
            // Uploaded file data
            $fileData = $this->upload->data();
            $uploadData[$i]['productimages'] = $fileData['file_name'];
            $uploadData[$i]['date_created'] = date("Y-m-d H:i:s");
            $uploadData[$i]['status'] = "Active";
            $uploadData[$i]['p_id'] = $this->input->post('id');
          } else {
            redirect(base_url() . 'admin/products/viewproducts');
            // Uploaded file data
            // $fileData = $this->upload->data();
            //$uploadData[$i]['images'] = $fileData['file_name'];
            //$uploadData[$i]['date_created'] = date("Y-m-d H:i:s");
            //$uploadData[$i]['status'] = "Active";
            //$uploadData[$i]['p_id'] = $this->input->post('id');
          }
        }
        if (!empty($uploadData)) {
          // Insert files data into the database
          $insert = $this->products_model->updatess($uploadData);

          // Upload status message

          $this->session->set_flashdata('success', 'record added successfully');
          redirect(base_url() . 'admin/products/viewproducts');
        }
      }*/

      $this->session->set_flashdata('success', 'record added successfully');
      redirect(base_url() . 'admin/products/viewproducts');
    }
  }

  function deleteproducts()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $bId = $this->input->post('bid');
      $userInfo = array('isDeleted' => 1, 'date_updated' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

      $result = $this->products_model->deleteproducts($bId, $userInfo);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }


  public function datatable_json()
  {
    $records = $this->products_model->products_data();

    $data = array();
    //print_r($records);
    // exit();
    foreach ($records['data']  as $row) {
      // $images = '<img src="' . base_url() . 'uploads/products/' . $row['images'] . '" width="100" height="80">';
      $data[] = array(
        $username = $row['cat_name'],
        $row['subcat_name'],
        $row['title'],
        $row['price'],

        $row['status'],

        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/products/editproducts/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteproducts" href="#" data-bid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
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
