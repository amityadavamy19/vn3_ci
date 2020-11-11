
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-truck"></i> <?=$courier['name']?> Quote management
        <small>Add Quote</small>
        <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/courier/viewQuote/<?=$courier['id']?>"><i class="fa fa-plus"></i> View  Quotes</a>
                </div>
      </h1>
    </section>
   
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Courier Quote</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'addCourier','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/reports/addQuote', $attributes); 
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">Courier Name</label>
                                        <input type="text" class="form-control required" value="<?=$courier['name']?>"  readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                
                                     <div class="form-group">
                                        <label for="pin_service">Zone list</label>
                                         <select class="form-control required" id="zone_name" name="zone_name" required>
                                            <option value="A">Zone A</option>
                                            <option value="B">Zone B</option>
                                            <option value="C">Zone C</option>
                                            <option value="D">Zone D</option>
                                          
                                           
                                            
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            
                            
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="pin_service">Mode Of Transfer</label>
                                         <select class="form-control required" id="trans_mode" name="trans_mode" required>
                                            <option value="Surface">Surface</option>
                                            <option value="Air">Air</option>
                                            <option value="Priority">Priority</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                
                                     <div class="form-group">
                                        <label for="pin_service">Product Type</label>
                                         <select class="form-control required" id="pro_type" name="pro_type" required>
                                            <option value="document">Document</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            
                            
                            
                             <div class="row">
                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">Upto 250gms</label>
                                        <input type="text" class="form-control required" name="250g" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">251gms To 500g</label>
                                        <input type="text" class="form-control required" name="500g"  >
                                    </div>
                                </div>
                         
                            </div>
                            
                            <div class="row">
                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">500g To 5Kg</label>
                                        <input type="text" class="form-control required" name="5000g"  >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">05-50kg</label>
                                        <input type="text" class="form-control required" name="50000g" >
                                    </div>
                                </div>
                         
                            </div>
                            <div class="row">
                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">5Kg To 20Kg</label>
                                        <input type="text" class="form-control required" name="20000g">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">21kg To 50 Kg</label>
                                        <input type="text" class="form-control required" name="2150g" >
                                    </div>
                                </div>
                         
                            </div>
                            
                            
                            
                             <div class="row">
                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">51-100kg</label>
                                        <input type="text" class="form-control required" name="100000g"  >
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">100kg+</label>
                                        <input type="text" class="form-control required" name="100000more"  >
                                    </div>
                                </div>
                               
                         
                            </div>
                           
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="hidden" class="btn btn-default" name="courier_id" value="<?=$courier['id']?>" />
                            <input type="reset" class="btn btn-primary" value="Reset" />
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
