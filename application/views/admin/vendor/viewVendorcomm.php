<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Vendor Commission
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
                        <h3 class="box-title">Vendor Commission</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                  
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="title">Total Order: </label>
                                      <?= $vendorData[0]['total_order'] ?>
		                             
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Total Commission: </label>
                                         <?= $vendorData[0]['total_comm'] ?>
		    
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Total Amount: </label>
                                         <?= $vendorData[0]['total_amt'] ?>
		    
                                    </div>
                                </div>
                            </div>
                         
                           
                            
                        </div><!-- /.box-body -->
    
                        
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
    
</div>


