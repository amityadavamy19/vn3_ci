<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-picture-o"></i> Flower Management
        <small>Add / Flower</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Flower Image</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				     $attributes = array('id' => 'addFlower','method' => 'post','class' => 'form_horizontal');
				?>
				<?php echo form_open_multipart('admin/flower/addNewFlower', $attributes); ?>
                   
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fimage">Image</label>
                                        <input type="file" class="form-control" id="fimage"  name="fimage">
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
											
                                            if(!empty($fcat))
                                            {
                                                foreach ($fcat as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>"><?php echo $cat->fcatname ?></option>
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
	
	var addFlowerForm = $("#addFlower");
	
	var validator = addFlowerForm.validate({
		
		rules:{
			
			title : { required : true },
			fimage : { required : true },
			cat : { required : true, selected : true}
		},
		messages:{
			title : { required : "This field is required" },
			fimage : { required : "This field is required" },
			cat : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});

</script>