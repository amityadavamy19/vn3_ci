<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Service_model (Service Model)
 * Service model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Course_model extends CI_Model
{
   
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getCourseID($uri)
    {
        $this->db->select('id');
        $this->db->from('tbl_course_subcategory');
        $this->db->where('url =', $uri);
        $sucat_id = $this->db->get()->row_array()['id'];
        
        
        return $sucat_id;
    }
      function getCourseDetail($id)
    {
        
        $course= $this->db->get_where('tbl_courses',array('id'=> $id))->row_array();
        
        return $course;
    }

   function submitContact($data)
    {
        
     $this->db->insert('tbl_contact_query',$data);
        
        return TRUE;
    }
   
   public function getAllTaraining($id)
    {
   
              $train = $this->db->get_where('tbl_training_options',array('subcat_id'=> $id))->result();
        
        return $train;  
        
    }
    
     public function getAllCert($id)
    {
   
              $cert = $this->db->get_where('tbl_examcerti',array('subcat_id'=> $id))->result();
        
        return $cert;  
        
    }
    
    
     public function getAllTest()
    {
        
       
        $this->db->where('status', 'Active'); 
        $this->db->where('isDeleted', 0); 
        $this->db->order_by("id");
        $this->db->limit(2); // Limit, 15 entries
        $test =  $this->db->get('tbl_testimonials'); 
   
              
        
        return $test->result();  
        
    }
    
    
    public function getAllBen($id)
    {
        
       
          $ben = $this->db->get_where('tbl_benefits',array('subcat_id'=> $id))->result();
        
        return $ben;  
        
    }
  
    
  
    
   
   
}

  