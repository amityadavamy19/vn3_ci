<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn"></i> Clients Management (Vendors)
        <small>View</small>
      </h1>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Clients(Vendors)</h3>
                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				  <table id="vendors" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
						<th>Email</th>
                       <th>Phone</th>
                       <th>Gst</th>
                       <th>Pan</th>
                       <th>Vendor Code</th>
                       <th>Address</th>
                       <th>Package</th>
                       <th>Package Tenure</th>
                       <th>Sales Code</th>
                       <th>Date</th>
                          
                    </tr>
                    </thead>
					</table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 <?php // echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>


<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".deletesale", function(){
		var pid = $(this).data("pid"),
			hitURL = baseURL + "admin/sales/deleteSale/",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { pid : pid } 
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
  var table = $('#vendors').dataTable( { 
		
		ajax: {
            url: "<?=base_url('admin/account/sale_client/'.$this->uri->segment(4))?>",
            type: "GET"
        },
		processing: true,
		serverSide: true, 
		paging: true,
		searching: true,
		ordering: true,
		order: [[0, "asc"]],		
		columns: [
        { "targets": 0, "name": "name", 'searchable':true, 'orderable':true},
        
        { "targets": 1, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "phone", 'searchable':true, 'orderable':true},
		{ "targets": 3, "name": "gst", 'searchable':true, 'orderable':true},
		{ "targets": 4, "name": "pan", 'searchable':true, 'orderable':true},
		{ "targets": 5, "name": "code", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "address", 'searchable':true, 'orderable':true},
		{ "targets": 7, "name": "package", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "pack_tenure", 'searchable':true, 'orderable':true},
		{ "targets": 9, "name": "sales_code", 'searchable':true, 'orderable':true},
		{ "targets": 10, "name": "createdDtm", 'searchable':false, 'orderable':false},

        
      ]
    });
  </script>