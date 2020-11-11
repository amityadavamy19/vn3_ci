<?php include('rightMenu.php') ;?>

<div class="container-fluid inner">
    <div class="row">
        <div class="container-fluid updates" id="account">
            <div id="myDIV">
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
           

                <div class="col-lg-6">
                    <h3>Assign Pincode to <?= $courier['name']?></h3>
                    <div id="myDIV">
                        <div class="form-group">
                            <?php
								 $attr = array('method' =>
                            'post','id'=>'editPincode'); echo form_open_multipart('vendor/vendor/updatepincode',$attr); ?>
                            <div class="col-sm-12 col-xs-12">
                                <input type="text" class="form-control"  placeholder="courier" value="<?= $courier['name']?>" readonly />
                            </div>
                            
                            
                            <div class="col-sm-12 col-xs-12">
                                <select name="venser_pincodes[]" class="form-control" multiple>
                                <?php foreach($pincode as $pin): ?>
                                <option value="<?= $pin->id?>"><?= $pin->pincode?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                            

                            <div class="col-sm-12 col-xs-12">
                              
                                <input type="submit" class="btn btn-primary pull-right" value="Submit" name="submit" />
                                <input type="hidden" name="id" value="<?= $courier['id']?>"/>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

          
        </div>
    </div>
</div>

