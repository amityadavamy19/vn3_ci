<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/dist/css/jquery.simple-dtpicker.css" rel="stylesheet" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-tag fa-lg"></i>Coupons
            <small>Add Details</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Details </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <?php
                    $attributes = array('id' => 'addcoupons', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/coupons/addcoupons', $attributes);
                    ?>


                    <div class="box-body">


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coupon">Enter Coupon Code</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('coupon'); ?>" id="coupon" name="coupon" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cimage">Add Campaign Banner</label>
                                    <input type="file" class="form-control required " id="cimage" value="<?php echo set_value('cimage'); ?>" name="cimage" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="actvdate">Start Time</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('actvdate'); ?>" id="actvdate" name="actvdate" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expdate">Close Time</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('expdate'); ?>" id="expdate" name="expdate" required>
                                </div>
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Status</label>
                                    <select class="form-control required" id="status" name="status">

                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


<script type="text/javascript">
    $(function() {
        $('*[name=actvdate]').appendDtpicker();
    });
    $(function() {
        $('*[name=expdate]').appendDtpicker();
    });
</script>
<script>
    $(function() {
        $("#datetimepicker").datetimepicker();
        $("#datetimepicker2").datetimepicker();
    });
</script>