<div class="container-fluid create">
  <div class="row">
    <div class="container">
     <div class="col-lg-6 col-lg-offset-3">
       <img src="<?php echo base_url('uploads/logo/'); ?><?=$contact['logo']?>" class="img-responsive">
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
		   echo form_open_multipart('vendor/auth/createAccount',$attr);?>
       <div class="form-group">
         <div class="col-sm-12">
           <input type="text" name="uname" class="form-control" placeholder="ENTER NAME" value="<?php echo set_value('uname'); ?>">
		  <?php echo form_error('uname'); ?>
           </div>
         <div class="col-sm-12">
        <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" placeholder="ENTER EMAIL" >
		    <?php echo form_error('email'); ?>
          </div>
         <div class="col-sm-12">
          <input type="text" name="mobile" class="form-control"  maxlength="10" value="<?php echo set_value('mobile'); ?>" placeholder="ENTER MOBILE NO." >
		   <?php echo form_error('mobile'); ?>
           </div>
           <div class="col-lg-12">
           <input type="password" name="password" class="form-control"  value="<?php echo set_value('password'); ?>" placeholder="ENTER PASSWORD" >
		  <?php echo form_error('password'); ?>
            </div>
			 <div class="col-lg-12">
			<input type="password" name="cpassword" class="form-control" value="<?php echo set_value('cpassword'); ?>" placeholder="RE-ENTER PASSWORD" >
		   <?php echo form_error('cpassword'); ?>
		    </div>
		   
         <div class="col-sm-12">
         <input type="text" class="form-control" name="gst" placeholder="GST" value="<?php echo set_value('gst'); ?>">
			<?php echo form_error('gst'); ?>
         </div>
         <div class="col-sm-12">
           <input type="text" class="form-control"   name="address" placeholder="ENTER OFFICE ADDRESS" value="<?php echo set_value('address'); ?>" >
				<?php echo form_error('address'); ?>
            </div>
			<div class="col-sm-12">
          <input type="text" class="form-control" name="s_code" id="s_code" value="<?php echo set_value('s_code'); ?>" placeholder="SALES CODE">
			<?php echo form_error('s_code'); ?>
            </div>
            <span id="s_error"></span>
          
            
              <div class="col-sm-12"> 
              <p>NORMAL COURIER SERVICE</p>           
<select id="NORMAL" multiple="multiple" name="couriers[]">
<?php foreach($courier as $cou) : ?>
<option value="<?= $cou->id ?>"><?= $cou->name ?></option>
<?php endforeach?>


</select>
</div>
 <div class="col-sm-12"> 
              <p>CARGO SERVICE</p>           
<select id="CARGO" multiple="multiple"  name="cargo[]">
<?php foreach($cargo as $c) : ?>
<option value="<?= $c->id ?>"><?= $c->name ?></option>
<?php endforeach?>


</select>
</div> 
<div class="col-sm-12"> 
<p>SUSCRIPTION PACKAGE</p>           
 <select name="package" id="package_id">
 
   
  </select>
</div> 

<div class="col-sm-12"> 
<p>SUSCRIPTION TENURE</p>           
 <select name="package_tenure" id="package_tenure">
    
  </select>
</div> 
<div class="col-sm-12">
<div class="field_wrapper">      
      <div class="col-sm-6">                             
      <label for="inputState" style= "margin-top:15px; margin-bottom:15px; color:#fff;">SERVICE PIN CODE</label>                             							
      							</div>
      <div class="col-sm-6">
      <a href="javascript:void(0);" class="add_button"><img src="<?php echo base_url('assets/images/add-icon.png')?>"></a>
      </div>
      </div>
      </div>
      <div class="col-sm-12">
      <div class="form-check">
              <div class="col-sm-12"> 
             
              <label class="form-check-label" for="exampleCheck1">  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept_terms" required> I accept the <a href="#" >terms & conditions</a>
              
              </label>
          </div>
          </div>
          </div>
       <div class="col-sm-12">
         <div class="nats">
                                                
                        <input type="submit" class="btn btn-primary" value="CREATE ACCOUNT"  >
                     </div>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
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
    var fieldHTML = '<div><div class="col-sm-9"><input type="text" name="ser_pin[]" class="form-control" maxlength="6" placeholder="PIN CODE" required /></div><a href="javascript:void(0);" class="remove_button"><img src="http://localhost/vn24/assets/images/remove-icon.png" /></a></div><div class="clearfix"></div>'; //New input field html 
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

 <script>
     $(document).ready(function () {
        $('#package_id').change(function () {
            var id = $('#package_id').val();
                    var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>vendor/Auth/getPlan",
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
    
    <script type="text/javascript">
$(document).ready(function () {
        $('#s_code').change(function () {
            var id = $('#s_code').val();
                    var dataJson = { id: id };

           
                $.ajax({
                    url: "<?php echo base_url(); ?>vendor/Auth/getSales",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {
                        if(data==''){
                       $('#s_error').html('<p>Sales Code Not Found</p>')
                       
                        }else{
                            
                            var arr = data.split('|');
                           
                           $('#package_id').html('<option>'+arr[0]+'</option>');                         
                           $('#package_tenure').html('<option>'+arr[1]+'</option>');  
                           $('#s_error').html('<p>Sales Code Valid</p>')                           
                                                 
                            
                        }
                    },
                });
            
            
        });
         });
</script>
