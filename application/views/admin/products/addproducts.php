<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>Products Options
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
                    $attributes = array('id' => 'addproducts', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/products/addproducts', $attributes);
                    ?>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select product</label>
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
                                    <label for="role">Select category</label>
                                    <select class="form-control required" id="ajaxvalue" name="subcatid">

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Type">Type</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('type'); ?>" id="type" name="type" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('price'); ?>" id="price" name="price" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Certi3">product image</label>
                                    <input type="file" class="form-control required " id="Certi3" name="c5image" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shorttitle">Product Overview</label>
                                    <textarea class="form-control required" id="shorttitle" name="shorttitle"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Key Features</label>
                                    <textarea class="form-control required" id="description" name="description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="certi1">Datasheet</label>
                                    <input type="file" class="form-control required " id="certi1" name="c1image" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="c2image">Quick user guide</label>
                                    <input type="file" class="form-control required " id="c2image" name="c2image" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Certi3">High-res </label>
                                    <input type="file" class="form-control required " id="Certi3" name="c3image" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Certi3">High-Firmware</label>
                                    <input type="file" class="form-control required " id="Certi3" name="c4image" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="specs">Specification</label>
                                    <textarea class="form-control required" id="specs" name="specs"></textarea>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="faq">FAQ</label>
                                    <textarea class="form-control required" id="faq" name="faq"></textarea>
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
            url: "<?= base_url() ?>admin/course_subcategory2/subcatdata",
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<!--<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
<script type="text/javascript">
    CKEDITOR.replace('shorttitle');
</script>-->

<script>
    function subcategory(catid) {
        var formData = {
            catid: catid
        }; //Array 

        $.ajax({
            url: "<?= base_url() ?>admin/course_subcategory2/subcatdata",
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