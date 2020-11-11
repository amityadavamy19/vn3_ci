<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Services Page Management
            <small>Edit Services</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-4 pull-right">
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
            <div class="col-md-12">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter  Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $attributes = array('id' => 'editHome', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/home/editHome', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec1_title">Service & Support</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec1_title; ?>" id="sec1_title" name="sec1_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec1_des"><?php echo $allData->sec1_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec1_title">Product Support</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec2_title; ?>" id="sec1_title" name="sec2_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec2_des"><?php echo $allData->sec2_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec1_title">Warranty</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec2_title; ?>" id="sec3_title" name="sec3_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec3_des"><?php echo $allData->sec3_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec1_title">Contact Support Centre</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec4_title; ?>" id="sec4_title" name="sec4_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec4_des"><?php echo $allData->sec4_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec5_title">Solution</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec5_title; ?>" id="sec5_title" name="sec5_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec5_des"><?php echo $allData->sec5_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                        
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sec5_title">FAQ</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->sec6_title; ?>" id="sec6_title" name="sec6_title" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="10" col="8" id="description" class="form-control" name="sec6_des"><?php echo $allData->sec6_des; ?></textarea>

                                </div>
                            </div>

                        </div>
                       
                       
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit" />

                        <input type="hidden" name="id" value="<?php echo $allData->id; ?>" />
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>