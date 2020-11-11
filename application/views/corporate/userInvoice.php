<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
		<div class="container-fluid page">
    	<div class="row">
        <div class="container">
        <div class="col-lg-12">
			 <div class="box-body table-responsive no-padding">
            <table id="reports_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                 
                  <th>InvoiceId</th>
                  <th>Vendor Code</th>
                  <th>Client Name</th>
                  <th>Email</th>
                 
                  <th>Bill Amount(in INR)</th>
                  <th>Bill From</th>
                  <th>Bill To</th>
                  <th>Bill Generation Date</th>
                </tr>
              </thead>

            </table>

          </div><!-- /.box-body -->
        
        </div>
    </div>
 </div>
  </div>
    </div>
</div>
 
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>

    <!-- Modal -->

    <script>$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});

</script>
<script>

$(document).on('change', '#custom-select', function() {
  $('#courier').css('display','block');
});
</script>
<script>

$(document).on('change', '#custom-select1', function() {

var myselect = $( "#custom-select1 option:selected" ).text();

if(myselect == 'Parcel' )
{

$('#courier').css('display','block');
$('.purpose').css('display','block');
}else{
$('.purpose').css('display','none');
}
  
});
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#reports_data').dataTable({
  
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