<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-file"></i> Sales Account
      <small>View</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
           
        </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sales Account List</h3>
            
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table id="order_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                 <th>Action</th>

                </tr>
              </thead>

            </table>

          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <?php //echo $this->pagination->create_links(); 
            ?>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>
<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".deleteorder", function(){
		var oid = $(this).data("oid"),
			hitURL = baseURL + "admin/reports/deleteorder/",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { oid : oid } 
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
  var table = $('#order_data').dataTable({
    
    ajax: {
      url: "<?= base_url('admin/account/datatable_json') ?>",
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
    columns: [ 
        { "targets": 0, "name": "name", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "mobile", 'searchable':true, 'orderable':true},
         { "targets": 3, "name": "Action",'searchable':false, 'orderable':false,'width':'100px'},
       
       

    ]
  });
</script>