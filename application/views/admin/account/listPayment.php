
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-truck"></i>Vendor Commission management
        <small>View Commission</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Commission Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                   
                        <div class="box-body">
                            <div class="row">
								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="cname">Total Order Value : Rs. <?php echo $paymentInfo[0]['total_amount']; ?></label><br/>
                                        <label for="cname">Commission Percentage(%):    <?php
                                         $comm = vendor_Commission($vendorInfo['package']);
                                         echo vendor_Commission($vendorInfo['package'])!= '' ? vendor_Commission($vendorInfo['package']) : '0' ; ?></label><br/>
                                         
                                         <label for="cname">Vendor Package :   <?php
                                         echo  isset($vendorInfo['package']) ? $vendorInfo['package'] : 'No package Opted' ;
                                         
                                         
                                          ?></label><br/>
                                         
                                         <label for="cname">Total Commission: 
                                         <?php
                                               if($comm){
                                                 $tot_val =   isset($paymentInfo[0]['total_amount']) ? $paymentInfo[0]['total_amount'] : 0;
                                                   
                                                   $temp = $tot_val- ($tot_val*30/100);
                                                   echo 'Rs. '.$temp;
                                               }else{
                                                   
                                                   echo "Rs 0";
                                               }
                                          ?></label>
                                       
                                    </div>
                                </div>
                                
                                
                              
                             
                               
                            </div>
                         
                            
                           
                        </div><!-- /.box-body -->
    
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
