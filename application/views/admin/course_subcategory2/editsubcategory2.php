<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-list-alt"></i> Course Subcategory2
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
                        <h3 class="box-title">Edit Course Subcategory2</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                      <?php
                          $attributes = array('id' => 'editsubcategory2','method' => 'post','class' => 'form_horizontal');
                          echo form_open_multipart('admin/course_subcategory2/editsubcategory2/', $attributes); 
                      ?>
                    
                  
                        <div class="box-body"> 
                            <div class="row">
                               <div class="col-md-6">
                               <div class="form-group">
                                        <label for="role">Select Course Category</label>
                                        <select class="form-control required" id="role" name="role" onchange="return subcategory(this.value)" required>
                                         
                                            <?php
                                            $subcat = $sub2cat_data['cat_id'] ;
                                            if(!empty($cat_data))
                                            {
                                                foreach ($cat_data as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl['id']; ?>" <?php if($rl['id'] == $subcat) {echo "selected=selected";} ?>><?php echo $rl['cat_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                              
                            <div class="col-md-6">
                               <div class="form-group">
                                        <label for="role">Select Subcatagory</label>
                                        <select class="form-control required" id="ajaxvalue" name="subcatid" required>
                                         
                                           
                                                    <option value="<?php echo $sub2cat_data['subcat_id']; ?>"><?php echo $sub2cat_data['subcat_name']; ?></option>
                                                    
                                        </select>
                                    </div>
                                </div>    </div> 
                        <div class="row">
                           <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="subcat2_name">Course Subcategory2 </label>
                                        <input type="text" class="form-control required" value="<?php echo $sub2cat_data['subcat2_name']; ?>" id="subcat2_name" name="subcat2_name" required>
                                    </div>
                            </div> 

                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="image">Image </label>
                                       <input type="file" class="form-control required " id="image"  name="timage" >
                                         <img src="<?php  echo base_url().'uploads/coursesubcat2/'.$sub2cat_data['image']; ?>" width="100" height="80">
                                    </div>
                            </div> 
                        </div>
                            <div class="row">
                           <div class="col-md-12">
						     <div class="form-group">
                                        <label for="cat_name">Subcategory2 Description</label>
                                        <textarea class="form-control required" id="description" name="description"  required ><?php echo $sub2cat_data['description']; ?></textarea>
                                    </div>
						   </div>
						   </div>
						   
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                             <input type="hidden" name="id" value="<?=$sub2cat_data['id']?>" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
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
function subcategory(catid){
var formData = {catid:catid}; //Array 

$.ajax({
   url : "<?= base_url() ?>admin/course_subcategory2/subcatdata",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#ajaxvalue").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}




</script>

<script type="text/javascript">
		CKEDITOR.replace( 'description' );
	</script>
