<?php include('rightMenu.php') ;?>
<?php // print_r($data);?>

<div class="container-fluid inner">
<div class="row">
    	<div class="col-lg-12">
        <button type="button" class="btn btn-success"> <i class="fa fa-truck" aria-hidden="true"></i> Track</button>
         <a href="<?php echo base_url('vendor/dashboard');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-tachometer"></i> Dashboard</button></a>
		 <a href="<?php echo base_url('vendor/account');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-money"></i> Bank Account</button>	 </a>
		 <a href="<?php echo base_url('vendor/profile');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-user" ></i> update profile</button></a>
		 <a href="<?php echo base_url('vendor/terms');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-thermometer-quarter"></i> Term</button></a>
		 <a href="<?php echo base_url('vendor/about');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-handshake-o"></i> About us</button></a>
		  <a href="<?php echo base_url('vendor/auth/logout');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</button></a>
        </div>
		<div class="container-fluid bulk">
		<h2>Orders</h2>
		<div class="box-body table-responsive no-padding">
		<div class="row">
            <table id="reports_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>OrderId</th>
                 
                  <th>Awb</th>
                   <th>Amount</th>
                  <th>Drop Address</th>
                  <th>Date</th>
                  <th>Assign Rider</th>
                </tr>
              </thead>

            </table>

          </div>
          </div>
		  
		  
		  <h2>Invoices</h2>
		  <div class="box-body table-responsive no-padding">
            <table id="invoice_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>InvoiceId</th>
                  <th>Amount</th>
                  <th>Client Name</th>
                  <th>Email</th>
                  <th>Bill From</th>
                  <th>Bill To</th>
                  <th>Date</th>
                </tr>
              </thead>

            </table>

          </div>
		  
          </div>
		
<!--<div class="container-fluid bulk">
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
    <h2>BLUK ORDERS</h2>
    <div class="col-lg-12 ">
        <h4>Upload in Bluk</h4>
            <button class="btn"><i class="fa fa-download"></i> Download</button>
             
     <button type="button" class="btn btn-light">UPLOAD</button>
   
        </div>

</div>


</div>
</div>-->
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#reports_data').dataTable({
  
    ajax: {
      url: "<?= base_url('vendor/vendor/datatable_json') ?>",
      type: "GET"
    },
    processing: true,
    serverSide: true,
    paging: true,
    searching: true,
    ordering: true,
    order: [
      [0, "asc"]
    ],
    columns: [{
        "targets": 0,
        "name": "order_id",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "awb",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 2,
        "name": "amount",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 3,
        "name": "drop_address",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 4,
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      
      {
        "targets": 5,
        "name": "Action",
        'searchable': false,
        'orderable': false
      },
      
      


    ]
  });
</script>
<script>
  var table = $('#invoice_data').dataTable({
  
    ajax: {
      url: "<?= base_url('vendor/vendor/invoice_json') ?>",
      type: "GET"
    },
    processing: true,
    serverSide: true,
    paging: true,
    searching: true,
    ordering: true,
    order: [
      [0, "asc"]
    ],
    columns: [{
        "targets": 0,
        "name": "invoice_id",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "bill_amt",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 2,
        "name": "client_name",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 3,
        "name": "email",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 4,
        "name": "bill_ten_from",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 5,
        "name": "bill_ten_to",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 6,
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      
     
      


    ]
  });
</script>

<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".getoid", function(){
		var sid = $(this).data("sid");
			hitURL =  "https://www.vn24.in/portal/vendor/vendor/getOid";
			currentRow = $(this);
			
			
var	w       = 1000;
var	h       = 400;
var	l       = (screen.availWidth - w) / 2;
var	t       = (screen.availHeight - h) / 2;

window.open('https://www.vn24.in/portal/vendor/vendor/getOid/'+sid,"window","width= "+ w + ",height=" + h + ",left=" + l + ",top=" + t + ", scrollbars = yes, location = no, toolbar = no, menubar = no, status = no");
        
        
  
		

});
	
	
	
});

</script>