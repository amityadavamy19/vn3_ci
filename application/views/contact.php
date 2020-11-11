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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="
    width: 790px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RMA: Request </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <?php $this->load->helper("form"); ?>
      <?php
      $attributes = array('id' => 'f_form11', 'method' => 'post', 'class' => 'form_horizontal');
      echo form_open_multipart('contact/request', $attributes);
      ?>
      <form action="/action_page.php">
        <div class="modal-body">
          <div class="container-fluid form">
            <div class="row">
              <div class="col-lg-12">

                <div class="col-lg-8">
                  <h2><u>ADDMISTRATION:</u></h2>
                  <h2 style="text-align: center;">custumer informatiom</h2>


                  <div class="input-group">
                    <span class="input-group-addon">Customer:</span>
                    <input id="customer" type="text" class="form-control" name="Customer" placeholder="" style="border-radius: inherit;" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Contact Person:</span>
                    <input id="Contact Person" type="tel" class="form-control" name="Contact" placeholder="" style="border-radius: inherit; " required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Tel.:</span>
                    <input id="Tel." type="text" class="form-control" name="tel" placeholder="" style="border-radius: inherit;" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">ModNo:</span>
                    <input id="ModNo" type="text" class="form-control" name="ModNo" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">S/N:</span>
                    <input id="S/N" type="text" class="form-control" name="sn" placeholder="" style="border-radius: inherit;" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Shipping Address:</span>
                    <input id="Shipping Address" type="text" class="form-control" name="Shipping" placeholder="" style="border-radius: inherit;" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Invoice #</span>
                    <input id="Invoice" type="text" class="form-control" name="Invoice" placeholder="" style="border-radius: inherit;" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">E-Mail:</span>
                    <input id="E-Mail" type="email" class="form-control" name="email" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Filled by:</span>
                    <input id="Filled by" type="text" class="form-control" name="Filled" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Quantity:</span>
                    <input id="Quantity" type="text" class="form-control" name="Quantity" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Agreement #</span>
                    <input id="Agreement " type="text" class="form-control" name="Agreement" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Title:</span>
                    <input id="Title" type="text" class="form-control" name="Title" placeholder="" style="border-radius: inherit;" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Tel.</span>
                    <input id="Titl" type="tel" class="form-control" name="tele" placeholder="" style="border-radius: inherit;" required>
                  </div>

                </div>
                <div class="col-lg-4">


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td colspan="4">This area to be filled by Techroutes</td>
                      </tr>
                      <tr>
                        <td scope="col">RMA #:</td>
                        <td colspan="3"> <input id="RMA " type="text" class="form-control" name="RMA" placeholder="" style="border: none;box-shadow: none;" required> </td>
                      </tr>
                      <tr>
                        <th scope="col">Priority:</th>
                        <th scope="col">3wd</th>
                        <th scope="col">7wd</th>
                        <th scope="col">14wd</th>
                      </tr>
                      <tr>
                        <td scope="col">Acc. Mngr./SM:</td>
                        <td colspan="3"> <input id="Acc. Mngr." type="text" class="form-control" name="SM" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">RR. No.:</td>
                        <td colspan="3"> <input id="RR. No." type="text" class="form-control" name="RR" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">Cust. P.O.:</td>
                        <td colspan="3"> <input id="Cust. P.O." type="text" class="form-control" name="Cust" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">Date RMA Opened:</td>
                        <td colspan="3"> <input id="Date RMA Opened" type="date" class="form-control" name="Opened" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">Date RMA Shipped:</td>
                        <td colspan="3"> <input id="Date RMA Shipped" type="date" class="form-control" name="Shipped" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">Eng, in Charge:</td>
                        <td colspan="3"> <input id="Eng, in Charge" type="text" class="form-control" name="Charge" placeholder="" style="border: none;box-shadow: none;"></td>
                      </tr>
                      <tr>
                        <td scope="col">AWB #:</td>
                        <td colspan="3"> <input id="AWB #" type="text" class="form-control" name="AWB" placeholder="" style="border: none;box-shadow: none;"> </td>
                      </tr>
                      <tr>
                        <td scope="col">Product Cat. #:</td>
                        <td colspan="3"> <input id="Product Cat. #" type="text" class="form-control" name="Product" placeholder="" style="border: none;box-shadow: none;"></td>
                      </tr>
                    </thead>
                  </table>

                </div>
              </div>
              <div class="col-lg-12">
                <h4><b>If a problem is reported to Techroutes Support Centre about this product </b></h4>
                <div class="input-group">
                  <span class="input-group-addon">Trouble Ticket Number </span>
                  <input id="TTN" type="text" class="form-control" name="Ticket" placeholder="TTN#_________" style="border-radius: inherit;" required>
                </div>
                <h5>Please describe the failure and mark the applicable mode box/boxes. Wherever applicable, please detail test/use conditions, environmental conditions, etc.</h5>
                <div class="input-group">
                  <span class="input-group-addon">Physical Damage </span>
                  <input id="Physical Damage " type="text" class="form-control" name="Physical" placeholder="" style="border-radius: inherit;" required>
                </div>

                <div class="input-group">
                  <span class="input-group-addon">Power Status</span>
                  <input id="Power Status" type="text" class="form-control" name="Power" placeholder="" style="border-radius: inherit;" required>
                </div>

                <div class="input-group">
                  <span class="input-group-addon">Console </span>
                  <input id="Console " type="text" class="form-control" name="Console" placeholder="" style="border-radius: inherit;" required>
                </div>

                <div class="input-group">
                  <span class="input-group-addon">Serial port (if any)</span>
                  <input id="Serial port" type="text" class="form-control" name="Serial" placeholder="" style="border-radius: inherit;" required>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Ethernet Port (if any)</span>
                  <input id="Ethernet Port" type="text" class="form-control" name="Ethernet" placeholder="" style="border-radius: inherit;" required>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Operating System (F/w)</span>
                  <input id="Operating System" type="text" class="form-control" name="Operating" placeholder="" style="border-radius: inherit;" required>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Other Problems if any </span>
                  <input id="Other Problems if any " type="text" class="form-control" name="Problems" placeholder="" style="border-radius: inherit;" required>
                </div>
                <p>Please note:</p>
                <ol>
                  <li> Only RMAs authorized in writing by Techroutes Technical Support/FAE shall be accepted and addressed.</li>
                  <li> One copy of the RMA report should be inserted into the Shipping doccument envelope, and one should be inserted into the packing box.</li>
                  <li> Ship back the RMA item together with all associated sub-systems.</li>

                </ol>
       
              </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

</div>




<div class="container-fluid contact">
  <div class="row">
    <div class="header" id="myHeader">
      <h2>Contact Us</h2>
    </div>
  </div>
</div>

<div class="container-fluid map">
  <div class="row">
    <div class="container">
      <h1>Contact us</h1>
      <div class="col-lg-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.127336191219!2d77.0586972144034!3d28.475711597913424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d190147d97131%3A0xee5e82c395bfbe0a!2sTechroutes%20Network!5e0!3m2!1sen!2sin!4v1580987052403!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <div class="col-lg-9 pull-right">
        <!--  <div class=" col-lg-3">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">RMA Request</button>
          </div>
          <div class=" col-lg-3">
            <a href="<?php echo base_url() ?>uploads/RMA/<?= $contact["form"]; ?>"> <button type="button" class="btn btn-primary">Download RMA Request Form</button></a>
          </div>
            <div class=" col-lg-3">
            <a href="<?php echo base_url() ?>uploads/RMA/<?= $contact["demoform"]; ?>"> <button type="button" class="btn btn-success">Download Demo Requisition Form</button></a>
          </div>-->

        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-sm-offset-1">
          <h2><?= $contact["about_title"]; ?></h2>
          <i class="fa fa-map-marker"></i>
          <h4>ADDRESS</h4> <span>|</span>
          <p><?= $contact["address"]; ?></p>
          <div class="clearfix"></div>
          <i class="fa fa-envelope"></i>
          <h4>E-MAIL</h4> <span>|</span>
          <p><?= $contact["email"]; ?></p>
          <div class="clearfix"></div>
          <i class="fa fa-skype"></i>
          <h4>SKYPE</h4> <span>|</span>
          <p><?= $contact["skype"]; ?></p>
          <div class="clearfix"></div>
          <i class="fa fa-phone"></i>
          <h4>Tel</h4> <span>|</span>
          <p><?= $contact["phone"]; ?></p>
          <div class="clearfix"></div>
          <i class="fa fa-phone-square"></i>
          <h4>Tel</h4> <span>|</span>
          <p><?= $contact["mobile"]; ?></p>
          <div class="clearfix"></div>
          <hr>
        </div>

      </div>
    </div>
  </div>
</div>


<?php $this->load->helper("form"); ?>
<?php
$attributes = array('id' => 'f_form1', 'method' => 'post', 'class' => 'form_horizontal');
echo form_open_multipart('contact/request', $attributes);
?>
<div class="container-fluid leave">
  <div class="row">
    <div class="container">
      <h1>  ASK ME</h1>
      <div class="col-lg-12">
        <p>Contact us for more information on Application Consultation, Sample Support, FOB Pricing etc.You will be replied within 8 hours.</p>
        <form action="/action_page.php">
          <div class="form-group col-lg-6 nexus">
            <label for="company">Comapany :</label>
            <input type="text" class="form-control" name="company" id="company" placeholder="Your Company Name" required>
          </div>
          <div class="form-group col-lg-6">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="fname" id="name" placeholder="Name" required>
          </div>
          <div class="form-group col-lg-6">
            <label for="email">Address :</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
          </div>
          <div class="form-group col-lg-6">
            <label for="tel">contact No. :</label>
            <input type="tel" class="form-control" name="phone" id="tel" placeholder="Your Telephone Number" required>
          </div>
            <div class="form-group col-lg-6">
            <label for="web">Website :</label>
            <input type="text" class="form-control" name="Website" id="Website" placeholder="Website" required>
          </div>
            <div class="form-group col-lg-6">
            <label for="country">country :</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="country" required>
          </div>
          <div class="form-group col-lg-12">
            <label for="comment">REMARKS :</label>
            <textarea class="form-control" rows="5" cols="50" id="comment" name="message" placeholder="Please Leave your Message" required></textarea>
          </div>
          <input type="submit" class="btn-default" value="Submit" id="f_submit1" name="submit" />
          <span id="f_error1"></span>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

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
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/pageable.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/index.js"></script>