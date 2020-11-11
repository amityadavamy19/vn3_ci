<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-picture-o"></i> Gallery Management
        <small>Add / Gallery</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Gallery Image</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				     $attributes = array('id' => 'addGallery','method' => 'post','class' => 'form_horizontal');
				?>
				<?php echo form_open_multipart('admin/gallery/addNewGallery', $attributes); ?>
                   
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('name'); ?>" id="name" name="name" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gimage">Image</label>
                                        <input type="file" class="form-control" id="gimage"  name="gimage">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cat">Category</label>
                                        <select class="form-control required" id="cat" name="cat">
                                            <option value="0">Select Category</option>
                                            <?php
											
                                            if(!empty($gcat))
                                            {
                                                foreach ($gcat as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>    
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
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
	
	var addGalleryForm = $("#addGallery");
	
	var validator = addGalleryForm.validate({
		
		rules:{
			name :{ required : true },
			
			gimage : { required : true },
			cat : { required : true, selected : true}
		},
		messages:{
			name :{ required : "This field is required" },
			gimage : { required : "This field is required" },
			cat : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});

</script>