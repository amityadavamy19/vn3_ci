<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Training_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Abhishek
 * @version : 1.1
 * @since : 15 November 2016
 */
class Coupon_model extends CI_Model
{



  function insertcoupons($forminput)
  {
    $this->db->insert("tbl_campain", $forminput);
  }







  function getUser($userid)
  {
    $this->db->where('id', $userid);
    return $user = $this->db->get('tbl_campain')->row_array();
  }





  function updatecoupons($id, $formArray)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_campain', $formArray);
  }

  function deletecoupon($sId, $sliderInfo)
  {
    $this->db->where('id', $sId);
    $this->db->update('tbl_campain', $sliderInfo);

    return $this->db->affected_rows();
  }


  function getcouponsById($id)
  {

    return $this->db->get_where('tbl_campain', array('id' => $id))->row_array();
  }



  public function coupons_data()
  {

    $this->load->library('datatable');

    $SQL = "SELECT * FROM tbl_campain WHERE tbl_campain.isDeleted = 0";
    return $this->datatable->LoadJsona($SQL);
  }
}
