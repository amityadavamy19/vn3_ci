<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Conatct (UserController)
 * Conatct Class to control all Conatct related operations.
 * @author :Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Reports extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reports_model');
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
            
            $this->global['pageTitle'] = 'Reports | Vn24 ';
            //$data['reportRecords'] = $this->reports_model->getReports();
            $this->loadViews("admin/reports/listReports", $this->global, NULL, NULL);
        }
    }
    
   
   
   
    public function track()
    {

        
        $this->global['pageTitle'] = 'Track Consignment | Vn24';
        
         $this->loadViews("admin/reports/track", $this->global, NULL, NULL);
    }
	
	 public function userView()
    {

        
        $this->global['pageTitle'] = 'User Management | Vn24';
        
         $this->loadViews("admin/reports/listUser", $this->global, NULL, NULL);
    }
	
	
	public function search_awb() {
      
      
      $awb_data =   $this->general_model->get_awb($_POST['awb']);
      
      if(!empty($awb_data))
      {
          echo '<table style="width:100%">
			<tbody><tr>
			 <th style="width:20px; ">AWB</th>
			 <th style="width:20px;">OrderId</th>
			 <th style="width:20px;">Amount</th>
			 <th style="width:40px;">Date</th>
			 
			</tr>
			<tr>';
			foreach($awb_data as $val)
			{
			  echo '<td style="color:green; ">'.$val['awb'].'</td>';
			  echo '<td style="color:green; ">'.$val['order_id'].'</td>';
			  echo '<td style="color:green; ">Rs. '.$val['amount'].'</td>';
			  echo '<td style="color:green; ">'.$val['date'].'</td>';
			 
		
			} 
			  
			'</tr>
			
		  </tbody></table>';
          
      }else
      {
         echo 'Sorry!!, No AWB found. Please try again'; 
      }
      
   
    }
   
    public function addOtype()
    {
		
		
		if(isset($_POST['submit']) )
			{
		     $couInfo = array(
			
			'name' => $this->input->post('otype'),
			'status' =>'Active',
			'date' => date('Y-m-d'));
			
			$check_cou = $this->general_model->checkOtype($this->input->post('otype'));
			if($check_cou)
			{
			$this->session->set_flashdata('error', 'Order Type Already exists');	
			redirect('admin/otype/add','refresh');
			}else
			{
				$result = $this->general_model->insertRecord($couInfo,'tbl_otype');
				$this->session->set_flashdata('success','Order type Inserted');
				redirect('admin/otype/add','refresh');
			}

            
			
			
			
			}else{
				
			   $this->global['pageTitle'] = 'View Order Type| Vn24';
               
               $this->loadViews("admin/reports/addOtype", $this->global, NULL, NULL);
				
			}
		
	}
   
    public function assignOrder($id)
    {
		
		       $this->global['pageTitle'] = 'Assign Order | Vn24.in';
			   $data['oid'] = $this->general_model->getSingleRecord($id,'id','tbl_order');
			   $data['AllVendors'] = $this->general_model->getAllVendors($data['oid']['pickup_pincode']);
			   
               
               $this->loadViews("admin/reports/assignOrder", $this->global, $data, NULL);
		
	}
	public function assignOData()
    {
		$id = $this->input->post('id');
		$rid = $this->input->post('rId');
		
		//Check Already transfered or not
		$check_rec =  $this->general_model->getSingleRecord($id,'order_id','tbl_transfers');
		
		//Get Plan
		
		$ven_id = $this->input->post('assign_to');
		$plan_name =  $this->general_model->getSingleRecord($ven_id,'userId','tbl_users');
		
		
		//Get Package
		
		
		$package =  $this->general_model->getSingleRecord($plan_name['package'],'name','tbl_subscription_plan');
		
		
		//Check if Comission is zero
		if($package['cash_user_per']==0 )
		{
			$gst = 0.0;
			$gst = $this->input->post('amount')-[$this->input->post('amount')*100/(100+GST)];
			
			$ven_amt_rec = ($this->input->post('amount')-$gst);
			
			$ven_com = 0.0;
		}else{
			
			$gst = 0.0;
			$gst = $this->input->post('amount')-[$this->input->post('amount')*100/(100+GST)];
			$actual_amt = ($this->input->post('amount')-$gst);
			
			$ven_amt_rec = $actual_amt-($actual_amt*$package['cash_user_per']/100);
			
			$ven_com = ($actual_amt*$package['cash_user_per']/100);
			
		}
		
		
		
		
		if(!$check_rec){
			
		$data = array(
		
		'order_id'=>$id,
		'transfer_by'=>1,
		'transfer_to'=> $this->input->post('assign_to'),
		'date'=>date('Y-m-d'),
		'amount'=> $this->input->post('amount'),
		'vendor_recv_amt'=> $ven_amt_rec,
		'vendor_com_per'=> $package['cash_user_per'],
		'vendor_comm'=> $ven_com,
		 );
		 
		 
		$this->general_model->insertRecord($data,'tbl_transfers');
		
		//vendor COde
		
		$vendor_code = $this->general_model->getSingleRecord($this->input->post('assign_to'),'userId','tbl_users');
		$ordInfo = array(
			
			'is_transfered' => 1,
			'transfer_to' => $this->input->post('assign_to'),
			'transfer_by' => 1,
			'transfer_date' => date('Y-m-d'),
			'vendor_code' => $vendor_code['code'],
			
			);
			
			
			
			
				$result = $this->general_model->updateRecord($id,'order_id','tbl_order',$ordInfo);
				$this->session->set_flashdata('success','Order Assigned Updated');
				redirect('admin/orders/','refresh');
	      }else{
			  
			  $this->session->set_flashdata('error','Order Already Assigned');
			  redirect('admin/orders/assign/'.$rid,'refresh');
			  
		  }
	}
	
	
   
    public function addOrder()
    {
		
		
		
            if($this->input->post('pay') != NULL)
			{
            $order_type = filter_value('ord_type','');
            $pick_add = filter_value('pick_add','');
            $pick_pin = filter_value('pickup_pincode','');
			$drop_add = filter_value('drop_address','');
			$from_add = filter_value('from_add','');
			$drop_pin = filter_value('drop_pincode','');
			$cour_ser = filter_value('courior_service','');
			
			$t_qty = (filter_value('t_qty','') != NULL ) ? filter_value('t_qty','') : 1 ;
			$t_vweight = filter_value('t_vweight','');
			$t_pweight = filter_value('t_pweight','');
			$awb = filter_value('awb','');
			$amt = filter_value('amount','');
			$trans_mode = ($this->input->post('c_mode_trans') == NULL  ?  filter_value('d_mode_trans','') : filter_value('c_mode_trans','') );
			$pro_type = filter_value('pro_type','');
			
			$weight = ($this->input->post('weight') != NULL ? filter_value('weight','').' '.filter_value('unit','') : filter_value('t_pweight',''));
			
			

            $orderInfo = array(
			
			'order_type' => $order_type,
			'pickup_address'=> $pick_add,
			'pickup_pincode' => $pick_pin,
			'drop_address'=>$drop_add,
			'from_address' =>$from_add,
			'drop_pincode' => $drop_pin, 
			'courior_service' => $cour_ser, 
			'mode_of_transfer' => $trans_mode, 
			'pro_type' => $pro_type, 
			'weight' => $weight,		
			'volume_weight' => $t_vweight,		
			'qty' => $t_qty,
            'awb' => $awb,		
            'amount' => $amt,		
			'user_id' => $this->session->userdata('userId'), 
			'order_id' => 'VU'.date('Ymd').'00'.(lastId()+1), 
			'pay_status' => 'Unpaid', 
			'date' => date('Y-m-d'));

            $result = $this->general_model->addOrder($orderInfo);
			//Update
				$parcel_data = array( 'order_id'=> 'VU'.date('Ymd').'00'.(lastId()+1),'status'=>'Active' ); 
				$this->general_model->updateParcel($parcel_data, $this->session->userdata('userId'));

            if ($result == true) {
				
				
               
                $this->session->set_flashdata('success', 'Order added successfully');
            } else {
                $this->session->set_flashdata('error', 'Order add failed');
            }

            redirect('admin/orders/','refresh');
			}
			else
			{
				
				 $this->global['pageTitle'] = 'New Order | Vn24';
            $data['reportRecords'] = $this->reports_model->getReports();
            $data['couriers'] =  $this->general_model->couriers();
		    $data['Allstate'] = $this->general_model->getAllState();
		    $data['Allcity'] = $this->general_model->getAllCity();
            $this->loadViews("admin/reports/newOrder", $this->global, $data, NULL);
				
				
				
			}
		
		
		
		
    }
	
	public function viewCourier()
    {
		     $this->global['pageTitle'] = 'View Courier | Vn24 ';
            
            $this->loadViews("admin/reports/listCourier", $this->global, NULL, NULL);
		
		
	}
	
	public function viewOrdType()
    {
		     $this->global['pageTitle'] = 'View OrderType | Vn24 ';
            
            $this->loadViews("admin/reports/listOtype", $this->global, NULL, NULL);
		
		
	}
	
	public function viewCargo()
    {
		     $this->global['pageTitle'] = 'View Cargo | Vn24 ';
            
            $this->loadViews("admin/reports/listCargo", $this->global, NULL, NULL);
		
		
	}
	
	public function viewApi()
    {
		     $this->global['pageTitle'] = 'View API | Vn24 ';
			 $data['api'] = $this->general_model->getAllRecord(1,'id','tbl_api');
            
            $this->loadViews("admin/reports/editApi", $this->global, $data, NULL);
		
		
	}
	public function viewQuote()
    {
		     $this->global['pageTitle'] = 'View Quote | Vn24 ';
			 
            
            $this->loadViews("admin/reports/listQuotes", $this->global, NULL, NULL);
		
		
	}
	
	public function editApi()
    {
		    
           $data= array(
		   
		             'api_key' =>  filter_value('api_key',''),
		             'api_secret' => filter_value('api_secret',''),
		             'url' => filter_value('api_url','')
		                ); 

			
			 $data['api'] = $this->general_model->updateRecord(1,'id','tbl_api',$data);
            
               redirect(base_url('admin/api/view'),'refresh');
		
		
	}
	
	public function editCourierinfo()
    {
		   $id =  $this->input->post('id');
           $data= array(
		   
		             'name' =>  filter_value('cname',''),
		             'surface' => filter_value('surface',''),
		             'cargo' => filter_value('cargo',''),
		             'air' => filter_value('air',''),
		             'formula' => filter_value('formula',''),
		             'service_pincodes' => @implode(',',filter_value('pin_service','')),
					 
					 
		                ); 

			
			  $this->general_model->updateRecord($id,'id','tbl_couriers',$data);
            
               redirect(base_url('admin/courier/view'),'refresh');
		
		
	}
	
	
	
	public function editOtype($id)
    {
		    
               $this->global['pageTitle'] = 'Edit Otype | Vn24';
               $data['dataotype'] = $this->general_model->getAllRecord($id,'id','tbl_otype');
               $this->loadViews("admin/reports/editOtype", $this->global, $data, NULL);
		
		
	}
	
	
	public function editOtypeData()
	{
		
		$couInfo = array(
			
			'name' => $this->input->post('otype'),
			'status' => $this->input->post('status'),
			);
			
			$id = $this->input->post('id');
			
			
				$result = $this->general_model->updateRecord($id,'id','tbl_otype',$couInfo);
				$this->session->set_flashdata('success','Order type Updated');
				redirect('admin/otype/view','refresh');
			
		
	}
	
	
	public function addCourier()
    {
		
		
		if(isset($_POST['submit']) )
			{
		     $couInfo = array(
			
			'name' => $this->input->post('cname'),
			'service_pincodes' => @implode(',',$this->input->post('pin_service')),
			'status' =>'Active',
			'surface' =>$this->input->post('surface'),
			'cargo' =>$this->input->post('cargo'),
			'air' =>$this->input->post('air'),
			'formula' =>$this->input->post('formula'),
			'date' => date('Y-m-d'));
			
			$check_cou = $this->general_model->checkCourier($this->input->post('cname'));
			if($check_cou)
			{
			$this->session->set_flashdata('error', 'Courier Already exists');	
			redirect('admin/courier/add','refresh');
			}else
			{
				$result = $this->general_model->insertRecord($couInfo,'tbl_couriers');
				$this->session->set_flashdata('success','Courier Inserted');
				redirect('admin/courier/view','refresh');
			}

            
			
			
			
			}else{
				
			   $this->global['pageTitle'] = 'Add Couriers | Vn24';
               $data['pincodes'] = $this->general_model->getAllRecord(1,'user_id','tbl_pincode_serviceable');
               $this->loadViews("admin/reports/addCourier", $this->global, $data, NULL);
				
			}
		
	}
	
	
	
	
	
	
	
	
	public function addQuote()
    {
	   $id=  $this->uri->segment(4);	
		if(isset($_POST['submit']) )
			{
		     $quoteInfo = array(
			
			'250g' => $this->input->post('250g'),
			'500g' => $this->input->post('500g'),
			'20000g' => $this->input->post('20000g'),
			'2150g' => $this->input->post('2150g'),
			'100000more' => $this->input->post('100000more'),
			'5000g' => $this->input->post('5000g'),
			'50000g' => $this->input->post('50000g'),
			'100000g' => $this->input->post('100000g'),
			'courier_id' => $this->input->post('courier_id'),
			'zone_name' => $this->input->post('zone_name'),
			'pro_type' => $this->input->post('pro_type'),
			'trans_mode' => $this->input->post('trans_mode'),
			
			'status' =>'Active',
			'date' => date('Y-m-d'));
			
			//$check_cou = $this->general_model->checkQuote($this->input->post('courier_id'),$this->input->post('zone_name'));
			
			$result = $this->general_model->insertRecord($quoteInfo,'tbl_admin_quote');
				$this->session->set_flashdata('success','Quote Inserted');
				redirect('admin/courier/view','refresh');
			/*if($check_cou)
			{
			$this->session->set_flashdata('error', 'Quote Already exists');	
			redirect('admin/courier/view','refresh');
			}else
			{
				$result = $this->general_model->insertRecord($quoteInfo,'tbl_admin_quote');
				$this->session->set_flashdata('success','Quote Inserted');
				redirect('admin/courier/view','refresh');
			}*/
              
            
			
			
			
			}else{
				
			   $data['courier'] = $this->general_model->getSingleRecord($id,'id','tbl_couriers');
			   $this->global['pageTitle'] = 'Add '.$data['courier']['name'].' Quote | Vn24';
               
               $this->loadViews("admin/reports/addQuote", $this->global, $data, NULL);
				
			}
		
	}
	
	
	//Add Cargo
	
	public function addCargo()
    {
		
		
		if(isset($_POST['submit']) )
			{
		     $couInfo = array(
			
			'name' => $this->input->post('cname'),
			'service_pincodes' => @implode(',',$this->input->post('pin_service')),
			'status' =>'Active',
			'date' => date('Y-m-d'));
			
			$check_cou = $this->general_model->checkCargo($this->input->post('cname'));
			if($check_cou)
			{
			$this->session->set_flashdata('error', 'Cargo Already exists');	
			redirect('admin/cargo/add','refresh');
			}else
			{
				$result = $this->general_model->insertRecord($couInfo,'tbl_cargo');
				$this->session->set_flashdata('success','Cargo Inserted');
				redirect('admin/cargo/view','refresh');
			}

            
			
			
			
			}else{
				
			   $this->global['pageTitle'] = 'Add Cargo | Vn24';
               $data['pincodes'] = $this->general_model->getAllRecord(1,'user_id','tbl_pincode_serviceable');
               $this->loadViews("admin/reports/addCargo", $this->global, $data, NULL);
				
			}
		
	}
	
	
	public function viewPincode()
    {
		     $this->global['pageTitle'] = 'View Pincodes | Vn24 ';
            
            $this->loadViews("admin/reports/listPincode", $this->global, NULL, NULL);
		
		
	}
	public function courierEdit($id)
    {
		    $this->global['pageTitle'] = 'Courier Edit | Vn24 ';
			$data['pincodes'] = $this->general_model->getAllRecord(1,'user_id','tbl_pincode_serviceable');
            $data['AllData'] = $this->general_model->getSingleRecord($id,'id','tbl_couriers');
            $this->loadViews("admin/reports/courierEdit", $this->global, $data, NULL);
		
		
	}
	
	public function pincodeEdit($id)
    {
		   
			   
			 $this->global['pageTitle'] = 'Pincode Edit | Vn24 ';
			
            $data['AllData'] = $this->general_model->getSingleRecord($id,'id','tbl_pincode_serviceable');
            $this->loadViews("admin/reports/pincodeEdit", $this->global, $data, NULL);
			   
		
		
	}
	
	
	public function pincodeEditData()
    {
		   $id = $this->input->post('id');
		   if($this->input->post('submit')){
			   
			   $pinInfo = array(
			
				'pincode' => $this->input->post('pincode'),
				'zone_name' => $this->input->post('zone_name'),
				'date' => date('Y-m-d')
				
				);
			
			 $this->general_model->updateRecord($id, 'id', 'tbl_pincode_serviceable' ,$pinInfo);
		
		    redirect(base_url('admin/pincode/view'),'refresh');
	
	        }
	}
	
	
	public function addPincode()
    {
		
		
		if(isset($_POST['submit']) )
			{
		     $pinInfo = array(
			
			'pincode' => $this->input->post('pincode'),
			
			'user_id' =>1,
			'zone_name' =>$this->input->post('zone_name'),
			'date' => date('Y-m-d'));
			
			$check_pin = $this->general_model->matchRecord(1,$this->input->post('pincode'));
			if($check_pin)
			{
			$this->session->set_flashdata('error', 'Pincode Already exists');	
			redirect('admin/pincode/add','refresh');
			}else
			{
				$result = $this->general_model->insertRecord($pinInfo,'tbl_pincode_serviceable');
				$this->session->set_flashdata('success','pincode Inserted');
				redirect('admin/pincode/view','refresh');
			}

            
			
			
			
			}else{
				
				$this->global['pageTitle'] = 'Add Pincode | Vn24';
           
               $this->loadViews("admin/reports/addPincode", $this->global, NULL, NULL);
				
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
    function deleteorder()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delmyOrder($sId,'tbl_order');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	
	function deletequote()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delmyOrder($sId,'tbl_admin_quote');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	 function deleteotype()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delOrder($sId,'tbl_otype');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	function deletepin()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delOrder($sId,'tbl_pincode_serviceable');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	function deletecourier()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delOrder($sId,'tbl_couriers');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	function deleteuser()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delUser($sId,'tbl_users');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	function deletecargo()
    {

        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $sId = $this->input->post('oid');

            $result = $this->reports_model->delOrder($sId,'tbl_cargo');

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }
	
	
	
	
	
	
	 public function courier_json()
    {
        $records = $this->reports_model->courier_data();
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                
                $username = $row['name'],
                
                $row['date'],

'<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/courier/courierEdit/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger deleteorder" href="#" data-oid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a> | <a title="Add Quote" class="update btn btn-primary" href="' . base_url() . 'admin/courier/addQuote/' . $row['id'] . '"> <i class="fa fa-plus"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	public function cargo_json()
    {
        $records = $this->reports_model->cargo_data();
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                
                $username = $row['name'],
                
                $row['date'],

'<a class="btn btn-sm btn-danger deletecargo" href="#" data-oid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	
	
	public function otype_json()
    {
        $records = $this->reports_model->otype_data();
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                
                $username = $row['name'],
                
                $row['date'],
                $row['status'],

'<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/otype/edit/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletecargo" href="#" data-oid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	
	 public function pin_json()
    {
        $records = $this->reports_model->pin_data();
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                
                $username = $row['pincode'],
                
                $row['date'],

' <a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/pincode/edit/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger deleteorder" href="#" data-oid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	public function quote_json($id)
    {
        $records = $this->reports_model->quote_data($id);
        $data = array();
        foreach ($records['data']  as $row) {
			
			

            $data[] = array(
                
				
				get_curier($row['courier_id']),
                $row['zone_name'],
                $row['pro_type'],
                $row['trans_mode'],
                

                
                $row['date'],

' <a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/courier/editQuote/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger deleteorder" href="#" data-oid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	public function user_json()
    {
        $records = $this->reports_model->user_data();
        $data = array();
        foreach ($records['data']  as $row) {
			
			

            $data[] = array(
                
				
				
                $row['name'],
                $row['email'],
                $row['mobile'],
                $row['createdDtm'],
                

                
                

' <a class="btn btn-sm btn-danger deleteorder" href="#" data-oid="' . $row['userId'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	


    public function datatable_json()
    {
        $records = $this->reports_model->reports_data();
        $data = array();
        foreach ($records['data']  as $row) {
			
			$transer_to  = @$this->general_model->getSingleRecord($row['transfer_to'],'userId','tbl_users');

            $data[] = array(
                
                $username = $row['order_id'],
                $row['amount'],
                $row['awb'],
                $row['qty'],
                $row['courior_service'],
                $row['pro_type'],
				
				($row['is_transfered'] == 1 ? $status= 'Assigned to '.$transer_to['code'] : $status = 'N/A' ),
                
                $row['date'],

'<a title="Assign/View" class="update btn btn-primary" href="' . base_url() . 'admin/orders/assign/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>',


            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
}
