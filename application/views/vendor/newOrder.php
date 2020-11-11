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
          <input type="text" class="form-control" placeholder="Enter Name" id="pname" required>
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Mobile" id="pmobile" required>
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Address" id="padd" required>
          </div>
         
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="pstate" required>
          <option value="Haryana">Haryana</option>
         </select>
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="pcity" required>
          <option value="Gurugram">Gurugram</option>
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
          <input type="text" class="form-control" placeholder="Enter Name" id="dname">
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Mobile" id="dmobile">
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Address" id="dadd">
          </div>
         
          <div class="col-sm-12">
          <label>Select State</label>
           <select id="dstate">
          <option value="Haryana">Haryana</option>
         </select>
          </div>
   
          <div class="col-sm-12">
		  <label>Select City</label>
          <select id="dcity">
          <option value="Gurugram">Gurugram</option>
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
                <h5>Salact no of order.</h5>
                <form>
				 <select id="no">
				  <option value="volvo">1</option>
				  <option value="saab">2</option>
				  <option value="mercedes">3</option>
				  <option value="audi">4</option>
				  <option value="audi">5</option>	  
				  </select>

<button onclick="myFunction()" type="button" class="btn btn-light">Submit</button>
<h2> OR</h2>
<h4>Upload in Bluk</h4>
<button class="btn-default">Upload</button>
</form>

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
			 <input type="text" name="pickup_pincode" class="form-control" placeholder="Pincode" required>
			 
			 <label>Drop Address:</label>
			 <a data-toggle="modal" data-target="#exampleModa3" ><input type="text"  name="drop_address" id="dropadd" class="form-control" placeholder="Enter Drop Address" required></a>
			 <label>Enter Pincode*</label>
			 <input type="text" name="drop_pincode" class="form-control" placeholder="Pincode" required>
             
          </div>
		  
          
       
          <div class="race">
           
             <div class="col-sm-12">
           <div class="form-group">
      <label for="sel1">Select Courior Service</label>
      <div class="clearfix"></div>
		 <select class="browser-default custom-select" name="courior_service" required>
		 <?php if($couriers): 
				foreach($couriers as $cour):
		 ?>
	  <option value="<?=$cour->name?>" ><?=$cour->name?></option>
	  <?php endforeach; 
			endif;
	  ?>
	  
	</select>
  </div>
          </div>
          <div class="col-sm-12" id="d_mode_trans">
					<div class="form-group">
				  <label for="sel1">Select Mode of Transfer</label>
				  <div class="clearfix"></div>
				 <select class="browser-default custom-select" name="d_mode_trans" >
			
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
				 
			  <option value="Surface">Surface(Min 60 kg)</option>
			  <option value="Air">Air</option>
			   
			  </select>
			   </div>
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
	 
	 
	<input type="submit" name="pay" class="btn btn-default" value="Pay">
   </div>
  <?php form_close(); ?>
  
          </div>
        </div>
        </div>
		
		<div class="col-lg-6">
		<div id="courier" style="display:none">
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
          <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Width">
          </div>
           
          <div class="col-sm-12">
          <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Height">
          </div>
          
          <div class="col-sm-12">
          <input type="text" name="age" id="age" class="form-control" placeholder="Enter Length">
          <h4>Select Quantity</h4>
          <div class="col-sm-4">
          <input type="number" name="quantity" id="quantity" min="0" max="1000" step="1"/>
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
   <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Add More</button>
  </div>
  </div>

       
        <div class="form-group5">
       
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Total Quantity">
          </div>
           
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Total Valumetric Weight">
          </div>
          
          <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Enter Product Weight">
          </div>
         
          <div class="col-sm-12">
          <input type="password" class="form-control"  placeholder="Enter Item Value">
          <p>Note :For item with value more than 50k,you need to provide e way bill and invoiuce to the pickup boy</p>
            </div>
   
      
         <div class="center">
         <button type="button" class="btn btn-primary">SUBMIT</button>
          </div>
        </div>
        </div>
    </div>
 </div>
  </div>
  </div>
		
		</div>
		
		
    </div>
 </div>
  </div>
 
  <script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
  
  

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

if(myselect == 'Domestic Courier' )
{

$('#d_mode_trans').css('display','block');
$('#c_mode_trans').css('display','none');

}else if(myselect == 'Cargo Service' ) {
$('#d_mode_trans').css('display','none');

$('#c_mode_trans').css('display','block');
}
  
});
</script>

