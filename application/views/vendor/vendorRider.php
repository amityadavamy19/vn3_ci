<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="container-fluid riders">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-12">
        
        <h3> Riders </h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col"> EMAIL</th>
      <th scope="col">MOBILE</th>
      <th scope="col">PASSWORD</th>
     <th scope="col">Action</th>
    </tr>
  </thead>
   <?php if($allRider): 

   foreach( $allRider  as $ride) : 
  ?>
  <tr>
  <td><?= $ride->fname ?></td>
  <td><?= $ride->email ?></td>
  <td><?= $ride->mobile ?></td>
  <td><?= $ride->password ?></td>
  <td> <a title="Edit/View" class="update btn btn-primary" href="<?php echo base_url('vendor/riders/'.$ride->id) ?>"> <i class="fa fa-pencil-square-o"></i></a> | <a class="btn btn-sm btn-danger delete_rider" href="#" data-sid="<?= $ride->id ?>" title="Delete"><i class="fa fa-trash"></i></a> | <a title="View Orders" class="update btn btn-primary" href="<?php echo base_url('vendor/riderOrders/'.$ride->id) ?>"> <i class="fa fa-eye"></i></a></td>
 
  </tr>
  <?php endforeach; 
        endif;
  ?>
  </table>
  
  <div class="pull-left">
   <button onclick="myFunction()" type="submit" class="btn btn-default" >ADD RIDER</button>
  </div>
  </div>
  </div>
   </div>

</div>
  <div class="container-fluid rider" id="rider">
  
  <div id="myDIV" style="display:none;">
  <div class="row">
  <div class="col-lg-6 col-lg-offset-3">
  
                 <?php
								 $attr = array('method' => 'post','id'=>'ride');
							      echo form_open_multipart('vendor/vendor/addRider',$attr);	  
								  
								  ?>
  

   <div class="form-group">

         <div class="col-sm-12 col-xs-12">
           <input type="text" name="fname" id="fname"  class="form-control" placeholder="ENTER NAME" >
           </div>
           <div class="col-sm-12 col-xs-12">
            <input type="email" name="ename" id="ename" class="form-control" placeholder="ENTER EMAIL">
            </div>
            <div class="col-sm-12 col-xs-12">
          <input type="TEXT" name="mobile"  id="mobile" class="form-control" placeholder="ENTER MOBILE NUMBER" maxlength="10">
          </div>
          <div class="col-sm-12 col-xs-12">
           <input type="password" name="pass" id="pass"   class="form-control" placeholder="ENTER PASSWORD">
           </div>
    </div>
     <div class="form-group">
    <label for="dl">Driving licence</label>
    <input type="file" class="form-control-file" name='dl' id="dl" required>
  </div>  
         <div class="form-group">
    <label for="aadhar">Aadhar Card</label>
    <input type="file" class="form-control-file" name='aadhar' id="aadhar" required> 
  </div>  
        <div class="form-group">
    <label for="pan">Pancard</label>
    <input type="file" class="form-control-file" name='pan' id="pan" required>
  </div>  
           <span id="f_error1" ></span>
           <div class="col-sm-12 col-xs-12">
           
		    <input type="submit" class="btn btn-primary" id="f_submit1" value="ADD RIDER">
           </div>
        </form>
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
   var y = document.getElementById("rider"); 
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
                 var ename = document.getElementById('ename').value;
                  var mobile = document.getElementById('mobile').value;
                   var pass = document.getElementById('pass').value;
				   
				   
				   if(fname == '')
				   {
				    alert('Enter Name'); 
					return false;
				   }
				  if(ename == '')
				   {
				    alert('Enter EMAIL');
					return false;
				   }
				   if(mobile == '')
				   {
				    alert('Enter Mobile Number');
					return false;
				   }
				   if(pass == '')
				   {
				    alert('Enter password');
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
                  var newRow = table.insertRow(table.rows.length/3+1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                   var cel4 = newRow.insertCell(3);
                  // add values to the cells
                  cel1.innerHTML = fname;
                  cel2.innerHTML = ename;
                  cel3.innerHTML = mobile;
				   cel4.innerHTML = pass;
				   
				   
				    $('input[type="text"],input[type="email"],input[type="password"]').val('');
					$('.rider').css('display','none');
					
					
					
					
					
					
					
					
					
					}
            }
            
			
        </script>
		
<script>
$(document).ready(function(){
$("#f_submit1").click(function()
    {
    
    $("#ride").submit(function(e)
    {
    
    $("#f_error1").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");
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
		
		location.reload();
		//addRow();
       // $("#f_error1").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#f_error1").html('<p><span class="prettyprint" style="color:#ff0000;">'+data+'</span></p>');             
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
	
	jQuery(document).on("click", ".delete_rider", function(){
		var sid = $(this).data("sid"),
			hitURL = "<?= base_url('vendor/vendor/deleteRow/'); ?>",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { sid : sid } 
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