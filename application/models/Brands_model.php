<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Brands_model (User Model)

 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class brands_model extends CI_Model
{
     function insertbrands($forminput)  {
        $this->db->insert("tbl_brands",$forminput);
    }


  
    function getUser($userid){
        $this->db->where('id',$userid);
        return $user = $this->db->get('tbl_sliders')->row_array();
    }




    
   function updatebrands($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_brands',$formArray);


   }


 function deletebrands($bId, $userInfo)
    {
        $this->db->where('id', $bId);
        $this->db->update('tbl_brands', $userInfo);
        
        return $this->db->affected_rows();
    }
    
   
    function getbrandsbyId($id){
  
        
        return $this->db->get_where('tbl_brands', array( 'id' =>$id ) )->row_array();

   }
   
   public function brands_data() {       

        $this->load->library('datatable');  
    
        $SQL ="SELECT * FROM tbl_brands WHERE tbl_brands.status = 'Active'";          
        return $this->datatable->LoadJsona($SQL);
        
    }
  
}


?>