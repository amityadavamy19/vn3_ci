<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="col-lg-12">
                    <div class="container-fluid new1">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<h2>Update Rider</h2>
                               <?php
								 $attr = array('method' => 'post','id'=>'updateRider');
							      echo form_open_multipart('vendor/vendor/updateRider',$attr);	  
								  
								  ?>
     <div class="form-group">
         <div class="col-sm-12">
           <input type="text" class="form-control" name="fname" value="<?= $rider['fname'] ?>" placeholder="ENTER NAME" required>
           </div>
         <div class="col-sm-12">
         <input type="email" class="form-control" name="email" value="<?= $rider['email'] ?>" placeholder="ENTER EMAIL" required>
          </div>
         <div class="col-sm-12">
           <input type="text" class="form-control" name="mobile" value="<?= $rider['mobile'] ?>" placeholder="ENTER MOBILE "required>
           </div>
            <div class="col-sm-12">
         <input type="text" class="form-control"  name="password" value="<?= $rider['password'] ?>" placeholder="ENTER GST NO"required>
         </div>
<div class="form-group">
    <label for="dl">Driving licence</label>
    <input type="file" class="form-control-file" name='dlicense' id="dlicense">
	<img src="<?php echo base_url('uploads/rider/'.$rider['dlicense']); ?>" class="img-responsive">
	<input type="hidden" name="dlicense" value="<?= $rider['dlicense'] ?>">
  </div>  
         <div class="form-group">
    <label for="aadhar">Aadhar Card</label>
    <input type="file" class="form-control-file" name='aadhar' id="aadhar"> 
	<img src="<?php echo base_url('uploads/rider/'.$rider['aadhar']); ?>" class="img-responsive">
	<input type="hidden" name="aadhar" value="<?= $rider['aadhar'] ?>">
  </div>  
        <div class="form-group">
    <label for="pan">Pancard</label>
    <input type="file" class="form-control-file" name='pan' id="pan">
	<img src="<?php echo base_url('uploads/rider/'.$rider['pan']); ?>" class="img-responsive">
	<input type="hidden" name="pan" value="<?= $rider['pan'] ?>">
	<input type="hidden" name="id" value="<?= $rider['id'] ?>">
	
  </div>  
           <span id="r_error" ></span>
           <div class="col-sm-12 col-xs-12">
           
		    <input type="submit" class="btn btn-primary" id="r_submit1" value="UPDATE">
           </div>
 
<?php echo form_close(); ?>
</div>







<script>
$(document).ready(function(){
$("#r_submit1").click(function()
    {
    
    $("#updateRider").submit(function(e)
    {
    
    $("#r_error").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#r_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#r_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#r_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
	
	
	
	
});
</script>		
		