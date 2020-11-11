<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Vendors
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/vendors/addVendor"><i class="fa fa-plus"></i> Add Vendor</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vendor List</h3>
                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				  <table id="vendors" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Vendor Code</th>
                        <th>Package</th>
                        <th>Referrer(Sub Admin)</th>
                        
                     
                        <th>GST</th>
						<th>Date created</th>
                       
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){


        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "admin/userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>

<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".deletevendor", function(){
		var vid = $(this).data("vid"),
			hitURL = baseURL + "admin/vendors/deleteVendor/",
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
  var table = $('#vendors').dataTable( { 
		
		ajax: {
            url: "<?=base_url('admin/vendors/datatable_json')?>",
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
        { "targets": 2, "name": "mobile", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "code", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "package", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "agent_id", 'searchable':false, 'orderable':false},
        { "targets": 6, "name": "gst", 'searchable':true, 'orderable':true},
        { "targets": 7, "name": "createdDtm", 'searchable':true, 'orderable':true},

        { "targets": 8, "name": "Action",'searchable':false, 'orderable':false,'width':'150px'}
      ]
    });
  </script>