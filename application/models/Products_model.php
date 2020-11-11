<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Training_model (User Model)
 * Testimonial model class to get to handle Testimonial related data 
 * @author : Abhishek
 * @version : 1.1
 * @since : 15 November 2016
 */
class Products_model extends CI_Model
{



  function insertproducts($forminput)
  {
    $this->db->insert("tbl_products", $forminput);
    return $this->db->insert_id();
  }

  function insert($data = array())
  {
    $insert = $this->db->insert_batch('tbl_products_img', $data);
    return $insert ? true : false;
  }

  function delete_img($tab, $col, $id)
  {
    $this->db->where($col, $id);
    $this->db->set('isDeleted', 1);
    $this->db->set('status', "Inactive");
    $this->db->update($tab);
  }



  function updateproducts($id, $formArray)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_products', $formArray);
  }


  function updatess($data)
  {
    foreach ($data as $d) {
      $this->db->insert("tbl_products_img", $d);
    }
  }


  function deleteproducts($sId, $userInfo)
  {
    $this->db->where('id', $sId);
    $this->db->update('tbl_products', $userInfo);

    return $this->db->affected_rows();
  }

  function getproductsById($id)
  {

    /*$this->db->select('tbl_products.*,tbl_products_img.images,tbl_products_img.id as img_id')
      ->from('tbl_products')
      ->join('tbl_products_img', ' tbl_products_img.p_id = tbl_products.id')
      ->where('tbl_products.id=', $id)
      ->where('tbl_products.status=', 'Active')
      ->where('tbl_products_img.status=', 'Active');
    $res = $this->db->get();
    return $res->result_array();*/
    $this->db->select('tbl_products.*,tbl_course_category.cat_name,tbl_course_subcategory.subcat_name')
      ->from('tbl_products')
      ->join('tbl_course_category', 'tbl_course_category.id = tbl_products.cat_id')
      ->join('tbl_course_subcategory', 'tbl_course_subcategory.id = tbl_products.subcat_id')
      ->where('tbl_products.id=', $id)
      ->where('tbl_products.status=', 'Active');
    $query = $this->db->get();

    return $query->row_array();
  }

  function getAllCat()
  {


    return $this->db->get_where('tbl_course_category', array('status' => 'Active'))->result_array();
  }

  function getAllsub()
  {


    return $this->db->get_where('tbl_course_subcategory', array('status' => 'Active'))->result_array();
  }
  function getproductssById($id)
  {
    $this->db->select('id,p_id,productimages');
    $this->db->from('tbl_products_img');
    $this->db->where('p_id=', $id);
    $this->db->where('status=', 'Active');
    $query = $this->db->get();

    return $query->result_array();
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

  function products_data()
  {

    $this->load->library('datatable');

    $SQL =  "SELECT tbl_course_category.*,tbl_course_subcategory.*,tbl_products.* FROM ((tbl_products  JOIN tbl_course_category ON tbl_products.cat_id=tbl_course_category.id)  JOIN tbl_course_subcategory ON tbl_products.subcat_id=tbl_course_subcategory.id) WHERE tbl_products.status='Active' AND tbl_course_category.status='Active'";
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
