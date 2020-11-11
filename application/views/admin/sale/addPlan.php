<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i> Subscription Package Management
        <small>Add Package</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Package Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'addPlan','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/sales/addPlan', $attributes); 
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="title">Plan Name</label>
                                        <input type="text" class="form-control required" id="title" name="pname"  required >
                                    </div>
                                </div>
                               
                            </div>
                         
                            <div class="row">

                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="corpuser">Corporate User(*in Numbers only)</label>
                                         <input type="text" class="form-control required" id="corpuser" name="corpuser"  required >
                                       

                                    </div>
                                </div>


                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="rider">Riders(*in Numbers only)</label>
                                         <input type="text" class="form-control required" id="rider" name="rider"  required >
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="leads_per">Leads Percentage(*in Numbers only)</label>
                                        <input type="text" class="form-control required" id="leads_per" name="leads_per"  required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cash_user_per">Cash User Percentage(*in Numbers only)</label>
                                        <input type="text" class="form-control required" id="cash_user_per" name="cash_user_per"  required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_cost">Monthly Cost(*in Rupees only)</label>
                                        <input type="text" class="form-control required" id="monthly_cost" name="monthly_cost"  required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quarter_cost">Quarter Cost(*in Rupees only)</label>
                                        <input type="text" class="form-control required" id="quarter_cost" name="quarter_cost"  required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="halfyear_cost">HalfYearly Cost(*in Rupees only)</label>
                                        <input type="text" class="form-control required" id="halfyear_cost" name="halfyear_cost"  required >
                                    </div>
                                </div>
                                                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearly_cost">Yearly Cost(*in Rupees only)</label>
                                        <input type="text" class="form-control required" id="yearly_cost" name="yearly_cost"  required >
                                    </div>
                                </div>
                                  
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="yearly_cost">Plan Description</label>
                                        <textarea  class="form-control required" id="plan_des" name="plan_des"  required ></textarea>
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
            
        </div>    
    </section>