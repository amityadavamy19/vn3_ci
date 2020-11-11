<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="col-lg-12">
                    <div class="container-fluid new1">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<h2>Update Profile</h2>
                               <?php
								 $attr = array('method' => 'post','id'=>'clients');
							      echo form_open_multipart('vendor/vendor/updateClient',$attr);	  
								  
								  ?>
     <div class="form-group">
         <div class="col-sm-12">
           <input type="text" class="form-control" name="cname" value="<?= $user['name'] ?>" placeholder="ENTER NAME">
           </div>
         <div class="col-sm-12">
         <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="ENTER EMAIL" >
          </div>
         <div class="col-sm-12">
           <input type="text" class="form-control" name="mobile" value="<?= $user['mobile'] ?>" placeholder="ENTER MOBILE ">
           </div>
            <div class="col-sm-12">
         <input type="text" class="form-control"  name="gst" value="<?= $user['gst'] ?>" placeholder="ENTER GST NO">
         </div>
<div class="col-sm-12"> 
<p>NORMAL COURIER SERVICE</p>           
<select id="NORMAL" multiple="multiple" name="couriers[]" required>

<?php 
   $cli_c = explode(',',$user['couriers']);
  
 $val= @explode(',',$vendor['couriers']);
  foreach($val as $v)
  {?>
	<option value="<?=$v?>" <?php if( in_array($v,$cli_c) ){echo "selected";}?>> <?= get_curier($v)?></option>
	  
  <?php }
  
  ?>
</select>



</div>
 <div class="col-sm-12"> 
<p>CARGO SERVICE</p>           
<select id="CARGO" multiple="multiple" name="cargo[]" required>
<?php 
$cli_car = explode(',',$user['cargo']);
$cval= @explode(',',$vendor['cargo']);
  foreach($cval as $cv)
  {?>
	  	<option value="<?= $cv ?>" <?php if( in_array($cv,$cli_car) ){echo "selected";}?>><?= get_cargo($cv)?></option>
		
 <?php }
  
  ?>
</select>
</div> 
<div class="col-sm-12">
<div class="bbn">
<span id="c_error" ></span>
<input type="submit" class="btn btn-light" id="c_submit" value="SUBMIT">
<input type="hidden" name="u_id" value="<?= $user['userId'] ?>">
</div>
</div>
</div>
<?php echo form_close(); ?>
</div>

<!--Domestic Quotation--->
<div class="container-fluid new">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
	
	
  
   
    <h2>Domestic QUOTATION (Courier)</h2>
    <div class="row">
	  <?php
	  
		$attr = array('method' => 'post','id'=>'d_quote');
		echo form_open_multipart('vendor/vendor/insertQuote',$attr);	  
								  
		?>
	<select name="courier_id" class="form-control">
<?php  

  $val = @explode(',',$user['couriers']);
  $upload = $this->db->get_where('tbl_couriers_uploadded', array('user_id' =>$user['userId'] ))->row_array();
  $myval = @explode(',',$upload['courier_id']);
 
  foreach($val as $v)
  {?>
     
  
     
     <option value="<?= $v ?>" <?php if(in_array($v, $myval) ){ echo "disabled";} ?> ><?= get_curier($v)?></option>
     
      
 <?php  }
  
  ?>
</select>
    <div class="col-lg-3">
      <h3>ZONE 1</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z1w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5" placeholder ="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6" placeholder="Above 5 kg" required>
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 2</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z2w1" placeholder="upto 500 gm" required>    
     <input  type="text" class="form-control" name="a_z2w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z2w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z2w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z2w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z2w6" placeholder="Above 5 kg" required>
      </div>
     </div>
      <div class="col-lg-3">
      <h3>ZONE 3</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z3w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z3w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z3w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z3w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z3w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z3w6" placeholder="Above 5 kg" required>
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 4</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z4w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z4w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z4w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z4w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z4w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z4w6" placeholder="Above 5 kg" required> 
      </div>
      </div>
    </div>
	<span id="quote_error" ></span>
	<input type="submit" name="quote_submit" class="btn btn-light" id="quote_submit" value="SUBMIT">
	<input type="hidden" name="u_id" value="<?= $user['userId'] ?>">
	<input type="hidden" name="v_code" value="<?= $user['vendor_code'] ?>">

    </div>
	
	<?php echo form_close(); ?>
	
  </div>
</div>

<h2 class="text-center pull-left">Courier Quotation List</h2>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Courier Name</th>
     
     <th scope="col">Action</th>
    </tr>
  </thead>
  
   
  
  
  <?php  
   $upload = $this->db->get_where('tbl_couriers_uploadded', array('user_id' =>$user['userId'] ))->row_array();
  $myval = @explode(',',$upload['courier_id']);
 $this->session->set_userdata('quid',$user['userId']);
  foreach($myval as $v)
  {?>
     <tr>
  
     <td style="color:#000;"><?= get_curier($v)?></td>
     
      <td> <a class="btn btn-sm btn-info" href="<?php echo base_url('vendor/quote/'.$v);?>" title="Edit"><i class="fa fa-pencil"></i></a></td>
 
  </tr>
      
 <?php  } ?>
  
 
 
  
  </table>


<!-- End Domestic quotation-->

<!-- End Domestic Cargo quotation-->

<!--<div class="container-fluid new">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
	
	
  
   
    <h2>Domestic QUOTATION(Cargo)</h2>
    <div class="row">
	  <?php
	  
		$attr = array('method' => 'post','id'=>'d_quote_cargo');
		echo form_open_multipart('vendor/vendor/insertQuote',$attr);	  
								  
		?>
	<select name="cargo_id" class="form-control">
<?php  

  $cval= @explode(',',$user['cargo']);
  foreach($cval as $cv)
  {
	echo '<option value="'.$v.'">'.get_cargo($cv).'</option>';
	  
  }
  
  ?>
</select>
    <div class="col-lg-3">
      <h3>ZONE 1</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z1w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6" placeholder="Above 5 kg" required>
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 2</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z2w1" placeholder="upto 500 gm" required>    
     <input  type="text" class="form-control" name="a_z2w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z2w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z2w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z2w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z2w6" placeholder="Above 5 kg" required>
      </div>
     </div>
      <div class="col-lg-3">
      <h3>ZONE 3</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z3w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z3w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z3w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z3w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z3w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z3w6" placeholder="Above 5 kg" required>
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 4</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z4w1" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z4w2" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z4w3" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z4w4" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z4w5" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z4w6" placeholder="Above 5 kg" required> 
      </div>
      </div>
    </div>
	<span id="cargo_error" ></span>
	<input type="submit" name="submit_cargo" class="btn btn-light" id="submit_cargo" value="SUBMIT">
	<input type="hidden" name="u_id" value="<?= $user['userId'] ?>">
	<input type="hidden" name="v_code" value="<?= $user['vendor_code'] ?>">

    </div>
	
	<?php echo form_close(); ?>
	
  </div>
</div>-->

<div class="container-fluid new">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
		<h2>Upload International Quotation</h2>
      
       <?php 
       $attr = array('method' => 'post','id'=>'int_quote');
       echo form_open_multipart('vendor/vendor/import_csv',$attr);	 ?>
       <label for="courier_id">Select Couriers</label><span style="color: red !important; display: inline; float: none;">*</span> 
       <select name="courier_id" class="form-control" id="courier_id" required>
        <?php  

          $val= @explode(',',$vendor['couriers']);
          foreach($val as $v)
          {
            echo '<option value="'.$v.'">'.get_curier($v).'</option>';
              
          }
          
          ?>
        </select>
       
       		<label for="userfile">Select file</label><span style="color: red !important; display: inline; float: none;">*</span>  
			<input type="file" class="form-control" name="userfile" required id="userfile">
            <input type="hidden" name="vendor_code" value="<?= $vendor['code']; ?>">
            <input type="hidden" name="u_id" value="<?= $user['userId']; ?>">
            
			<input type="submit" name="upload" class="btn btn-light" value="Upload">
            <a href="<?= base_url('uploads/intquote/intquote-sample.csv'); ?>" style="color: red">Download Sample</a>
            <?php echo form_close(); ?>
        
    </div>
   </div>
</div>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12">
		<h2>SEARCH INTERNATIONAL QUOTATION</h2>
       <div class="col-md-6">
                              <?php
								 $attr = array('method' => 'post','id'=>'quote_search');
							      echo form_open_multipart('vendor/vendor/quote_search',$attr);	  
								  
								  ?>
       		<label for="country">Select Courier</label><span style="color: red !important; display: inline; float: none;">*</span>      
          <select id="cou" name="cou" class="form-control">
                <?php foreach( $couriers as $c ): ?>
                
                <option value="<?= $c->id; ?>"> <?= $c->name; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="country">Select Country </label><span style="color: red !important; display: inline; float: none;">*</span>
            <select id="cntry" name="cntry" class="form-control">
                <?php foreach( $AllCountry as $country ): ?>
                
                <option value="<?= $country->name; ?>"> <?= $country->name; ?></option>
                <?php endforeach; ?>
            </select>
            <span id="quote_error1"></span>
            </div>
                   <?php echo form_close(); ?>
        
         <table class="table">
  <thead id="quote_result">
 
    
 </thead>
  </table>
  
  </div>
  </div>




<div class="container-fluid bill">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<h2>BILLING</h2>
<?php
	  
		$attr = array('method' => 'post','id'=>'bill');
		echo form_open_multipart('vendor/vendor/addBill',$attr);	  
								  
		?>
<div class="input-group"> 
<span class="input-group-addon">Client Name</span>           
<input id="Your Name" type="text" class="form-control" name="clit_name"  maxlength="40" placeholder="Client Name" required>
</div>

<!--<div class="input-group"> 
<span class="input-group-addon">Date</span>           
<input id="drop" type="date" class="form-control" name="bill_date" placeholder="Date" required>
</div>-->
<div class="input-group"> 
<span class="input-group-addon">Billing Tenure</span>           
<input id="drop" type="date" class="form-control" name="bill_ten_from" placeholder="Date" required>
<input id="drop" type="date" class="form-control" name="bill_ten_to" placeholder="Date" required>
</div>
<div class="input-group"> 
<span class="input-group-addon">Email Id</span>           
<input id="drop" type="email" class="form-control" name="email" placeholder="Email Id" value="<?= $user['email'] ?>" required  maxlength="100">
</div>
<div class="input-group"> 
<span class="input-group-addon">Invoice Id</span>           
<input id="drop" type="text" class="form-control" name="inv_id" placeholder="Invoice Id" value="<?php echo 'INV'.date('Ymd').(inv_code()+1);?>" required>
</div>
<span id="bill_error" ></span>
<input type="submit" class="btn btn-light" id="bill_submit" value="SEND BILL" required>
<input type="hidden" name="u_id" value="<?= $user['userId'] ?>">
<input type="hidden" name="v_code" value="<?= $user['vendor_code'] ?>">
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</div>
        </div>
    </div>
</div>

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
$("#c_submit").click(function()
    {
    
    $("#clients").submit(function(e)
    {
    
    $("#c_error").html("<img src='http://fiesttech.com/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#c_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#c_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#c_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
	//Quote Submit
	
	
	$("#quote_submit").click(function()
    {
    
    $("#d_quote").submit(function(e)
    {
    
    $("#quote_error").html("<img src='http://fiesttech.com/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#quote_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#quote_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#quote_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
	
	//Cargo Submit
	
	
	$("#submit_cargo").click(function()
    {
    
    $("#d_quote_cargo").submit(function(e)
    {
    
    $("#cargo_error").html("<img src='http://fiesttech.com/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#cargo_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#cargo_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#cargo_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
	
	//Bill Submit
	
	
	$("#bill_submit").click(function()
    {
    
    $("#bill").submit(function(e)
    {
    
    $("#bill_error").html("<img src='http://www.vn24.in/portal/assets/images/loading.gif' alt='Loading'/>");
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
		
        $("#bill_error").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');        
         $('input[type="text"],textarea').val('');
    }                   
    else{       
        $("#bill_error").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">'+data+'</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#bill_error").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
    });
    
    });
	
    
    //Quote Search
    
    $("#cntry").change(function()
    {
    var id = <?php echo $user['userId']; ?>;
    var cou = $('#cou').val();
	var cntry = $('#cntry').val();
   
     //$("#quote_error1").html("<img src='http://localhost/vn24/assets/images/loading.gif' alt='Loading'/>");
    
    $.ajax(
    {
    url     : "<?php echo base_url('vendor/vendor/quote_search/'); ?>",
    type    : "POST",
    data    : {id:id, cntry: cntry, cou: cou},
    success :function(data, textStatus, jqXHR) 
    {     
    if(data)
    {
		$('#quote_result').empty();
		$('#quote_result').append(data);
		
                
        
    }                   
    else{  

        $("#quote_error1").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">No result found, modify search...</span></p>');             
        }   
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    $("#quote_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
    }
    });
     e.preventDefault();    //STOP default action
     e.unbind();
   
    
    });

	
	
});
</script>		
		