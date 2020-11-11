<link href="https://davidstutz.de/bootstrap-multiselect/docs/css/bootstrap-3.3.2.min.css" rel="stylesheet"/>
<link href="https://davidstutz.de/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Vendor management
        <small>Edit Vendor</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Vendor Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                      <?php
                          $attributes = array('id' => 'updateVendor','method' => 'post','class' => 'form_horizontal');
                          echo form_open_multipart('admin/vendors/updateVendor/', $attributes); 
                      ?>
                    
                  
                        <div class="box-body">
                            <div class="row">

								<div class="col-md-6">
                                     <div class="form-group">
                                        <label for="title">Name</label>
                                       <input type="text" name="uname" class="form-control" placeholder="ENTER NAME" value="<?php echo $vendorData['name']; ?>">
		                             
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $vendorData['email']; ?>" id="email" placeholder="ENTER EMAIL" readonly>
		    
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">

                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="Mobile">Mobile</label>
                                         <input type="text" name="mobile" class="form-control"  value="<?php echo $vendorData['mobile']; ?>" placeholder="ENTER MOBILE NO." >
	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">ADDRESS</label>
                                       <input type="text" class="form-control"   name="address" placeholder="ENTER OFFICE ADDRESS" value="<?php echo $vendorData['address']; ?>" >
			
                                    </div>
                                </div>

                                
                            </div> 
                            
                            <div class="row">
                                
                             
                                 <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="category">GST</label>
                                        <input type="text" class="form-control" name="gst" placeholder="GST" value="<?php echo $vendorData['gst']; ?>">
		
                                    </div>
                                </div>
                                  
                            </div>
                            
                            
                            
                            
                               <div class="row">
                            
                            <div class="col-sm-12"> 
              <p>NORMAL COURIER SERVICE</p>           
<select id="NORMAL" multiple="multiple" name="couriers[]">
<?php 
$c = explode(',',$vendorData['couriers']);

foreach($courier as $cou) : ?>
<option value="<?= $cou->id ?>" <?php if(in_array($cou->id,$c)){echo "selected"; }?>><?= $cou->name ?></option>
<?php endforeach?>


</select>
</div>
</div>
 <div class="row">
 <div class="col-sm-12"> 
<p>CARGO SERVICE</p>           
<select id="CARGO" multiple="multiple"  name="cargo[]">
<?php 
$car = explode(',',$vendorData['cargo']);
foreach($cargo as $c) : ?>
<option value="<?= $c->id ?>" <?php if(in_array($c->id,$car)){echo "selected"; }?>><?= $c->name ?></option>
<?php endforeach?>


</select>
</div> 
</div> 
 
 <div class="row">
<div class="col-sm-12">
<div class="field_wrapper">      
      <div class="col-sm-6">                             
      <label for="inputState" style= "margin-top:15px; margin-bottom:15px;">SERVICE PIN CODE</label>  
      <input type="text" name="ser_pin[]" class="form-control" maxlength="6" placeholder="PIN CODE" />
      </div>
      <div class="col-sm-6">
      <a href="javascript:void(0);" class="add_button"><img src="<?php echo base_url('assets/images/add-icon.png')?>"></a>
      </div>
      </div>
      </div>
      </div>
      
                            
                            
                            
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            
                             <input type="hidden" name="id" value="<?=$vendorData['userId']?>" />
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