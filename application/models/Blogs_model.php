<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class blogs_model extends CI_Model
{

	    function blogsListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id,BaseTbl.title,BaseTbl.image,BaseTbl.description,BaseTbl.author,BaseTbl.category,BaseTbl.status,BaseTbl.date_created,BaseTbl.date_modified');
        $this->db->from('tbl_blogs as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.image  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
      
        $this->db->where('BaseTbl.status =', 'Active');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
	
	
	  function galleryListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id,BaseTbl.title,BaseTbl.image,BaseTbl.description,BaseTbl.status,BaseTbl.date_modified');
        $this->db->from('tbl_blogs as BaseTbl');
		
      if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.image  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.status =', 'Active');
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    

	// function sliderListing()  {
//
	//	$this->db->where('status', 'active');
		//$this->db->from('tbl_sliders');
		//$query = $this->db->get();
			//return $query;
       
   // }

  
     function insertblogs($forminput)  {
        $this->db->insert("tbl_blogs",$forminput);
    }


    
    
    function getUserRoles() {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
         $query = $this->db->get();
       
       return $query->result();
    }

  

    function getUser($userid){
        $this->db->where('id',$userid);
        return $user = $this->db->get('tbl_sliders')->row_array();
    }




    
   function updateblogs($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_blogs',$formArray);


   }

 function deleteblogs($sId, $sliderInfo)
    {
        $this->db->where('id', $sId);
        $this->db->update('tbl_blogs', $sliderInfo);
        
        return $this->db->affected_rows();
    }
	
   
    function getTestbyId($id){
  
		
		return $this->db->get_where('tbl_blogs', array( 'id' =>$id ) )->row_array();

   }
   
   public function blogs_data() {		

        $this->load->library('datatable');	
	
		$SQL ="SELECT * FROM tbl_blogs WHERE tbl_blogs.status = 'Active'";			
		return $this->datatable->LoadJsona($SQL);
		
	}
  
   



}


    
    

?>