<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Contact Page Management
            <small>Edit Contact</small>
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
                        <h3 class="box-title">Enter Contact Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $attributes = array('id' => 'editContact', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/contact/editContact', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->phone; ?>" id="phone" name="phone" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">phone2</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->mobile; ?>" id="phone2" name="phone2" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->email; ?>" id="email" name="email">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">facebook</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->facebook; ?>" id="facebook" name="facebook">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">instagram</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->instagram; ?>" id="instagram" name="instagram">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">skype</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->skype; ?>" id="skype" name="skype">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->youtube; ?>" id="youtube" name="youtube">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->twitter; ?>" id="twitter" name="twitter">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea rows="20" col="56" id="address" class="form-control" name="address"><?php echo $allData->address; ?></textarea>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="about">About Title </label>
                                    <input type="text" class="form-control required" value="<?php echo $allData->about_title; ?>" id="about_title" name="about_title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control required" value="<?php echo $allData->logo; ?>" id="logo" name="logo">
                                    <img src="<?php echo base_url() . 'uploads/logo/' . $allData->logo; ?>" alt="logo" style="background:black; width:197px;">
                                </div>
                            </div>
                           

                            </div>



                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />

                            <input type="hidden" name="id" value="<?php echo $allData->id; ?>" />
                        </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>
</div>
<script type="text/javascript">
    CKEDITOR.replace('address');
</script>