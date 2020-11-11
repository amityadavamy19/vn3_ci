<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Contact_model (Contact Model)
 * Contact model class to get to handle Contact
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Contact_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */

    function getContact()
    {
        $this->db->select('id,address,about_title,logo,phone,demoform,form,mobile,email,facebook,twitter,instagram,skype,youtube,liner');
        $this->db->from('tbl_contact');
        $this->db->where('id', 1);
        $query = $this->db->get();

        return $query->row();
    }


    function editContact($contactInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_contact', $contactInfo);

        return TRUE;
    }
}
