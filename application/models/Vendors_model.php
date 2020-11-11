<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Vendors_model extends CI_Model
{
    /**
     * This function is used to get the Reports listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
	 
	 
	
	 
	 function delVendor($oid)
    {
        $this->db->where('userId',$oid);
        $this->db->delete('tbl_users');
         return $this->db->affected_rows();
    }
	 
	 
	 
	 
	 
    function getReports()
    {
        
        $query = $this->db->get_where('tbl_contact_query',array('isDeleted'=>0,'status'=>'Active'));
        return $query->result_array();
    }
	
	public function vendors_data() {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_users  WHERE tbl_users.roleId =4 ";	
	
		$SQL = "SELECT tbl_users.*,tbl_sales_code.agent_id FROM tbl_users LEFT JOIN tbl_sales_code ON  tbl_sales_code.code =tbl_users.sales_code WHERE tbl_users.roleId =4";	
				
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	public function order_data($id) {	


    	

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_order  WHERE tbl_order.user_id = '$id'";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	public function client_data($id) {	


    	

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_users  WHERE tbl_users.vendor_code = '$id' ";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	public function pincode_data($id) {	


    	

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_pincode_serviceable  WHERE tbl_pincode_serviceable.user_id = '$id' ";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	
	public function courier_data() {	


    	

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_couriers  WHERE tbl_couriers.status = 'Active' ";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	public function riderOrders_data() {	

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_rider_orders ";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	

}

  