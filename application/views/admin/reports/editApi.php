<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-key"></i> Api Management
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
                        <h3 class="box-title">Enter Api Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $attributes = array('id' => 'editApi', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/reports/editApi', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">API Key</label>
                                    <input type="text" class="form-control required" value="<?php echo $api[0]->api_key; ?>" id="api_key" name="api_key" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">API Secret</label>
                                    <input type="text" class="form-control required" value="<?php echo $api[0]->api_secret; ?>" id="api_secret" name="api_secret" maxlength="128">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">API Url</label>
                                    <input type="text" class="form-control required" value="<?php echo $api[0]->url; ?>" id="api_url" name="api_url">
                                </div>

                            </div>
                            

                            </div>



                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />

                            <input type="hidden" name="id" value="<?php echo $api[0]->id; ?>" />
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