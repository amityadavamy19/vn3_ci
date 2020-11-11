
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-truck"></i> Cargo Management
        <small>Add Cargo</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Cargo Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'addCargo','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/reports/addCargo', $attributes); 
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">Cargo Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('cname'); ?>" id="cname" name="cname"  maxlength="20" required >
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                
                                     <div class="form-group">
                                        <label for="pin_service">Pincode Serviceable list</label>
                                         <select class="form-control required" id="pin_service" name="pin_service[]" multiple required>
                                            <option >Select Pincode</option>
                                            <?php
											
                                            if(!empty($pincodes))
                                            {
                                                foreach ($pincodes as $pin)
                                                {
                                                    ?>
                                                    <option value="<?php echo $pin->id ?>"><?php echo $pin->pincode ?></option>
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
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
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
