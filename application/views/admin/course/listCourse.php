<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Course Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url('admin/course/'); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Course List</h3>
                
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                 <table id="course_data" class="table table-bordered table-striped">
				  <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th class="text-center">Actions</th>
                    </tr>
					  </thead>   
                  
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script>
jQuery(document).ready(function(){
	
	//Gallery Delete
	
	jQuery(document).on("click", ".deleteCourse", function(){
		var cId = $(this).data("cid"),
			hitURL = baseURL + "admin/course/deleteCourse/",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this item ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { cId : cId } 
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
  var table = $('#course_data').dataTable( { 
		//ajax: "<?=base_url('admin/datatable_json')?>",
		ajax: {
            url: "<?=base_url('admin/course/datatable_json')?>",
            type: "GET"
        },
		processing: true,
		serverSide: true, 
		paging: true,
		searching: true,
		ordering: true,
		order: [[0, "asc"]],		
		columns: [
        { "targets": 0, "name": "c_title", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "c_icon_image", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "status", 'searchable':false, 'orderable':true},
        { "targets": 3, "name": "date", 'searchable':false, 'orderable':true},
       
        { "targets": 4, "name": "Action",'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });
  </script>