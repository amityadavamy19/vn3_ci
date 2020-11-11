<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Course_subcategory2 extends BaseController{
       public function __construct()
    {
        parent::__construct();
        $this->load->model('coursesubcat2_model');
     
        $this->isLoggedIn();  
        $this->load->helper('url', 'form');
      
    }
    

  function index(){

    $this->load->model("coursesubcat2_model");
    $data["fetch_data"]= $this->coursesubcat2_model->subcategory2Listing();
	
	 //$this->addTestimonials();       
    }

 


  public function viewsubcategory2(){
     
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
           $searchText = $this->security->xss_clean($this->input->post('searchText'));
           $data['searchText'] = $searchText;
		   
		   $this->load->library('pagination');
		   
		   $count = $this->coursesubcat2_model->subcategory2ListingCount($searchText);
		   
            $returns = $this->paginationCompress ( "admin/viewsubcategory2/", $count, 10 );
			
			   $data['galleryRecords'] = $this->coursesubcat2_model->galleryListing($searchText, $returns["page"], $returns["segment"]);
			
            
           
            $this->global['pageTitle'] = 'fiesttech :sub category';

            
            $this->loadViews("admin/course_subcategory2/viewsubcategory2", $this->global, $data, NULL);
        }
  }



  public function addsubcategory2()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else

        {
            

          $data['roles'] = $this->coursesubcat2_model->getcategory();
          $data['role'] = $this->coursesubcat2_model->getsubcategory();
            
            $this->global['pageTitle'] = 'fiesttech :sub category';

            $this->loadViews("admin/course_subcategory2/addsubcategory2", $this->global, $data, NULL);

        
          if(  $this->input->post('submit')!==NULL)
          {

            if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/coursesubcat2/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];                  
                    $this->load->library('upload', $config);                    
                                    
                    if ( !$this->upload->do_upload('timage'))
                    {
                        $this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('admin/Course_subcategory2/viewsubcategory2');
                        
                    }
                    else
                    {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                        
                    }
                }


            $forminput = array(

              
             "image" =>  $image,
             "subcat_id"=>$this->input->post('subcatid'),  
             "description"=>$this->input->post('description'),  
             "cat_id"=>$this->input->post('role'),  
             "subcat2_name"=>  $this->input->post('cat_name'),  
             "url" => $this->make_slug($this->input->post('cat_name')),
             "status" => 'Active',
             "date_created"=>date('Y-m-d H:i:s'),
             "date_modified"=>date('Y-m-d H:i:s')
              );  
             
            
             $this->coursesubcat2_model->insertsubcategory2($forminput);
             $this->session->set_flashdata('success','record added successfully');
             redirect(base_url().'admin/course_subcategory2/viewsubcategory2');    
          } 
        }  
    }



  public function editsubcategory2(){

    if($this->isAdmin() == TRUE)
      {
        $this->loadThis();
      }
   else{ 
       $this->global['pageTitle'] = 'Fiesttech : Category';
       $id = $this->uri->segment(4);
       $data['sub2cat_data'] = $this->coursesubcat2_model->getSubCat2ById($id); 
       $data['cat_data'] = $this->coursesubcat2_model->getAllCat();
       $data['subcat_data'] = $this->coursesubcat2_model->getAllsub();
       
          $this->loadViews("admin/course_subcategory2/editsubcategory2", $this->global, $data, NULL);

       if( $this->input->post('submit')!==NULL)

    {
        $id = $this->input->post('id');
        $formArray = array();
       
        $formArray['cat_id']=$this->input->post('role');
        $formArray['subcat_id']=$this->input->post('subcatid'); 
        $formArray['description']=$this->input->post('description'); 
            
        $formArray['subcat2_name']= $this->input->post('subcat2_name');        
        $formArray['url']= $this->make_slug($this->input->post('subcat2_name'));               
        $formArray['date_modified']= date('Y-m-d H:i:s');

         if (!empty($_FILES["timage"]['name'])) {
                    $config = array(
                        'upload_path' => "./uploads/coursesubcat2/",
                        'allowed_types' => "jpg|PNG|png|gif|jpeg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
                    );
                    $config['file_name'] = $_FILES["timage"]['name'];                  
                    $this->load->library('upload', $config);                    
                                    
                    if ( !$this->upload->do_upload('timage'))
                    {
                        $this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('admin/course_subcategory2/addsubcategory2');
                        
                    }
                    else
                    {
                        $file_data = array('upload_data' => $this->upload->data());
                        $image = $_FILES["timage"]['name'];
                        
                    }
                }else{
                    
                    $image = $this->db->get_where('tbl_course_subcategory2', array('id'=>$id))->row_array()['image'];
                }
        
        
        
        
        $formArray['image']= $image;
        
        
        
        
        
        
        
            $this->coursesubcat2_model->updatesubcategory2($id,$formArray);
            $this->session->set_flashdata('success','record updated successfully');
            redirect(base_url().'admin/course_subcategory2/viewsubcategory2');
      }
     }
  }

  public function deletesubcategory2(){
     
           if($this->isAdmin() == TRUE)
             {
               echo(json_encode(array('status'=>'access')));
             }
             else
              {
               $sId = $this->input->post('sid');
                $userInfo = array('isDeleted'=>1, 'date_modified'=>date('Y-m-d H:i:s'),'status'=>'Inactive');
            
                $result = $this->coursesubcat2_model->deletesubcategory2($sId, $userInfo);
            
               if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
                else { echo(json_encode(array('status'=>FALSE))); }
                }
        }

     public function subcatdata()
        {
			
			$catid=$this->input->post('catid');
            $res = $this->coursesubcat2_model->subcat_data($catid);
			
			echo "<option>--select--</option>";
			foreach($res as $r)
			{
				 echo "<option value='".$r['id']."'> ".$r['subcat_name']."</option>";
			}
			
           

 
		}





 public function datatable_json(){ 
   $records = $this->coursesubcat2_model->subcategory2_data();
   $data = array();    
   foreach ($records['data']  as $row) 
     {  
        $image = '<img src="'.base_url().'uploads/coursesubcat2/'.$row['image'].'" width="100" height="80">';    
        $data[]= array(

         $username = $row['cat_name'],
        $row['subcat_name'],
          $row['subcat2_name'],
           $image,
         $row['date_created'],
         $row['date_modified'],
         $row['status'],
    
         '<a title="Edit/View" class="update btn btn-primary" href="'.base_url().'admin/course_subcategory2/editsubcategory2/'.$row['id'].'"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deletecategory" href="#" data-sid="'. $row['id'].'" title="Delete"><i class="fa fa-trash"></i></a>',             
        );
       }
    
      $records['data']=$data;
      echo json_encode($records);               
  }


 private function make_slug($string)
        {
            $lower_case_string = strtolower($string);
            $string1 = preg_replace('/[^a-zA-Z0-9 ]/s', '', $lower_case_string);
            return strtolower(preg_replace('/\s+/', '-', $string1));        
        }

}
