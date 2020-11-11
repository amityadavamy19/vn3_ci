<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid project">
                            <div class="row">
                            <div class="container">
							
							<?php
						
								if ($this->session->flashdata('error')) {

									echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
								}
								if ($this->session->flashdata('success')) {

									echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
								}
					?> 
								<?php
								 $attr = array('method' => 'post',);
							      echo form_open_multipart('home/updateProfile',$attr);?>
                            <div class="col-lg-6 col-lg-offset-3">
                            <div class="col-sm-12">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
							<?php if($user['pic']==NULL)
							       {
								   $image= '11.png';
								   }else
								   {
									   $image= $user['pic'];
							        }
							  
							  ?>
                            <img src="<?php echo base_url('uploads/user') ?>/<?= $image ?>" class="img-responsive">
							 <input type="file" name="pic">
                            </div>
                            <div class="form-group">
                        
                              <div class="col-sm-12">
                              <input type="text"  name="uname" value="<?= $user['name'] ?>" class="form-control" placeholder="John">
							  <?php echo form_error('name'); ?>
                              </div>
                               
                              <div class="col-sm-12">
                              <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="email" placeholder="john@gmail.com">
							  <?php echo form_error('email'); ?>
                              </div>
                               
                              <div class="col-sm-12">
                              <input type="text"  name="mobile" value="<?= $user['mobile'] ?>" class="form-control" placeholder="9990182006">
							  <?php echo form_error('mobile'); ?>
                              </div>
							  <div class="col-sm-12">
                              <input type="Password" name="password"  value="<?php echo  set_value('password'); ?>"class="form-control" placeholder="Password" >
							  <?php echo form_error('password'); ?>
							  <input type="Password" name="cpassword"  value="<?php echo  set_value('cpassword'); ?>" class="form-control" placeholder="Confirm Password" >
							 <?php echo form_error('cpassword'); ?>
							  <div class="read">
                              <button type="submit" class="btn btn-primary">UPDATE</button>
                              </div>
                              </div>
                              
                            </div>
                            </div>
							 <?php echo form_close(); ?>
                        </div>
                     </div>
                </div>
        	
    </div>
</div>
