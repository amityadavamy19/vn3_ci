<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Brands_model (General Model)

 * @author : Amit Yadav
 * @version : 1.1
 * @since : 2020
 */
class General_model extends CI_Model
{
    

 public function insertRecord($data,$tab)
    {

       
			$this->db->insert($tab,$data);
			return true;
		
    
       
    }
  
    function getUser($userid){
        $this->db->where('userId',$userid);
        return $user = $this->db->get('tbl_users')->row_array();
    }

 function getSingleRecord($id,$colName,$tab){
        $this->db->where($colName,$id);
        return $row = $this->db->get($tab)->row_array();
    }
	
	function updateRecord($id,$colName,$tab,$data){
        $this->db->where($colName,$id);
		$this->db->set($data);
        $this->db->update($tab);
		return true;
    }

function getAllRecord($id,$colName,$tab){
        $this->db->where($colName,$id);
        return $row = $this->db->get($tab)->result();
    }
    
   function updateUser($data,$id){
        $this->db->where('userId',$id);
        $this->db->update('tbl_users',$data);
     return true;        

   }
public function getTotalDataSimple($vendor_id){
		
		$this->db->select('*');
		$this->db->from('tbl_rider');
		$this->db->where('vendor_id',$vendor_id);
        $resultSet = $this->db->get();
        
		return $resultSet->num_rows();
	}

 function register($data)
    {
        
        $this->db->insert('tbl_users', $data);
		
        
        
    }
	
	
	function checkQuote($cid,$zone)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_admin_quote');
		$this->db->where('courier_id',$cid);
		$this->db->where('zone_name',$zone);
        $query = $this->db->get();
        return $result = $query->num_rows();
		
        
        
    }
    
   
    function getbrandsbyId($id){
  
        
        return $this->db->get_where('tbl_brands', array( 'id' =>$id ) )->row_array();

   }
   
   
   public function login($data)
	{
		$query = $this->db->get_where('tbl_users', array('email' => $data['email']));
		if ($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$result = $query->row_array();			
			if($result['status'] != 'Inactive')
			{
				$validPassword = password_verify($data['password'], $result['password']);			
				if($validPassword)
				{
					return $result = $query->row_array();
				}
			}
			else
			{
				return false;
			}
		}
	}
	
	
	public function login_corp($data)
	{
		$query = $this->db->get_where('tbl_users', array('email' => $data['email'],'roleId'=>3));
		if ($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$result = $query->row_array();			
			if($result['status'] != 'Inactive')
			{
				$validPassword = password_verify($data['password'], $result['password']);			
				if($validPassword)
				{
					return $result = $query->row_array();
				}
			}
			else
			{
				return false;
			}
		}
	}
	
	
	public function verify_pass($data,$id)
	{
		$query = $this->db->get_where('tbl_users', array('userId' => $id));
		if ($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$result = $query->row_array();	
            $validPassword = password_verify($data['password'], $result['password']);			
			if($validPassword)
			{
					return $result = $query->row_array();
			}			
			
			else
			{
				return false;
			}
		}
	}
	
	public function login_ven($data)
	{
		$query = $this->db->get_where('tbl_users', array('email' => $data['email'],'roleId'=>4));
		if ($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$result = $query->row_array();			
			if($result['status'] != 'Inactive')
			{
				$validPassword = password_verify($data['password'], $result['password']);			
				if($validPassword)
				{
					return $result = $query->row_array();
				}
			}
			else
			{
				return false;
			}
		}
	}
	
	
	
	
	
	 
    public function couriers(){
  
        
        return $this->db->get('tbl_couriers')->result();

   }
   
    public function cargo(){
  
        
        return $this->db->get('tbl_cargo')->result();

   }
   
     public function find_email($email){
  
        
        return $this->db->get_where('tbl_users',array('email'=>$email))->row_array()['email'];

   }
   
    public function getClients($code){
  
        
        return $this->db->get_where('tbl_users',array('roleId'=>3,'vendor_code' => $code ))->result();

   }
    public function getOrderAmt($uid,$start,$end){
		
		$q= $this->db->query("SELECT sum(amount) as total_amount FROM tbl_order where date between '$start' and '$end' AND user_id = $uid");
		   
		if ($q->num_rows() > 0) {            
                       
            return $q->row();
        }
        
       return false;
		
	}
   
   
   
   public function addOrder($data)
    {
        
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
        
    }
	
	 public function order_data($id)
    {

        $this->load->library('datatable');

        $SQL = "SELECT * FROM tbl_order WHERE pay_status IN('Unpaid','Paid') and user_id='$id'";
        return $this->datatable->LoadJsona($SQL);
    }
	
	public function corp_ord_data($id)
    {

        $this->load->library('datatable');

        $SQL = "SELECT * FROM tbl_order WHERE pay_status IN('Unpaid','Paid') and user_id='$id' ";
        return $this->datatable->LoadJsona($SQL);
    }
	
	public function ven_ord_data($code)
    {
        
        $this->load->library('datatable');

        $SQL = "SELECT * FROM tbl_order WHERE vendor_code = '$code' and pay_status IN('Unpaid','Paid') ";
        return $this->datatable->LoadJsona($SQL);
		 
    }
	
	
	public function corp_invoice_data($id)
    {

        $this->load->library('datatable');

        $SQL = "SELECT * FROM  tbl_billing WHERE user_id ='$id' ";
        return $this->datatable->LoadJsona($SQL);
    }
	
	
	
	
	
	 public function get_awb($query_string)
    {

        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->or_like('awb',$query_string);
        $this->db->or_like('order_id',$query_string);
		$this->db->where('user_id',$this->session->userdata('userId'));
        $query = $this->db->get();
          return $result = $query->result_array();
    }
	
	

 function insert_ven($data)
    {
        
        $this->db->insert('tbl_users', $data);
		
        return $this->db->insert_id();
        
    }
	
    
	
	
	 public function insert_batch($data,$id)
    {

        foreach($data as $d)
		{
			$this->db->insert('tbl_pincode_serviceable',array('pincode'=>$d, 'user_id'=>$id,'date' =>date('Y-m-d') ));
		}
    
       
    }
	
	 public function update_batch($data,$id)
    {

        foreach($data as $d)
		{
			
			$res = $this->db->get_where('tbl_pincode_serviceable',array('pincode'=>$d, 'user_id'=>$id))->row_array();
			if(!$res)
			{
				$this->db->insert('tbl_pincode_serviceable',array('pincode'=>$d, 'user_id'=>$id,'date' =>date('Y-m-d') ));
			}
			
			
		}
    
       
    }
    
   
	
	
	public function updateParcel($data,$id)
    {

            $this->db->set($data);
            $this->db->where('user_id',$id);
            $this->db->where('status','Inactive');
            $this->db->where('order_id','');
			
			$this->db->update('tbl_parcel_dimension');
			return true;
		
    
       
    }
	
	 public function getRecord($col,$id,$tab)
    {

       
			return $this->db->get_where($tab,array($col =>$id ))->result();
	
    }
	
	public function matchRecord($id,$pin){
		
		return $this->db->get_where('tbl_pincode_serviceable',array('user_id' =>$id,'pincode'=>$pin ))->result();
		
	}
	
	public function checkCourier($name){
		
		$this->db->select('*');
        $this->db->from('tbl_couriers');
        $this->db->or_like('name',$name);
        
		$this->db->where('status','Active');
        $query = $this->db->get();
        return $result = $query->num_rows();
		
	}
	
	public function checkCargo($name){
		
		$this->db->select('*');
        $this->db->from('tbl_cargo');
        $this->db->or_like('name',$name);
        
		$this->db->where('status','Active');
        $query = $this->db->get();
        return $result = $query->num_rows();
		
	}
	
	
	public function checkOtype($name){
		
		$this->db->select('*');
        $this->db->from('tbl_otype');
        $this->db->or_like('name',$name);
        
		$this->db->where('status','Active');
        $query = $this->db->get();
        return $result = $query->num_rows();
		
	}
	
	 public function search_pin2($tab,$pin)
    {

           $pin_ser = $this->db->get_where('tbl_pincode_serviceable',array('pincode' =>$pin,'user_id'=>1 ))->row_array()['id'];
			if($pin_ser)
			{
				//return true;
			$this->db->select('*');
			$this->db->from($tab);
			$this->db->or_like('service_pincodes',$pin_ser);
			$query = $this->db->get();
            return $result = $query->result();
			}else
			{
				return false;
			}
	
    }
	
	
	public function search_pin($tab,$pin)
    {

            $this->db->select('*');
			$this->db->from($tab);
			$this->db->where('user_id!=',1);
			$this->db->where('pincode=',$pin);
			$query = $this->db->get();
			if($query->num_rows() > 0)
			{
				
				return $query->result();
			}else{
				
				return false;
			}
		  
    }
	
	
	
	public function search_pincorp($tab,$pin)
    {
            $user =   $this->getSingleRecord($this->session->userdata('userId'),'userId','tbl_users');
			$vendor_id = $this->getSingleRecord($user['vendor_code'],'code','tbl_users');
            $this->db->select('*');
			$this->db->from($tab);
			$this->db->where('user_id =',$vendor_id['userId']);
			$this->db->where('pincode=',$pin);
			$query = $this->db->get();
			if($query->num_rows() > 0)
			{
				
				return $query->result();
			}else{
				
				return false;
			}
		  
    }
	
	
	public function search_pincorp2($tab,$pin)
    {
         /*  $user =   $this->getSingleRecord($this->session->userdata('userId'),'userId','tbl_users');
			$vendor_id = $this->getSingleRecord($user['vendor_code'],'code','tbl_users');
			
			
           $pin_ser = $this->db->get_where('tbl_pincode_serviceable',array('pincode' =>$pin,'user_id'=>$vendor_id['userId'] ))->row_array()['id'];
			if($pin_ser)
			{
				//return true;
			$this->db->select('*');
			$this->db->from($tab);
			$this->db->or_like('service_pincodes',$pin_ser);
			$query = $this->db->get();
            return $result = $query->result();
			}else
			{
				return false;
			}
			*/
			
			
			$pin_ser = $this->db->get_where('tbl_pincode_serviceable',array('pincode' =>$pin,'user_id'=>1 ))->row_array()['id'];
			if($pin_ser)
			{
				//return true;
			$this->db->select('*');
			$this->db->from($tab);
			$this->db->or_like('service_pincodes',$pin_ser);
			$query = $this->db->get();
            return $result = $query->result();
			}else
			{
				return false;
			}
	
    }
	
	 public function inserQuote($tab,$data)
    {

			if($this->db->insert_batch($tab, $data)) 
			{
				return true;
			}
			else{
				return false;
				
			}
				
			
	
    }
   
    public function deleteproducts($id,$colName,$tab)
    {

			$this->db->where($colName,$id);
			$this->db->delete($tab);
			return $this->db->affected_rows();
				
			
	
    }
	
	
	public function getSingleQuote($tab,$cour_id,$uid)
	{
		
		
		   
		    $this->db->select('*');
			$this->db->from($tab);
			$this->db->where('courier_id',$cour_id);
			$this->db->where('user_id',$uid);
			$query = $this->db->get();
            return $result = $query->result();
		
		
		
	}
	
	public function updateQuotebulk($data)
	{
		
		
		$this->db->update_batch('tbl_dom_quotation',$data,'id');
		
	}
	
	
	public function intquoteByCsv($qoute = array())
	{
		if(!empty($qoute))
		{
			
			foreach($qoute as $q )
			{
			$this->db->insert('tbl_int_quotation', $q);
			}
			return TRUE;
		}
		
		
	}
	
	public function corpUploadCsv($parcels = array(),$dimens = array())
	{
		if(!empty($parcels) && !empty($dimens))
		{
			
			foreach($parcels as $p )
			{
			$this->db->insert('tbl_order', $p);
			}
			
			foreach($dimens as $d )
			{
			$this->db->insert('tbl_parcel_dimension', $d);
			}
			return TRUE;
		}
		
	}
	
	public function getAllOtype()
	{
		
		
		return $this->db->get_where('tbl_otype',array('status'=>'Active'))->result();
		
		
	}
	
	public function getAllCountry()
	{
		
		
		return $this->db->get('countries')->result();
		
		
	}
	
	
	
	
	public function getAllState()
	{
		
		
		return $this->db->get_where('states',array('country_id' => 101))->result();
		
		
	}
	
	
	public function getAllCity()
	{
		$this->db->select('*');
        $this->db->from('cities');
        $whrein =array(
		1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,19,20,21,22,23,24,25,26,29,31,32,33,34,35,36,37,38,39,41
		
		);
		$this->db->where_in('state_id',$whrein);
		
        $query = $this->db->get();
		
		return $query->result();
		
		
	}
	
	public function search_intquote($tab,$cou,$cntry,$uid)
	{
		
		$this->db->select('*');
        $this->db->from($tab);
        //$this->db->or_like('country_name',$cntry);
        //$this->db->or_like('courier_id',$cou);
		$this->db->where('country_name',$cntry);
		$this->db->where('courier_id',$cou);
		$this->db->where('user_id',$uid);
        $query = $this->db->get();
          return $result = $query->result_array();
		
		
	}
	
	function cities_list($state_id)
	{
		$this->db->where('state_id', $state_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('cities');
		$output = '<option value="">Select City</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->name.'">'.$row->name.'</option>';
		}
		return $output;
	}
	
	
	function states_list($cntry_id)
	{
		$this->db->where('country_id', $cntry_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('states');
		$output = '<option value="">Select State</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
		return $output;
	}
  
    function getAllPickAdd($userid)
	{
		$this->db->select('pickup_address,id,user_id');
		$this->db->where('user_id', $userid);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(2);
		
		$query = $this->db->get('tbl_order');
		return $output =$query->result();
		
		
		
	} 
	
	function getAllFromAdd($userid)
	{
		$this->db->select('from_address,id,user_id');
		$this->db->where('user_id', $userid);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(2);
		$query = $this->db->get('tbl_order');
		return $output =$query->result();
		
		
		
	}
	function getAllDropAdd($userid)
		{
			$this->db->select('drop_address,id,user_id');
			$this->db->where('user_id', $userid);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(2);
			$query = $this->db->get('tbl_order');
			return $output =$query->result();
			
			
			
		}	
		
		function SalesCheck($sales)
		{
			$res =  $this->db->get_where('tbl_sales_code',array('code' => $sales));
			
			if($res->num_rows()> 0 )
			{
				return true;
			}else{
				return false;
			}
			
		}

        function VendorCheck($code)
		{
			$res =  $this->db->get_where('tbl_users',array('code' => $code));
			
			if($res->num_rows()> 0 )
			{
				return true;
			}else{
				return false;
			}
			
		}		
  
        function calcPayment($id)
		{
			
			$ven_code = vendor_codeByid($id);
			$this->db->select('SUM(amount) as total_amount');
			$this->db->where('vendor_code', $ven_code);
			$res = $this->db->get('tbl_order');
			
			
			if($res->num_rows()> 0 )
			{
				return $res->result_array();
			}else{
				return false;
			}
			
		}


        public function getAllVendors($pin){
			
			$this->db->select('*');
			$this->db->from('tbl_pincode_serviceable');
			$this->db->join('tbl_users', 'tbl_pincode_serviceable.user_id = tbl_users.UserId','left');
			
			$this->db->where('pincode', $pin);
			
			$res = $this->db->get();
			return $res->result();
			
			
			
		}	



        public function  getCommission($id){
			
			$sql= "SELECT COUNT(order_id) as total_order, SUM(vendor_comm) as total_comm , SUM(vendor_recv_amt) as total_amt from tbl_transfers where transfer_to= '$id' ";
			
			
			$res = $this->db->query($sql, false);
			return $res->result_array();
			
			
			
		}		
  
  
  
  
  
}


?>