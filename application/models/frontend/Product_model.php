<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Testimonial_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Product_model extends CI_Model
{

	function getProByUrl($url)
    {
       
		
		$this->db->select('*');
        $this->db->from('tbl_products');
      
        $this->db->where('url =',$url);
		   $this->db->where('status=', 'Active');
        $query = $this->db->get();
        
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
  function getAllImg($url)
    {
       
		$img_id = $this->db->get_where( 'tbl_products', array( 'url'=> $url) )->row_array()['id'];
		$this->db->select('*');
        $this->db->from('tbl_products_img');
      
        $this->db->where('p_id =',$img_id);
         $this->db->where('status =','Active');
        $query = $this->db->get();
        
        return $query->result();
    }
	 function messagedata($forminput)
    {
        $this->db->insert("tbl_contact_query", $forminput);
        return TRUE;
    }
	
	function getproduct()
{
        
    	$this->db->select('*')
       ->from(' tbl_course_category')
        
        ->where('status =','Active')
        ->order_by("views","desc");
         $query = $this->db->get();
         return $query->result();
    }
  
  function getContact()
    {
        
        $query = $this->db->get('tbl_contact');
        
        return $query->row_array();
    }
   
  
    function getAllCat()
	{
	 
    	$this->db->select('*')
       ->from(' tbl_course_category')
        
        ->where('status =','Active')
        ->order_by("views","desc");
         $query = $this->db->get();
         return $query->result();
	    
	//	return $result = $this->db->get("tbl_course_category")->result();
       
		
	}




}
