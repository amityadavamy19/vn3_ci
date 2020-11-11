

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Gallery Management
        <small>Add / Edit Gallery</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Gallery Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
				          $attributes = array('id' => 'editGallery','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/gallery/editGallery', $attributes); 
					  ?>
                    
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $allData->name; ?>" id="name" name="name" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gimage">Image</label>
                                        <input type="file" class="form-control" id="gimage"  name="gimage">
										<img src="<?php echo base_url('uploads/gallery/').$allData->image ?>" width="100px" height="100px">
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
											
                                            if(!empty($gcat))
                                            {
                                                foreach ($gcat as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>"  <?php if( $catid == $cat->id ){echo "selected=selected";}?>><?php echo $cat->name ?></option>
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
							<input type="hidden" name="gid" value="<?php echo $allData->id; ?>" />
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

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>