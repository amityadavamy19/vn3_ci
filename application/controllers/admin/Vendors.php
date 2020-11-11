<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Conatct (UserController)
 * Conatct Class to control all Conatct related operations.
 * @author :Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Vendors extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vendors_model');
        $this->load->model('general_model');

        $this->load->helper('form');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            
            $this->global['pageTitle'] = 'Vendors | Vn24 ';
            
            $this->loadViews("admin/vendor/viewVendor", $this->global, NULL, NULL);
        }
    } 

     public function viewVendorOrder()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            
            $this->global['pageTitle'] = 'Vendor Orders | Vn24 ';
            
            
            $this->loadViews("admin/vendor/viewVendorOrder", $this->global, NULL, NULL);
        }
    } 
	
	
	public function viewVendorComm($id)
	{
		
		    $this->global['pageTitle'] = 'View Vendor Commission | Vn24';
           
			$data['vendorData']= $this->general_model->getCommission($id);
            $this->loadViews("admin/vendor/viewVendorcomm", $this->global, $data, NULL);
		
		
	}
	
	
	public function viewVendorClient()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            
            $this->global['pageTitle'] = 'Vendor Clients| Vn24 ';
            
            
            $this->loadViews("admin/vendor/viewVendorClients", $this->global, NULL, NULL);
        }
    } 
    
   
   
   
    public function updateVendor()
    {
		
		if($this->input->post('submit') != NULL ){
         $data = array(
			'name' => filter_value('uname', ''),
			'mobile' => filter_value('mobile', ''),
			'gst' =>  filter_value('gst', ''),
			'couriers' => @implode(',',filter_value('couriers', '')),
			'cargo' => @implode(',',filter_value('cargo', '')),
			'address' => filter_value('address', ''),
			'updatedDtm'=> date('Y-m-d H:i:s')
			);
		 
		 
		}
		 
		  $this->general_model->updateRecord($this->input->post('id'),'userId','tbl_users',$data);
		  if($this->input->post('ser_pin') != NULL )
			{
			$this->general_model->insert_batch($this->input->post('ser_pin'),$this->input->post('id'));
			}
        
          $this->global['pageTitle'] = 'Track Consignment | Vn24';
        
           redirect(base_url('admin/vendors/'),'refresh');
    }
	
   
     public function editVendor()
    {
		    $this->global['pageTitle'] = 'Edit Vendor | Vn24';
            $data['courier'] =  $this->general_model->couriers();
		    $data['cargo'] =  $this->general_model->cargo();
			$data['vendorData']= $this->general_model->getSingleRecord($this->uri->segment(4),'userId','tbl_users');
            $this->loadViews("admin/vendor/editVendor", $this->global, $data, NULL);
		
	}
   
   
    public function addVendor()
    {
		
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('uname', 'Name', 'required|max_length[128]|trim');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim|is_unique[tbl_users.email]');
				$this->form_validation->set_rules('mobile', 'mobile', 'required|max_length[10]|trim');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
				$this->form_validation->set_rules('cpassword','Password confirmation','required|min_length[6]|max_length[12]|matches[password]');
				$this->form_validation->set_rules('gst', 'GST', 'required|min_length[15]|max_length[15]|trim');
				$this->form_validation->set_rules('address', 'Address', 'required|trim');
				
				$this->form_validation->set_rules('s_code', 'SALES CODE', 'required|trim');
			
		 if($this->form_validation->run() == FALSE)
        {
            $this->global['pageTitle'] = 'Add New Vendor | Vn24';
            $data['courier'] =  $this->general_model->couriers();
		    $data['cargo'] =  $this->general_model->cargo();
            $this->loadViews("admin/vendor/addVendor", $this->global, $data, NULL);
			
			
        }
		else
		{
			
			$data = array(
			'name' => filter_value('uname', ''),
			'email' => filter_value('email', ''),
			'mobile' => filter_value('mobile', ''),
			'sales_code' => filter_value('s_code', ''),
			'gst' =>  filter_value('gst', ''),
			'couriers' => @implode(',',filter_value('couriers', '')),
			'cargo' => @implode(',',filter_value('cargo', '')),
			'package' => filter_value('package', ''),
			'code'=> 'VN00'.(lastUId()+1),
			'address' => filter_value('address', ''),
			'password' => password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_BCRYPT),
			'plain_pass' => $this->security->xss_clean($this->input->post('password')),
			'roleId'=>4,
			'createdDtm'=> date('Y-m-d H:i:s'),
			'updatedDtm'=> date('Y-m-d H:i:s')
			);
			
			
			
			$result = $this->general_model->insert_ven($data);
			if($this->input->post('ser_pin') != NULL )
			{
			$this->general_model->insert_batch($this->input->post('ser_pin'),$result);
			}
			
			$this->session->set_flashdata('success','Successfully Signed Up. Please Login');
			redirect(base_url('admin/vendors/'),'refresh');
			
			
			
		}
		
			
		
		
		
		
    }
	
	 public function addParcel()
    {
		
		
		
            if($_POST['width'] && $_POST['height'] && $_POST['lengths'] && $_POST['qty'])
			{
            
            $parcelInfo = array(
			
			'length' => $_POST['lengths'],
			'width'=> $_POST['width'],
			'height' => $_POST['height'],
			'qty'=>$_POST['qty'],
			'user_id' =>$this->session->userdata('userId'),
			'status' => 'Inactive', 
			'date' => date('Y-m-d'));

            $result = $this->general_model->insertRecord($parcelInfo,'tbl_parcel_dimension');

            if ($result == true) {
               
                echo"Success";
            } else {
                echo"Failed";
            }


			}
			
		
		
		
		
    }
    
    public function pin_search()
    {
		
		
          if($_POST['pin'] && $_POST['otype'] == 'Courier')
		  {
			  
			$res = $this->general_model->search_pin('tbl_couriers',$_POST['pin']);
			if($res)
			{
			   
			   
			   foreach($res as $v)
			   {
				  echo '<option value="'.$v->name.'" >'.$v->name.'</option>';
				   
			   }
			}else
			{
				echo "Pincode Not Serviceable";
			}
			
			  
		  }elseif($_POST['pin'] && $_POST['otype'] == 'Cargo')
		  {
			  
			$res =  $this->general_model->search_pin('tbl_cargo',$_POST['pin']);
			if($res)
			{
			 
               foreach($res as $v)
			   {
				   echo '<option value="'.$v->name.'" >'.$v->name.'</option>';
				   
			   }
			}else
			{
				echo "Pincode Not Serviceable";
			}
		  }else{
			  
			  echo "Pincode Not Serviceable";
		  }
          
        
    }

    /**
     * This function is used to load the Gallery list
     */
    function deleteVendor()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $vId = $this->input->post('vid');

            $result = $this->vendors_model->delVendor($vId);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    public function order_json($id)
    {
        $records = $this->vendors_model->order_data($id);
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                
                $username = $row['order_id'],
                $row['amount'],
                $row['awb'],
                $row['qty'],
                $row['courior_service'],
                $row['pro_type'],
                $row['date'],

'<a class="btn btn-sm btn-danger deleteorder" href="#" data-vid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }




    public function datatable_json()
    {
        $records = $this->vendors_model->vendors_data();
        $data = array();
        foreach ($records['data']  as $row) {


           $agent_name = @$this->general_model->getSingleRecord($row['agent_id'],'userId','tbl_users');

            $data[] = array(
                
                $username = $row['name'],
                $row['email'],
                $row['mobile'],
                $row['code'],
                $row['package'],
                $agent_name['name'].' '.$agent_name['email'].'<br>'.$agent_name['mobile'],
                $row['gst'],
				
                $row['createdDtm'],

'<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/vendors/editVendor/' . $row['userId'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a title="View Clients" class="update btn btn-primary" href="' . base_url() . 'admin/vendors/viewVendorClient/' . $row['code'] . '"> <i class="fa fa-eye"></i></a> | <a title="View Commission" class="update btn btn-primary" href="' . base_url() . 'admin/vendors/viewVendorComm/' . $row['userId'] . '"> <i class="fa fa-eye"></i></a> | <a class="btn btn-sm btn-danger deletevendor" href="#" data-vid="' . $row['userId'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	public function sale_client($id)
  {
    $records = $this->vendors_model->client_data($id);

    $data = array();
    foreach ($records['data']  as $row) {
     
      $data[] = array(

        $row['name'],
        $row['email'],
        $row['mobile'],
        $row['gst'],
        $row['pan'],
        $row['address'],
        $row['vendor_code'],
        
       $row['createdDtm'],  
	   
	   '  <a title="View Orders" class="update btn btn-primary" href="' . base_url() . 'admin/vendors/viewVendorOrder/' . $row['userId'] . '"> <i class="fa fa-eye"></i></a> ',
      );
    }

    $records['data'] = $data;
    echo json_encode($records);
  }

	
	
	
}
