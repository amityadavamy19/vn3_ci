<?php include('rightMenu.php') ;?>
<div class="container-fluid inner">
	<div class="row">
    	<div class="container-fluid earning">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-12">
        
        <h3>Rider Orders</h3>
        
      
        <table class="table" id="pin_data">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Pick Address</th>
      <th scope="col">Pickup Pin</th>
      <th scope="col">Pickup Status</th>
     
      <th scope="col">Assign Date</th>
      
	  
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
  var table = $('#pin_data').dataTable({
  
    ajax: {
      url: "<?= base_url('vendor/vendor/riderOrders_json') ?>",
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
        "name": "pick_address",
        'searchable': true,
        'orderable': true
      },
       {
        "targets": 2,
        "name": "pick_pin",
        'searchable': true,
        'orderable': true
      },
	  {
        "targets": 3,
        "name": "pick_status",
        'searchable': true,
        'orderable': true
      },
	  {
        "targets": 4,
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      
      
      
     
    


    ]
  });
</script>