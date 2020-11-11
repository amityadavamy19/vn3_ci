<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Checkout_model (Checkout Model)
 * Checkout model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Checkout_model extends CI_Model
{
   
    
   
   
   public function getTrainOpt($id)
    {
   
             return $this->db->get_where('tbl_training_options',array('id'=> $id))->row_array();
        
    }
    
    public function getLogo()
    {
   
             return $this->db->get_where('tbl_contact',array('id'=> 1))->row_array()['logo'];
        
    }
  
    
  public function getCourse($cat_id,$subcat_id,$subcat2_id)
    {
   
             return $this->db->get_where('tbl_courses',array('cat_id'=> $cat_id, 'subcat_id'=>$subcat_id,'subcat2_id'=>$subcat2_id))->row_array();
        
    }
  
    
   
   
}

  