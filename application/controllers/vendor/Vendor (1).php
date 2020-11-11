<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : Home (HomeController)
 * Home Class to control Home Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Vendor extends CI_Controller
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
        
		
		if(!isVenLogin()){
			redirect(base_url().'vendor/login', 'refersh');	
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
        $data['title'] = 'Vendor Dashboard | Vn24';
        $data['layout'] = 'vendor/dashboard';
        $this->load->view('vendor/layout', $data);
    }
	
	 public function terms()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['user'] =  $this->general_model->getUser($this->session->userdata('userId'));
        $data['title'] = 'Terms & Conditions | Vn24';
        $data['layout'] = 'vendor/venTerm';
        $this->load->view('vendor/layout', $data);
    }
	 public function about()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['user'] =  $this->general_model->getUser($this->session->userdata('userId'));
        $data['title'] = 'About Us | Vn24';
        $data['layout'] = 'vendor/venAbt';
        $this->load->view('vendor/layout', $data);
    }
	
	public function inter()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['user'] =  $this->general_model->getUser($this->session->userdata('userId'));
        $data['title'] = 'About Us | Vn24';
        $data['layout'] = 'vendor/venInt';
        $this->load->view('vendor/layout', $data);
    }
	 public function profile()
    {
        $data['couriers'] =  $this->general_model->couriers();  
        $data['serPin'] =  $this->general_model->servicePincode('tbl_pincode_serviceable',$this->session->userdata('userId'));  
		$data['Allcargo'] =  $this->general_model->cargo(); 
        $data['contact'] =  $this->home_model->getContact();
        $data['ven'] =  $this->general_model->getUser($this->session->userdata('userId'));
        $data['title'] = 'Profile | Vn24';
        $data['layout'] = 'vendor/userProfile';
        $this->load->view('vendor/layout', $data);
    }
	
	public function updatePass()
    {
       
   
            $mydata = array('password'=>$_POST['cupass']);
			
		    $check_password = $this->general_model->verify_pass($mydata,$this->session->userdata('userId'));
			
			if($check_password)
			{
		   	
			$pass = password_hash($this->security->xss_clean($_POST['password']),PASSWORD_BCRYPT);
			
			 if($_POST['password'] == '')
			 {
				 echo "Enter Password";
				 
			 }elseif($_POST['password']!= $_POST['cpassword'])
			 {
				 echo "Confirm Password should match the password";
				 
			 }else
			 {
			     $userInfo = array('password' =>$pass, 'updatedBy' => 4, 'updatedDtm' => date('Y-m-d H:i:s'));

                 $result = $this->general_model->updateUser($userInfo, $this->session->userdata('userId'));
			
			     echo "Password changed successfully";

			 }

            
				
			}else{
				
				echo "Old Password do not match.";
			}
           

           

           
        
    }
	
	
	public function updateProfile()
    {
       
                 $courier = @implode(',',$_POST['courier']); 
                 $cargo = @implode(',',$_POST['cargo']); 
           
			     $userInfo = array( 'package'=>$_POST['package'], 'couriers' => $courier, 'cargo' => $cargo, 'updatedBy' => 4, 'updatedDtm' => date('Y-m-d H:i:s'));
				 
				 if(isset($_POST['pincode']))
				 {
					 $this->general_model->update_batch($_POST['pincode'],$this->session->userdata('userId'));
					 
				 }	 

                 $result = $this->general_model->updateUser($userInfo, $this->session->userdata('userId'));
			if($result)
			{
			     echo "Profile Updated Successfully";

            
				
			}else{
				
				echo "Profile Updation Failed";
			}
           

           

           
        
    }
	
	
	 public function track()
    {

        $data['contact'] =  $this->home_model->getContact();
       
        $data['title'] = 'Track Consignment | Vn24';
        $data['layout'] = 'vendor/userTrack';
        $this->load->view('vendor/layout', $data);
    }
	
	 public function orders()
    {


       
        $data['contact'] =  $this->home_model->getContact();
        $data['title'] = 'Orders | Vn24';
        $data['layout'] = 'vendor/userOrders';
        $this->load->view('vendor/layout', $data);
    }
	
	 public function newOrder()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['couriers'] =  $this->general_model->couriers();
        $data['title'] = 'Place Order | Vn24';
        $data['layout'] = 'vendor/newOrder';
        $this->load->view('vendor/layout', $data);
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
			$trans_mode = ($this->input->post('c_mode_trans') == NULL  ?  filter_value('d_mode_trans','') : filter_value('c_mode_trans','') );
			$pro_type = filter_value('pro_type','');
			$weight = filter_value('weight','').' '.filter_value('unit','');
			
			

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
			'user_id' => $this->session->userdata('userId'), 
			'order_id' => 'VN00'.(lastId()+1), 
			'pay_status' => 'Unpaid', 
			'date' => date('Y-m-d'));

            $result = $this->general_model->addOrder($orderInfo);

            if ($result == true) {
               
                $this->session->set_flashdata('success', 'Order added successfully');
            } else {
                $this->session->set_flashdata('error', 'Order add failed');
            }

            redirect('vendor/orders/','refresh');
			}
			else
			{
				
				$this->newOrder();
				
				
				
			}
		
		
		
		
    }
	
	
	 public function invoices()
    {

        $data['contact'] =  $this->home_model->getContact();
        $data['title'] = 'Invoices | Vn24';
        $data['layout'] = 'vendor/userInvoice';
        $this->load->view('vendor/layout', $data);
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
	
	 public function account( $uri= '' )
    {
         if($uri)
		{
			$acc = $this->uri->segment(3);
			 
			$data['account'] = $this->general_model->getAccount($acc);
		
			$data['contact'] = $this->home_model->getContact();
			$data['title'] = 'Update Account | Vn24';
            $data['layout'] = 'vendor/bankUpdate';
            $this->load->view('vendor/layout', $data);
    			
		}else
		{
        $data['contact'] =  $this->home_model->getContact();
        $data['allAcc'] =  $this->general_model->getRecord('user_id',$this->session->userdata('userId'),'tbl_ven_account');
        $data['title'] = 'Account | Vn24';
        $data['layout'] = 'vendor/vendorAccount';
        $this->load->view('vendor/layout', $data);
		}
    }
	 public function addAcc()
    {
          $data = array(
		  
		  'name'=> $_POST['name'],
		  'b_name'=>$_POST['bank'],
		  'ifsc'=>$_POST['ifsc'],
		  'acc_no'=>$_POST['acc'],
		  'user_id'=>$this->session->userdata('userId'),
		  'date'=>date('Y-m-d'),
		  
		  );
		  
		   $res= $this->general_model->insertRecord($data,'tbl_ven_account');
		  if($res)
		  {
			  echo "Success";
			  
		  }else{
			   echo "False";
		  }
       
    }
	
	public function riders($uri='')
    {
        
         if($uri)
		{
			$rid = $this->uri->segment(3);
			 
			$data['rider'] = $this->general_model->getRider($rid);
		
			$data['contact'] = $this->home_model->getContact();
			$data['title'] = 'Update Rider | Vn24';
            $data['layout'] = 'vendor/riderUpdate';
            $this->load->view('vendor/layout', $data);
    			
		}
		else{
        
        
        $data['contact'] =  $this->home_model->getContact();
        $data['allRider'] =  $this->general_model->getRecord('vendor_id',$this->session->userdata('userId'),'tbl_rider');
        $data['title'] = 'Rider | Vn24';
        $data['layout'] = 'vendor/vendorRider';
        $this->load->view('vendor/layout', $data);
        
		}
    }
	public function uploadfilesamenames($file, $tem)
	{
		$file = $file; 
		$tmp = $tem;    
		$test = strpos($file, '.');
		$ext = substr($file, $test);  
		//$file=substr(self::uuid(), 1, 7);   
		$attach = $file . $ext;    $destN = "./uploads/rider/" . $file; 
		move_uploaded_file($tmp, $destN);
		return $file; 
		}
	 public function addRider()
    {
		  $dl = $this->uploadfilesamenames($_FILES["dl"]['name'], $_FILES["dl"]['tmp_name']);
		  $aadhar = $this->uploadfilesamenames($_FILES["aadhar"]['name'], $_FILES["aadhar"]['tmp_name']);
		  $pan = $this->uploadfilesamenames($_FILES["pan"]['name'], $_FILES["pan"]['tmp_name']);
          $data = array(
		  
		  'fname'=> $_POST['fname'],
		  'email'=>$_POST['ename'],
		  'mobile'=>$_POST['mobile'],
		  'password'=>$_POST['pass'],
		  'dlicense'=>$dl,
		  'aadhar'=>$aadhar,
		  'pan'=>$pan,
		  'vendor_id'=>$this->session->userdata('userId'),
		  'date'=>date('Y-m-d'),
		  
		  );
		  
		   $res= $this->general_model->insertRecord($data,'tbl_rider');
		  if($res)
		  {
			  echo "Success";
			  
		  }else{
			   echo "False";
		  }
		 
       
    }
	
	
	 public function clients($uri='')
    {   
	
	    if($uri)
		{
			$cid = $this->uri->segment(3);
			$data['vendor'] =  $this->general_model->getUser($this->session->userdata('userId'));  
			$data['quotation'] =  $this->general_model->getAllQuote('tbl_dom_quotation',$cid);  
			$data['couriers'] =  $this->general_model->couriers();  
			$data['Allcargo'] =  $this->general_model->cargo();  
			$data['user'] = $this->general_model->getUser($cid);
		//	$data['getUniqCou'] = $this->general_model->getUniqCou($cid);
		    $data['allBills'] = $this->general_model->getRecord('user_id',$cid,'tbl_billing');
			$data['contact'] = $this->home_model->getContact();
			$data['title'] = 'Update Clients | Vn24';
			$data['layout'] = 'vendor/clientUpdate';
			$this->load->view('vendor/layout', $data);
			
		}
        
		else
		{
			$data['couriers'] =  $this->general_model->couriers();  
			$data['Allcargo'] =  $this->general_model->cargo();  
			$data['contact'] = $this->home_model->getContact();
			$data['allClients'] =  $this->general_model->getClients($this->session->userdata('vcode'));
			$data['vendor'] =  $this->general_model->getUser($this->session->userdata('userId')); 
			$data['title'] = 'Clients | Vn24';
			$data['layout'] = 'vendor/vendorClients';
			$this->load->view('vendor/layout', $data);
			
			
		}
		
		
		
    }
    
     public function quote()
    {   
	
	    
			$cuid = $this->uri->segment(3);
			$data['vendor'] =  $this->general_model->getUser($this->session->userdata('userId'));  
			$data['quotation'] =  $this->general_model->getSingleQuote('tbl_dom_quotation',$cuid);  
			$data['couriers'] =  $this->general_model->couriers();  
			$data['Allcargo'] =  $this->general_model->cargo();  
			$data['contact'] = $this->home_model->getContact();
			$data['title'] = 'Update Courier Quotation | Vn24';
			$data['layout'] = 'vendor/quoteUpdate';
			$this->load->view('vendor/layout', $data);
	
    }
    
      public function insertIntQuote()
    {   

	  if($_POST)
	  {
	      

		$data = array(
					  
						 
						  '0p5kg' => $_POST['a_z1w1'],
						  '1kg' =>   $_POST['a_z1w2'],
						  '1p5kg' => $_POST['a_z1w3'],
						  '2kg' =>   $_POST['a_z1w4'],
						  '2p5kg' => $_POST['a_z1w5'],
						  '3kg' =>   $_POST['a_z1w6'],
						  '3p5kg' => $_POST['a_z1w7'],
						  '4kg' =>   $_POST['a_z1w8'],
						  '4p5kg' => $_POST['a_z1w9'],
						  '5kg' =>   $_POST['a_z1w10'],
						  '5p5kg' => $_POST['a_z1w11'],
					  
						  '6kg' =>   $_POST['a_z1w12'],
						  '6p5kg' => $_POST['a_z1w13'],
						  '7kg' =>   $_POST['a_z1w14'],
						  '7p5kg' => $_POST['a_z1w15'],
						  '8kg' =>   $_POST['a_z1w16'],
						  '8p5kg' => $_POST['a_z1w17'],
						  '9kg' =>   $_POST['a_z1w18'],
						  '9p5kg' => $_POST['a_z1w19'],
						  '10kg' =>  $_POST['a_z1w20'],
						  '10p5kg'=> $_POST['a_z1w21'],
						  '11kg' =>  $_POST['a_z1w22'],
					  
						  '11p5kg'=> $_POST['a_z1w23'],
						  '12kg' =>  $_POST['a_z1w24'],
						  '12p5kg'=> $_POST['a_z1w25'],
						  '13kg' =>  $_POST['a_z1w26'],
						  '13p5kg'=> $_POST['a_z1w27'],
						  '14kg' =>  $_POST['a_z1w28'],
						  '14p5kg'=> $_POST['a_z1w29'],
						  '15kg' =>  $_POST['a_z1w30'],
						  '15p5kg'=> $_POST['a_z1w31'],
						  '16kg' =>  $_POST['a_z1w32'],
						  '16p5kg'=> $_POST['a_z1w33'],
					  
						  '17kg' => $_POST['a_z1w34'],
						  '17p5kg' =>   $_POST['a_z1w35'],
						  '18kg' =>   $_POST['a_z1w36'],
						  '18p5kg' =>  $_POST['a_z1w37'],
						  '19kg' => $_POST['a_z1w38'],
						  '19p5kg' =>  $_POST['a_z1w39'],
						  '20kg' => $_POST['a_z1w40'],
						  '21kg' => $_POST['a_z1w41'],
						  '22kg' =>  $_POST['a_z1w42'],
						  '23kg' =>  $_POST['a_z1w43'],
						  '24kg' =>  $_POST['a_z1w44'], 
						  '25kg' => $_POST['a_z1w45'],
						  '26kg' =>  $_POST['a_z1w46'],
						  '27kg' =>  $_POST['a_z1w47'],
						  '28kg' => $_POST['a_z1w48'],
						  '29kg' =>  $_POST['a_z1w49'],
						  '30kg' => $_POST['a_z1w50'],
					     'zone_name' => $_POST['zone_name'],
					     'country_name' => $_POST['country_name'],
					     'user_id' => $_POST['u_id'],
					     'courier_id' => $_POST['courier_id'],
					);

          
		  
		   $res = $this->db->insert('tbl_int_quotation',$data);
		   if($res)
		   {
		       
		       echo "Success";
		   }
	  }else
	  {
	      
	      echo "False";
	  }
	
    }
    
    
     public function updateQuote()
    { 
       
	    $data = array(
	        
	        array(
	            'air_upto500'=>$_POST['a_z1w1'][0],
	             'air_abv500'=>$_POST['a_z1w2'][0],
	              'air_upto3'=>$_POST['a_z1w3'][0],
	               'air_upto10'=>$_POST['a_z1w4'][0],
	                'air_abv10'=>$_POST['a_z1w5'][0],
	                'sur_5kg'=>$_POST['a_z1w6'][0],
	                'id'=>$_POST['id'][0],
	            
	            
	            ),
	            
	             array(
	            'air_upto500'=>$_POST['a_z1w1'][1],
	             'air_abv500'=>$_POST['a_z1w2'][1],
	              'air_upto3'=>$_POST['a_z1w3'][1],
	               'air_upto10'=>$_POST['a_z1w4'][1],
	                'air_abv10'=>$_POST['a_z1w5'][1],
	                'sur_5kg'=>$_POST['a_z1w6'][1],
	                'id'=>$_POST['id'][1],
	            
	            
	            ),
	            array(
	            'air_upto500'=>$_POST['a_z1w1'][2],
	             'air_abv500'=>$_POST['a_z1w2'][2],
	              'air_upto3'=>$_POST['a_z1w3'][2],
	               'air_upto10'=>$_POST['a_z1w4'][2],
	                'air_abv10'=>$_POST['a_z1w5'][2],
	                'sur_5kg'=>$_POST['a_z1w6'][2],
	                'id'=>$_POST['id'][2],
	            
	            ),
	            
	            array(
	            'air_upto500'=>$_POST['a_z1w1'][3],
	             'air_abv500'=>$_POST['a_z1w2'][3],
	              'air_upto3'=>$_POST['a_z1w3'][3],
	               'air_upto10'=>$_POST['a_z1w4'][3],
	                'air_abv10'=>$_POST['a_z1w5'][3],
	                'sur_5kg'=>$_POST['a_z1w6'][3],
	                 'id'=>$_POST['id'][3],
	            
	            ),
	            
	   
	        );
 
	 //  $this->db->update_batch('tbl_dom_quotation',$data,'id');
	        
	   	$this->general_model->updateQuotebulk($data);
	   redirect('vendor/clients/'.$_POST["user_id"]);
    }
	
	
	
	 public function addClient()
    {
		
		$find_email = $this->general_model->find_email($_POST['email']);
		if(!$find_email)
		{
		
          $data = array(
		  
		  'name'=> $_POST['fname'],
		  'email'=>$_POST['email'],
		  'mobile'=>$_POST['mobile'],
		  'password'=>password_hash($_POST['pass'], PASSWORD_BCRYPT),
		  'gst'=>$_POST['gst'],
		  'couriers'=>@implode(',',$_POST['courier']),
		  'cargo'=>@implode(',',$_POST['cargo']),
		  'vendor_code'=>$this->session->userdata('vcode'),
          'roleId'=>3,
          'status'=>'Active',
		  'createdDtm'=>date('Y-m-d h:i:s'),
		  'updatedDtm'=>date('Y-m-d h:i:s'),
		  'plain_pass'=>$_POST['pass'],
		  
		  );
		  
		   $res= $this->general_model->insertRecord($this->security->xss_clean($data),'tbl_users');
		   echo "Success";
		}else{
			   echo "Email Already Exists";
		  }
       
    }
	
	
	
	public function updateClient()
    {   
	
	   $userInfo = array(
			
			'name' => filter_value('cname',''),
			'email'=> filter_value('email',''),
			'mobile' => filter_value('mobile',''),
			'gst'=> filter_value('gst',''),
			'couriers' => @implode(',',$_POST['couriers']),
			'cargo' => @implode(',',$_POST['cargo']), 
			
			'updatedDtm' => date('Y-m-d h:i:s'));

            $result = $this->general_model->updateUser($this->security->xss_clean($userInfo),$_POST['u_id']);
		
			if($result)
			  {
				  echo "Success";
				  
			  }else{
				   echo "False";
			  }
		
    }
    

    
    public function updateRider()
    {   
	
	    if($_FILES["pan"]['name'] == '')
	    {
	        $pan = $this->input->post('pan');  
	    }else
	    {
	        $pan = $this->uploadfilesamenames($_FILES["pan"]['name'], $_FILES["pan"]['tmp_name']);
	    }
	
	    if($_FILES["aadhar"]['name'] == '')
	    {
	      $aadhar = $this->input->post('aadhar');   
	    }else
	    {
	        $aadhar = $this->uploadfilesamenames($_FILES["aadhar"]['name'], $_FILES["aadhar"]['tmp_name']);
	    }
	    
	     if($_FILES["dlicense"]['name'] == '')
	    {
	        $dl = $this->input->post('dlicense'); 
	        
	    }else
	    {
	        $dl = $this->uploadfilesamenames($_FILES["dlicense"]['name'], $_FILES["dlicense"]['tmp_name']);
	    }
	
	
	   $userInfo = array(
			
			'fname' => filter_value('fname',''),
			'email'=> filter_value('email',''),
			'mobile' => filter_value('mobile',''),
			'password'=> filter_value('password',''),
			'pan' => $pan,
			'aadhar' => $aadhar, 
			'dlicense' => $dl,
			'date' => date('Y-m-d'));

            $result = $this->general_model->updateRider($this->security->xss_clean($userInfo),$_POST['id']);
		
			if($result)
			  {
				  echo "Success";
				  
			  }else{
				   echo "False";
			  }
		
    }
    
    public function updateAccount()
    {   
	
	   $userInfo = array(
			
			'name' => filter_value('name',''),
			'b_name'=> filter_value('b_name',''),
			'ifsc' => filter_value('ifsc',''),
			'acc_no'=> filter_value('acc_no',''),
			
			'date' => date('Y-m-d'));

            $result = $this->general_model->updateBank($this->security->xss_clean($userInfo),$_POST['id']);
		
			if($result)
			  {
				  echo "Success";
				  
			  }else{
				   echo "False";
			  }
		
    }
    
    
	public function insertQuote()
    {
		
		
		if($_POST)
		{
		
		
		
		$data = array(
					   array(
						 
						  'air_upto500' => $_POST['a_z1w1'],
						  'air_abv500' =>  $_POST['a_z1w1'],
						  'air_upto3' =>  $_POST['a_z1w1'],
						  'air_upto10' =>  $_POST['a_z1w1'],
						  'air_abv10' =>  $_POST['a_z1w1'],
						  'sur_5kg' =>  $_POST['a_z1w1'],
						  'courier_id' => (isset($_POST['courier_id']) ? $_POST['courier_id'] : NULL ),
						  'cargo_id' => (isset($_POST['cargo_id']) ? $_POST['cargo_id'] : NULL ),
						  'user_id' => $_POST['u_id'],
						  'zone_id' => 1,
						  'ven_code' => $_POST['v_code'],
					   ),
					   array(
						  'air_upto500' => $_POST['a_z2w1'],
						  'air_abv500' =>  $_POST['a_z2w2'],
						  'air_upto3' =>  $_POST['a_z2w3'],
						  'air_upto10' =>  $_POST['a_z2w4'],
						  'air_abv10' =>  $_POST['a_z2w5'],
						  'sur_5kg' =>  $_POST['a_z2w6'],
						  'courier_id' => (isset($_POST['courier_id']) ? $_POST['courier_id'] : NULL ),
						  'cargo_id' => (isset($_POST['cargo_id']) ? $_POST['cargo_id'] : NULL ),
						  'user_id' => $_POST['u_id'],
						  'zone_id' => 2,
						  'ven_code' => $_POST['v_code'],
					   ),
					   
					   array(
						  'air_upto500' => $_POST['a_z3w1'],
						  'air_abv500' =>  $_POST['a_z3w2'],
						  'air_upto3' =>  $_POST['a_z3w3'],
						  'air_upto10' =>  $_POST['a_z3w4'],
						  'air_abv10' =>  $_POST['a_z3w5'],
						  'sur_5kg' =>  $_POST['a_z3w6'],
						  'courier_id' => (isset($_POST['courier_id']) ? $_POST['courier_id'] : NULL ),
						  'cargo_id' => (isset($_POST['cargo_id']) ? $_POST['cargo_id'] : NULL ),
						  'user_id' => $_POST['u_id'],
						  'zone_id' => 3,
						  'ven_code' => $_POST['v_code'],
					   ),
					   
					   array(
						  'air_upto500' => $_POST['a_z4w1'],
						  'air_abv500' =>  $_POST['a_z4w2'],
						  'air_upto3' =>  $_POST['a_z4w3'],
						  'air_upto10' =>  $_POST['a_z4w4'],
						  'air_abv10' =>  $_POST['a_z4w5'],
						  'sur_5kg' =>  $_POST['a_z4w6'],
						  'courier_id' => (isset($_POST['courier_id']) ? $_POST['courier_id'] : NULL ),
						  'cargo_id' => (isset($_POST['cargo_id']) ? $_POST['cargo_id'] : NULL ),
						  'user_id' => $_POST['u_id'],
						  'zone_id' => 4,
						  'ven_code' => $_POST['v_code'],
					   )
					);

          
		  
		   $res = $this->general_model->inserQuote('tbl_dom_quotation',$this->security->xss_clean($data));
		   
		   $this->db->where('user_id',$_POST['u_id']);
		   //$this->db->or_like('courier_id',$_POST['courier_id']);
		   $dddd = $this->db->get('tbl_couriers_uploadded')->num_rows();
		   
		   if($dddd)
		   {
		       
		       $myc = ','.$_POST['courier_id'];
		       $this->db->set('courier_id',$myc);
		       $this->db->where('user_id',$_POST['u_id']);
		       $myins = $this->db->update('tbl_couriers_uploadded');
		   
		   }else{
		       
		       $myins = $this->db->insert('tbl_couriers_uploadded',array('courier_id'=> $_POST['courier_id'],'user_id'=>$_POST['u_id'],'status'=>'active')); 
		   }
		   
		   
		   
		   
		   if($res)
		   {
			   echo "Success";
		   }else{
			   
			   echo "Failed";
		   }
		   
		}else{
			   echo "Failed";
		  }
       
    }
    
    /****IMPORT CSV   ***/
    
    
    public function import_csv()
    {
         

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = "./uploads/intquote/";
                $config['allowed_types'] = "csv";
                $config['max_size'] = "900000000";
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 100;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url("vendor/client"));
                }
                
                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen('./uploads/intquote/' . $csv, "r");
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
                        'zone_name' => isset($value[0]) ? trim($value[0]) : '',
                        'country_name' => isset($value[1]) ? trim($value[1]) : '',
                        '0p5kg' => isset($value[2]) ? trim($value[2]) : '',
                        '1kg' => isset($value[3]) ? trim($value[3]) : '',
                        '1p5kg' => isset($value[4]) ? trim($value[4]) : '',
                        '2kg' => isset($value[5]) ? trim($value[5]) : '',
                        '2p5kg' => isset($value[6]) ? trim($value[6]) : '',
                        '3kg' => isset($value[7]) ? trim($value[7]) : '',
                        '3p5kg' => isset($value[8]) ? trim($value[8]) : '',
                        '4kg' => isset($value[9]) ? trim($value[9]) : '',
                        '4p5kg' => isset($value[10]) ? trim($value[10]): '',
                        '5kg' => isset($value[11]) ? trim($value[11]) : '',
                        '5p5kg' => isset($value[12]) ? trim($value[12]) : '',
                        '6kg' => isset($value[13]) ? trim($value[13]) : '',
                        '6p5kg' => isset($value[14]) ? trim($value[14]): '',
                        '7kg' => isset($value[15]) ? trim($value[15]) : '',
                        '7p5kg' => isset($value[16]) ? trim($value[16]) : '',
                        '8kg' => isset($value[17]) ? trim($value[17]) : '',
                        '8p5kg' => isset($value[18]) ? trim($value[18]) : '',
                        '9kg' => isset($value[19]) ? trim($value[19]) : '',
                        '9p5kg' => isset($value[20]) ? trim($value[20]) : '',
                        '10kg' => isset($value[21]) ? trim($value[21]) : '',
                        '10p5kg' => isset($value[22]) ? trim($value[22]) : '',
                        '11kg' => isset($value[23]) ? trim($value[23]) : '',
                        '11p5kg' => isset($value[24]) ? trim($value[24]) : '',
                        '12kg' => isset($value[25]) ? trim($value[25]) : '',
                        '12p5kg' => isset($value[26]) ? trim($value[26]) : '',
                        '13kg' => isset($value[27]) ? trim($value[27]): '',
                        '13p5kg' => isset($value[28]) ? trim($value[28]) : '',
                        '14kg' => isset($value[29]) ? trim($value[29]) : '',
                        '14p5kg' => isset($value[30]) ? trim($value[30]) : '',
                        '15kg' => isset($value[31]) ? trim($value[31]): '',
                        '15p5kg' => isset($value[32]) ? trim($value[32]) : '',
                        '16kg' => isset($value[33]) ? trim($value[33]) : '',
                        '16p5kg' => isset($value[34]) ? trim($value[34]) : '',
                        '17kg' => isset($value[35]) ? trim($value[35]) : '',
                        
                        '17p5kg' => isset($value[36]) ? trim($value[36]) : '',
                        '18kg' => isset($value[37]) ? trim($value[37]): '',
                        '18p5kg' => isset($value[38]) ? trim($value[38]) : '',
                        '19kg' => isset($value[39]) ? trim($value[39]) : '',
                        '19p5kg' => isset($value[40]) ? trim($value[40]) : '',
                        '20kg' => isset($value[41]) ? trim($value[41]): '',
                        '21kg' => isset($value[42]) ? trim($value[42]) : '',
                        '22kg' => isset($value[43]) ? trim($value[43]) : '',
                        '23kg' => isset($value[44]) ? trim($value[44]) : '',
                        '24kg' => isset($value[45]) ? trim($value[45]) : '',
                        '25kg' => isset($value[46]) ? trim($value[46]) : '',
                        '26kg' => isset($value[47]) ? trim($value[47]) : '',
                        '27kg' => isset($value[48]) ? trim($value[48]) : '',
                        '28kg' => isset($value[49]) ? trim($value[49]) : '',
                        '29kg' => isset($value[50]) ? trim($value[50]) : '',
                        '30kg' => isset($value[51]) ? trim($value[51]) : '',
                        
                        
                    ];
                    
                     $item['ven_code'] = $this->input->post('vendor_code');
                     $item['user_id'] = $this->input->post('u_id');
                     $item['courier_id'] = $this->input->post('courier_id');
                     $item['date'] = date('Y-m-d');
                     
                     
                     
                   if ($item) {
                        $items[] = $item;
                   }
                }
                
            
            
           }else{
             
             redirect(base_url('vendor/clients'));
               
               
           }
           
            if (!empty($items))
            {
                 $this->general_model->intquoteByCsv($items) ;
                 
                      redirect(base_url('vendor/clients'));
                 
            }else
            {
                
                redirect(base_url('vendor/clients'));
            }

    }
    
    
    
	
	
	
	 public function addBill()
    {
		
		
		if($_POST)
		{
		
          $data = array(
		  
		  'client_name'=> $_POST['clit_name'],
		  'email'=>$_POST['email'],
		  'date'=>$_POST['bill_date'],
		  'bill_ten_from'=> $_POST['bill_ten_from'],
		  'bill_ten_to'=> $_POST['bill_ten_to'],
		  'invoice_id'=>$_POST['inv_id'],
          'user_id'=>$_POST['u_id'],
          'ven_code'=>$_POST['v_code'],

		  
		  );
		  
		   $res= $this->general_model->insertRecord($this->security->xss_clean($data),'tbl_billing');
		   
		   if($res)
		   {
			   echo "Success";
		   }else{
			   
			   echo "Failed";
		   }
		   
		   
		}else{
			   echo "Failed";
		  }
       
    }
	
	
	 public function earning()
    {
          
        $data['contact'] = $this->home_model->getContact();
        $data['allClients'] =  $this->general_model->getEarnings($this->session->userdata('vcode'));
        $data['title'] = 'Earnings | Vn24';
        $data['layout'] = 'vendor/userOrders';
        $this->load->view('vendor/layout', $data);
    }
    
   
    
	
	public function datatable_json()
    {
		
        $records = $this->general_model->ven_ord_data($this->session->userdata('vcode'));
		
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                $row['date'],
                $row['user_id'],
                $row['order_id'],
                $row['awb'],
                
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
                $row['date'],
                $row['order_id'],
				$row['amount'],
                $row['pay_status'],
                
                
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
    
    
    function deleteproducts() {
    
        $bId = $this->input->post('bid');
        $result = $this->general_model->deleteproducts($bId,'tbl_ven_account');
        if ($result > 0) {
            echo(json_encode(array('status' => TRUE)));
        } else {
            echo(json_encode(array('status' => FALSE)));
        }
    }
    
    
     function deleterider() {
    
        $bId = $this->input->post('bid');
        $result = $this->general_model->deleteproducts($bId,'tbl_rider');
        if ($result > 0) {
            echo(json_encode(array('status' => TRUE)));
        } else {
            echo(json_encode(array('status' => FALSE)));
        }
    }
    
    
    function deleteclient() {
    
        $bId = $this->input->post('bid');
        $result = $this->general_model->deleteproducts($bId,'tbl_users');
        if ($result > 0) {
            echo(json_encode(array('status' => TRUE)));
        } else {
            echo(json_encode(array('status' => FALSE)));
        }
    }




function quote_search() {
    
         if($_POST['cou'] && $_POST['cntry'])
		  {
			  
			$res = $this->general_model->search_intquote('tbl_int_quotation',$_POST['cou'],$_POST['cntry'],$_POST['id']);
			if($res)
			{
			   //return $res;
			   
			   foreach( $res as $r)
			   {
			       
			       //print_r($r);
			       
			       echo '<tr>
                      <th scope="col">Non Doc</th>
                      <th scope="col">'.$r['zone_name'].'</th>
                      
                      
                    </tr>
                    <tr>
                    <td scope="COL">0.5</td>
                    <td scope="COL">Rs. '.$r['0p5kg'].'</td>
                    
                    
                  </tr>
                  <tr>
                    <td scope="COL">1.0</td>
                    <td scope="COL">Rs. '.$r['1kg'].'</td>
                    
                  </tr>
                    <tr>
                    <td scope="COL">1.5</td>
                    <td scope="COL">Rs. '.$r['1p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">2</td>
                    <td scope="COL">Rs. '.$r['2kg'].'</td>
                    
                  </tr>
                  
                  <tr>
                    <td scope="COL">2.5</td>
                    <td scope="COL">Rs. '.$r['2p5kg'].'</td>
                    
                  </tr>
                  
                  <tr>
                    <td scope="COL">3</td>
                    <td scope="COL">Rs. '.$r['3kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">3.5</td>
                    <td scope="COL">Rs. '.$r['3p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">4</td>
                    <td scope="COL">Rs. '.$r['4kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">4.5</td>
                    <td scope="COL">Rs. '.$r['4p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">5</td>
                    <td scope="COL">Rs. '.$r['5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">5.5</td>
                    <td scope="COL">Rs. '.$r['5p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">6</td>
                    <td scope="COL">Rs. '.$r['6kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">6.5</td>
                    <td scope="COL">Rs. '.$r['6p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">7</td>
                    <td scope="COL">Rs. '.$r['7kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">7.5</td>
                    <td scope="COL">Rs. '.$r['7p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">8</td>
                    <td scope="COL">Rs. '.$r['8kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">8.5</td>
                    <td scope="COL">Rs. '.$r['8p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">9</td>
                    <td scope="COL">Rs. '.$r['9kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">9.5</td>
                    <td scope="COL">Rs. '.$r['9p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">10</td>
                    <td scope="COL">Rs. '.$r['10kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">10.5</td>
                    <td scope="COL">Rs. '.$r['10p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">11</td>
                    <td scope="COL">Rs. '.$r['11kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">11.5</td>
                    <td scope="COL">Rs. '.$r['11p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">12</td>
                    <td scope="COL">Rs. '.$r['12kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">12.5</td>
                    <td scope="COL">Rs. '.$r['12p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">13</td>
                    <td scope="COL">Rs. '.$r['13kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">13.5</td>
                    <td scope="COL">Rs. '.$r['13p5kg'].'</td>
                    
                  </tr>
                  <tr>
                    <td scope="COL">14</td>
                    <td scope="COL">Rs. '.$r['14kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">14.5</td>
                    <td scope="COL">Rs. '.$r['14p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">15</td>
                    <td scope="COL">Rs. '.$r['15kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">15.5</td>
                    <td scope="COL">Rs. '.$r['15p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">16</td>
                    <td scope="COL">Rs. '.$r['16kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">16.5</td>
                    <td scope="COL">Rs. '.$r['16p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">17</td>
                    <td scope="COL">Rs. '.$r['17kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">17.5</td>
                    <td scope="COL">Rs. '.$r['17p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">18</td>
                    <td scope="COL">Rs. '.$r['18kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">18.5</td>
                    <td scope="COL">Rs. '.$r['18p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">19</td>
                    <td scope="COL">Rs. '.$r['19kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">19.5</td>
                    <td scope="COL">Rs. '.$r['19p5kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">20</td>
                    <td scope="COL">Rs. '.$r['20kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">21</td>
                    <td scope="COL">Rs. '.$r['21kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">22</td>
                    <td scope="COL">Rs. '.$r['22kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">23</td>
                    <td scope="COL">Rs. '.$r['23kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">24</td>
                    <td scope="COL">Rs. '.$r['24kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">25</td>
                    <td scope="COL">Rs. '.$r['25kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">26</td>
                    <td scope="COL">Rs. '.$r['26kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">27</td>
                    <td scope="COL">Rs. '.$r['27kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">28</td>
                    <td scope="COL">Rs. '.$r['28kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">29</td>
                    <td scope="COL">Rs. '.$r['29kg'].'</td>
                  </tr>
                  <tr>
                    <td scope="COL">30</td>
                    <td scope="COL">Rs. '.$r['30kg'].'</td>
                  </tr>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  ';
			       
			   }
			   
			}
			
			  
		  }
    }






    
}
