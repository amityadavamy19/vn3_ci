<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-shopping-cart"></i> Client's Orders
        <small>View Orders</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!--<div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/vendors/addVendor"><i class="fa fa-plus"></i> Add Vendor</a>
                </div>
            </div>-->
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vendor's Client Order List</h3>
                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				  <table id="orders" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>OrderId</th>
                        <th>Amount</th>
                        <th>AWB</th>
                        <th>Qty</th>
                        <th>Courier Service</th>
                        
                     
                        <th>Product Type</th>
						<th>Date</th>
                       
                          <th class="text-center">Actions</th>
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
	
	jQuery(document).on("click", ".deleteorder", function(){
		var vid = $(this).data("vid"),
			hitURL = baseURL + "admin/reports/deleteorder/",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { vid : vid } 
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
  var table = $('#orders').dataTable( { 
		
		ajax: {
            url: "<?php echo base_url().'admin/vendors/order_json/'.$this->uri->segment(4); ?>",
            type: "GET"
        },
		processing: true,
		serverSide: true, 
		paging: true,
		searching: true,
		ordering: true,
		order: [[0, "asc"]],		
		columns: [
        { "targets": 0, "name": "order_id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "amount", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "awb", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "qty", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "courior_service", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "pro_type", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "date", 'searchable':true, 'orderable':true},

        { "targets": 7, "name": "Action",'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });
  </script>