<?php include('rightMenu.php') ;?>


<div class="container-fluid inner">
	<div class="row">
    	<div class="col-lg-12">
        <a href="<?php echo base_url('/track');  ?>"><button type="button" class="btn btn-success"> <i class="fa fa-truck"></i> Track</button></a>
         <a href="<?php echo base_url('/newOrder');  ?>"><button type="button" class="btn btn-success"><i class="fa fa-gift"></i> Order Now</button></a>
		 <div class="clearfix"></div>
		 <small>This is a normal account. if you want to convert this account as corporate account please contact.+91 9355155655, info@vn24.in</small>
        </div>
		<div class="col-lg-12">
		<div class="container-fluid project">
                            <div class="row">
                            <div class="container">
							
								
                            <div class="col-lg-6 col-lg-offset-3">
                            <div class="col-sm-12">
                           
							<?php if($user['pic']==NULL)
							       {
								   $image= '11.png';
								   }else
								   {
									   $image= $user['pic'];
							        }
							  
							  ?>
                            <img src="<?php echo base_url('uploads/user') ?>/<?= $image ?>" class="img-responsive">
							 
                            </div>
                            <div class="form-group">
                        
                              <div class="col-sm-12">
                              <input type="text"  name="uname" value="<?= $user['name'] ?>" class="form-control" placeholder="John" readonly>
							  <?php echo form_error('name'); ?>
                              </div>
                               
                              <div class="col-sm-12">
                              <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="email" placeholder="john@gmail.com" readonly>
							  <?php echo form_error('email'); ?>
                              </div>
                               
                              <div class="col-sm-12">
                              <input type="text"  name="mobile" value="<?= $user['mobile'] ?>" class="form-control" placeholder="9990182006" readonly>
							  <?php echo form_error('mobile'); ?>
                              </div>
							  
                              
                            </div>
                            </div>
							 
                        </div>
                     </div>
                </div>
		</div>
		<div class="col-lg-12">
		<h3>Orders</h3>
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
                  <th>Status</th>
                 
                </tr>
              </thead>

            </table>

          </div>
		
		
		</div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#reports_data').dataTable({
  
    ajax: {
      url: "<?= base_url('home/datatable_json') ?>",
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
     {
        "targets": 6,
        "name": "pay_status",
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
			hitURL =  "https://www.vn24.in/portal/home/getOid";
			currentRow = $(this);
			
			
var	w       = 1000;
var	h       = 400;
var	l       = (screen.availWidth - w) / 2;
var	t       = (screen.availHeight - h) / 2;

window.open('https://www.vn24.in/portal/home/getOid/'+sid,"window","width= "+ w + ",height=" + h + ",left=" + l + ",top=" + t + ", scrollbars = yes, location = no, toolbar = no, menubar = no, status = no");
        
        
  
		

});
	
	
	
});

</script>