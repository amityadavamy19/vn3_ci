<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : About_model (About Model)
 * About model class to get to handle About
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class About_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
    function getAbout()
    {
        $this->db->select('id,title,description');
        $this->db->from('tbl_about');
        $this->db->where('id', 1);
        $query = $this->db->get();
        
        return $query->row();
    }
	
	
	 function editAbout($aboutInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_about', $aboutInfo);
        
        return TRUE;
    }
    

}

  