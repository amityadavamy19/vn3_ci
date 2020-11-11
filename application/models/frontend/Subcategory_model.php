<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Subcategory_model extends CI_Model
{

	function getProByUrl($url,$cat)
    {
        $subcat_id = $this->db->get_where('tbl_course_subcategory', array('url'=>$url))->row_array()['id'];
		$cat_id = $this->db->get_where('tbl_course_category', array('url'=>$cat))->row_array()['id'];
		
		$this->db->select('*');
        $this->db->from('tbl_products');
      
        $this->db->where('subcat_id =',$subcat_id);
		$this->db->where('cat_id =',$cat_id);
			$this->db->where('status =','Active');
        $query = $this->db->get();
        
        return $query->result();
    }
	function getContact()
    {
        
        $query = $this->db->get('tbl_contact');
        
        return $query->row_array();
    }
   
	function getproductssById($id)
  {
    $this->db->select('id,p_id,images');
    $this->db->from('tbl_products_img');
    $this->db->where('p_id=', $id);
    $this->db->where('status=', 'Active');
    $query = $this->db->get();

    return $query->result_array();
  }
 
function getScatByUrl($url)
    {
        $cat_id = $this->db->get_where('tbl_course_category', array('url'=>$url))->row_array()['id'];
		
		$this->db->select('*');
        $this->db->from('tbl_course_subcategory');
      
        $this->db->where('cat_id =',$cat_id);
        $query = $this->db->get();
        
        return $query->result();
    }




}
