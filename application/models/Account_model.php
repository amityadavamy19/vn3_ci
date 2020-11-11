<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Account_model extends CI_Model
{
    /**
     * This function is used to get the Reports listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
	  
	 function getPlanDetails()
    {
        
         return $this->db->get('tbl_subscription_plan')->result_array();
    }
	
	 
	
	 
	 function delPlan($oid)
    {
        $this->db->where('id',$oid);
        $this->db->delete('tbl_subscription_plan');
         return $this->db->affected_rows();
    }
	
	 function delSale($oid)
    {
        $this->db->where('id',$oid);
        $this->db->delete('tbl_sales_code');
         return $this->db->affected_rows();
    }
	 
	 
	 function insertPlan($data)
	 {
		 
         $this->db->insert('tbl_subscription_plan',$data);
         return $this->db->affected_rows();
	 }
	  function insertCode($data)
	 {
		 
         $this->db->insert('tbl_sales_code',$data);
         return $this->db->affected_rows();
	 }
	 
	 function getPlanById($id){
		 
		 
		return $this->db->get_where( 'tbl_subscription_plan', array('id'=> $id) )->row_array();
		 
		 
	 }
	 
	 function getSalesCode($val){
		 
		 $this->db->select('*');
        $this->db->from('tbl_sales_code');
        $this->db->like('code',$val);
       
		
		$this->db->where('status','Active');
        $query = $this->db->get();
          return $result = $query->row_array();
		
		 
		 
	 }
	 
	 
	 function getSaleById($id){
		 
		 
		return $this->db->get_where( 'tbl_sales_code', array('id'=> $id) )->row_array();
		 
		 
	 }
	 function updatePlan($id,$data){
		 
		 
		 $this->db->set($data);
		 $this->db->where('id',$id);
		 $this->db->update( 'tbl_subscription_plan');
		 
		 
	 }
	 
	 function updateSalesCode($id,$data){
		 
		 
		 $this->db->set($data);
		 $this->db->where('id',$id);
		 $this->db->update( 'tbl_sales_code');
		 
		 
	 }
	 
	 
	 
    function getReports()
    {
        
        $query = $this->db->get_where('tbl_contact_query',array('isDeleted'=>0,'status'=>'Active'));
        return $query->result_array();
    }
	
	public function vendor_data() {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_users  WHERE tbl_users.roleId = 4";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	public function sale_data(){
		
		$this->load->library('datatable');	
		
		
		$SQL = "SELECT *  FROM tbl_users  WHERE tbl_users.roleId = 5";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	public function client_data($id){
		
		$this->load->library('datatable');	
		
		
		$SQL = "SELECT tbl_users.* FROM tbl_users Left JOIN tbl_sales_code ON tbl_users.sales_code = tbl_sales_code.code WHERE tbl_sales_code.agent_id = '$id'";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	

}

  