<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Gallery_model (Gallery Model)
 * User model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019
 */
class Gallery_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
    function galleryAllItems()
	{
		$this->db->select('tbl_gcategory.id, tbl_gallery.image, tbl_gcategory.name')
		     ->from('tbl_gcategory')
			 ->join('tbl_gallery', 'tbl_gcategory.id = tbl_gallery.cat_id')
			 ->where('tbl_gallery.status=','Active')
			 ->where('tbl_gallery.isDeleted=',0);
			 
			 $allgallery = $this->db->get();
		
		
		
       // $allgallery = $this->db->get_where('tbl_gallery', array( 'status'=>'Active', 'isDeleted'=> 0)); 
        return $allgallery->result();
    }
	
	
	
	function galleryCategory()
    {
       
        $query = $this->db->get_where('tbl_gcategory', array( 'status'=>'Active')); 
        return $query->result();
    }
    
   

}

  