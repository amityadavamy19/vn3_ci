<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-file"></i> PARTNER REGISTRATION
      <small>View</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12 text-right">
        <div class="form-group">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Partner Registation List</h3>
            <!-- <div class="box-tools">
                        <form action="<?php echo base_url() ?>admin/reports/reportListing/" method="POST" id="searchList">
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
            <table id="reports_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>company Name</th>
                  <th>country</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>skype</th>
                  <th>Company Address</th>
                  <th>Message</th>

                  <th>Created On</th>

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('ul.pagination li a').click(function(e) {
      e.preventDefault();
      var link = jQuery(this).get(0).href;
      var value = link.substring(link.lastIndexOf('/') + 1);
      jQuery("#searchList").attr("action", baseURL + "admin/partners/reportListing/" + value);
      jQuery("#searchList").submit();
    });
  });
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var table = $('#reports_data').dataTable({
    //ajax: "<?= base_url('admin/datatable_json') ?>",
    ajax: {
      url: "<?= base_url('admin/partners/datatable_json') ?>",
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
        "name": "cmp_name",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 1,
        "name": "country",
        'searchable': true,
        'orderable': true
      },

      {
        "targets": 2,
        "name": "email",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 3,
        "name": "phn",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 4,
        "name": "skype",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 5,
        "name": "cmp_address",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 6,
        "name": "messg",
        'searchable': true,
        'orderable': true
      },
      {
        "targets": 7,
        "name": "date",
        'searchable': false,
        'orderable': false
      },


    ]
  });
</script>