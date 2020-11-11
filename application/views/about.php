<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.theme.default.min.css">
<script src="<?php echo base_url() ?>assets/frontend/js/owl.carousel.js"></script>
<div class="container-fluid about">
  <div class="row">
    <div class="header" id="myHeader">
      <h2>About us</h2>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid abouts">
  <div class="row">

    <div class="col-lg-12">
      <div class="col-lg-6">
        <h1><?php echo $about['title']; ?></h1>
      </div>


      <div class=" col-lg-6">
        <img src="<?php echo base_url() ?>assets/frontend/img/about.png" class="img-responsive" />
      </div>

    </div>
    <div class="col-lg-12" style="
    FONT-SIZE: initial;">
      <div class="col-lg-12">
        <p><?php echo $about['description']; ?></p>

      </div>


    </div>
  </div>
</div>



<div class="container-fluid">
  <div class="row">
    <?php $this->load->helper("form"); ?>
    <?php
    $attributes = array('id' => 'f_form1', 'method' => 'post', 'class' => 'form_horizontal');
    echo form_open_multipart('about/message', $attributes);
    ?>
    <div class="container-fluid leave">
      <div class="row">
        <div class="container">
          <h1>Contact us </span></h1>
          <div class="col-lg-12">
            <p>Contact us for more information on Application Consultation, Sample Support, FOB Pricing etc.You will be replied within 8 hours.</p>
            <form action="/action_page.php">
              <div class="form-group col-lg-6 nexus">
                <label for="Comapany">Comapany :</label>
                <input type="text" class="form-control" name="company" id="company" placeholder="Your Company Name" require>
              </div>
              <div class="form-group col-lg-6">
                <label for="name">Name :</label>
                <input type="text" class="form-control" name="fname" id="name" placeholder="Name" require>
              </div>
              <div class="form-group col-lg-6">
                <label for="email">Email :</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" require>
              </div>
              <div class="form-group col-lg-6">
                <label for="Tel">Tel :</label>
                <input type="tel" class="form-control" name="phone" id="tel" placeholder="Your Telephone Number" require>
              </div>
              <div class="form-group col-lg-12">
                <label for="comment">INQUIRY :</label>
                <textarea class="form-control" rows="5" cols="50" id="comment" name="message" placeholder="Please Leave your Message" require></textarea>
              </div>
              <input type="submit" class="btn-default" value="Submit" id="f_submit1" name="submit" />
              <span id="f_error1"></span>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $("#f_submit1").click(function() {

      $("#f_form1").submit(function(e) {

        $("#f_error1").html("<img src='<?php echo base_url() ?>/assets/images/loading.gif' alt='Loading'/>");
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
          url: formURL,
          type: "POST",
          data: postData,
          success: function(data, textStatus, jqXHR) {
            if ($.trim(data) == "Success") {
              $("#f_error1").html('<p><span class="prettyprintS" style="color:#00ff00;"> Successfully submitted. </span></p>');
              $('input[type="text"],textarea').val('');

            } else {
              $("#f_error1").html('<p><span class="prettyprint" style="color:#ff0000;">' + data + '</span></p>');
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $("#f_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus=' + textStatus + ', errorThrown=' + errorThrown + '</code></pre>');
          }
        });
        e.preventDefault(); //STOP default action
        e.unbind();
      });

    });
  });
</script>
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