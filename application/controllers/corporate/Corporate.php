<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : Home (HomeController)
 * Home Class to control Home Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Corporate extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/home_model');
		 $this->load->model('general_model');
        $this->load->helper('form');
        
		
		if(!isCorLogin()){
			redirect(base_url().'corporate/login', 'refersh');	
		}
    }

    /**
     * This function used to load the first screen
     */
    public function index()
    {


        //  $data['test'] =  $this->home_model->getTestimonial();
        $data['alltest'] =  $this->home_model->getAlltest();
        $data['allblog'] =  $this->home_model->getAllblog();
                $data['allblogs'] =  $this->home_model->getAllblogs();
        $data['allData'] = $this->home_model->getAllContact();
        $data['contact'] =  $this->home_model->getContact();
        $data['product'] =  $this->home_model->getproduct();
        $data['title'] = 'Vn24';
        $data['layout'] = 'corporate/dashboard';
        $this->load->view('corporate/layout', $data);
    }
	 public function profile()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['user'] =  $this->general_model->getUser($this->session->userdata('userId'));
        $data['title'] = 'Profile | Vn24';
        $data['layout'] = 'corporate/userProfile';
        $this->load->view('corporate/layout', $data);
    }
	
	public function updateProfile()
    {
  
         $this->load->library('form_validation');
           
        $this->form_validation->set_rules('uname', 'Full Name', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|max_length[10]|matches[password]');
        

        if ($this->form_validation->run() == FALSE) {
            $this->profile();
        } else {
			
			
			 if (!empty($_FILES["pic"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/corp/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["pic"]['name'];                  
                    $this->load->library('upload', $config);                    
                                    
                    if ( !$this->upload->do_upload('pic'))
                    {
                        $this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('corporate/profile');
                        
                    }
                    else
                    {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["pic"]['name'];
                        
                    }
                }else
				{
					$image = $this->db->get_where('tbl_users', array('userId'=>$this->session->userdata('userId')))->row_array()['pic'];
					
				}
        
			
			
			
            $name = $this->security->xss_clean($this->input->post('uname'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
			$pass = password_hash($this->security->xss_clean($this->input->post('password')),PASSWORD_BCRYPT);
			
			

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile,'pic'=>$image, 'password' =>$pass, 'updatedBy' => 2, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->general_model->updateUser($userInfo, $this->session->userdata('userId'));

            if ($result == true) {
               
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('corporate/dashboard/','refresh');
        }
    }
	
	
	 public function track()
    {

        $data['contact'] =  $this->home_model->getContact();
       
        $data['title'] = 'Track Consignment | Vn24';
        $data['layout'] = 'corporate/userTrack';
        $this->load->view('corporate/layout', $data);
    }
	
	 public function orders()
    {


       
        $data['contact'] =  $this->home_model->getContact();
        $data['title'] = 'Orders | Vn24';
        $data['layout'] = 'corporate/userOrders';
        $this->load->view('corporate/layout', $data);
    }
	
	 public function newOrder()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['couriers'] =  $this->general_model->couriers();
		$data['AllCountry'] = $this->general_model->getAllCountry();
		$data['Allstate'] = $this->general_model->getAllState();
		$data['Allcity'] = $this->general_model->getAllCity();
		$data['AllOtype'] = $this->general_model->getAllOtype();
		$data['picadd'] = $this->general_model->getAllPickAdd($this->session->userdata('userId'));
		$data['fromadd'] = $this->general_model->getAllFromAdd($this->session->userdata('userId'));
		$data['dropadd'] = $this->general_model->getAllDropAdd($this->session->userdata('userId'));
        $data['title'] = 'Place Order | Vn24';
        $data['layout'] = 'corporate/newOrder';
        $this->load->view('corporate/layout', $data);
    }
	
	
	
	 public function pin_search()
    {
          if($_POST['pin'] && $_POST['otype'] == 'Courier')
		  {
			  
			$res = $this->general_model->search_pincorp('tbl_pincode_serviceable',$_POST['pin']);
			if($res)
			{
			   
			   
			 if($res)
			{
			   
			   echo "Pincode Serviceable";
			  
			}else
			{
				echo "Pincode Not Serviceable";
			}
			
			  
		  }elseif($_POST['pin'] && $_POST['otype'] == 'Cargo')
		  {
			  
			$res =  $this->general_model->search_pincorp('tbl_pincode_serviceable',$_POST['pin']);
			if($res)
			{
			 
               echo "Pincode Serviceable";
			   
			}else
			{
				echo "Pincode Not Serviceable";
			}
		  }else{
			  
			  echo "Pincode Not Serviceable";
		  }
          
		  } 
    }
	
	public function pin_search2()
    {
          if($_POST['pin'] && $_POST['otype'] == 'Courier')
		  {
			  
			$res = $this->general_model->search_pincorp2('tbl_couriers',$_POST['pin']);
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
			  
			$res =  $this->general_model->search_pincorp2('tbl_cargo',$_POST['pin']);
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
	
	 public function addParcel()
    {
		
		
		
            if($_POST['width'] && $_POST['height'] && $_POST['lengths'] && $_POST['qty'])
			{
            
                     if($_POST['courier']){
					
					$mot = $this->input->post('mot');
					//$otype = $this->input->post('otype');
					
					$cour_cal = $this->general_model->getSingleRecord($_POST['courier'],'name','tbl_couriers');
					 /*  As per Rajat Sir and client comm 6-06-2020 16:18 */
					if($mot == 'Surface'){
						
						$cval = $cour_cal['surface'];
						
					}elseif($mot == 'Normal'){
						
						$cval = $cour_cal['air'];
						
					}elseif($mot == 'Priority'){
						
						$cval = $cour_cal['air'];
						
						
					}
						
										
					$vol_w = calcVolw($_POST['lengths'],$_POST['height'],$_POST['width'],$cval,$_POST['qty']);
					
				}
			

            $parcelInfo = array(
			
			'length' => $_POST['lengths'],
			'width'=> $_POST['width'],
			'height' => $_POST['height'],
			'qty'=>$_POST['qty'],
			'volumetric_w' => $vol_w,
			'user_id' =>$this->session->userdata('userId'),
			'status' => 'Inactive', 
			'date' => date('Y-m-d'));

            $result = $this->general_model->insertRecord($parcelInfo,'tbl_parcel_dimension');
			
			
			
			  // Calc vol weight
			 $this->db->select('*');
			 $this->db->where('user_id',$this->session->userdata('userId'));
			 $this->db->where('status','Inactive');
			 $this->db->where('order_id=','');
			 $this->db->where('date',date('Y-m-d'));
			 $res =  $this->db->get('tbl_parcel_dimension')->result();
			
			 
			 $q= 0;
			 $vw = 0.0;
			 
			 
			 foreach($res as $r){ 
			 
			 $q = $q + $r->qty;
			 $vw = $vw + $r->volumetric_w;
			 }


            if ($result == true) {
               
               // echo"Success";
			   
			   echo $q.'|'.$vw;
			   
            } else {
                echo"Failed";
            }


			}
		
    }
	
	
		public function fetch_cities() {
        if ($this->input->post('id')) {
            echo $this->general_model->cities_list($this->input->post('id'));
        }
    }
	public function fetch_states() {

        if ($this->input->post('id')) {
            
            echo $this->general_model->states_list($this->input->post('id'));
        }
    }
	
	
	 public function addOrder()
    {
		
		
		
            if($this->input->post('pay') != NULL)
			{
            $order_type = filter_value('ord_type','');
            if($this->input->post('pick_radd'))
			{
				$newadd = $this->db->get_where('tbl_order',array('id'=>$_POST['pick_radd']))->row_array()['pickup_address'];
			$pick_add = $newadd;
			
			}elseif($this->input->post('special_req02')){
				if($this->input->post('from_radd')!=''){
				$newpick = $this->db->get_where('tbl_order',array('id'=>$_POST['from_radd']))->row_array()['from_address'];
				$pick_add = $newpick;
				}else{
					
					$pick_add = $_POST['from_add'];
				}
			
			}else{
				$pick_add = filter_value('pick_add','');
				
			}
			
			
			
            $pick_pin = filter_value('pickup_pincode','');
			if($this->input->post('drop_radd'))
			{
				$newadd = $this->db->get_where('tbl_order',array('id'=>$_POST['drop_radd']))->row_array()['drop_address'];
			$drop_add = $newadd;
			
			}else{
				$drop_add = filter_value('drop_address','');
				
			}
			
			if($this->input->post('from_radd'))
			{
				$newadd = $this->db->get_where('tbl_order',array('id'=>$_POST['from_radd']))->row_array()['from_address'];
			$from_add = $newadd;
			
			}else{
				$from_add = filter_value('from_add','');
				
			}
			$drop_pin = filter_value('drop_pincode','');
			$cour_ser = filter_value('courior_service','');
			
			
			$t_qty = filter_value('t_qty',1);
			$t_vweight = filter_value('t_vweight','');
			$t_pweight = filter_value('t_pweight','');
			$awb = filter_value('awb','');
			$amt = filter_value('amount','');
			
			
			$trans_mode = ($this->input->post('c_mode_trans') == NULL  ?  filter_value('d_mode_trans','') : filter_value('c_mode_trans','') );
			$pro_type = filter_value('pro_type','');
			$weight = ($this->input->post('weight') != NULL ? filter_value('weight','').' '.filter_value('unit','') : filter_value('t_pweight',''));
			
			
			//If weight is set
			if($this->input->post('weight')!= NULL)
			{   
		        $f_wt= 0.0;
			
       			$unit = $this->input->post('unit');
				if($unit == 'gm')
				{
				$weight = $this->input->post('weight');
				$f_wt = $weight;
				}else{
				
				$weight = $this->input->post('weight');
				$f_wt = $weight*1000;
					
					
				}
				
                $vn_code = vendor_code();
				
				//Get Zone 
				$zone = $this->general_model->getSingleRecord($drop_pin,'pincode','tbl_pincode_serviceable');
				$courier = $this->general_model->getSingleRecord($cour_ser,'name','tbl_couriers');
				//User Id
				$user_id = $this->session->userdata('userId');
				
				
				
				 
				if($trans_mode == 'Surface'){
				 
				     if($f_wt < 5000)
					{

					$amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['sur_5kg'];

					}
				
				
			}elseif($trans_mode == 'Normal'){
			
                  if($f_wt <= 500)
				{

				$amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto500'];

				}elseif($f_wt < 2800){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_abv500'];

				}elseif($f_wt <= 3000){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto3'];

				}elseif($f_wt <= 10000){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto10'];


				}elseif($f_wt < 30000){

                   $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_abv10'];


				}



			}elseif($trans_mode == 'Priority'){	

                     if($f_wt < 500)
				{

				$amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto500'];

				}elseif($f_wt < 2800){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_abv500'];

				}elseif($f_wt <= 3000){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto3'];

				}elseif($f_wt <= 10000){
                 
				 $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_upto10'];


				}elseif($f_wt < 30000){

                   $amt = $this->db->get_where('tbl_dom_quotation',array('zone_id'=>$zone['zone_name'],'ven_code'=>$vn_code,'courier_id'=>$courier['id'],'user_id'=>$user_id))->row_array()['air_abv10'];


				}

			}			
				
		}
			
			
			

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
            'vendor_code' => vendor_code(),		
            'amount' => $amt,		
			'user_id' => $this->session->userdata('userId'), 
			'order_id' => 'VC'.date('Ymd').'00'.(lastId()+1), 
			'pay_status' => 'Unpaid', 
			'date' => date('Y-m-d'));

            $result = $this->general_model->addOrder($orderInfo);
			$oid = $this->general_model->getSingleRecord($result,'id','tbl_order');
			
			//Creating Order Session 
			$this->session->set_userdata('oid',$oid['order_id']);
			
			//Update
				$parcel_data = array( 'order_id'=> $oid['order_id'],'status'=>'Active' ); 
				$this->general_model->updateParcel($parcel_data, $this->session->userdata('userId'));

            if ($result == true) {
				
				//redirect('corporate/Payment');
				redirect('corporate/orders/','refresh');
               
                $this->session->set_flashdata('success', 'Order added successfully');
            } else {
                $this->session->set_flashdata('error', 'Order add failed');
            }

            redirect('corporate/orders/','refresh');
			}
			else
			{
				
				$this->newOrder();
				
				
				
			}
		
		
		
		
    }
	
	
	public function getOid($id){
    	    
    	   
    	 
            $res=  $this->general_model->getSingleRecord($id,'id','tbl_order');
            echo'<!DOCTYPE html>
                    <html>
                    <head>
                    <title>Order Detils | Vn24.in </title>
                    </head>
                    <body>
            <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">OrderId</th>
                      <th scope="col">AWB</th>
                      <th scope="col">Amount</th>
                      <th scope="col">OrderType</th>
                      <th scope="col">Pickup Address</th>
                      <th scope="col">Pickup Pin</th>
                      <th scope="col">Drop Add.</th>
                      <th scope="col">Drop Pin</th>
                      <th scope="col">From Add.</th>
                      <th scope="col">Courier Service</th>
                      <th scope="col">Mode of Tarnsport</th>
                      <th scope="col">Product Type.</th>
                      <th scope="col">Weight</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>'.$res['order_id'].'</td>
                      <td>'.$res['awb'].'</td>
                        <td>'.$res['amount'].'</td>
                        <td>'.$res['order_type'].'</td>
                        <td>'.$res['pickup_address'].'</td>
                        <td>'.$res['pickup_pincode'].'</td>
                         <td>'.$res['drop_address'].'</td>
                        <td>'.$res['drop_pincode'].'</td>
                        <td>'.$res['from_address'].'</td>
                        <td>'.$res['courior_service'].'</td>
                        
                         <td>'.$res['mode_of_transfer'].'</td>
                        <td>'.$res['pro_type'].'</td>
                         <td>'.$res['weight'].'</td>
                        <td>'.$res['qty'].'</td>
                        <td>'.$res['pay_status'].'</td>
                        <td>'.$res['date'].'</td>
                    </tr>
                   
                  </tbody>
                </table>
                
                </body>
                </html>';
           
          
    	    
    	    
    	}
	
	
	
	   /****IMPORT CSV   ***/
    
    
    public function import_corpbulk()
    {
         

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = "./uploads/corporder/";
                $config['allowed_types'] = "csv";
                $config['max_size'] = "900000000";
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 100;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url("corporate/orders"));
                }
                
                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen('./uploads/corporder/' . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 5000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);
                $updated = 0;
                $items = array();
                $dimen = array();
                foreach ($arrResult as $key => $value) {
                    $item = [
                        'order_type' => isset($value[0]) ? trim($value[0]) : '',
                        'from_address' => isset($value[1]) ? trim($value[1]) : '',
                        'pickup_address' => isset($value[2]) ? trim($value[2]) : '',
                        'pickup_pincode' => isset($value[3]) ? trim($value[3]) : '',
                        'drop_address' => isset($value[4]) ? trim($value[4]) : '',
                        'drop_pincode' => isset($value[5]) ? trim($value[5]) : '',
                        'courior_service' => isset($value[6]) ? trim($value[6]) : '',
                        'mode_of_transfer' => isset($value[7]) ? trim($value[7]) : '',
                        'pro_type' => isset($value[8]) ? trim($value[8]) : '',
                        'weight' => isset($value[9]) ? trim($value[9]) : '',
                        'qty' => isset($value[14]) ? trim($value[14]): '',
                        'volume_weight' => isset($value[15]) ? trim($value[15]) : '',
                        'pro_weight' => isset($value[16]) ? trim($value[16]) : '',
                        'awb' => isset($value[17]) ? trim($value[17]) : '',
                        'amount' => isset($value[18]) ? trim($value[18]) : '',
                        
                        
                    ];
                    
                     $item['order_id'] = 'VC'.date('Ymd').'00'.(lastId()+1);
                     $item['user_id'] = $this->input->post('user_id');
                    
                     $item['date'] = date('Y-m-d');
					 unset($item['pro_weight']);
					 
					 
					 $dimen = [
					 
					 'length' => isset($value[10]) ? trim($value[10]): '',
                     'width' => isset($value[11]) ? trim($value[11]) : '',
                     'height' => isset($value[12]) ? trim($value[12]) : '',
					 'qty' => isset($value[13]) ? trim($value[13]) : '',
					 
					 
					 ];
					 
					 $dimen['order_id'] = 'VC'.date('Ymd').'00'.(lastId()+1);
                     $dimen['user_id'] = $this->input->post('user_id');
					 $dimen['date'] = date('Y-m-d');
					 $dimen['status'] = 'Active';
					
                     
                   if ($item) {
                        $items[] = $item;
                   }
				   
				      
                   if ($dimen) {
                        $dimens[] = $dimen;
                   }
				   
                }
                
            
            
           }else{
             
             redirect(base_url('corporate/orders'));
               
               
           }
           
            if (!empty($items) && !empty($dimens))
            {
                 $this->general_model->corpUploadCsv($items,$dimens) ;
                 
                 redirect(base_url('corporate/orders'));
                 
            }else
            {
                
                redirect(base_url('corporate/orders'));
            }

    }
	
	
	 public function invoices()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['title'] = 'Invoices | Vn24';
        $data['layout'] = 'corporate/userInvoice';
        $this->load->view('corporate/layout', $data);
    }
	
	
	
	public function search_awb() {
      
      
      $awb_data =   $this->general_model->get_awb($_POST['awb']);
      
      if(!empty($awb_data))
      {
          echo '<table>
			<tbody><tr>
			 <th style="width:100px; ">AWB</th>
			 <th style="width:10px;">OrderId</th>
			 <th style="width:10px;">Amount</th>
			 <th style="width:100px;padding-left:80px;">Date</th>
			 
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
    
	
	public function datatable_json()
    {
        $records = $this->general_model->corp_ord_data($this->session->userdata('userId'));
		
        $data = array();
        foreach ($records['data']  as $row) {
           $awb =  '<a title="Edit/View" class="update btn btn-primary getoid" href="#" data-sid="'.$row['id'].'">'.$row['awb'].'</a>';
            $data[] = array(
                $row['date'],
                $row['order_id'],
                $awb,
                $row['pickup_address'],
                $row['drop_address'],
                $row['amount']
                
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
	
	
	public function invoice_json()
    {
        $records = $this->general_model->corp_invoice_data($this->session->userdata('userId'));
		
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                $row['invoice_id'],
                $row['ven_code'],
                $row['client_name'],
				$row['email'],
                'Rs. '.$row['bill_amt'],
                $row['bill_ten_from'],
                $row['bill_ten_to'],
                $row['date'],
                
                
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }

    
}
