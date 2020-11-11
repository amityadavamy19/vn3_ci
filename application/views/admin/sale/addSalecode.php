<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn"></i>Sales Code Management
        <small>Add SalesCode</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter SalesCode Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'addSaleCode','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/sales/addSaleCode', $attributes); 
                          $this->load->helper('my_helper');
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="code">Sale Code</label>
                                        <input type="text" value="<?php echo 'S'.date('Ymd').'0'.(lastSId()+1);?>" class="form-control required" id="code" name="code"  required >
                                    </div>
                                </div>
                               
                            </div>
                         
                            <div class="row">


                            <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="rider">Pacakage Name</label>
                                        
                                         <select name="package_id" id="package_id" class="form-control required">
                                        <?php foreach( $plan as $p ) : ?> 
                                        <option value="<?= $p['id']?>"><?= $p['name']?></value>
                                        <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>




                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="package_tenure">Pacakage Tenure</label>
                                        
                                        <select name="package_tenure" id ="package_tenure" class="form-control required">
                                        
                                        
                                       
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
            
        </div>    
    </section>
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