<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class coursesubcat2_model extends CI_Model
{

	    function subcategory2ListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.subcat_id,BaseTbl.cat_id,BaseTbl.subcat2_name,BaseTbl.url,BaseTbl.image,BaseTbl.status,BaseTbl.date_created,BaseTbl.date_modified');
        $this->db->from('tbl_course_subcategory2 as BaseTbl');
      
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
        $this->db->select('BaseTbl.subcat_id,BaseTbl.cat_id,BaseTbl.subcat2_name,BaseTbl.url,BaseTbl.image,BaseTbl.status,BaseTbl.date_created,BaseTbl.date_modified');
        $this->db->from('tbl_course_subcategory2 as BaseTbl');
		
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

  
     function insertsubcategory2($forminput)  {
        $this->db->insert("tbl_course_subcategory2",$forminput);
    }


    
    
    function getcategory() {
        $this->db->select('id, cat_name');
        $this->db->from('tbl_course_category');
        $this->db->where('status','Active');
      
         $query = $this->db->get();
       
       return $query->result();
    }

     function getsubcategory() {
        $this->db->select('id, subcat_name');
        $this->db->from('tbl_course_subcategory');
        $this->db->where('status','Active');
      
         $query = $this->db->get();
       
       return $query->result();
    }

  

  

    function getUser($userid){
        $this->db->where('id',$userid);
        return $user = $this->db->get('tbl_course_subcategory2')->row_array();
    }




    
   function updatesubcategory2($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_course_subcategory2',$formArray);


   }

 function deletesubcategory2($sId, $sliderInfo)
    {
        $this->db->where('id', $sId);
        $this->db->update('tbl_course_subcategory2', $sliderInfo);
        
        return $this->db->affected_rows();
    }
	
   
    function getsubcatbyId($id){
  
		
		return $this->db->get_where('tbl_course_subcategory', array( 'id' =>$id ) )->row_array();

   }
    
    function getSubCat2ById($id){
  
        $this->db->select('tbl_course_subcategory2.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name')
        ->from('tbl_course_subcategory2')
        ->join('tbl_course_category','tbl_course_category.id = tbl_course_subcategory2.cat_id') 
        ->join('tbl_course_subcategory','tbl_course_subcategory.id = tbl_course_subcategory2.subcat_id') 
        ->where('tbl_course_subcategory2.id=',$id)
        ->where('tbl_course_subcategory2.status=','Active');
         $res = $this->db->get();
        return $res->row_array();

   }

   
      function getAllCat(){
  
        
        return $this->db->get_where('tbl_course_category',array('status'=>'Active'))->result_array();

   }

       function getAllsub(){
  
        
        return $this->db->get_where('tbl_course_subcategory',array('status'=>'Active'))->result_array();

   }


   public function subcategory2_data() {		

        $this->load->library('datatable');	
	
		$SQL =  "SELECT tbl_course_category.*,tbl_course_subcategory.*,tbl_course_subcategory2.* FROM ((tbl_course_subcategory2  JOIN tbl_course_category ON tbl_course_subcategory2.cat_id=tbl_course_category.id)  JOIN tbl_course_subcategory ON tbl_course_subcategory2.subcat_id=tbl_course_subcategory.id) WHERE tbl_course_subcategory2.status='Active' AND tbl_course_category.status='Active'";	
		return $this->datatable->LoadJsona($SQL);
		
	}
   public function subcat_data($id) {		

        return $this->db->get_where('tbl_course_subcategory',array('cat_id'=>$id))->result_array();
		
		
	}
   



}


    
    

?>