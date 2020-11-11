<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Category management
            <small>Edit Category</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Category </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <?php
                    $attributes = array('id' => 'editcategory', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/course_category/editcategory/', $attributes);
                    ?>


                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cat_name">Product</label>
                                    <input type="text" class="form-control required" value="<?php echo $user['cat_name']; ?>" id="cat_name" name="cat_name">
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="catlog">cat Logo</label>
                                    <input type="file" class="form-control required" value="<?php echo $user['logo']; ?>" id="catlog" name="catlog">
                                    <img src="<?php echo base_url() . 'uploads/catlogo/' .  $user['logo']; ?>" alt="logo" style="background:black; width:197px;">
                                </div>
                            </div>




                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <input type="hidden" name="id" value="<?= $user['id'] ?>" />
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