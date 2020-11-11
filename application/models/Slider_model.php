<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Slider_model (Slider Model)
 * Slider model class to get to handle Slider related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Slider_model extends CI_Model
{

	 public function sliderListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id,BaseTbl.title,BaseTbl.image,BaseTbl.description,BaseTbl.status,BaseTbl.date_modified');
        $this->db->from('tbl_sliders as BaseTbl');
      
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.image  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
      
        $this->db->where('BaseTbl.status =', 'Active');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
	
	
     public function insertslider($forminput)  
	 {
        $this->db->insert("tbl_sliders",$forminput);
     }

	
  


    
   public function updateslider($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('tbl_sliders',$formArray);


   }

  public function deleteSlider($sId, $sliderInfo)
    {
        $this->db->where('id', $sId);
        $this->db->update('tbl_sliders', $sliderInfo);
        
        return $this->db->affected_rows();
    }
	
   
    public function getSliderBYId($id){
  
		
		return $this->db->get_where('tbl_sliders', array( 'id' =>$id ) )->row_array();

   }
   
   public function slider_data() {		

        $this->load->library('datatable');	
	
		$SQL ="SELECT * FROM tbl_sliders WHERE tbl_sliders.status = 'Active'";			
		return $this->datatable->LoadJsona($SQL);
		
	}
  
   



}


    
    

?>