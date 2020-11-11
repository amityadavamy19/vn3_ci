<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Trainging Options
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
                          $attributes = array('id' => 'edittrainingoptions','method' => 'post','class' => 'form_horizontal');
                          echo form_open_multipart('admin/trainingoptions/edittrainingoptions/', $attributes); 
                      ?>
                    
                  
                        <div class="box-body"> 
                            <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                        <label for="role">Select Coursecategory</label>
                                        <select class="form-control required" id="role" name="role" onchange="return subcategory(this.value)" required>
                                           
                                            <?php
											
											$subcat = $training_data['cat_id'] ;
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
                                        <label for="role">Select Subcoursecategory</label>
                                        <select class="form-control required" id="ajaxvalue" name="subcatid" onchange="return subcategory2(this.value)">
                                           
                                            <?php
                                            
                                            $subcat = $training_data['subcat_id'] ;
                                            if(!empty($subcat_data))
                                            {
                                                foreach ($subcat_data as $rl)
                                                {
                                                    
                                                    ?>
                                                    <option value="<?php echo $rl['id']; ?>" <?php if($rl['id'] == $subcat) {echo "selected=selected";} ?>><?php echo $rl['subcat_name']; ?></option>
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
                                            
                                            $subcat = $training_data['subcat2_id'] ;
                                            if(!empty($subcat2_data))
                                            {
                                                foreach ($subcat2_data as $rl)
                                                {
                                                    
                                                    ?>
                                                    <option value="<?php echo $rl['id']; ?>" <?php if($rl['id'] == $subcat) {echo "selected=selected";} ?>><?php echo $rl['subcat2_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            
                           
                           <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control required" value="<?php echo $training_data['c_title']; ?>" id="title" name="title">
                                    </div>
                             </div> 
                        </div> 


                          <div class="row">
                        
                             <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control required" value="<?php echo $training_data['c_price']; ?>" id="price" name="price">
                                    </div>
                                </div> 
                            </div>


                                   <div class="row">

                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label for="description">Description</label>
                                         <textarea class="form-control required " 
                                       id="description" name="description" ><?php  echo $training_data['c_description']; ?></textarea>
                                      
                                    </div>
                                </div> 
                            </div>

                                 </div>
                          
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <input type="hidden" value="<?php echo $training_data['id'];?>" name="id"  />
                             
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

<script type="text/javascript">
        CKEDITOR.replace( 'description' );
    </script>


    <script>
function subcategory(catid){
var formData = {catid:catid}; //Array 

$.ajax({
   url : "<?= base_url() ?>admin/trainingoptions/subcatdata",
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

   <script>
function subcategory2(subcatid){
var formData = {subcatid:subcatid}; //Array 

$.ajax({
   url : "<?= base_url() ?>admin/trainingoptions/subcatdata2",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#ajaxvalues").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}




</script>