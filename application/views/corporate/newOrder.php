<?php include('rightMenu.php') ;?>
<!--- Pickup Modal --->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel1">Add From Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group6">
       
         <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Name" id="pname" maxlength="50" required>
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Mobile" id="pmobile" maxlength="10" required>
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Address" id="padd" maxlength="100" required>
          </div>
          <div class="col-sm-12">
          <label>Select Country</label>
           <select id="pcountry" class="form-control state-dropd" required>
          
          <?php foreach( $AllCountry as $country ): ?>
          <option value="<?= $country->id; ?>"><?= $country->name; ?></option>
		  <?php endforeach; ?>
          </select>
      
          </div>
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="pstate"  class="form-control" required>
		    <option>Select State</option>
		  
    
         </select>
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="pcity" class="form-control" required>
          
         </select>
       
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <div class="col-sm-12">
     <button onclick="addpadd();">Submit</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!--- Drop Modal --->
<div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Add Drop Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group6">
       
         <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Name" maxlength="50" id="dname">
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Mobile"  maxlength="10" id="dmobile">
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Address" maxlength="100" id="dadd">
          </div>
          <div class="col-sm-12">
          <label>Select Country</label>
           <select id="dcountry" class="form-control state-dropd">
          <?php foreach( $AllCountry as $country ): ?>
          <option value="<?= $country->id; ?>"><?= $country->name; ?></option>
		  <?php endforeach; ?>        
		  </select>
          </div>
		  
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="dstate" class="form-control">
         
		  </select>
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="dcity" class="form-control">
           
         </select>
       
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <div class="col-sm-12">
     <button onclick="adddrop();">Submit</button>
      </div>
      </div>
    </div>
  </div>
</div>





<div class="container-fluid project1">
    	<div class="row">
		<div class="container-fluid bulk">
             <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
               <h4>Upload in Bulk</h4>
                   <?php 
				   $attr = array('method' => 'post','id'=>'corp_bulk');
				   echo form_open_multipart('corporate/corporate/import_corpbulk',$attr);	
				   ?>
		    <input type="file" class="form-control" name="userfile" id="userfile" required >		 
            <input type="submit" name="upload" class="btn-default" value="Upload">
			<input type="hidden" name="user_id"  value="<?= $this->session->userdata('userId') ?>">
            <a href="<?= base_url('uploads/corporder/sample_upload.csv'); ?>" style="color: red">Download Sample</a>
            <?php echo form_close(); ?>

                </div>
              </div>
             </div>
        <div class="container">
        <div class="col-lg-6 ">   
        <div class="form-group1">
       
          <div class="col-sm-12">
           <div class="races">
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
					 echo form_open_multipart('corporate/corporate/addOrder',$attr);
			 
			 ?>
          <div class="form-group">
      <label for="sel1">Select Order Type</label>
      <div class="clearfix"></div>
     <select class="browser-default custom-select" id="ord_type" name="ord_type">
  <?php foreach($AllOtype as $otype ): ?>
  <option value="<?= $otype->name?>"><?= $otype->name?></option>
 
  <?php endforeach; ?>
  
</select>
  </div>   
        
          </div>
           </div>
          
        <div class="col-sm-12">
            <label>From Address:( Double Click to clear selection )</label>
              <div class="card-deck">
			 <?php foreach($fromadd as $fadd): ?>
			
			  <div class="card bg-primary">
				<div class="card-body">
				 <input type="radio" name="from_radd"  value="<?= $fadd->id?>"> <p class="card-text"><?= $fadd->from_address?></p>
				</div>
			  </div>
      
			 <?php endforeach; ?>
			 </div>			
             <a data-toggle="modal" data-target="#exampleModa2">
			 <input type="text" name="from_add" id="fadd" class="form-control" placeholder="Enter From Address" required></a>
			 
			 <span><div class="col-sm-1"><input type="checkbox" class="form-control" id="special_req02" name="special_req02" > </div> <p>Pickup address same as From Address </p></span>
			 
			  
			  <div class="clearfix"></div>
			  <label class="pic-add">Pickup Address:( Double Click to clear selection )</label>
			  
			  <div class="card-deck" id="card-deck2">
			 <?php foreach($picadd as $padd): ?>
		
			  <div class="card bg-primary">
				<div class="card-body">
				  	<input type="radio" name="pick_radd"  value="<?= $padd->id?>"> <p class="card-text"><?= $padd->pickup_address?></p>
				</div>
			  </div>
      
			 <?php endforeach; ?>
			 </div>
			 <div class="pic-add">
			 <input type="text" name="pick_add" class="form-control" placeholder="Enter Pickup Address" required>
			 </div>
			 <label>Pickup Enter Pincode*</label>
			 <input type="text" name="pickup_pincode" id="pickup_pincode" class="form-control" maxlength="6" placeholder="Pincode" required>
			  <span class="pin_error"></span>
			 <label>Drop Address:( Double Click to clear selection )</label>
			 
			 <div class="card-deck">
			 <?php foreach($dropadd as $dadd): ?>
			
			  <div class="card bg-primary">
				<div class="card-body">
				 <input type="radio" name="drop_radd"  value="<?= $dadd->id?>"> <p class="card-text"><?= $dadd->drop_address?></p>
				</div>
			  </div>
      
			 <?php endforeach; ?>
			 </div>
			 
			 <a data-toggle="modal" data-target="#exampleModa3" ><input type="text"  name="drop_address" id="dropadd" class="form-control" placeholder="Enter Drop Address" required></a>
			 <label>Drop Pincode*</label>
			 <input type="text" name="drop_pincode" id="drop_pincode"  maxlength="6" class="form-control" placeholder="Pincode" required>
             <span id="pin_error1"></span>
          </div>
		  
          <div class="col-sm-12">
		<div class="form-group">
				<label for="sel1">Type of Product</label>		
		  <select class="browser-default custom-select" id="custom-select1" name="pro_type">
			  <option value="document">Document</option>
			  <option value="parcel">Parcel</option>
			  </select>
	 </div>
	 
	 
  </div>
       <div class="col-sm-6 weight">
  
  <div class="form-group">
	 <input type="text" name="weight" class="form-control" placeholder="weight">
	 </div>
	
   </div>
   
   <div class="col-sm-6 weight">
  <div class="form-group">
	 <select class="browser-default custom-select" name="unit">
				 
			  <option value="gm">GM</option>
			  <option value="kg">KG</option>
			  </select>
	 </div>
	 
	 
	
   </div>
	   
	   
          <div class="race">
             <div class="col-sm-12">
           <div class="form-group">
      <label for="sel1" id="cor_name">Select Courior Service</label>
      <div class="clearfix"></div>
		 <select class="browser-default custom-select" name="courior_service"  id="cour_ser" required>
		
	  
	</select>
  </div>
          </div>
          <div class="col-sm-12" id="d_mode_trans">
					<div class="form-group">
				  <label for="sel1">Select Mode of Transfer</label>
				  <div class="clearfix"></div>
				 <select class="browser-default custom-select" name="d_mode_trans" id="mode_trans">
			 <option value="">-Select-</option>
			  <option value="Surface">Surface</option>
			  <option value="Normal">Normal</option>
			   <option value="Priority">Priority</option>
			  </select>
			   </div>
      </div>
	  
	  
	   <div class="col-sm-12" id="c_mode_trans" style="display:none">
					<div class="form-group">
				  <label for="sel1">Select Mode of Transfer</label>
				  <div class="clearfix"></div>
				 <select class="browser-default custom-select" name="c_mode_trans" >
				<option value="">-Select-</option> 
			  <option value="Surface">Surface(Min 60 kg)</option>
			  <option value="Air">Air</option>
			   
			  </select>
			  
			   </div>
			   
      </div>
	
  <input type="submit"  id="pay" name="pay" class="btn btn-default" value="Submit">
 
          </div>
        </div>
        </div>
		
		<div class="col-lg-6">
		<div id="courier" style="display:none">
 
    <div class="container-fluid purpose">
    	<div class="row">
        <div class="container">
        <div class="col-lg-6">
        <div class="col-sm-12">
        <h3>Enter Parcel Dimensions:</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Length</th>
      <th scope="col">Width</th>
      <th scope="col">Height</th>
      <th scope="col">Quantity</th>
     
    </tr>
  </thead>
  </table>
  <div class="pull-right">
  <!--<a data-toggle="modal" data-target="#exampleModal">Add More</a>--->
  <button  class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Add More</button>
  </div>
  </div>

       
        <div class="form-group5">
       
          <div class="col-sm-12">
          <input type="text" class="form-control" name="t_qty" placeholder="Total Quantity" >
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" name="t_vweight" placeholder="Total Valumetric Weight" >
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control"  name="t_pweight" placeholder="Enter Product Weight" >
          </div>
		  
		  <div class="col-sm-12">
          <input type="text" class="form-control"  name="awb" placeholder="Way Bill">
          </div>
         
          <div class="col-sm-12">
          <input type="text" class="form-control" name="amount" placeholder="Enter Item Value">
          <p>Note :For item with value more than 50k, you need to provide e way bill and invoiuce to the pickup boy</p>
            </div>
   
      
         <div class="center">
          <input type="submit" name="pay" class="btn btn-primary" value="Submit">
          </div>
        </div>
		
        </div>
    </div>
 </div>
  </div>
  </div>
		
		</div>
	<?php form_close(); ?>	
		
    </div>
 </div>
  </div>

 <!-- Popup Start -->
<div class="container-fluid same" >
 <div class="row">
 <div class="col-lg-6 ">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group6">
       
          <div class="col-sm-12">
          <input type="text" name="width" id="width" class="form-control" placeholder="Enter Width" >
          </div>
           
          <div class="col-sm-12">
          <input type="text" name="height" id="height" class="form-control" placeholder="Enter Height" >
          </div>
          
          <div class="col-sm-12">
          <input type="text" name="length" id="lengths" class="form-control" placeholder="Enter Length" >
          <h4>Select Quantity</h4>
          <div class="col-sm-4">
          <input type="number" name="myquan" id="myquan" min="0" max="6" step="1"/ >
          </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <div class="col-sm-12">
     <button onclick="addRow();">Submit</button>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
 <!-- Popup End -->


    <!-- Modal -->

 <script>
	$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});


</script>
<script>

$(document).on('change', '#custom-select', function() {
  $('#courier').css('display','block');
});
$("#special_req02").click(function(){
			if ($('input[name="special_req02"]').is(':checked') ) 
									{
										$('input[name="pick_add"]').removeAttr("required");
										$('#card-deck2').hide();	
										$('.pic-add').hide();	
										$('#pick_radd').hide();	
									}
									else
									{
										
										$('#card-deck2').show();
										$('.pic-add').show();
										$('#pick_radd').hide();	
										$('input[name="pick_add"]').attr("required","true");
									}
									
				});


$('input[name="from_radd"]').click(function(){
if ($('input[name="from_radd"]').is(':checked') ) {	
$('#fadd').hide();	
$("#fadd").removeAttr("required");
}else{
	
	$('#fadd').show();

	
}	
});


$('input[name="pick_radd"]').click(function(){
if ($('input[name="pick_radd"]').is(':checked') ) {	
$('input[name="pick_add"]').hide();	
$('input[name="pick_add"]').removeAttr("required");
}else{
	
	$('input[name="pick_add"]').show();
	
	
}	
});

$('input[name="drop_radd"]').click(function(){
if ($('input[name="drop_radd"]').is(':checked') ) {	
$('#dropadd').hide();	
$("#dropadd").removeAttr("required");
}else{
	
	$('#dropadd').show();
	
}	
});

//from Add
$(document).on('dblclick','input[name="from_radd"]',function(){
    if(this.checked){
        $(this).prop('checked', false);
        	$('#fadd').show();
        	$('#fadd').attr("required","true");
    }
});
//Pick Add
$(document).on('dblclick','input[name="pick_radd"]',function(){
    if(this.checked){
        $(this).prop('checked', false);
        		$('input[name="pick_add"]').show();
        		$('input[name="pick_add"]').attr("required","true");
    }
});

//Drop Add
$(document).on('dblclick','input[name="drop_radd"]',function(){
    if(this.checked){
        $(this).prop('checked', false);
        	$('#dropadd').show();
        	$('#dropadd').attr("required","true");
    }
});


</script>
<script>

$(document).on('change', '#custom-select1', function() {

var myselect = $( "#custom-select1 option:selected" ).text();

if(myselect == 'Parcel' )
{

$('#courier').css('display','block');
$('.purpose').css('display','block');

$('.weight').css('display','none');
$('#pay').css('display','none');
}else{
$('.purpose').css('display','none');

$('.weight').css('display','block');
$('#pay').css('display','none');
}
  
});
</script>
<script>
            function addRow()
            {
         
				
				// get input values
                 var width = document.getElementById('width').value;
                 var height = document.getElementById('height').value;
                 var lengths = document.getElementById('lengths').value;
                 var qty = document.getElementById('myquan').value;
				 
				 
				 var courier = document.getElementById('cour_ser').value;
				 
				 var mod = $( "#mode_trans option:selected" ).val();
				 var otype = $( "#ord_type option:selected" ).val();
                  
				 if( width == '' )
				 {
					$('#width').focus();
				 }else if( height == '' )
				 {
					 $('#height').focus();
				 } else if( lengths == '')
				 {
					 $('#lengths').focus();
				 }else if( qty == '' )
				{
					 $('#qty').focus();	 
			    }else{
					 
				 
				  
				  
				  
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(table.rows.length/2+1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                  var cel4 = newRow.insertCell(3);
                  
                  // add values to the cells
                  cel1.innerHTML = width;
                  cel2.innerHTML = height;
                  cel3.innerHTML = lengths;
                  cel4.innerHTML = qty;
				  
				  
				    $.ajax({
							url     : '<?php echo base_url("corporate/corporate/addParcel"); ?>',
							type    : "POST",
							data    : {width:width,height:height,lengths:lengths,qty:qty,courier:courier,mot:mod},
							success :function(data, textStatus, jqXHR) 
							{   
							
							if($.trim(data) != '')
							{
								  $('#width').val('');
								  $('#height').val('');
								  $('#lengths').val('');
								  $('#myquan').val('');
								  $('#exampleModal').modal('hide');
								  //Splitting Data
								  var  mydata = $.trim(data).split('|');
								  var  q = mydata[0];
								  var  vw = mydata[1];
								  
								  $('input[name="t_qty"]').val(q);
								  $('input[name="t_vweight"]').val(vw);
                                   
							   
							}                   
							else{       
								   location.reload();           
								}   
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
							$("#f_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
							}
							});
				  
				  
				  } 
				  
            }

</script>






<script>

function addpadd()
{
	var add = $('#pname').val() +','+ $('#pmobile').val()+','+$('#padd').val()+','+ $("#pcity option:selected").text()+','+$("#pstate option:selected").text()+','+$("#pcountry option:selected").text();
	$('#fadd').val(add);
	$('#exampleModa2').modal("hide");
	
}

function adddrop()
{
	var add = $('#dname').val()+','+ $('#dmobile').val()+','+$('#dadd').val()+','+ $('#dcity option:selected').text()+','+$('#dstate option:selected').text()+','+$('#dcountry option:selected').text();
	$('#dropadd').val(add);
	$('#exampleModa3').modal("hide");
}
</script>

<script>

//Order Type
$(document).on('change', '#ord_type', function() {

var myselect = $( "#ord_type option:selected" ).text();

if( myselect == 'Domestic Courier' )
{

$('#d_mode_trans').css('display','block');
$('#c_mode_trans').css('display','none');
$('#cor_name').text('Select Courior Service');
$('#cour_ser').empty();  
}else if(myselect == 'Cargo Service' ) {
$('#d_mode_trans').css('display','none');

$('#c_mode_trans').css('display','block');
$('#cor_name').text('Select Cargo Service');
$('#cour_ser').empty();  
}
  
});
</script>
<script>
$(document).ready(function(e){
$("#pickup_pincode").change(function()
    {
	
     var pin = $('#pickup_pincode').val();
	 var myselect = $( "#ord_type option:selected" ).text();
	 
	 //alert(myselect);
	 if(myselect == 'Domestic Courier')
     {
		 var otype = 'Courier';
	 }else if(myselect == 'Cargo Service' ) 
	 {
		  var otype = 'Cargo';
	 }
	// alert(otype);
	 
  //  $(".pin_error").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");

    $.ajax(
    {
    url     : '<?php echo base_url("corporate/corporate/pin_search"); ?>',
    type    : "POST",
    data    : {pin:pin,otype:otype},
    success :function(data, textStatus, jqXHR) 
    {     
    if($.trim(data)== 'Pincode Serviceable')
    {    $(".pin_error").html('<p><span class="prettyprint" style="color:#00FF00;">'+data+'</span></p>');

           
    }                   
    else{       
        $(".pin_error").html('<p><span class="prettyprint" style="color:#ff0000;">'+data+'</span></p>');
       	$('#pickup_pincode').val('');         
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $(".pin_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();

    
    });
});
</script>	


<script>
$(document).ready(function(e){
$("#drop_pincode").change(function()
    {
	
     var pin = $('#drop_pincode').val();
	 var myselect = $( "#ord_type option:selected" ).text();
	 
	 //alert(myselect);
	 if(myselect == 'Domestic Courier')
     {
		 var otype = 'Courier';
	 }else if(myselect == 'Cargo Service' ) 
	 {
		  var otype = 'Cargo';
	 }
	// alert(otype);
	 
  //  $(".pin_error").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");

    $.ajax(
    {
    url     : '<?php echo base_url("corporate/corporate/pin_search2"); ?>',
    type    : "POST",
    data    : {pin:pin,otype:otype},
    success :function(data, textStatus, jqXHR) 
    {     
    if($.trim(data) != 'Pincode Not Serviceable')
    {    $('#cour_ser').empty();
		$('#cour_ser').html(data);

         $("#pin_error1").html('<p><span class="prettyprint" style="color:#00FF00;">Pincode Serviceable</span></p>');    
    }                   
    else{       
        $("#pin_error1").html('<p><span class="prettyprint" style="color:#ff0000;">'+data+'</span></p>');             
        $('#cour_ser').empty();  
        $('#drop_pincode').val('');		
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#pin_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();

    
    });
	
	
	$('#pcountry').change(function () {
            var id = $('#pcountry').val();

            var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>corporate/corporate/fetch_states",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {

                        $('#pstate').html(data);
                        $('#pcity').html('<option value="">Select City</option>');
                        
                    },
                });
            }
            else
            {
                $('#pcity').html('<option value="">Select City</option>');
                $('#pstate').html('<option value="">Select City</option>');
            }
        });
		
		$('#pstate').change(function () {
            var id = $('#pstate').val();

            var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>corporate/corporate/fetch_cities",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {

                       
                        $('#pcity').html(data);

                    },
                });
            }
            else
            {
                $('#pcity').html('<option value="">Select City</option>');
            }
        });
				
		
		$('#dcountry').change(function () {
            var id = $('#dcountry').val();

            var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>corporate/corporate/fetch_states",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {

                       
                        $('#dstate').html(data);
                        $('#dcity').html('<option value="">Select City</option>');

                    },
                });
            }
            else
            {
                $('#dstate').html('<option value="">Select City</option>');
                $('#dcity').html('<option value="">Select City</option>');
            }
        });
		
		$('#dstate').change(function () {
            var id = $('#dstate').val();
			 var dataJson = { id: id };

            if (id != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>corporate/corporate/fetch_cities",
                    method: "POST",
                    data: dataJson,
                    success: function (data)
                    {

                        
                        $('#dcity').html(data);

                    },
                });
            }
            else
            {
                $('#dcity').html('<option value="">Select City</option>');
            }
        });
		

		
});
</script>