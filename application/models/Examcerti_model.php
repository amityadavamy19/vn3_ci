<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Training_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Abhishek
 * @version : 1.1
 * @since : 15 November 2016
 */
class Examcerti_model extends CI_Model
{


  
     function insertexamcerti($forminput)  {
        $this->db->insert("tbl_examcerti",$forminput);
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
     function getsubcategory2() {
        $this->db->select('id, subcat_name');
        $this->db->from('tbl_course_subcategory2');
        $this->db->where('status','Active');
      
         $query = $this->db->get();
       
       return $query->result();
    }


  

  

    function getUser($userid){
        $this->db->where('id',$userid);
        return $user = $this->db->get('tbl_examcerti')->row_array();
    }




    
   function updateexamcerti($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_examcerti',$formArray);


   }

 function deleteexamcerti($eId, $userInfo)
    {
        $this->db->where('id', $eId);
        $this->db->update('tbl_examcerti', $userInfo);
        
        return $this->db->affected_rows();
    }
    
   
    function getsubcatbyId($id){
  
        
        return $this->db->get_where('tbl_course_subcategory', array( 'id' =>$id ) )->row_array();

   }

     function getsubcat2byId($id){
  
        
        return $this->db->get_where('tbl_course_subcategory2', array( 'id' =>$id ) )->row_array();

   }
    
    function getexamcertiById($id){
  
        $this->db->select('tbl_examcerti.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name,tbl_course_subcategory2.subcat2_name')
        ->from('tbl_examcerti')
        ->join('tbl_course_category','tbl_course_category.id = tbl_examcerti.cat_id') 
        ->join('tbl_course_subcategory','tbl_course_subcategory.id = tbl_examcerti.subcat_id') 
        ->join('tbl_course_subcategory2','tbl_course_subcategory2.id = tbl_examcerti.subcat2_id') 
        ->where('tbl_examcerti.id=',$id)
        ->where('tbl_examcerti.status=','Active');
         $res = $this->db->get();
        return $res->row_array();

   }

   
      function getAllCat(){
  
        
        return $this->db->get_where('tbl_course_category',array('status'=>'Active'))->result_array();

   }

       function getAllsub(){
  
        
        return $this->db->get_where('tbl_course_subcategory',array('status'=>'Active'))->result_array();

   }

     function getAllsub2(){
  
        
        return $this->db->get_where('tbl_course_subcategory2',array('status'=>'Active'))->result_array();

   }



   public function examcerti_data() {        

        $this->load->library('datatable');  
    
        $SQL =  "SELECT tbl_examcerti.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name,tbl_course_subcategory2.subcat2_name FROM ((tbl_examcerti  JOIN tbl_course_category ON tbl_examcerti.cat_id=tbl_course_category.id)  JOIN tbl_course_subcategory ON tbl_examcerti.subcat_id=tbl_course_subcategory.id) JOIN tbl_course_subcategory2 ON tbl_examcerti.subcat2_id=tbl_course_subcategory2.id WHERE tbl_examcerti.status='Active' AND tbl_course_category.status='Active'";    
        return $this->datatable->LoadJsona($SQL);
        
    }
   public function subcat_data($id) {       

        return $this->db->get_where('tbl_course_subcategory',array('cat_id'=>$id))->result_array();
        
        
    }
   
public function subcat2_data($id) {       

        return $this->db->get_where('tbl_course_subcategory2',array('subcat_id'=>$id))->result_array();
        
        
    }


}


    
    

?>