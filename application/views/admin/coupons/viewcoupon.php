<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i>Coupons
      <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12 text-right">
        <div class="form-group">
          <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/coupons/addcoupons"><i class="fa fa-plus"></i> Add New</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Coupons List</h3>
            <!--<div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>-->

          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table id="coupons" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Coupon</th>
                  <th>Campaign Banner</th>
                  <th>Start Time</th>
                  <th>Close Time</th>
                  <th>status</th>



                  <th class="text-center">Actions</th>
                </tr>
              </thead>
            </table>

          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <?php // echo $this->pagination->create_links(); 
            ?>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {


    jQuery('ul.pagination li a').click(function(e) {
      e.preventDefault();
      var link = jQuery(this).get(0).href;
      var value = link.substring(link.lastIndexOf('/') + 1);
      jQuery("#searchList").attr("action", baseURL + "admin/userListing/" + value);
      jQuery("#searchList").submit();
    });
  });
</script>

<script>
  jQuery(document).ready(function() {

    //Gallery Delete

    jQuery(document).on("click", ".deletecoupon", function() {
      var tid = $(this).data("tid"),
        hitURL = baseURL + "admin/coupons/deletecoupons/",
        currentRow = $(this);

      var confirmation = confirm("Are you sure to delete this item ?");

      if (confirmation) {
        jQuery.ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: {
            tid: tid
          }
        }).done(function(data) {
          console.log(data);
          currentRow.parents('tr').remove();
          if (data.status = true) {
            alert("Item successfully deleted");
          } else if (data.status = false) {
            alert("Item deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
      }
    });




  });
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#coupons').dataTable({

    ajax: {
      url: "<?= base_url('admin/coupons/datatable_json') ?>",
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

      {
        "targets": 0,
        "name": "coupon",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "image",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 2,
        "name": "date_created",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 3,
        "name": "date_expired",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 4,
        "name": "status",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 5,
        "name": "Action",
        'searchable': false,
        'orderable': false,
        'width': '100px'
      }
    ]
  });
</script>