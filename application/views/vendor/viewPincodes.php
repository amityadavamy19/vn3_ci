<?php include('rightMenu.php') ;?>
<div class="container-fluid inner">
	<div class="row">
    	<div class="container-fluid earning">
    	<div class="row">
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-12">
        
        <h3>Serviceable Pincodes</h3>
        
        <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor/pincode/add"><i class="fa fa-plus"></i> Add Pincode</a>
                </div>
            </div>
        <table class="table" id="pin_data">
  <thead>
    <tr>
      <th scope="col">Pincode</th>
      <th scope="col">Zone Name</th>
      <th scope="col">Date</th>
	  
	  <th scope="col">Action</th>
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
<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".deleteorder", function(){
		var oid = $(this).data("oid"),
             baseURL ="<?php echo base_url(); ?>";
			hitURL = baseURL + "vendor/vendor/deletePin/",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { pin : oid } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Item successfully deleted"); }
				else if(data.status = false) { alert("Item deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	
	
	
});

</script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#pin_data').dataTable({
  
    ajax: {
      url: "<?= base_url('vendor/vendor/pincode_json') ?>",
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
        "name": "pincode",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "zone_name",
        'searchable': true,
        'orderable': true
      },

      {
        "targets": 2,
        "name": "date",
        'searchable': true,
        'orderable': true
      },
      
     
     {
        "targets": 3,
        "name": "Action",
        'searchable': false,
        'orderable': false
      },
      


    ]
  });
</script>