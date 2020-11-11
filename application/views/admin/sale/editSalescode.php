<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn"></i> Sales Code
        <small>Edit SalesCode</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit SalesCode Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                      <?php
                          $attributes = array('id' => 'editSales','method' => 'post','class' => 'form_horizontal');
                          echo form_open_multipart('admin/sales/editSales/', $attributes); 
                      ?>
                    
                  
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="pname">Code</label>
                                        <input type="text" class="form-control required" id="pname" name="pname" value="<?= $plan_data['code'] ?>" required >
                                    </div>
                                </div>
                               
                            </div>
                         
                            <div class="row">


                            <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="rider">Pacakage Name</label>
                                        
                                         <select name="package_id" id="package_id" class="form-control required">
                                        <?php foreach( $plan as $p ) : ?> 
                                        <option value="<?= $p['id']?>" <?php if($p['id'] == $plan_data['package_id']){echo "Selected";} ?>> <?= $p['name']?></option>
                                        <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>




                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="package_tenure">Pacakage Tenure</label>
                                        
                                        <select name="package_tenure" id ="package_tenure" class="form-control required">
                                        
                                        <option value="<?= $plan_data['package_tenure']?>"> Rs. <?= $plan_data['package_tenure']?></option>
                                       
                                        </select>
                                         
                                       

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
<script>
     $(document).ready(function () {
        $('#package_id').change(function () {
            var id = $('#package_id').val();
                    var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/sales/getPlan",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {

                        $('#package_tenure').html(data);
                    },
                });
            }
            else
            {
                $('#package_tenure').html('<option value="">Select Tenure</option>');
                
            }
        });
         });
    </script>

