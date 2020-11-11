<?php include('rightMenu.php') ;?>
<div class="container-fluid inner">
	<div class="row">
    	<div class="container-fluid earning">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-12">
        
        <h3>My Earnings</h3>
        <table class="table" id="ven_data">
  <thead>
    <tr>
      <th scope="col">DATE</th>
      <th scope="col">CLIENT ID</th>
      <th scope="col">ORDER ID</th>
	  <th scope="col">AWB NO</th>
	  <th scope="col">DESTINATION</th>
	  <th scope="col">ALLOWANCE</th>
    </tr>
    

 </thead>
  </table> 
            </div>
        </div>
</div>
    </div>
    </div>
</div>

    </div>


<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#ven_data').dataTable({
  
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
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "user_id",
        'searchable': true,
        'orderable': true
      },

      {
        "targets": 2,
        "name": "order_id",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 3,
        "name": "awb",
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