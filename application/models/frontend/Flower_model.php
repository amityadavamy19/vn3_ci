<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Flower_model (Flower Model)
 * Flower model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019
 */
class Flower_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
    function flowerAllItems()
	{
		$this->db->select('tbl_fcategory.id, tbl_flower.image,tbl_flower.title, tbl_fcategory.fcatname')
		     ->from('tbl_fcategory')
			 ->join('tbl_flower', 'tbl_fcategory.id = tbl_flower.cat_id')
			 ->where('tbl_flower.status=','Active')
			 ->where('tbl_flower.isDeleted=',0);
			 
			 $allgallery = $this->db->get();
		
		
		
       // $allgallery = $this->db->get_where('tbl_gallery', array( 'status'=>'Active', 'isDeleted'=> 0)); 
        return $allgallery->result();
    }
	
	
	
	function flowerCategory()
    {
       
        $query = $this->db->get_where('tbl_fcategory', array( 'status'=>'Active')); 
        return $query->result();
    }
    
   

}

  