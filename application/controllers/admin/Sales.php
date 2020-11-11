<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Sales extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('sale_model');
    

    $this->isLoggedIn();
    $this->load->helper('url', 'form');
  }


  function index()
  {

    $this->global['pageTitle'] = 'Sales | Vn24';


      $this->loadViews("admin/sale/viewPlan", $this->global, NULL, NULL);

    //$this->addTestimonials();       
  }


  public function getPlan()
  {
      $id= $this->input->post('id');
       $result = $this->sale_model->getPlanById($id);
      
      
      echo '<option value="'.$result["monthly_cost"].' Monthly">Rs. '.$result["monthly_cost"].' Monthly</option>
           <option value="'.$result["quarter_cost"].' Quarterly">Rs. '.$result["quarter_cost"].' Quarterly</option>
           <option value="'.$result["halfyear_cost"].' Halfyearly">Rs. '.$result["halfyear_cost"].' Halfyearly </option>
           <option value="'.$result["yearly_cost"].' Yearly">Rs. '.$result["yearly_cost"].' Yearly</option>';
      
  }


  public function salesCode()
  {

   

      $this->global['pageTitle'] = 'Sales Code | Vn24';


      $this->loadViews("admin/sale/viewSalescode", $this->global, NULL, NULL);
    
  }
  
  
  public function clients()
  {

   

      $this->global['pageTitle'] = 'Clients Code | Vn24';


      $this->loadViews("admin/sale/viewClients", $this->global, NULL, NULL);
    
  }
  
  
  public function editSaleOld()
  {

   

      $this->global['pageTitle'] = 'Edit Sales Code | Vn24';
      $data['plan_data'] = $this->sale_model->getSaleById($this->uri->segment(4));
      $this->global['plan'] =  $this->sale_model->getPlanDetails();

      $this->loadViews("admin/sale/editSalescode", $this->global, $data, NULL);
    
  }
  
  public function editSales()
  {

    if ($this->input->post('submit') != NULL) {

      $id = $this->input->post('id');
      


      $formArray = array();

      $formArray['code'] = $this->input->post('pname');
      $formArray['package_id'] = $this->input->post('package_id');
      $formArray['package_tenure'] = $this->input->post('package_tenure');
      
      $this->sale_model->updateSalesCode($id, $formArray);
      $this->session->set_flashdata('success', 'record updated successfully');
      redirect(base_url() . 'admin/sales/salesCode');
    }
  }
  



  public function addPlan()
  {
    


      if ($this->input->post('submit') !== NULL) {

        $forminput = array(

          "name" => $this->input->post('pname'),
          "corpuser" =>  $this->input->post('corpuser'),
          "rider" =>  $this->input->post('rider'),
          "leads_per" =>  $this->input->post('leads_per'),
          "cash_user_per" =>  $this->input->post('cash_user_per'),
          "monthly_cost" =>  $this->input->post('monthly_cost'),
          "quarter_cost" =>  $this->input->post('quarter_cost'),
          "halfyear_cost" =>  $this->input->post('halfyear_cost'),
          "yearly_cost" =>  $this->input->post('yearly_cost'),
          "plan_des" =>  $this->input->post('plan_des'),
          "status" => 'Active',
          "date" => date('d-m-Y'),
        );

      
        $this->sale_model->insertPlan($forminput);
        $this->session->set_flashdata('success', 'Record added successfully');
        redirect(base_url() . 'admin/sales/');
      }else{
          
          
        $this->global['pageTitle'] = 'Add Plan | Vn24';

        $this->loadViews("admin/sale/addPlan", $this->global, NULL, NULL);

      }
    
  }
 public function editOld()
  {


      $id = $this->uri->segment(4);

      $this->global['pageTitle'] = 'Edit Subscription Plan |  Vn24';
      $data['plan_data'] = $this->sale_model->getPlanById($id);


      $this->loadViews("admin/sale/editPlan", $this->global, $data, NULL);
    

  }
  public function editPlan()
  {

    if ($this->input->post('submit') != NULL) {

      $id = $this->input->post('id');
      


      $formArray = array();

      $formArray['name'] = $this->input->post('pname');
      $formArray['corpuser'] = $this->input->post('corpuser');
      $formArray['rider'] = $this->input->post('rider');
      $formArray['leads_per'] = $this->input->post('leads_per');
      $formArray['cash_user_per'] = $this->input->post('cash_user_per');
      $formArray['monthly_cost'] = $this->input->post('monthly_cost');
      $formArray['quarter_cost'] = $this->input->post('quarter_cost');
      $formArray['halfyear_cost'] = $this->input->post('halfyear_cost');
      $formArray['yearly_cost'] = $this->input->post('yearly_cost');
      $formArray['plan_des'] = $this->input->post('plan_des');



      $this->sale_model->updatePlan($id, $formArray);
      $this->session->set_flashdata('success', 'record updated successfully');
      redirect(base_url() . 'admin/sales/');
    }
  }


 public function addSaleCode()
  {
    


      if ($this->input->post('submit') !== NULL) {

      
        $forminput = array(

          "code" => $this->input->post('code'),
         
          "package_id" =>  $this->input->post('package_id'),
          "package_tenure" =>  $this->input->post('package_tenure'),
          "status" => 'Active',
          "agent_id" => $this->session->userdata('auserId'),
          "date_created" => date('Y-m-d H:i:s'),
          "date_expired" => date('Y-m-d H:i:s'),
          "isDeleted" => 0,
        );

      
        $this->sale_model->insertCode($forminput);
        $this->session->set_flashdata('success', 'Record added successfully');
        redirect(base_url() . 'admin/sales/salesCode');
      }else{
          
          
        $this->global['pageTitle'] = 'Add Sale | Vn24';
        $this->global['plan'] =  $this->sale_model->getPlanDetails();

        $this->loadViews("admin/sale/addSalecode", $this->global, NULL, NULL);

      }
    
  }


  public function deletePlan()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $pid = $this->input->post('pid');
      

      $result = $this->sale_model->delPlan($pid);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }
  public function deleteSale()
  {

    if ($this->isAdmin() == TRUE) {
      echo (json_encode(array('status' => 'access')));
    } else {
      $pid = $this->input->post('pid');
      

      $result = $this->sale_model->delSale($pid);

      if ($result > 0) {
        echo (json_encode(array('status' => TRUE)));
      } else {
        echo (json_encode(array('status' => FALSE)));
      }
    }
  }
  
  

public function sale_json()
  {
    $records = $this->sale_model->sale_data();



    $data = array();
    foreach ($records['data']  as $row) {
     
      $data[] = array(

        $username = $row['code'],
       
        $row['date_created'],
        
        $row['status'],
        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/sales/editSaleOld/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger deletesale" href="#" data-pid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }
  
  
  
  public function sale_client()
  {
    $records = $this->sale_model->client_data();

    $data = array();
    foreach ($records['data']  as $row) {
     
      $data[] = array(

        $row['name'],
        $row['email'],
        $row['mobile'],
        $row['gst'],
        $row['pan'],
        $row['code'],
        $row['address'],
        $row['package'],
        $row['pack_tenure'],
       $row['sales_code'],  
       $row['createdDtm'],  
        
       
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }


  public function datatable_json()
  {
    $records = $this->sale_model->plan_data();



    $data = array();
    foreach ($records['data']  as $row) {
     
      $data[] = array(

        $username = $row['name'],
       
        $row['date'],
        
        $row['status'],
        '<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/sales/editOld/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger deleteplan" href="#" data-pid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }
  
  
  
}
