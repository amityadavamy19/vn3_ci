<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Testimonial management
        <small>Edit Testimonial</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Testimonial Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					  <?php
				          $attributes = array('id' => 'editTestimonials','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/testimonials/editTestimonials/', $attributes); 
					  ?>
                    
                  
                        <div class="box-body"> 
                            <div class="row">
                              
							   <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control required" value="<?php echo $user['author']; ?>" id="author" name="author">
                                    </div>
                                </div>
								 <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control required" value="<?php  echo $user['designation']; ?>" id="designation" name="designation" >
                                    </div>
                                </div>
                               
                            </div>
							<div class="row">
							 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Add image</label>
                                        <input type="file" class="form-control required " id="image"  name="timage" >
										<img src="<?php  echo base_url().'uploads/testimonial/'.$user['image']; ?>" width="100" height="80">
                                    </div>
                                </div>
								    </div>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control required " 
                                       id="content" name="content" ><?php  echo $user['content']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 
                               
                              
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
							 <input type="hidden" name="id" value="<?=$user['id']?>" />
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


<script type="text/javascript">
		CKEDITOR.replace( 'content' );
	</script>