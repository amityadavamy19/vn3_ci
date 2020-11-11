<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid project">
                            <div class="row">
                            <div class="container">
							
							
                            <div class="col-lg-6 col-lg-offset-3">
                            
                            <h3 class="sectitle">Payment Status</h3>
								   <div class="row">
									   <?php if($status== 'true') 
									   {?>
									<div class="col-md-12">
									<img src="<?=base_url('uploads/logo/success.png')?>" height="100px" width="120px" class="img-responsive text-center">
									</div>
							   <div class="col-md-12">
							   <p>Thanks for your payment. Please check your e-mail. Your txn id: <?php   print_r($payment_id); ?></p><a href="<?=base_url('dashboard')?>">Go to dashboard</a>
							   </div>
					            <?php }else {echo "<h5>Payment Failed. Please Try again</h5>".$payment_id; }?>
					   
							 
						   </div>
                            </div>
							 
                        </div>
                     </div>
                </div>
        	
    </div>
</div>
