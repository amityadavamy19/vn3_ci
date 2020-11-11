<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="col-lg-12">
<div class="container-fluid new">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
	
	
  
   
    <h2>Domestic QUOTATION (Update)</h2>
    <div class="row">
	  <?php
	  
		$attr = array('method' => 'post','id'=>'updateQuote');
		echo form_open_multipart('vendor/vendor/updateQuote',$attr);	  
								  
		?>
        <?php 
        //print "<pre>";
        //print_r($quotation[0]); ?>
	    <div class="col-lg-3">
      <h3>ZONE 1</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1[]" value="<?= $quotation[0]->air_upto500 ?>" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z1w2[]" value="<?= $quotation[0]->air_abv500 ?>" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3[]" value="<?= $quotation[0]->air_upto3 ?>" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4[]" value="<?= $quotation[0]->air_upto10 ?>" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5[]" value="<?= $quotation[0]->air_abv10 ?>" placeholder ="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6[]" value="<?= $quotation[0]->sur_5kg ?>" placeholder="Above 5 kg" required>
      <input type="hidden" name="id[]" value="<?php echo $quotation[0]->id; ?>">
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 2</h3>
      <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1[]" value="<?= $quotation[1]->air_upto500 ?>" placeholder="upto 500 gm" required>    
     <input  type="text" class="form-control" name="a_z1w2[]" value="<?= $quotation[1]->air_abv500 ?>" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3[]" value="<?= $quotation[1]->air_upto3 ?>" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4[]" value="<?= $quotation[1]->air_upto10 ?>" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5[]" value="<?= $quotation[1]->air_abv10 ?>" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6[]" value="<?= $quotation[1]->sur_5kg ?>" placeholder="Above 5 kg" required>
      <input type="hidden" name="id[]" value="<?php echo $quotation[1]->id; ?>">
      </div>
     </div>
      <div class="col-lg-3">
      <h3>ZONE 3</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1[]" value="<?= $quotation[2]->air_upto500 ?>" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z1w2[]" value="<?= $quotation[2]->air_abv500 ?>" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3[]" value="<?= $quotation[2]->air_upto3 ?>" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4[]" value="<?= $quotation[2]->air_upto10 ?>" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5[]" value="<?= $quotation[2]->air_abv10 ?>" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6[]" value="<?= $quotation[2]->sur_5kg ?>" placeholder="Above 5 kg" required>
      <input type="hidden" name="id[]" value="<?php echo $quotation[2]->id; ?>">
      </div>
      </div>
      <div class="col-lg-3">
      <h3>ZONE 4</h3>
       <h4>Through Air</h4>
      <div class="input-group"> 
     <input  type="text" class="form-control" name="a_z1w1[]" value="<?= $quotation[3]->air_upto500 ?>" placeholder="upto 500 gm" required> <br>    
     <input  type="text" class="form-control" name="a_z1w2[]" value="<?= $quotation[3]->air_abv500 ?>" placeholder="above 500 gm" required>
     <input  type="text" class="form-control" name="a_z1w3[]" value="<?= $quotation[3]->air_upto3 ?>" placeholder="upto 3 kg" required>
     <input  type="text" class="form-control" name="a_z1w4[]" value="<?= $quotation[3]->air_upto10 ?>" placeholder="upto 10 kg" required>
     <input  type="text" class="form-control" name="a_z1w5[]" value="<?= $quotation[3]->air_abv10 ?>" placeholder="above 10 kg" required>
     <h4>Through surface</h4>
      <input  type="text" class="form-control" name="a_z1w6[]" value="<?= $quotation[3]->sur_5kg ?>" placeholder="Above 5 kg" required> 
      <input type="hidden" name="id[]" value="<?php echo $quotation[3]->id; ?>">
      </div>
      </div>
    </div>
	<span id="quote_error" ></span>
	<input type="submit" name="updatequote_submit" class="btn btn-light" id="updatequote_submit" value="SUBMIT">
	<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('quid'); ?>">
	
    </div>
	
	<?php echo form_close(); ?>
	
  </div>
</div>
</div>
</div>
</div>