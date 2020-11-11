<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : About_model (Home Model)
 * Home model class to get to handle Home
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Home_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */

    function getHome()
    {
        $this->db->select('*');
        $this->db->from('tbl_home_page');
        $this->db->where('id', 1);
        $query = $this->db->get();

        return $query->row();
    }


    function editHome($homeInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_home_page', $homeInfo);

        return TRUE;
    }
}
