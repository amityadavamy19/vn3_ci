 <div class="container-fluid rajjs">
    	<div class="row">
        <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
      <?php
		
                if ($this->session->flashdata('error')) {

                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                }
                if ($this->session->flashdata('success')) {

                    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                }
                ?> 
		
        <h3>Sign In</h3>
		<?php
             $attr = array('method' => 'post',);
		   echo form_open_multipart('corporate/auth/loginMe',$attr);?>
        <div class="form-group">
       
          <div class="col-sm-11">
              <i class="fa fa-user"></i>
          <input type="email" class="form-control" name="email" placeholder="USERNAME" value="<?php echo set_value('email'); ?>">
		    <?php echo form_error('email'); ?>
          </div>
  
          <div class="col-sm-11">
              <i class="fa fa-lock"></i>
          <input type="password" class="form-control"  placeholder="PASSWORD" name="password" value="<?php echo set_value('password'); ?>">
		   <?php echo form_error('password'); ?>
		  <input type="submit" class="btn btn-primary" value="SIGN IN">
          </div>

        </div>
        <div class="clearfix"></div>
		 <?php echo form_close(); ?>
         <div class="form-check">
            
            <p> Don't have an Account <a href="<?php echo base_url('corporate/signup'); ?>">Sign Up</a></p>
          </div>
        </div>
    </div>
 </div>
  </div>