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
          <input type="text" class="form-control" placeholder="Enter Address" id="padd"  maxlength="100" required>
          </div>
         
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="pstate" class="form-control" required>
          
          <?php foreach( $Allstate as $state ): ?>
          <option value="<?= $state->name; ?>"><?= $state->name; ?></option>
		  <?php endforeach; ?>
          </select>
      
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="pcity" class="form-control" required>
         <?php foreach( $Allcity as $city ): ?>
          <option value="<?= $city->name; ?>"><?= $city->name; ?></option>
		  <?php endforeach; ?>
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
          <input type="text" class="form-control" placeholder="Enter Name" id="dname" maxlength="50">
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Mobile" id="dmobile" maxlength="10">
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Address" id="dadd" maxlength="100">
          </div>
         
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="dstate" class="form-control">
          <?php foreach( $Allstate as $state ): ?>
          <option value="<?= $state->name; ?>"><?= $state->name; ?></option>
		  <?php endforeach; ?>          
		  </select>
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="dcity" class="form-control">
		  <?php foreach( $Allcity as $city ): ?>
          <option value="<?= $city->name; ?>"><?= $city->name; ?></option>
		  <?php endforeach; ?>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Order management
        <small>Add Order</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid project1">
    	<div class="row">
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
		     echo form_open_multipart('admin/reports/addOrder',$attr);
			 
			 ?>
          <div class="form-group">
      <label for="sel1">Select Order Type</label>
      <div class="clearfix"></div>
     <select class="form-control" id="ord_type" name="ord_type">
  <option value="Domestic Courier">Domestic Courier</option>
  <option value="Cargo Service">Cargo Service</option>
  
</select>
  </div>   
        
          </div>
           </div>
          
        <div class="col-sm-12">
            <label>Pickup Address:</label>  
             <a data-toggle="modal" data-target="#exampleModa2" >
			 <input type="text" name="from_add" id="fadd" class="form-control" placeholder="Enter From Address" required></a>
			 <input type="text" name="pick_add" class="form-control" placeholder="Enter Pickup Address" required>
			 <label>Enter Pincode*</label>
			 <input type="text" name="pickup_pincode" id="pickup_pincode" class="form-control" placeholder="Pincode" required>
			 <span class="pin_error"></span>
			 <label>Drop Address:</label>
			 <a data-toggle="modal" data-target="#exampleModa3" ><input type="text"  name="drop_address" id="dropadd" class="form-control" placeholder="Enter Drop Address" required></a>
			 <label>Enter Pincode*</label>
			 <input type="text" name="drop_pincode" id="drop_pincode" class="form-control" placeholder="Pincode" required>
             <span id="pin_error1"></span>
          </div>
		  
		  <div class="col-sm-12">
		<div class="form-group">
				<label for="sel1">Type of Product</label>		
		  <select class="form-control" id="custom-select1" name="pro_type">
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
	 <select class="form-control" name="unit">
				 
			  <option value="gm">GM</option>
			  <option value="kg">KG</option>
			  </select>
	 </div>
	 
	 
	
   </div>
		  
		  
          <div class="race">
           
             <div class="col-sm-12">
           <div class="form-group">
      <label for="sel1" id="cor_name">Select Courier Service</label>
      <div class="clearfix"></div>
		 <select class="form-control" name="courior_service" id="cour_ser" required>
		
	  
	</select>
  </div>
          </div>
          <div class="col-sm-12" id="d_mode_trans">
					<div class="form-group">
				  <label for="sel1">Select Mode of Transfer</label>
				  <div class="clearfix"></div>
				 <select class="form-control" name="d_mode_trans">
			
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
				 <select class="form-control" name="c_mode_trans" >
				 
			  <option value="Surface">Surface(Min 60 kg)</option>
			  <option value="Air">Air</option>
			   
			  </select>
			   </div>
      </div>
	
  
  <input type="submit" name="pay" class="btn btn-info form-control" value="Pay">
  
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
   <button class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Add More</button>
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
          <input type="text" class="form-control" name="amount" placeholder="Enter Item Value" >
          <p>Note :For item with value more than 50k, you need to provide e way bill and invoiuce to the pickup boy</p>
            </div>
   
      
         <div class="center">
		 <input type="submit" name="pay" class="btn btn-primary" value="Pay">
		
         
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
 </div>
  </div>
   <!---COURIER POPUP START-->
<div class="container-fluid same">
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
  <!---COURIER POPUP END-->	
    </div>
</div>
            </div>
            
        </div>    
    </section>
    
</div>

    <!-- Modal -->

    <script>$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});


</script>
<script>

$(document).on('change', '#custom-select', function() {
  $('#courier').css('display','block');
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
}else{
$('.purpose').css('display','none');

$('.weight').css('display','block');
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
							url     : '<?php echo base_url("admin/reports/addParcel"); ?>',
							type    : "POST",
							data    : {width:width,height:height,lengths:lengths,qty:qty},
							success :function(data, textStatus, jqXHR) 
							{     
							if($.trim(data) == 'Success')
							{
								  $('#width').val('');
								  $('#height').val('');
								  $('#lengths').val('');
								  $('#myquan').val('');
								  $('#exampleModal').modal('hide');

							   
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
	var add = $('#pname').val() +','+ $('#pmobile').val()+','+$('#padd').val()+','+ $('#pstate').val()+','+$('#pcity').val();
	$('#fadd').val(add);
	$('#exampleModa2').modal("hide");
	
}

function adddrop()
{
	var add = $('#dname').val()+','+ $('#dmobile').val()+','+$('#dadd').val()+','+ $('#dstate').val()+','+$('#dcity').val();
	$('#dropadd').val(add);
	$('#exampleModa3').modal("hide");
}
</script>



<script>

//Order Type
$(document).on('change', '#ord_type', function() {

var myselect = $( "#ord_type option:selected" ).text();

if(myselect == 'Domestic Courier')
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
    url     : '<?php echo base_url("admin/reports/pin_search"); ?>',
    type    : "POST",
    data    : {pin:pin,otype:otype},
    success :function(data, textStatus, jqXHR) 
    {     
    if($.trim(data) != 'Pincode Not Found')
    {   $('#cour_ser').empty();
		$('#cour_ser').append(data);

       
    }                   
    else{       
        $(".pin_error").html('<p><span class="prettyprint" style="color:#ff0000;">'+data+'</span></p>');
        $('#cour_ser').empty(); 		
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#f_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
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
    url     : '<?php echo base_url("admin/reports/pin_search"); ?>',
    type    : "POST",
    data    : {pin:pin,otype:otype},
    success :function(data, textStatus, jqXHR) 
    {     
    if($.trim(data) != 'Pincode Not Serviceable')
    {   $('#cour_ser').empty();
		$('#cour_ser').append(data);

       
    }                   
    else{       
        $("#pin_error1").html('<p><span class="prettyprint" style="color:#ff0000;">'+data+'</span></p>');
        $('#cour_ser').empty(); 		
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
});
</script>