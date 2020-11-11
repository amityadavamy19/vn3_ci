<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> product management
            <small>Edit subCategory</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit subcategory</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <?php
                    $attributes = array('id' => 'editsubcategory', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/course_subcategory/editsubcategory/', $attributes);
                    ?>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select product</label>
                                    <select class="form-control required" id="role" name="role">

                                        <?php

                                        $subcat = $subcat_data['cat_id'];
                                        if (!empty($cat_data)) {
                                            foreach ($cat_data as $rl) {

                                        ?>
                                                <option value="<?php echo $rl['id']; ?>" <?php if ($rl['id'] == $subcat) {
                                                                                                echo "selected=selected";
                                                                                            } ?>><?php echo $rl['cat_name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcat_name">sub product </label>
                                    <input type="text" class="form-control required" value="<?php echo $subcat_data['subcat_name']; ?>" id="subcat_name" name="subcat_name">
                                </div>
                            </div>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="hidden" value="<?php echo $subcat_data['id']; ?>" name="id" />

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