<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	 <div class="container-fluid project">
                            <div class="row">
                            <div class="container">
							
							 <h3 class="text-center">Payment process</h3>
                            <div class="col-lg-6 col-lg-offset-3">
                            
                            <table class="table table-bordered">
									<thead>
									  <tr>
										<th>SN</th>
										<th>OrderId</th>
										<th>Weight</th>
										<th>Amount (Including 18% GST)</th>
										<th>Courier</th>
										<th>Pickup Address</th>
										<th>Drop Address</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
									  <td>1</td>
										<td><?= $oid?></td>
										<td><?= $payment_info['weight'] ?>gm</td>
										<td><?= $amount/100 ?></td>
										<td><?= $payment_info['courior_service']?></td>
										<td><?= $payment_info['pickup_address']?></td>
										<td><?= $payment_info['drop_address']?></td>
									  </tr>
									  
									</tbody>
							  </table>
							  
                            </div>
							<div class="row">
                                    <div class="col-lg-12 text-right">
                                        <a href="<?php print site_url('payment');?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning"><i class="fa fa-mail-reply"></i> Back</a>
                                        
                            			<button id="rzp-button1" class="btn-primary">Pay Now</button>
                                    </div>
                                </div>   
							
                        </div>
                     </div>
                </div>
        	
    </div>
</div>

<?php
          
               

               $data = [
				"key"               => API_KEY,
				"amount"            => $amount,
				"name"              => $agentInfo['name'],
				"description"       => $itemInfo['description'],
				"image"             =>  $image,
				"prefill"           => [
				"name"              => $agentInfo['name'],
				"email"             => $agentInfo['email'],
				"contact"           => $agentInfo['mobile'],
				],
				"notes"             => [
				"address"           => $itemInfo['address'],
				"merchant_order_id" => $oid,
				],
				"theme"             => [
				"color"             => "#F37254"
				],
				"order_id"          => $_SESSION['razorpay_order_id'],
			];

			
       $json = json_encode($data);

//Setting Verify Url      
$seg = $this->uri->segment(1);
if($seg == 'corporate')
{
	$url= base_url('corporate/verify');
}else{
	
	$url= base_url('verify');
}

?>

<form name='razorpayform' action="<?= $url ?>" method="POST">
     <input type="hidden" name="amount" value="<?php echo $amount;?>">
     <input type="hidden" name="oid"  value="<?php echo $oid;?>">
     <input type="hidden" name="razorpayOrderId" id="razorpayOrderId" value="<?php echo $razorpayOrderId;?>">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>    

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
