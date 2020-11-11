
<link href="https://davidstutz.de/bootstrap-multiselect/docs/css/bootstrap-3.3.2.min.css" rel="stylesheet"/>
<link href="https://davidstutz.de/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Vendor management
        <small>Add Vendor</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                 <?php
		
                if ($this->session->flashdata('error')) {

                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                }
                if ($this->session->flashdata('success')) {

                    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                }
                ?>
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Vendor Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
					 <?php
				          $attributes = array('id' => 'addVendor','method' => 'post','class' => 'form_horizontal');
				          echo form_open_multipart('admin/vendors/addVendor', $attributes); 
					  ?>
                    
                   
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="title">Name</label>
                                       <input type="text" name="uname" class="form-control" placeholder="ENTER NAME" value="<?php echo set_value('uname'); ?>">
		                             <?php echo form_error('uname'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" placeholder="ENTER EMAIL" >
		    <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">

                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="Mobile">Mobile</label>
                                         <input type="text" name="mobile" class="form-control"  value="<?php echo set_value('mobile'); ?>" placeholder="ENTER MOBILE NO." >
		   <?php echo form_error('mobile'); ?>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="category">Password</label>
                                        <input type="password" name="password" class="form-control"  value="<?php echo set_value('password'); ?>" placeholder="ENTER PASSWORD" >
		  <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">RE-ENTER PASSWORD</label>
                                       <input type="password" name="cpassword" class="form-control" value="<?php echo set_value('cpassword'); ?>" placeholder="RE-ENTER PASSWORD" >
		   <?php echo form_error('cpassword'); ?>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="category">GST</label>
                                        <input type="text" class="form-control" name="gst" placeholder="GST" value="<?php echo set_value('gst'); ?>">
			<?php echo form_error('gst'); ?>
                                    </div>
                                </div>
                                  
                            </div>
                            
                            
                             <div class="row">
                                
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">ADDRESS</label>
                                       <input type="text" class="form-control"   name="address" placeholder="ENTER OFFICE ADDRESS" value="<?php echo set_value('address'); ?>" >
				<?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="category">SALES CODE</label>
                                       <input type="text" class="form-control" name="s_code" value="<?php echo set_value('s_code'); ?>" placeholder="SALES CODE">
			<?php echo form_error('s_code'); ?>
                                    </div>
                                </div>
                                  
                            </div>
                            
                               <div class="row">
                            
                            <div class="col-sm-12"> 
              <p>NORMAL COURIER SERVICE</p>           
<select id="NORMAL" multiple="multiple" name="couriers[]">
<?php foreach($courier as $cou) : ?>
<option value="<?= $cou->id ?>"><?= $cou->name ?></option>
<?php endforeach?>


</select>
</div>
</div>
 <div class="row">
 <div class="col-sm-12"> 
<p>CARGO SERVICE</p>           
<select id="CARGO" multiple="multiple"  name="cargo[]">
<?php foreach($cargo as $c) : ?>
<option value="<?= $c->id ?>"><?= $c->name ?></option>
<?php endforeach?>


</select>
</div> 
</div> 
 <div class="row">
<div class="col-sm-6"> 
              <p>SUSCRIPTION PACKAGE</p>           
 <select name="package" class="form-control">
    <option value="200">200</option>
    <option value="300">300</option>
    <option value="400">400</option>
    <option value="500">500</option>
  </select>
</div> 
</div> 
 <div class="row">
<div class="col-sm-12">
<div class="field_wrapper">      
      <div class="col-sm-6">                             
      <label for="inputState" style= "margin-top:15px; margin-bottom:15px;">SERVICE PIN CODE</label>  
      <input type="text" name="ser_pin[]" class="form-control" maxlength="6" placeholder="PIN CODE" required />                        							
      							</div>
      <div class="col-sm-6">
      <a href="javascript:void(0);" class="add_button"><img src="<?php echo base_url('assets/images/add-icon.png')?>"></a>
      </div>
      </div>
      </div>
      </div>
       <div class="row">
      <div class="col-sm-12">
      <div class="form-check">
              <div class="col-sm-1">
              <input type="checkbox" class="form-check" id="exampleCheck1" required></div>
              <div class="col-sm-11"><label class="form-check-label" for="exampleCheck1">I accept the <a href="#" >terms & conditions</a></label>
          </div>
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
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://davidstutz.de/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<script src="https://davidstutz.de/bootstrap-multiselect/docs/js/bootstrap-3.3.2.min.js"></script>
<script>
$(function() {

$('#CARGO').multiselect({

includeSelectAllOption: true

});

$('#btnget').click(function() {

alert($('#CARGO').val());

})

});


</script>
<script>
$(function() {

$('#NORMAL').multiselect({

includeSelectAllOption: true

});

$('#btnget').click(function() {

alert($('#CARGO').val());

})

});

</script>
  <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="col-sm-4"><input type="text" name="ser_pin[]" class="form-control" maxlength="6" placeholder="PIN CODE" required /></div><a href="javascript:void(0);" class="remove_button"><img src="http://localhost/vn24/assets/images/remove-icon.png" /></a></div><div class="clearfix"></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>