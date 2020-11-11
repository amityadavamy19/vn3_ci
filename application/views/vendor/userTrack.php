<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid project5">
    	<div class="row">
        <div class="container">
       
        <div class="col-lg-12">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-lg-4">
   
        <h3>AWB No.</h3> 
       
        </div>
    <?php echo form_open_multipart('home/search_awb', array('id' => 'frm')); ?>
        <div class="col-lg-4">
     
            
          <input type="text" class="form-control" placeholder="AWB" name="awb" autocomplete='true' required>
       
   </div>
   
   <div class="col-lg-1">
	<input type="submit" name="order_submit"  id="order_submit" value="Search" class="btn btn-primary">
	</div>
								
   <div id="error_message" class="col-md-12 col-sm-12" style='margin-top:100px;'></div>
   <?php echo form_close(); ?>
     
        </div>
        </div>
    </div>
 </div>
  </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	
			$("#order_submit").click(function()
			 {
				
				
						$("#frm").submit(function(e)
						{
						$("#error_message").html("<img src='<?=site_url('public/dist/img/loading.gif') ?>'/>");
						var postData = $(this).serializeArray();
						var formURL = $(this).attr("action");
						
						$.ajax(
						{
						url	: formURL,
						type	: "POST",
						data	: postData,
						
						success	:function(data, textStatus, jqXHR) 
						{	
						if($.trim(data)!="")
						{
						$( "#error_message" ).html(data);

					
						}else{
						$("#error_message").html('<p><span class="prettyprint">'+data+'</span></p>');
						}

						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
						$("#error_message").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
						});
						   e.preventDefault();	//STOP default action
						   e.unbind();
						});
			});
			
			
});
</script>