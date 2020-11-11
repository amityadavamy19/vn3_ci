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
                    <h3>Assign To rider </h3>
                    <div id="myDIV">
                        <div class="form-group">
                            <?php
								 $attr = array('method' =>
                            'post','id'=>'assigntorider'); echo form_open_multipart('vendor/vendor/assigntorider',$attr); ?>
                            <div class="col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="oid" readonly value="<?=$Order['order_id']?>" />
                            </div>
                            
                          
                          
                            <div class="col-sm-12 col-xs-12">
                                <select name="rider_id" class="form-control" required>
                                <?php foreach($AllRiders as $c ) : ?>
                                <option value="<?= $c->id ?>"><?= $c->fname.'('.$c->mobile.')' ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                              
                                <input type="submit" class="btn btn-primary pull-right" value="Submit" name="submit" />
                                <input type="hidden" name="pick_add" value="<?=$Order['pickup_address']?>"/>
                                <input type="hidden" name="pick_pin" value="<?=$Order['pickup_pincode']?>"/>
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

