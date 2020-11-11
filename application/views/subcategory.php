<div class="container-fluid about">
    <div class="row">
        <div class="header" id="myHeader">
            <h2>Product</h2>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid feed">
    <div class="row">
        <div class="container" style="
    margin-right: -34px;
">
            <div class="col-lg-10 col-sm-offset-1">
                   <?php foreach ($cat as $prow) : ?>
                <div class="col-md-3">
                    <a href="<?php echo base_url() . 'pro_cat/'.  $prow->url; ?>">
                        <div class="col-sm-12">
                            <img src="<?php echo base_url() ?>uploads/catlogo/<?php echo $prow->logo; ?>" class="img-responsive" />
                            <h3><?php echo $prow->cat_name; ?></h3>
                        </div>
                    </a>
                </div>

               
<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid food">
    <div class="row">
        <div class="container">
            <h1 class="sec-tit" data-txt="<?php echo $this->uri->segment(3); ?>"><span><?php echo $this->uri->segment(3); ?></span></h1>
            <div class="col-lg-10 col-sm-offset-1">

                <div class="col-lg-10 col-sm-offset-1">
                    <ul>
                        <?php foreach ($allsubcat as $scat) : ?>

                            <li><a href="<?php echo base_url() . 'pro_cat/' . $this->uri->segment(2) . '/' . $scat->url; ?>"><?php echo $scat->subcat_name ?></a> / </li>
                        <?php endforeach; ?>
                </div>


                <div class="col-lg-12">
                    <?php
                    if ($allPro) :

                        foreach ($allPro as $pro) : ?>
                            <div class="col-md-3">
                                <div class="col-sm-12">
                                    <a href="<?php echo base_url() . 'product/' . $pro->url ?>"><img src="<?php echo base_url() ?>uploads/certi/<?php echo $pro->image ?>" class="img-responsive" /></a>
                                </div>
                                <div class="col-sm-12">
                                    <a href="<?php echo base_url() . 'product/' . $pro->url ?>"><?php echo $pro->title ?></a>
                                    <p> <span><?php echo $pro->type ?> | </span> Series</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : echo "<h3>No Products Listed  Currently" ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>