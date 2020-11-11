<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>

<div class="container-fluid product">
  <div class="row">
    <div class="header" id="myHeader">
      <h2>Product Deatils</h2>
    </div>
  </div>
</div>


<div class="container-fluid drop">
  <div class="row">
    <div class="container">
      <div class="col-lg-3">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <?php $i = 1; ?>
            <?php foreach ($allCat as $cat) :
            ?>
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $cat->cat_name; ?></a>
                </h4>
              </div>
              <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in">
                <div class="panel-body">
                  <table class="table">
                    <?php $subcat =  $this->db->get_where('tbl_course_subcategory', array('cat_id' => $cat->id))->result();
                    foreach ($subcat as $scat) :
                    ?>
                      <tr>
                        <td><a href="<?php echo base_url() . 'pro_cat/' . $cat->url . '/' . $scat->url; ?>"><?php echo $scat->subcat_name; ?></a></td>
                      </tr> <?php endforeach; ?>

                  </table>
                </div>

              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>


        </div>
      </div>
      <div class="col-lg-9">

        <!-- Nav tabs -->
        <div class="card" style="padding: 8px;">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                <i class="fa fa-home"></i>  <span>Introduction</span></a></li>

            <li role="presentation">
              <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                <i class="fa fa-user"></i>  <span>Features</span></a>
            </li>
            <li role="presentation">
              <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                <i class="fa fa-envelope-o"></i> <span>Specification</span></a></li>

            <li role="presentation">
              <a href="#Application" aria-controls="Application" role="tab" data-toggle="tab">
                <i class="fa fa-cog"></i> <span>Application</span></a></li>

            <li role="presentation">
              <a href="#extra" aria-controls="settings" role="tab" data-toggle="tab">
                <i class="fa fa-plus-square-o"></i> <span>Download</span>
              </a></li>
              
            <li role="presentation">
              <a href="#FAQ" aria-controls="FAQ" role="tab" data-toggle="tab">
                <i class="fa fa-plus-square-o"></i> <span>FAQ</span>
              </a></li>


          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home" style="background-color:#06609300;">

              <?= $proDet['shorttitle'] ?>


              <div class="col-lg-6">
                <img src="<?php echo base_url() ?>uploads/certi/<?= $proDet['image'] ?>" class="img-responsive" />
              </div>
              <div class="col-lg-6">
                <h1><?= $proDet['title'] ?></h1>

                <a href="<?php echo base_url('contact') ?>"><button class="btn-default">Leave Message</button></a>

              </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile"><?= $proDet['description'] ?></div>
            <div role="tabpanel" class="tab-pane" id="messages">
              <?= $proDet['specs'] ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="Application">
              <div class="mans">
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi1'] ?>">

                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165824816.png">
                    <p class="p">Datasheet</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi2'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165800410.png">
                    <p class="p">Quick user guide</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi3'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165744129.png">
                    <p class="p">High-res photo</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi4'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165722691.png">
                    <p class="p">Firmware</p>
                  </a>
                </div>

              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="extra">
              <div class="man">
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi1'] ?>">

                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165824816.png">
                    <p class="p">Datasheet</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi2'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165800410.png">
                    <p class="p">Quick user guide</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi3'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165744129.png">
                    <p class="p">High-res photo</p>
                  </a>
                </div>
                <div class="col-lg-3">
                  <a href="<?php echo base_url() ?>uploads/certi/<?= $proDet['certi4'] ?>">
                    <img src="<?php echo base_url() ?>assets/frontend/img/20190809165722691.png">
                    <p class="p">Firmware</p>
                  </a>
                </div>
                
           

              </div>
            </div>
 <div role="tabpanel" class="tab-pane" id="FAQ">
              <?= $proDet['faq'] ?>
            </div>
          </div>
        </div>

      </div>
    </div>`
  </div>
</div>


<div class="clearfix"></div>