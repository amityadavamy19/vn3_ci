<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Training_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Abhishek
 * @version : 1.1
 * @since : 15 November 2016
 */
class benefits_model extends CI_Model
{



  function insertbenifits($forminput)
  {
    $this->db->insert("tbl_benefits", $forminput);
    return $this->db->insert_id();
  }

  function insert($data = array())
  {
    $insert = $this->db->insert_batch('tbl_benefit_img', $data);
    return $insert ? true : false;
  }

  function delete_img($tab,$col,$id)
  {
     $this->db->where($col, $id);
     $this->db->set('isDeleted', 1);
     $this->db->set('status', "Inactive");
     $this->db->update($tab);
  }



  function getcategory()
  {
    $this->db->select('id, cat_name');
    $this->db->from('tbl_course_category');
    $this->db->where('status', 'Active');

    $query = $this->db->get();

    return $query->result();
  }

  function getsubcategory()
  {
    $this->db->select('id, subcat_name');
    $this->db->from('tbl_course_subcategory');
    $this->db->where('status', 'Active');

    $query = $this->db->get();

    return $query->result();
  }
  function getsubcategory2()
  {
    $this->db->select('id, subcat_name');
    $this->db->from('tbl_course_subcategory2');
    $this->db->where('status', 'Active');

    $query = $this->db->get();

    return $query->result();
  }






  function getUser($userid)
  {
    $this->db->where('id', $userid);
    return $user = $this->db->get('tbl_training_options')->row_array();
  }

  function updatebenefits($id, $formArray)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_benefits', $formArray);
  }


  function updatess($data, $b_id)
  {
    $this->db->update($this->tbl_benefit_img, $data, array('b_id' => $b_id));
  }


  function deletetraining($sId, $sliderInfo)
  {
    $this->db->where('id', $sId);
    $this->db->update('tbl_training_options', $sliderInfo);

    return $this->db->affected_rows();
  }


  function getsubcatbyId($id)
  {


    return $this->db->get_where('tbl_course_subcategory', array('id' => $id))->row_array();
  }

  function getsubcat2byId($id)
  {


    return $this->db->get_where('tbl_course_subcategory2', array('id' => $id))->row_array();
  }

  function getbenefitsById($id)
  {

    $this->db->select('tbl_benefits.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name,tbl_course_subcategory2.subcat2_name,tbl_benefit_img.c_image,tbl_benefit_img.id as img_id,tbl_designation.*')
      ->from('tbl_benefits')
      ->join('tbl_course_category', 'tbl_course_category.id = tbl_benefits.cat_id')
      ->join('tbl_course_subcategory', 'tbl_course_subcategory.id = tbl_benefits.subcat_id')
      ->join('tbl_course_subcategory2', 'tbl_course_subcategory2.id = tbl_benefits.subcat2_id')
      ->join('tbl_designation', 'tbl_designation.id = tbl_benefits.designation_id')
      ->join(' tbl_benefit_img', ' tbl_benefit_img.b_id = tbl_benefits.id')
      ->where('tbl_benefits.id=', $id)
      ->where('tbl_benefits.status=', 'Active')
       ->where('tbl_benefit_img.status=', 'Active');
    $res = $this->db->get();
    return $res->result_array();
  }


  function getAllCat()
  {
    return $this->db->get_where('tbl_course_category', array('status' => 'Active'))->result_array();
  }

  function getAllsub()
  {
    return $this->db->get_where('tbl_course_subcategory', array('status' => 'Active'))->result_array();
  }

  function getAllsub2()
  {

    return $this->db->get_where('tbl_course_subcategory2', array('status' => 'Active'))->result_array();
  }


  function designation()
  {
    return $this->db->get('tbl_designation')->result_array();
  }





  function benefits_data()
  {

    $this->load->library('datatable');

    $SQL =  "SELECT tbl_benefits.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name,tbl_course_subcategory2.subcat2_name,tbl_designation.designation FROM (( tbl_benefits  
    JOIN tbl_course_category ON tbl_benefits.cat_id=tbl_course_category.id)  
    JOIN tbl_course_subcategory ON tbl_benefits.subcat_id=tbl_course_subcategory.id
    JOIN tbl_course_subcategory2 ON tbl_benefits.subcat2_id=tbl_course_subcategory2.id
    JOIN tbl_designation ON tbl_benefits.designation_id=tbl_designation.id)
  
     WHERE tbl_benefits.status='Active' AND tbl_course_category.status='Active'";
    return $this->datatable->LoadJsona($SQL);
  }
  function subcat_data($id)
  {

    return $this->db->get_where('tbl_course_subcategory', array('cat_id' => $id))->result_array();
  }

  function subcat2_data($id)
  {

    return $this->db->get_where('tbl_course_subcategory2', array('subcat_id' => $id))->result_array();
  }


  function subcat3_data()
  {

    $this->db->select('id, 	designation');
    $this->db->from(' tbl_designation');


    $query = $this->db->get();

    return $query->result();
  }
}
