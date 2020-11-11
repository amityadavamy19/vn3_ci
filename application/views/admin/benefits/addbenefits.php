<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>Benefits Options
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
                    $attributes = array('id' => 'addbenefits', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/benefits/addbenefits', $attributes);
                    ?>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select Coursecategory</label>
                                    <select class="form-control required" id="role" name="role" onchange="return subcategory(this.value)">
                                        <option>--Select--</option>
                                        <?php
                                        if (!empty($roles)) {
                                            foreach ($roles as $rl) {
                                        ?>
                                                <option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('role')) {
                                                                                            echo "selected=selected";
                                                                                        } ?>><?php echo $rl->cat_name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select subcoursecategory</label>
                                    <select class="form-control required" id="ajaxvalue" name="subcatid" onchange="return subcategory2(this.value)">

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select subcoursecategory2</label>
                                    <select class="form-control required" id="ajaxvalues" name="subcatid2">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Designation</label>
                                    <select class="form-control required" id="roles" name="roles">
                                        <option>--Select--</option>
                                        <?php
                                        if (!empty($roless)) {
                                            foreach ($roless as $rl) {
                                        ?>
                                                <option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('roles')) {
                                                                                            echo "selected=selected";
                                                                                        } ?>><?php echo $rl->designation ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hiring companies</label>
                                    <input type="file" name="companies[]" multiple />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sal_photo">Annual salary photo</label>
                                    <input type="file" class="form-control required" value="<?php echo set_value('title'); ?>" id="sal" name="timage" required>
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>


<script>
    function subcategory(catid) {
        var formData = {
            catid: catid
        }; //Array 

        $.ajax({
            url: "<?= base_url() ?>admin/Benefits/subcatdata",
            type: "POST",
            data: formData,
            success: function(data, textStatus, jqXHR) {
                $("#ajaxvalue").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });

    }
</script>

<script>
    function subcategory2(subcatid) {
        var formData = {
            subcatid: subcatid
        }; //Array 

        $.ajax({
            url: "<?= base_url() ?>admin/Benefits/subcatdata2",
            type: "POST",
            data: formData,
            success: function(data, textStatus, jqXHR) {
                $("#ajaxvalues").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });

    }
</script>