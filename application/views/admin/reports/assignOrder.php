
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-truck"></i> Transfer Orders
        <small>Assign Type</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Order Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'ordertype','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/reports/assignOData', $attributes); 
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">
								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">OrderID</label>
                                        <input type="text" class="form-control required" value="<?php echo $oid['order_id']; ?>" id="oid" name="oid"  maxlength="20" required >
                                    </div>
                                </div>
                               
                                
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">Assign To</label>
                                       <select name="assign_to" class="form-control">
                                       <?php foreach( $AllVendors as $ven): ?>
                                       <option value="<?= $ven->userId ?>"><?= $ven->code ?></option>
                                       <?php endforeach; ?>
                                       </select>
                                    </div>
                                </div>
                             
                               
                            </div>
                         
                            
                           
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <input type="hidden" value="<?php echo $oid['order_id']; ?>" name="id">
                            <input type="hidden" value="<?php echo $oid['id']; ?>" name="rId">
                            <input type="hidden" value="<?php echo $oid['amount']; ?>" name="amount">
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
