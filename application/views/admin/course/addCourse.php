<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Course Management
        <small>Add / Course</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Course Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				     $attributes = array('id' => 'addCourse','method' => 'post','class' => 'form_horizontal');
				?>
				<?php echo form_open_multipart('admin/course/addNewCourse', $attributes); ?>
                   
                        <div class="box-body">
						
						 <div class="row">
                               <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="c_cate">Category</label>
                                        <select class="form-control required" id="c_cate" name="c_cate" onchange="return subcategory(this.value)">
                                            <option>--Select--</option>
                                            <?php
                                            if(!empty($c_cat))
                                            {
                                                foreach ($c_cat as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>"><?php echo $cat->cat_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
								
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="c_subcate">SubCategory Category</label>
                                        <select class="form-control required" id="c_subcate" name="c_subcate" onchange="return subcategory2(this.value)">
                                            <option>--Select--</option>
                                           
                                        </select>
                                    </div>
                                </div>
								
								
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">SubCategory2 Category</label>
                                        <select class="form-control required" id="c_subcate2" name="c_subcate2">
                                            
                                        </select>
                                    </div>
                                </div>
                              </div> 
								
							
							
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="c_title">Course Title</label>
                                        <input type="text" class="form-control required"  id="c_title" name="c_title" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_icon_image">Course IconImage</label>
                                        <input type="file" class="form-control" id="c_icon_image"  name="c_icon_image">
                                    </div>
                                </div>
                            </div>
							  <div class="row">
							  <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="c_short_desc">Course Short Description</label>
                                        <textarea  class="form-control required" id="c_short_desc" name="c_short_desc"></textarea>
                                    </div>
                                    
                                </div>
							  </div>
							  
							  <div class="row">
							  <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="c_points">Course Points</label>
                                         <textarea  class="form-control required" id="c_points" name="c_points"></textarea>
                                    </div>
                                    
                                </div>
							  </div>
							  
							 <div class="row">
							  <div class="col-md-6">                                
                                   <label for="c_image">Course Banner Image</label>
                                        <input type="file" class="form-control" id="c_image"  name="c_image">
                                    
                                </div>
								<div class="col-md-6">                                
                                   <label for="c_video">Course Banner Video</label>
                                        <input type="file" class="form-control" id="c_video"  name="c_video">
                                    
                                </div>
							  </div>
							  
							   <div class="row">
							  <div class="col-md-12">                                
                                   <label for="c_overview">Course Overview</label>
                                         <textarea  class="form-control required" id="c_overview" name="c_overview"></textarea>
                                    
                                </div>
                                </div>
								<div class="row">
								<div class="col-md-12">                                
                                    <label for="c_keyfeature">Course Key Features</label>
                                         <textarea  class="form-control required" id="c_keyfeature" name="c_keyfeature"></textarea>
                                    
                                </div>
							  </div>
							  
							
							    
							 <div class="row">
							  <div class="col-md-12">                                
                                   <label for="c_overvideo">CourseOverview Video</label>
                                        <input type="file" class="form-control" id="c_overvideo"  name="c_overvideo">
                                    
                                </div>
							</div>
							<div class="row">
								<div class="col-md-12">                                
                                    <label for="c_benifit_des">Course Benefits</label>
                                         <textarea  class="form-control required" id="c_benifit_des" name="c_benifit_des"></textarea>
                                    
                                </div>
							  </div>
							 <div class="row">
							  <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="c_description">Course Description</label>
                                        <textarea  class="form-control required" id="c_description" name="c_description"></textarea>
                                    </div>
                                    
                                </div>
							  </div>
							 <div class="row">
							 <div class="col-md-6">                                
                                   <label for="c_desimage">Course Main Image</label>
                                        <input type="file" class="form-control" id="c_desimage"  name="c_desimage">
                                    
                              </div>
							   <div class="col-md-6">                                
                                   <label for="c_syllabus_doc">Syllabus Doclink</label>
                                        <input type="text" class="form-control" id="c_syllabus_doc"  name="c_syllabus_doc">
                                    
                              </div>
                               </div>
							   
							 <div class="row">
							 
							  <div class="col-md-6">
							   <label for="c_syllabus">Syllabus Content</label>
                                        <textarea  class="form-control required" id="c_syllabus" name="c_syllabus"></textarea>
                               </div>
							   <div class="col-md-6">
							   <label for="c_faqs">Course FAQS</label>
                                        <textarea  class="form-control required" id="c_faqs" name="c_faqs"></textarea>
                               </div>
                               </div>
							 <div class="row">
						      <div class="col-md-6">
							   <label for="c_cert_img">Certificate Image</label>
                                       <input type="file" class="form-control" id="c_cert_img"  name="c_cert_img">
                               </div>
							  </div> 
                          
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit"  />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script>
$(document).ready(function(){
	
	var addCourseForm = $("#addCourse");
	
	var validator = addCourseForm.validate({
		
		rules:{
			c_title :{ required : true },
			
			ciimage : { required : true },
			cat : { required : true, selected : true}
		},
		messages:{
			c_title :{ required : "This field is required" },
			ciimage : { required : "This field is required" },
			cat : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});

</script>
<!--<script type="text/javascript">
		CKEDITOR.replace( 'c_short_desc' );
		CKEDITOR.replace( 'c_points' );
		CKEDITOR.replace( 'c_overview' );
		CKEDITOR.replace( 'c_keyfeature' );
		CKEDITOR.replace( 'c_description' );
		CKEDITOR.replace( 'c_syllabus' );
		CKEDITOR.replace( 'c_faqs' );
		CKEDITOR.replace( 'c_benifit_des' );
		
	</script>-->
	
<script>
function subcategory(catid){
var formData = {catid:catid}; //Array 

$.ajax({
   url : "<?= base_url() ?>admin/course/coursescat",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#c_subcate").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}


function subcategory2(catid){
var formData = {catid:catid}; //Array 
 
$.ajax({
    url : "<?= base_url() ?>admin/course/coursescat2",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#c_subcate2").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}
</script>