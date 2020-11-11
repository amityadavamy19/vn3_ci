<style>
  .map .col-lg-12 .btn-primary {
    padding: 10px 33px;
    border: none;
    border-radius: inherit;
  }

  .map .col-lg-12 .btn-default {
    padding: 10px 29px;
    border: none;
    border-radius: inherit;
    color: #fff;
    background-color: #000;
  }


  .form .input-group-addon {
    border-radius: 0px;
    background-color: #FFFFFF;
  }

  .form .col-lg-12 .input-group-addon {
    border-radius: 0px;
    background-color: #FFFFFF;
  }

  .form h2 {
    border: 1px solid #999;
    padding: 6px 11px;
    margin-bottom: 0px;
    font-size: 21px;
    margin-top: 0px;
  }

  .modal-title {
    text-align: center;
    font-size: 30px;
  }

  .form .col-lg-4 h3 {
    text-align: justify;
    border: 1px solid#999;
    font-size: 13px;
    margin-left: -31px;
    padding: 9px;
  }

  .table-bordered {
    margin-left: -31px;
  }

  .table>thead>tr>td {
    padding: 5px;
  }
  .map .col-lg-12 .btn-success {
    padding: 10px 33px;
    border: none;
    border-radius: inherit;
  
    margin-left: 40px;
}
</style>



<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.theme.default.min.css">
<script src="<?php echo base_url() ?>assets/frontend/js/owl.carousel.js"></script>
<div class="container-fluid about">
  <div class="row">
    <div class="header" id="myHeader">
      <h2>Solutions</h2>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid abouts">
  <div class="row">

    <div class="col-lg-12">
      <div class="col-lg-6">
        <h1> Solutions<!--<?php echo $allData['sec1_title']; ?>--></h1>
      </div>


      <div class=" col-lg-6">
        <img src="<?php echo base_url() ?>assets/frontend/img/service.png"  class="img-responsive" />
      </div>

    </div>
       

        </div>
    <div class="col-lg-12" style="
    FONT-SIZE: initial;">
      <div class="col-lg-12">
     
     <P>   <?php echo $allData['sec5_des']; ?>
       </p>



      </div>


    </div>
  </div>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/pageable.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/index.js"></script>
<script>
  window.onscroll = function() {
    myFunction()
  };
  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,

      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 1,
          nav: false
        },
        1000: {
          items: 1,
          nav: true,
          loop: false,
          margin: 20
        }
      }
    })
  })
</script>