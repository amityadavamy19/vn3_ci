<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Service Management
        <small>Add / Edit Service</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Service Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
				          $attributes = array('id' => 'editService','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/service/editService', $attributes); 
					  ?>
                    
                        <div class="box-body">
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="simage">Image</label>
                                        <input type="file" class="form-control" id="simage"  name="simage" >
										<img src="<?php echo base_url('uploads/service/').$allData->image ?>" width="100px" height="100px">
                                    </div>
                                </div>
								<div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="des">Description</label>
                                        <textarea class="form-control required"  id="des" name="description" required><?php echo $allData->description ;  ?> </textarea>
                                    </div>
                                    
                                </div>
                            </div>
                          
                            <div class="row">
                               <?php $catid = $allData->cat_id; ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cat">Category</label>
                                        <select class="form-control required" id="cat" name="cat">
                                            <option >Select Category</option>
                                            <?php
											
                                            if(!empty($scat))
                                            {
                                                foreach ($scat as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>"  <?php if( $catid == $cat->id ){echo "selected=selected";}?>><?php echo $cat->scatname ?></option>
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
							<input type="hidden" name="sid" value="<?php echo $allData->id; ?>" />
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
		CKEDITOR.replace( 'des' );
	</script>
