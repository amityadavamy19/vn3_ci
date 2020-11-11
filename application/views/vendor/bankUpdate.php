<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="col-lg-12">
                    <div class="container-fluid new1">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<h2>Update Account</h2>
                               <?php
								 $attr = array('method' => 'post','id'=>'updateAccount');
							      echo form_open_multipart('vendor/vendor/updateAccount',$attr);	  
								  
								  ?>
     <div class="form-group">
         <div class="col-sm-12">
           <input type="text" class="form-control" name="fname" value="<?= $account['name'] ?>" placeholder="ENTER NAME" required>
           </div>
         <div class="col-sm-12">
         <input type="text" class="form-control" name="b_name" value="<?= $account['b_name'] ?>" placeholder="ENTER BANK NAME" required>
          </div>
         <div class="col-sm-12">
           <input type="text" class="form-control" name="ifsc" value="<?= $account['ifsc'] ?>" placeholder="ENTER IFSC CODE "required>
           </div>
            <div class="col-sm-12">
         <input type="text" class="form-control"  name="acc_no" value="<?= $account['acc_no'] ?>" placeholder="ENTER GST NO"required>
         </div>

           <span id="a_error" ></span>
           <div class="col-sm-12 col-xs-12">
           
		    <input type="submit" class="btn btn-primary" id="a_submit1" value="UPDATE">
			<input type="hidden" name="id" value="<?= $account['id'] ?>">
           </div>
 
<?php echo form_close(); ?>
</div>







<script>
$(document).ready(function(){
$("#a_submit1").click(function()
    {
    
    $("#updateAccount").submit(function(e)
    {
    
    $("#a_error").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#a_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#a_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#a_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
	
	
	
	
});
</script>		
		