<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class coursesubcat_model extends CI_Model
{

	    function subcategoryListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.cat_id,BaseTbl.subcat_name,BaseTbl.url,BaseTbl.status,BaseTbl.date_created,BaseTbl.date_modified');
        $this->db->from('tbl_course_subcategory as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.cat_name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
      
        $this->db->where('BaseTbl.status =', 'Active');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
	
	
	  function galleryListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id,BaseTbl.cat_id,BaseTbl.subcat_name,BaseTbl.status,BaseTbl.date_modified');
        $this->db->from('tbl_course_subcategory as BaseTbl');
		
      if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.cat_name  LIKE '%".$searchText."%'";
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

  
     function insertsubcategory($forminput)  {
        $this->db->insert("tbl_course_subcategory",$forminput);
    }


    
    
    function getUserRoles() {
        $this->db->select('id, cat_name');
        $this->db->from('tbl_course_category');
		$this->db->where('status','Active');
      
         $query = $this->db->get();
       
       return $query->result();
    }

  

    function getUser($userid){
        $this->db->where('id',$userid);
        return $user = $this->db->get('tbl_course_subcategory')->row_array();
    }




    
   function updatesubcategory($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_course_subcategory',$formArray);


   }

 function deletesubcategory($sId, $sliderInfo)
    {
        $this->db->where('id', $sId);
        $this->db->update('tbl_course_subcategory', $sliderInfo);
        
        return $this->db->affected_rows();
    }
	
   
    function getSubCatById($id){
  
		$this->db->select('tbl_course_subcategory.*,tbl_course_category.cat_name')
		->from('tbl_course_subcategory')
		->join('tbl_course_category','tbl_course_category.id = tbl_course_subcategory.cat_id') 
		->where('tbl_course_subcategory.id=',$id)
		->where('tbl_course_subcategory.status=','Active');
		 $res = $this->db->get();
		return $res->row_array();

   }

   function getcatbyId($id){
  
        
        return $this->db->get_where('tbl_course_category', array( 'id' =>$id ) )->row_array();

   }
   
   function getAllCat(){
  
        
        return $this->db->get_where('tbl_course_category',array('status'=>'Active'))->result_array();

   }
   
   public function subcategory_data() {		

        $this->load->library('datatable');	
	
		$SQL = "SELECT tbl_course_category.cat_name,tbl_course_subcategory.subcat_name,tbl_course_subcategory.date_created ,tbl_course_subcategory.date_modified,tbl_course_subcategory.id,tbl_course_subcategory.cat_id,tbl_course_subcategory.status FROM tbl_course_category JOIN tbl_course_subcategory ON tbl_course_category.id=tbl_course_subcategory.cat_id WHERE tbl_course_subcategory.status='Active' AND tbl_course_category.status='Active'";	
		return $this->datatable->LoadJsona($SQL);
		
	}
  
   



}


    
    

?>