<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid clients">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-12 col-xs-12">
        <h3>Clients List</h3>
        <table class="table">
  <thead>
  <tr>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">MOBILE</th>
      <th scope="col">PASSWORD</th>
      
     <th scope="col">GST NO</th>
     <th scope="col">NORMAL COURIER</th>
     <th scope="col">CARGO</th>
	 <th scope="col">Action</th>
    </tr>
     <?php if($allClients): 

   foreach( $allClients  as $client ) : 
  ?>
  <tr>
  <td><a href="<?= base_url('vendor/clients/'.$client->userId) ?>"><?= $client->name ?></a></td>
  <td><?= $client->email ?></td>
  <td><?= $client->mobile ?></td>
  <td><?= $client->plain_pass ?></td>
  <td><?= $client->gst ?></td>
  <td><?php $val= @explode(',',$client->couriers);
  foreach($val as $v)
  {
	 echo get_curier($v).',';
	  
  }
  
  ?></td>
  
  <td><?php $cval= @explode(',',$client->cargo);
  foreach($cval as $cv)
  {
	 echo get_cargo($cv).',';
	  
  }
  
  ?></td>
<td><a class="btn btn-sm btn-danger delete_client" href="#" data-cid="<?= $client->userId ?>" title="Delete"><i class="fa fa-trash"></i></a></td>
 
  </tr>
  <?php endforeach; 
        endif;
  ?>
  </thead>
  </table>
  </div>
  
  <div class="pull-left">
   <button onclick="myFunction()" type="submit" class="btn btn-default" >ADD CLIENT</button>
  </div>
  </div>
  </div>
  <div id="client">
  <div id="myDIV" style="display:none;">
 <div class="row">
 <div class="col-lg-6 col-lg-offset-3">
 

                 <?php
								 $attr = array('method' => 'post','id'=>'clients');
							      echo form_open_multipart('vendor/vendor/addClient',$attr);	  
								  
								  ?>
       <div class="form-group">
         <div class="col-sm-12 class=col-xs-12">
           <input type="text" name="fname" id="fname" class="form-control" placeholder="ENTER NAME" required>
           </div>
         <div class="col-sm-12 col-xs-12">
         <input type="email" name="email" id="email" class="form-control" placeholder="ENTER EMAIL" required>
          </div>
         <div class="col-sm-12 col-xs-12">
           <input type="text" name="mobile" id="mobile" class="form-control" placeholder="ENTER MOBILE " maxlength="10" required>
           </div>
           <div class="col-lg-12 col-xs-12">
           <input type="password" name="pass" id="pass" class="form-control" placeholder="ENTER PASSWORD" required>
            </div>
         <div class="col-sm-12 col-xs-12">
         <input type="text" name="gst" id="gst" class="form-control" placeholder="ENTER GST NO" maxlength="15" required>
         </div>
         
          
             <div class="col-sm-12 col-xs-12"> 
              <p>NORMAL COURIER SERVICE</p>           
<select name="courier[]" id="NORMAL" multiple="multiple" required>
<?php foreach( $couriers as $cour ): ?>

<option value="<?= $cour->id?>"><?= $cour->name?></option>
<?php endforeach; ?>


</select>
</div>
 <div class="col-sm-12 col-xs-12"> 
              <p>CARGO SERVICE</p>           
<select name="cargo[]" id="CARGO" multiple="multiple" required>
<?php foreach( $Allcargo as $cargo ): ?>

<option value="<?= $cargo->id?>"><?= $cargo->name?></option>
<?php endforeach; ?>
</select>
</div> 
<span id="f_error1" ></span>
      <div class="col-sm-12 col-xs-12 col-xs-12">
	  <input type="submit" class="btn btn-primary" id="f_submit1" value="ADD clients">
	  <input type="hidden" name="code" value="<?=$this->session->userdata('code')?>">
           
           </div>
      <?php echo form_close(); ?>
          </div>
      
        
      </div>
 </div>
 
  </div>
  </div>
  
        </div>

    </div>
    </div>
</div>

 <script>
   function myFunction() 
   {  
   var y = document.getElementById("client"); 
   var x = document.getElementById("myDIV"); 
   
   
   
   if (x.style.display === "none" || y.style.display=="none") 
   {    x.style.display = "block"; 
        y.style.display="block";
     } 
   else {    
   
   x.style.display = "none";  
   y.style.display="none";
   }
   }
   
   </script>
   
   
   
   
    <script>$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>
<script>
            
            function addRow()
            {
			   
                // get input values
                var fname = document.getElementById('fname').value;
                 var email = document.getElementById('email').value;
                  var mobile = document.getElementById('mobile').value;
                   var pass = document.getElementById('pass').value;
				    var gst = document.getElementById('gst').value;
					

				   var NORMAL = document.getElementById('NORMAL').value;
				   var CARGO = document.getElementById('CARGO').value;
				   
				   
				   if(fname == '')
				   {
				    alert('Enter Name'); 
					return false;
				   }
				  if(email == '')
				   {
				    alert('Enter email');
					return false;
				   }
				   if(mobile == '')
				   {
				    alert('Enter mobile Number');
					return false;
				   }
				   if(pass == '')
				   {
				    alert('Enter password');
					return false;
				   }
				   if(gst== '')
				   {
					alert('enter gst');
					return false;
				   }
				   if(NORMAL== '')
				   {
					alert('please fill');
					return false;
				   }
				   if(CARGO== '')
				   {
					alert('please fill');
					return false;
				   }else{
				   //return true;
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(table.rows.length/6+1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                   var cel4 = newRow.insertCell(3);
                   var cel5 = newRow.insertCell(4);
				   var cel6 = newRow.insertCell(5);
				   var cel7 = newRow.insertCell(6);
				     var cel8 = newRow.insertCell(7);
				  // add values to the cells
                  cel1.innerHTML = fname;
                  cel2.innerHTML = email;
                  cel3.innerHTML = mobile;
				   cel4.innerHTML = pass;
				    cel5.innerHTML = gst;
				    cel6.innerHTML = NORMAL;
					 cel7.innerHTML = CARGO;
					  
				   
				    $('input[type="text"], input[type="email"],input[type="password"]').val('');
					$('.account').css('display','none');
					
					}
            }
          </script>
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
<script>
$(document).ready(function(){
$("#f_submit1").click(function()
    {
    
    $("#clients").submit(function(e)
    {
    
    $("#f_error1").html("<img src='https://vn24.in/portal/assets/images/loading.gif' alt='Loading'/>");
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
    url     : formURL,
    type    : "POST",
    data    : new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
    success :function(data, textStatus, jqXHR) 
    {     

    if($.trim(data)=="Success")
    {
		
		addRow();
		location.reload();
       // $("#f_error1").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#f_error1").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
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
});
</script>	
<script>
jQuery(document).ready(function(){
	
	//rider Delete
	
	jQuery(document).on("click", ".delete_client", function(){
		var cid = $(this).data("cid"),
			hitURL = "<?= base_url('vendor/vendor/deleteClient/'); ?>",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { cid : cid } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Item successfully deleted"); }
				else if(data.status = false) { alert("Item deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	
	
	
});

</script>		
		