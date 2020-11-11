<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Plan Management
        <small>Edit Plan</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Plan Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                      <?php
                          $attributes = array('id' => 'editplan','method' => 'post','class' => 'form_horizontal');
                          echo form_open_multipart('admin/sales/editPlan/', $attributes); 
                      ?>
                    
                  
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="pname">Plan Name</label>
                                        <input type="text" class="form-control required" id="pname" name="pname" value="<?= $plan_data['name'] ?>" required >
                                    </div>
                                </div>
                               
                            </div>
                         
                            <div class="row">

                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="corpuser">Corporate User</label>
                                         <input type="text" class="form-control required" id="corpuser" value="<?= $plan_data['corpuser'] ?>" name="corpuser"  required >
                                       

                                    </div>
                                </div>


                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="rider">Riders</label>
                                         <input type="text" class="form-control required" id="rider" name="rider"  value="<?= $plan_data['rider'] ?>" required >
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="leads_per">Leads Percentage</label>
                                        <input type="text" class="form-control required" id="leads_per" name="leads_per"   value="<?= $plan_data['leads_per'] ?>" required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cash_user_per">Cash User Percentage</label>
                                        <input type="text" class="form-control required" id="cash_user_per" name="cash_user_per"  value="<?= $plan_data['cash_user_per'] ?>" required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_cost">Monthly Cost</label>
                                        <input type="text" class="form-control required" id="monthly_cost" value="<?= $plan_data['monthly_cost'] ?>" name="monthly_cost"  required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quarter_cost">Quarter Cost</label>
                                        <input type="text" class="form-control required" id="quarter_cost" value="<?= $plan_data['quarter_cost'] ?>" name="quarter_cost"  required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="halfyear_cost">HalfYearly Cost</label>
                                        <input type="text" class="form-control required" id="halfyear_cost" name="halfyear_cost"  value="<?= $plan_data['halfyear_cost'] ?>" required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearly_cost">Yearly Cost</label>
                                        <input type="text" class="form-control required" id="yearly_cost" value="<?= $plan_data['yearly_cost'] ?>" name="yearly_cost"  required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="yearly_cost">Plan Description</label>
                                        <textarea  class="form-control required" id="plan_des" name="plan_des" required ><?= $plan_data['plan_des'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            
                             <input type="hidden" name="id" value="<?=$plan_data['id']?>" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
    
</div>


