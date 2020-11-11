<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Service_model (Service Model)
 * Service model class to get to handle user related data 
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Service_model extends CI_Model
{
    /**
     * This function is used to get the Service listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */ 
	 
    function serviceListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id,BaseTbl.title,BaseTbl.description,BaseTbl.image,BaseTbl.date,BaseTbl.status');
        $this->db->from('tbl_services as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(OR  BaseTbl.name  LIKE '%".$searchText."%'
                           OR  BaseTbl.description  LIKE '%".$searchText."%')";
          //  $this->db->where($likeCriteria);
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
    function serviceListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id,BaseTbl.title,BaseTbl.description,BaseTbl.image,BaseTbl.date,BaseTbl.status');
        $this->db->from('tbl_services as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(OR  BaseTbl.name  LIKE '%".$searchText."%'
                              OR  BaseTbl.description  LIKE '%".$searchText."%')";
           // $this->db->where($likeCriteria);
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
    function getServiceCat()
    {
        $this->db->select('id, scatname');
        $this->db->from('tbl_scategory');
        $this->db->where('status =', 'Active');
        $query = $this->db->get();
        
        return $query->result();
    }

   
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewService($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_services', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
  
    
    
    /**
     * This function is used to update the gallery information
     *
     * 
     */
    function editService($serviceInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_services', $serviceInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteFlower($sId, $serInfo)
    {
        $this->db->where('id', $sId);
        $this->db->update('tbl_services', $serInfo);
        
        return $this->db->affected_rows();
    }
	
	



  
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getServiceById($sId)
    {
        $this->db->select('id, description,image, cat_id');
        $this->db->from('tbl_services');
        $this->db->where('isDeleted', 0);
		$this->db->where('status', 'Active');
        $this->db->where('id', $sId);
        $query = $this->db->get();
        
        return $query->row();
    }

   
}

  