<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Partners_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */

    function getAllContact()
    {
        $query = $this->db->get('tbl_contact');

        return $query->row_array();
    }

    function submitContact($data)
    {
        $this->db->insert('tbl_partners', $data);


        return TRUE;
    }
    function getproduct()
    {

        $query = $this->db->get('tbl_course_category');

        return $query->result();
    }
    function getContact()
    {

        $query = $this->db->get('tbl_contact');

        return $query->row_array();
    }


    function messagedata($forminput)
    {
        $this->db->insert("tbl_partners", $forminput);
        return TRUE;
    }
}
