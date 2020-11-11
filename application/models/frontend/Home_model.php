<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Home_model (Home Model)
 * Flower model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019
 */
class Home_model extends CI_Model
{

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */

    function getAllblog()
    {
        $query = $this->db->get('tbl_blogs');

        return $query->result();
        
        
    }
    
        function getAllblogs()
    {
        $query = $this->db->get('tbl_blogs');

        return $query->row_array();
    }
        
    function getAlltest()
    {
        $query = $this->db->get('tbl_testimonials');

        return $query->result();
    }

    function getAllContact()
    {
        $query = $this->db->get('tbl_home_page');

        return $query->row_array();
    }

    function getContact()
    {

        $query = $this->db->get('tbl_contact');

        return $query->row_array();
    }


    function getproduct()
    {

        $query = $this->db->get('tbl_course_category');

        return $query->result();
    }
}
