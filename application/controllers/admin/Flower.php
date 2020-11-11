<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Flower (FlowerController)
 * Flower Class to control all Flower related operations.
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Flower extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('flower_model');
		
		$this->load->helper('form');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen Flower
     */
    public function index()
    {
		
		
		
		
       
    }
    
    /**
     * This function is used to load the Gallery list
     */
    function flowerListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->flower_model->flowerListingCount($searchText);

			$returns = $this->paginationCompress ( "admin/flowerListing/", $count, 10 );
            
            $data['flowerRecords'] = $this->flower_model->flowerListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Birjuflower Store: Flower Listing';
            
            $this->loadViews("admin/flower/listFlower", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   $data['fcat'] = $this->flower_model->getFlowerCat();
            $this->global['pageTitle'] = 'Birjuflower Store: Add New Flower';
            $this->loadViews("admin/flower/addFlower", $this->global, $data, NULL);
        }
    }

   
    
    /**
     * This function is used to add gallery to the system
     */
    function addNewFlower()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            //$this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            //$this->form_validation->set_rules('gimage','Image','trim|required');
            $this->form_validation->set_rules('cat','category','trim|required|numeric');
        
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
				
                $name = $this->input->post('title');
                $catId = $this->input->post('cat');
			
				// upload Image 
                if (!empty($_FILES["fimage"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/flower/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);
                    $config['file_name'] = $_FILES["fimage"]['name'];                  
                    $this->load->library('upload', $config);					
                   					
					if ( !$this->upload->do_upload('fimage'))
					{
						$this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('admin/flower/addNew');
					}
					else
					{
						$file_data = array('upload_data' => $this->upload->data());
						
					}
                } 
                
        
                
                $fInfo = array( 'title'=>$name, 'cat_id'=>$catId,'status'=>'Active','image'=>$file_data['upload_data']['file_name'],'updatedBy'=>1, 'date'=>date('Y-m-d H:i:s'),'date_updated'=>date('Y-m-d H:i:s'));
				
				$data = $this->security->xss_clean($fInfo);
                $result = $this->flower_model->addNewFlower($data);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Flower image inserted successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Flower Insertion failed');
                }
                
                redirect('admin/flower/flowerListing');
            }
        }
    }

    
	
	
	/**
     * This function is used load user edit information
     * @param number Gallery
     */
    function editOld($fId = NULL)
    {
		
            if($fId == null)
            {
                redirect('admin/flower/flowerListing');
            }
            
            $data['fcat'] = $this->flower_model->getFlowerCat();
            $data['allData'] = $this->flower_model->getFlowerById($fId);
            
            $this->global['pageTitle'] = 'Birjuflower Store : Edit Flower';
            
            $this->loadViews("admin/flower/editFlower", $this->global, $data, NULL);
       
    }
    
	
	
	
	
    /**
     * This function is used to edit the user information
     */
    function editFlower()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $fId = $this->input->post('fid');
            
            //$this->form_validation->set_rules('name','Name','trim|required');
            $this->form_validation->set_rules('cat','Category','trim|required|numeric');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($gid);
            }
            else
            {
                $name = $this->input->post('title');
                $catId = $this->input->post('cat');
               
                
				// upload Image 
                if (!empty($_FILES["fimage"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/flower/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
						'overwrite' => TRUE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);
                    $config['file_name'] = $_FILES["fimage"]['name'];                  
                    $this->load->library('upload', $config);					
                   					
					if ( !$this->upload->do_upload('fimage'))
					{
						$this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('admin/flower/addNew');
						
					}
					else
					{
						$file_data = array('upload_data' => $this->upload->data());
						$image = $_FILES["fimage"]['name'];
						
					}
                }else{
					
					$image = $this->db->get_where('tbl_flower', array('id'=>$fId))->row_array()['image'];
				} 
				
				
				$flowerInfo = array( 'title'=> $name, 'cat_id'=>$catId, 'image'=>$image, 'updatedBy'=>1, 'date_updated'=>date('Y-m-d H:i:s'));
				
				$data = $this->security->xss_clean($flowerInfo);
                
                $result = $this->flower_model->editFlower($data, $fId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Flower updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Flower updation failed');
                }
                
                redirect('admin/flowerListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteFlower()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $fId = $this->input->post('fId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>1, 'date_updated'=>date('Y-m-d H:i:s'),'status'=>'Inactive');
            
            $result = $this->flower_model->deleteFlower($fId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Birjuflower : 404 - Page Not Found';
        
        $this->loadViews("admin/404", $this->global, NULL, NULL);
    }

    
	
	public function datatable_json(){			
		$records = $this->flower_model->flower_data();
		$data = array();	
		foreach ($records['data']  as $row) 
		{  
			$image = '<img src="'.base_url().'uploads/flower/'.$row['image'].'" width="100" height="80">';
			$data[]= array(
				$username = $row['title'],
				$image,
				$row['status'],
				$row['date'],
				
				'<a title="Edit/View" class="update btn btn-primary" href="'.base_url().'admin/flower/editOld/'.$row['id'].'"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteFlower" href="#" data-fid="'. $row['id'].'" title="Delete"><i class="fa fa-trash"></i></a>',				
				
				
			);
		}
	/*<a title="Delete" class="delete btn btn-danger" data-href="'.base_url('admin/delete_celebs/'.$row['id']).'" data-toggle="modal" data-target="#deletemodal"> <i class="fa fa-trash-o"></i></a> */
		$records['data']=$data;
		echo json_encode($records);			
		
	}



   

   
}

?>