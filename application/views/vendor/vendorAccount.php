<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    <div class="container-fluid purpose">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        
        <div class="col-sm-12 col-xs-12">
        
        <h3>Add Bank Account</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">BANK NAME</th>
      <th scope="col">ACC NO</th>
      <th scope="col">BANK IFSC</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <?php if($allAcc): 

   foreach( $allAcc  as $acc) : 
  ?>
  <tr>
  <td><?= $acc->name ?></td>
  <td><?= $acc->b_name ?></td>
  <td><?= $acc->acc_no ?></td>
  <td><?= $acc->ifsc ?></td>
  <td><a title="Edit/View" class="update btn btn-sm btn-info" href="<?php echo base_url('vendor/account/'.$acc->id) ?>" > <i class="fa fa-pencil-square-o"></i> </a> | <a class="btn btn-sm btn-danger delete_acc" href="#" data-sid="<?= $acc->id ?>" title="Delete"><i class="fa fa-trash"></i></a></td>
 
  </tr>
  <?php endforeach; 
        endif;
  ?>
   
  </table>
  <div class="pull-left">
   <button onclick="myFunction()" type="submit" class="btn btn-default" >ADD ACCOUNT</button>
  </div>
  <div class="container-fluid account" id="account">
  <div class="row">
  <div class="col-lg-10" col-lg-offset-1>
  <div id="myDIV" style="display:none;">
   <div class="form-group">

         <div class="col-sm-12 col-xs-12">
           <input type="text" name="fname" id="fname" class="form-control" placeholder="ENTER NAME" maxlength="40" >
           </div>
           <div class="col-sm-12 col-xs-12">
            <input type="text" name="bname" id="bname" class="form-control" placeholder="ENTER BANK NAME" maxlength="80">
            </div>
            <div class="col-sm-12 col-xs-12">
          <input type="TEXT" name="accn"  id="accn" class="form-control" placeholder="ENTER ACCOUNT NUMBER" maxlength="18" >
          </div>
          <div class="col-sm-12 col-xs-12">
           <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="ENTER IFSC CODE" maxlength="11">
           </div>
           <div class="col-sm-12 col-xs-12">
           <button onclick="addRow();" type="submit" class="btn btn-primary">ADD ACCOUNT</button>
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
    </div>
</div>

   <script>
   function myFunction() 
   {  
   var y = document.getElementById("account"); 
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
                 var bname = document.getElementById('bname').value;
                  var accn = document.getElementById('accn').value;
                   var ifsc = document.getElementById('ifsc').value;
				   
				   
				   if(fname == '')
				   {
				    alert('Enter Name'); 
					return false;
				   }
				  if(bname == '')
				   {
				    alert('Enter Bank Name');
					return false;
				   }
				   if(accn == '')
				   {
				    alert('Enter Account Number');
					return false;
				   }
				   if(ifsc == '')
				   {
				    alert('Enter IFSC Code');
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
                  cel2.innerHTML = bname;
                  cel3.innerHTML = accn;
				   cel4.innerHTML = ifsc;
				   
				   
				    $('input[type="text"]').val('');
					$('.account').css('display','none');
					
					//Ajax
					
					
					$.ajax(
					{
					url     : "<?php echo base_url('vendor/vendor/addAcc');?>",
					type    : "POST",
					data    : {name: fname, bank:bname, acc:accn,ifsc:ifsc},
					success :function(data, textStatus, jqXHR) 
					{       
					if($.trim(data)=="Success")
					{
						 location.reload();       
						 
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
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					}
            }
            
			
        </script>
		<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".delete_acc", function(){
		var sid = $(this).data("sid"),
			hitURL = "<?= base_url('vendor/vendor/deleteAcc/'); ?>",
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
