<div class="container-fluid partner">
  <div class="row">
    <div class="header" id="myHeader">
      <h2>Partner Registration</h2>
    </div>
  </div>
</div>

<div class="container-fluid apply">
  <div class="row">
    <h1>Become A Partner</h1>
    <p>Join your hands with Techroutes, together let's serve our clients at a whole new level, we are ready to add value to your business, are you ready for us?</p>

  </div>
</div>


<div class="container-fluid leave">
  <div class="row">
    <?php
    $attributes = array('id' => 'f_form1', 'method' => 'post', 'class' => 'form_horizontal');
    echo form_open_multipart('partner/message', $attributes);
    ?>
    <div class="col-lg-10 col-sm-offset-1">
      <form>
        <div class="form-group col-sm-6">
          <input type="text" class="form-control" name="cmp_name" id="cmp_name" placeholder="Company Name*" required>
        </div>
        <div class="form-group col-sm-6">
          <input type="text" class="form-control" name="country" id="country" placeholder="Country*" required>
        </div>

        <div class="form-group col-sm-6">
          <input type="tel" class="form-control" name="phn" id="phn" placeholder="Contact Number*" required>
        </div>
        <div class="form-group col-sm-6">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email*" required>
        </div>
        <div class="form-group col-sm-6">
          <input type="text" class="form-control" name="skype" id="skype" placeholder="Skype*" required>
        </div>
        <div class="form-group col-sm-6">
          <input type="address" class="form-control" name="cmp_address" id="cmp_address" placeholder="Company Address*" required>
        </div>
        <div class="form-group col-sm-12">
          <textarea class="form-control rounded-0" name="messg" id="messg" rows="3" placeholder="Message*" required></textarea>
        </div>
        <div class="form-group col-sm-12">
          <input type="submit" class="btn-default" value="Submit" id="f_submit1" name="submit" />
          <span id="f_error1"></span>
        </div>
      </form>
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