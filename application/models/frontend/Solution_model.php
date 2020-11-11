<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Solution_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */

    function getAllAbout()
    {
        $query = $this->db->get('tbl_about');

        return $query->row_array();
    }
    function getAllContact()
    {
        $query = $this->db->get('tbl_contact');

        return $query->row_array();
    }

    function submitContact($data)
    {
        $this->db->insert('tbl_contact_query', $data);


        return TRUE;
    }

    function getproduct()
    {

        $query = $this->db->get('tbl_course_category');

        return $query->result();
    }

    function messagedata($forminput)
    {
        $this->db->insert("tbl_contact_query", $forminput);
        return TRUE;
    }
      function getAllContacts()
    {
        $query = $this->db->get('tbl_home_page');

        return $query->row_array();
    }

}
