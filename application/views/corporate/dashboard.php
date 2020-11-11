<?php include('rightMenu.php') ;?>

<div class="container-fluid inner3">
	<div class="row">
    	<div class="col-lg-12">
        <a href="<?php echo base_url('corporate/track');  ?>"><button type="button" class="btn btn-success"> <i class="fa fa-truck"></i> Track</button></a>
         <a href="<?php echo base_url('corporate/newOrder');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-gift"></i> Order NOw</button></a>
		 
        </div>
		<h2>Orders</h2>
		
		
		 <div class="box-body table-responsive no-padding">
            <table id="reports_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>OrderId</th>
                  <th>AWB</th>
                  <th>Pickup Address</th>
                  <th>Drop Address</th>
                  <th>Charges(in INR)</th>
                </tr>
              </thead>

            </table>

          </div>
		  
		  <h2>Invoices</h2>
		  
		  <div class="box-body table-responsive no-padding">
            <table id="invoice_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Invoice Id</th>
                  <th>Vendor Code</th>
                  <th>Client Name</th>
                  <th>Email</th>
                  <th>Bill Amount(in INR)</th>
                  <th>Bill Ten From</th>
                  <th>Bill Ten To</th>
                  <th>Bill Date</th>
                </tr>
              </thead>

            </table>

          </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#reports_data').dataTable({
  
    ajax: {
      url: "<?= base_url('corporate/corporate/datatable_json') ?>",
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
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "order_id",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 2,
        "name": "awb",
        'searchable': true,
        'orderable': true
      },

      {
        "targets": 3,
        "name": "pickup_address",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 4,
        "name": "drop_address",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 5,
        "name": "amount",
        'searchable': true,
        'orderable': true
      },
     
      


    ]
  });
</script>

<script>
  var table = $('#invoice_data').dataTable({
  
    ajax: {
      url: "<?= base_url('corporate/corporate/invoice_json') ?>",
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
        "name": "ven_code",
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
        "name": "bill_amt",
        'searchable': true,
        'orderable': true
      },
	  {
        "targets": 5,
        "name": "bill_ten_from",
        'searchable': true,
        'orderable': true
      },
	  {
        "targets": 6,
        "name": "bill_ten_to",
        'searchable': true,
        'orderable': true
      },
	  {
        "targets": 7,
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
			hitURL =  "https://www.vn24.in/portal/corporate/corporate/getOid/";
			currentRow = $(this);
			
			
var	w       = 1000;
var	h       = 400;
var	l       = (screen.availWidth - w) / 2;
var	t       = (screen.availHeight - h) / 2;

window.open('https://www.vn24.in/portal/corporate/corporate/getOid/'+sid,"window","width= "+ w + ",height=" + h + ",left=" + l + ",top=" + t + ", scrollbars = yes, location = no, toolbar = no, menubar = no, status = no");
        
        
  
		

});
	
	
	
});

</script>