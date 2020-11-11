<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Examcerti extends BaseController{
       public function __construct()
    {
        parent::__construct();
        $this->load->model('examcerti_model');
     
        $this->isLoggedIn();  
        $this->load->helper('url', 'form');
      
    }
    

  function index(){

    $this->load->model("examcerti_model");
    $data["fetch_data"]= $this->examcerti_model->examcertiListing();
	
	 //$this->addTestimonials();       
    }

 


  public function viewexamcerti(){
     
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        

            $this->global['pageTitle'] = 'vn24 : Exam & Certification';

            
            $this->loadViews("admin/exams_certification/viewexamcerti", $this->global, NULL, NULL);
        }
  }



  public function addexamcerti()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else

        {
          $data['roles'] = $this->examcerti_model->getcategory();
        //  $data['role'] = $this->training_model->getsubcategory();
            
          //    $data['rol'] = $this->training_model->getsubcategory2();

         
            
            $this->global['pageTitle'] = 'vn24 : Exam and Certification';

            $this->loadViews("admin/exams_certification/addexamcerti", $this->global, $data, NULL);

        
          if(  $this->input->post('submit')!==NULL)
          {


            $forminput = array(

             "cat_id"=>$this->input->post('role'),  
             "subcat_id"=>  $this->input->post('subcatid'), 
             "subcat2_id"=>  $this->input->post('subcatid2'), 
             "certi_name"=>  $this->input->post('certi_name'), 
              "work_exp" => $this->input->post('work_exp'),
             "guide_edu"=>  $this->input->post('guide_edu'), 
             "status" => 'Active',
             "date_created"=>date('Y-m-d H:i:s'),
             "date_updated"=>date('Y-m-d H:i:s')
              );  
             
            // print_r($forminput);
            $this->examcerti_model->insertexamcerti($forminput);
            $this->session->set_flashdata('success','record added successfully');
             redirect(base_url().'admin/examcerti/viewexamcerti');    
          } 
        }  
    }



  public function editexamcerti(){


      $id = $this->uri->segment(4);
    //echo $id;
     // exit;
    if($this->isAdmin() == TRUE)
      {
        $this->loadThis();
      }
   else{ 
       $this->global['pageTitle'] = 'vn24 : Exam & Certification';
     $data['examcerti_data'] = $this->examcerti_model->getexamcertiById($id); 
      $data['cat_data'] = $this->examcerti_model->getAllCat();
       $data['subcat_data'] = $this->examcerti_model->getAllsub();
        $data['subcat2_data'] = $this->examcerti_model->getAllsub2();
       
       
          $this->loadViews("admin/exams_certification/editexamcerti", $this->global, $data, NULL);
        }

       if( $this->input->post('submit')!==NULL)

    {
         
       
        $formArray = array();
       
        $formArray['cat_id']=$this->input->post('role');
        $formArray['subcat_id']= $this->input->post('subcatid'); 
        $formArray['subcat2_id']= $this->input->post('subcatid2'); 
        $formArray['certi_name']= $this->input->post('certi_name'); 
        $formArray['work_exp']= $this->input->post('work_exp'); 
        $formArray['guide_edu']= $this->input->post('guide_edu');                      
        $formArray['date_updated']= date('Y-m-d H:i:s');
        
          
       $this->examcerti_model->updateexamcerti($this->input->post('id'),$formArray);
        $this->session->set_flashdata('success','record updated successfully');
           redirect(base_url().'admin/examcerti/viewexamcerti');
      }
     
  }

  public function deleteexamcerti(){
     
           if($this->isAdmin() == TRUE)
             {
               echo(json_encode(array('status'=>'access')));
             }
             else
              {
               $eId = $this->input->post('eid');
                $userInfo = array('isDeleted'=>1, 'date_updated'=>date('Y-m-d H:i:s'),'status'=>'Inactive');
            
                $result = $this->examcerti_model->deleteexamcerti($eId, $userInfo);
            
               if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
                else { echo(json_encode(array('status'=>FALSE))); }
                }
        }




     public function subcatdata()
        {
      
      $catid=$this->input->post('catid');
            $res = $this->examcerti_model->subcat_data($catid);
      
      echo "<option>--select--</option>";
      foreach($res as $r)
      {
         echo "<option value='".$r['id']."'> ".$r['subcat_name']."</option>";
      }
      
           

 
    }



     public function subcatdata2()
        {
      
      $subcatid=$this->input->post('subcatid');
            $rese = $this->examcerti_model->subcat2_data($subcatid);
      
      echo "<option>--select--</option>";
      foreach($rese as $re)
      {
         echo "<option value='".$re['id']."'> ".$re['subcat2_name']."</option>";
      }
      
           

 
    }


 public function datatable_json(){ 
   $records = $this->examcerti_model->examcerti_data();


  
   $data = array();    
   foreach ($records['data']  as $row) 
     {  
           
        $data[]= array(

         $username = $row['cat_name'],
        $row['subcat_name'],
        $row['subcat2_name'],
        $row['certi_name'],
        $row['work_exp'],
     
         $row['guide_edu'],
         $row['date_created'], 
         $row['date_updated'],
         $row['status'],
    
         '<a title="Edit/View" class="update btn btn-primary" href="'.base_url().'admin/examcerti/editexamcerti/'.$row['id'].'"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteexamcerti" href="#" data-eid="'. $row['id'].'" title="Delete"><i class="fa fa-trash"></i></a>',             
        );
       }
    
      $records['data']=$data;
      echo json_encode($records);           
  }




}


?>