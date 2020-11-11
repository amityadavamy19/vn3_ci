<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Course_model (Course Model)
 * Course model class to get to handle Course related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019
 */
class Course_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
    function courseListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id,BaseTbl.name,BaseTbl.description,BaseTbl.image,BaseTbl.date,BaseTbl.status');
        $this->db->from('tbl_gallery as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.image  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
      
        $this->db->where('BaseTbl.status =', 'Active');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function courseListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id,BaseTbl.name,BaseTbl.description,BaseTbl.image,BaseTbl.date,BaseTbl.status');
        $this->db->from('tbl_gallery as BaseTbl');
		
      if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.image  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.status =', 'Active');
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getCourseCat()
    {
        $this->db->select('*');
        $this->db->from('tbl_course_category');
        $this->db->where('status =', 'Active');
        $query = $this->db->get();
        
        return $query->result();
    }

  function getCourseSubCat($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_course_subcategory');
        $this->db->where('status =', 'Active');
        $this->db->where('id =', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
	 function getCourseSub2Cat()
    {
        $this->db->select('*');
        $this->db->from('tbl_course_subcategory2');
        $this->db->where('status =', 'Active');
        $query = $this->db->get();
        
        return $query->result();
    }
   
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCourse($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_courses', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
   
    
    
    /**
     * This function is used to update the gallery information
     *
     * 
     */
    function editCourse($courseInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_courses', $courseInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCourse($cId, $courseInfo)
    {
        $this->db->where('id', $cId);
        $this->db->update('tbl_courses', $courseInfo);
        
        return $this->db->affected_rows();
    }
	
	


    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getCourseById($cId)
    {
        $this->db->select('*');
        $this->db->from('tbl_courses');
        $this->db->where('isDeleted', 0);
		$this->db->where('status', 'Active');
        $this->db->where('id', $cId);
        $query = $this->db->get();
        
        return $query->row();
    }

 
	
	
	public function course_data() {		

        $this->load->library('datatable');	
	
		$SQL ="SELECT c_icon_image,c_title,id,status,date_created FROM tbl_courses WHERE tbl_courses.status = 'Active'";			
		return $this->datatable->LoadJsona($SQL);
		
	}
    public function coursesubcateById($id) {		

        return $this->db->get_where('tbl_course_subcategory',array('cat_id'=>$id))->result_array();
		
		
	}

    public function coursesubcate2ById($id) {		

        return $this->db->get_where('tbl_course_subcategory2',array('subcat_id'=>$id))->result_array();
		
		
	}






}

  