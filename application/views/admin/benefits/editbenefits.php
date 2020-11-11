<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
function deletedata(table,colname,id)
{
    
if(confirm(table,colname,id))
{
document.getElementById("tr"+id).style.display = "none";

if (table=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","<?php echo base_url() ?>admin/benefits/delete?table="+table+"&idcolom="+colname+"&id="+id,true);
  xmlhttp.send();  
}
else{
return false;
}
}
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Benefits Options
            <small>Edit Details</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <?php
                    $attributes = array('id' => 'editbenefits', 'method' => 'post', 'class' => 'form_horizontal');
                    echo form_open_multipart('admin/benefits/editbenefits/', $attributes);
                    ?>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Select Coursecategory</label>
                                    <select class="form-control required" id="role" name="role" onchange="return subcategory(this.value)" required>

                                        <?php

                                        $subcat = $training_data['cat_id'];
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
                                    <label for="role">Select Subcoursecategory</label>
                                    <select class="form-control required" id="ajaxvalue" name="subcatid" onchange="return subcategory2(this.value)">

                                        <?php

                                        $subcat = $training_data['subcat_id'];
                                        if (!empty($subcat_data)) {
                                            foreach ($subcat_data as $rl) {

                                        ?>
                                                <option value="<?php echo $rl['id']; ?>" <?php if ($rl['id'] == $subcat) {
                                                                                                echo "selected=selected";
                                                                                            } ?>><?php echo $rl['subcat_name']; ?></option>
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
                                    <label for="role">Select Subcoursecategory2</label>
                                    <select class="form-control required" id="ajaxvalues" name="subcatid2">

                                        <?php

                                        $subcat = $training_data['subcat2_id'];
                                        if (!empty($subcat2_data)) {
                                            foreach ($subcat2_data as $rl) {

                                        ?>
                                                <option value="<?php echo $rl['id']; ?>" <?php if ($rl['id'] == $subcat) {
                                                                                                echo "selected=selected";
                                                                                            } ?>><?php echo $rl['subcat2_name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Designation</label>
                                    <select class="form-control required" id="roles" name="roles" " required>

                                        <?php

                                        $subcat5 = $training_data['designation_id'];
                                        if (!empty($designation)) {
                                            foreach ($designation as $rl) {

                                        ?>
                                                <option value=" <?php echo $rl['id']; ?>" <?php if ($rl['id'] == $subcat5) {
                                                                                                echo "selected=selected";
                                                                                            } ?>><?php echo $rl['designation']; ?></option>
                                <?php
                                            }
                                        }
                                ?>
                                    </select>
                                </div>
                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hiring companies</label>
                                        <input type="file" name="companies[]" multiple />
                                        <?php foreach ($training_data as $img) : ?>
                                         <div class="form-group" id="tr<?= $img['img_id']?>">
                                            <img src="<?php echo base_url() . 'uploads/Hiring Companies/' . $img['c_image']; ?>" width="100" height="80"> <a class="delete" onclick="deletedata('tbl_benefit_img','id','<?= $img['img_id']?>')" ><i class="fa fa-trash"></i></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sal_photo">Annual salary photo</label>
                                        <input type="file" class="form-control required" value="<?php echo set_value('title'); ?>" id="sal" name="timage" >
                                        <img src="<?php echo base_url() . 'uploads/salary/' . $training_data[0]['sal_image']; ?>" width="100" height="80">
                                    </div>
                                </div>



                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <input type="hidden" value="<?php echo $training_data[0]['id']; ?>" name="id" />

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



<script>
    function subcategory(catid) {
        var formData = {
            catid: catid
        }; //Array 

        $.ajax({
            url: "<?= base_url() ?>admin/benefits/subcatdata",
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
            url: "<?= base_url() ?>admin/benefits/subcatdata2",
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