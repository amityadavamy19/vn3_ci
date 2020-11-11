<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Reports_model extends CI_Model
{
    /**
     * This function is used to get the Reports listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
	  function reportListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_contact_query as BaseTbl');
      
       
		 if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.fname  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%'
                            OR  BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
      
        $this->db->where('BaseTbl.status =', 'Active');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
	 
	  function reportListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_contact_query as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.fname  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%'
                            OR  BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.status =', 'Active');
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	 
	 function delOrder($oid,$tab)
    {
        $this->db->where('id',$oid);
        $this->db->delete($tab);
         return $this->db->affected_rows();
    }
	
	 function delUser($oid,$tab)
    {
        $this->db->where('userId',$oid);
        $this->db->delete($tab);
         return $this->db->affected_rows();
    }
	 
	 function delmyOrder($oid,$tab)
    {
        $this->db->where('id',$oid);
        $this->db->set('is_deleted',1);
        $this->db->update($tab);
         return $this->db->affected_rows();
    }
	 
	 
	 
    function getReports()
    {
        
        $query = $this->db->get_where('tbl_contact_query',array('isDeleted'=>0,'status'=>'Active'));
        return $query->result_array();
    }
	
	public function reports_data() {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT tbl_order.* FROM tbl_order JOIN tbl_users ON tbl_order.user_id=tbl_users.userId WHERE tbl_users.roleId IN(1,2)";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	
	
	}
	
	
	public function cargo_data() {		

        $this->load->library('datatable');	
		$SQL = "SELECT * FROM tbl_cargo WHERE tbl_cargo.status='Active'";				
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	public function pin_data() {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT * FROM tbl_pincode_serviceable WHERE tbl_pincode_serviceable.user_id=1";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	public function quote_data($id) {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT * FROM tbl_admin_quote WHERE tbl_admin_quote.courier_id='$id'";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	public function courier_data() {		

        $this->load->library('datatable');	
		
		
		$SQL = "SELECT * FROM tbl_couriers WHERE tbl_couriers.status='Active'";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	
	public function otype_data() {		

        $this->load->library('datatable');	
		$SQL = "SELECT * FROM tbl_otype WHERE tbl_otype.status IN('Active','Inactive')";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	
	public function user_data() {		

        $this->load->library('datatable');	
		$SQL = "SELECT * FROM tbl_users WHERE tbl_users.roleId=2";	
	
					
		return $this->datatable->LoadJsona($SQL);
		
	}
	

}

  