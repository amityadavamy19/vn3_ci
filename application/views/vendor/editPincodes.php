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
                    <h3>Edit Pincode Service </h3>
                    <div id="myDIV">
                        <div class="form-group">
                            <?php
								 $attr = array('method' =>
                            'post','id'=>'editPincode'); echo form_open_multipart('vendor/vendor/editPincode',$attr); ?>
                            <div class="col-sm-12 col-xs-12">
                                <input type="text" name="pincode" id="pincode" class="form-control" maxlength="6" placeholder="Pincode" required value="<?= $pin['pincode']?>" />
                            </div>
                            
                            <div class="col-sm-12 col-xs-12">
                                <input type="text" name="zone" id="zone" class="form-control" placeholder="Zone Name(Same as Courier Quote)" required value="<?= $pin['zone_name']?>" />
                            </div>
                          
                            <div class="col-sm-12 col-xs-12">
                                <select name="courier_id" class="form-control" required>
                                <?php foreach($couriers as $c ) : ?>
                                <option value="<?= $c->id ?>" <?php if($c->id == $pin['courier_id'] ){echo "Selected";}?>><?= $c->name ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                              
                                <input type="submit" class="btn btn-primary pull-right" value="Submit" name="submit" />
                                <input type="hidden" name="id" value="<?= $pin['id']?>"/>
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

