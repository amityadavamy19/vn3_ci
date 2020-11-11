<div class="container-fluid rassss">
    	<div class="row">
        <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
    
        <h3>Sign Up</h3>
		
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
		   echo form_open_multipart('login/createAccount',$attr);?>
        <div class="form-group">
		
        <div class="col-sm-1">
          <i class="fa fa-user"></i>
          </div>
          <div class="col-sm-11">
          <input type="text" name="uname" class="form-control" placeholder="ENTER NAME" value="<?php echo set_value('uname'); ?>">
		  <?php echo form_error('uname'); ?>
          </div>
           <div class="col-sm-1">
         <i class="fa fa-envelope"></i>
          </div>
          <div class="col-sm-11">
          <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" placeholder="ENTER EMAIL" >
		    <?php echo form_error('email'); ?>
          </div>
           <div class="col-sm-1">
       <i class="fa fa-phone"></i>
          </div>
          <div class="col-sm-11">
          <input type="text" name="mobile" class="form-control"  value="<?php echo set_value('mobile'); ?>" placeholder="ENTER MOBILE NO." >
		   <?php echo form_error('mobile'); ?>
          </div>
           <div class="col-sm-1">
              <i class="fa fa-lock"></i>
          </div>
          <div class="col-sm-11">
          <input type="password" name="password" class="form-control"  value="<?php echo set_value('password'); ?>" placeholder="PASSWORD" >
		  <?php echo form_error('password'); ?>
          </div>
           <div class="col-sm-1">
        <i class="fa fa-lock"></i>
          </div>
          <div class="col-sm-11">
          <input type="password" name="cpassword" class="form-control" value="<?php echo set_value('cpassword'); ?>" placeholder="RE-ENTER PASSWORD" >
		   <?php echo form_error('cpassword'); ?>
          </div>
           <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1"  name="terms" value="<?php echo set_value('terms'); ?>" required>
              <label class="form-check-label" for="exampleCheck1">I accept the <a href="#" >Terms & Conditions</a></label>
          </div>
         <!-- <button type="submit" class="btn btn-primary">CREATE ACCOUNT</button>-->
          <input type="submit" class="btn btn-primary" value="CREATE ACCOUNT"  >
          <?php echo form_close(); ?>
            <div class="form-check">
              
              <p>Have Account <a href="<?php echo base_url('login'); ?>">Sign In</a></p>
          </div>
        </div>
        </div>
    </div>
 </div>
  </div>