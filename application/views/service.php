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
      <h2>Service & support</h2>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid abouts">
  <div class="row">

    <div class="col-lg-12">
      <div class="col-lg-6">
        <h1> Service & support<!--<?php echo $allData['sec1_title']; ?>--></h1>
      </div>


      <div class=" col-lg-6">
        <img src="<?php echo base_url() ?>assets/frontend/img/service.png"  class="img-responsive" />
      </div>

    </div>
     
    <div class="col-lg-12" style="
    FONT-SIZE: initial;">
      <div class="col-lg-12">
        <p> <?php echo $allData['sec1_title']; ?>
        <?php echo $allData['sec1_des']; ?><br>
        <?php echo $allData['sec2_title']; ?>
        <?php echo $allData['sec2_des']; ?><br>
        <?php echo $allData['sec3_title']; ?>
        <?php echo $allData['sec3_des']; ?><br>
        <?php echo $allData['sec4_title']; ?>
        <?php echo $allData['sec4_des']; ?>
          <div class="col-lg-9 pull-right">
        <!--  <div class=" col-lg-3">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">RMA Request</button>
          </div>-->
          <div class=" col-lg-3" style="max-width: 40%;">
            <a href="<?php echo base_url() ?>uploads/RMA/<?= $contact["form"]; ?>"> <button type="button" class="btn btn-primary">Download RMA Request Form</button></a>
          </div>
            <div class=" col-lg-3">
            <a href="<?php echo base_url() ?>uploads/RMA/<?= $contact["demoform"]; ?>"> <button type="button" class="btn btn-success">Download Demo Requisition Form</button></a>
          </div>

        </div>
       </p>


      </div>


    </div>
  </div>
</div>



<div class="container-fluid leave">
  <div class="row">
    <div class="container">
         </h1> Report a problem</h1>
        <table border="0" cellpadding="0" cellspacing="0">
<tr>
<?php $this->load->helper("form"); ?>
<?php
$attributes = array('id' => 'f_form1', 'method' => 'post', 'class' => 'form_horizontal');
echo form_open_multipart('service/request', $attributes);
?>

	<td>
		<table width="400" border="0" cellspacing="2" cellpadding="0">
	
		<tr>
		    <div class="col-lg-3">
		    <td class="formtext"><span class="errortext">*</span>&nbsp;Full Name :</td>
			<td><input type="text" name="fullname" class="textbox" value=""></td>
		</tr>
		</div>
		
		<tr> 
			<div class="col-lg-3">	
			<td class="formtext"><span class="errortext">*</span>&nbsp;Job Title :</td>
			<td><input type="text" name="jobtitle" class="textbox" value=""></td>
		</tr>
		</div>
		
		<tr> 
			<div class="col-lg-3">
			<td class="formtext"><span class="errortext">*</span>&nbsp;Company Name :</td>
			<td><input type="text" name="companyname" class="textbox" value=""></td>
		</tr>
		</div>
		<tr> 
			<td class="formtext"><span class="errortext">*</span>&nbsp;Address :</td>
			<td><input type="text" name="address" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext"><span class="errortext">*</span>&nbsp;City :</td>
			<td><input type="text" name="city" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext">State / Province :</td>
			<td><input type="text" name="stateprovince" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext"><span class="errortext">*</span>&nbsp;Country :</td>
			<td>	<select name="country" class="textbox" >	
		<OPTION VALUE="Afghanistan">Afghanistan </OPTION>
		<OPTION VALUE="Albania">Albania </OPTION>
		<OPTION VALUE="Algeria">Algeria </OPTION>
		<OPTION VALUE="American Samoa">American Samoa </OPTION>
		<OPTION VALUE="Andorra">Andorra </OPTION>
		<OPTION VALUE="Angola">Angola </OPTION>
		<OPTION VALUE="Anguilla">Anguilla </OPTION>
		<OPTION VALUE="Antarctica">Antarctica </OPTION>
		<OPTION VALUE="Antigua and Barbuda">Antigua and Barbuda </OPTION>
		<OPTION VALUE="Argentina">Argentina </OPTION>
		<OPTION VALUE="Armenia">Armenia </OPTION>
		<OPTION VALUE="Aruba">Aruba </OPTION>
		<OPTION VALUE="Australia">Australia </OPTION>
		<OPTION VALUE="Austria">Austria </OPTION>
		<OPTION VALUE="Azerbaijan">Azerbaijan </OPTION>
		<OPTION VALUE="Bahamas">Bahamas </OPTION>
		<OPTION VALUE="Bahrain">Bahrain </OPTION>
		<OPTION VALUE="Bangladesh">Bangladesh </OPTION>
		<OPTION VALUE="Barbados">Barbados </OPTION>
		<OPTION VALUE="Belarus">Belarus </OPTION>
		<OPTION VALUE="Belgium">Belgium </OPTION>
		<OPTION VALUE="Belize">Belize </OPTION>
		<OPTION VALUE="Benin">Benin </OPTION>
		<OPTION VALUE="Bermuda">Bermuda </OPTION>
		<OPTION VALUE="Bhutan">Bhutan </OPTION>
		<OPTION VALUE="Bolivia">Bolivia </OPTION>
		<OPTION VALUE="Bosnia and Herzegowina">Bosnia and Herzegowina </OPTION>
		<OPTION VALUE="Botswana">Botswana </OPTION>
		<OPTION VALUE="Bouvet Island">Bouvet Island </OPTION>
		<OPTION VALUE="Brazil">Brazil </OPTION>
		<OPTION VALUE="British Indian Ocean Territory">British Indian Ocean Territory </OPTION>
		<OPTION VALUE="Brunei Darussalam">Brunei Darussalam </OPTION>
		<OPTION VALUE="Bulgaria">Bulgaria </OPTION>
		<OPTION VALUE="Burkina Faso">Burkina Faso </OPTION>
		<OPTION VALUE="Burundi">Burundi </OPTION>
		<OPTION VALUE="Cambodia">Cambodia </OPTION>
		<OPTION VALUE="Cameroon">Cameroon </OPTION>
		<OPTION VALUE="Canada">Canada </OPTION>
		<OPTION VALUE="Cape Verde">Cape Verde </OPTION>
		<OPTION VALUE="Cayman Islands">Cayman Islands </OPTION>
		<OPTION VALUE="Central African Republic">Central African Republic </OPTION>
		<OPTION VALUE="Chad">Chad </OPTION>
		<OPTION VALUE="Chile">Chile </OPTION>
		<OPTION VALUE="China">China </OPTION>
		<OPTION VALUE="Christmas Island">Christmas Island </OPTION>
		<OPTION VALUE="Cocos (Keeling) Islands">Cocos (Keeling) Islands </OPTION>
		<OPTION VALUE="Colombia">Colombia </OPTION>
		<OPTION VALUE="Comoros">Comoros </OPTION>
		<OPTION VALUE="Congo">Congo </OPTION>
		<OPTION VALUE="Cook Islands">Cook Islands </OPTION>
		<OPTION VALUE="Costa Rica">Costa Rica </OPTION>
		<OPTION VALUE="Cote D'Ivoire">Cote D'Ivoire </OPTION>
		<OPTION VALUE="Croatia">Croatia </OPTION>
		<OPTION VALUE="Cuba">Cuba </OPTION>
		<OPTION VALUE="Cyprus">Cyprus </OPTION>
		<OPTION VALUE="Czech Republic">Czech Republic </OPTION>
		<OPTION VALUE="Denmark">Denmark </OPTION>
		<OPTION VALUE="Djibouti">Djibouti </OPTION>
		<OPTION VALUE="Dominica">Dominica </OPTION>
		<OPTION VALUE="Dominican Republic">Dominican Republic </OPTION>
		<OPTION VALUE="East Timor">East Timor </OPTION>
		<OPTION VALUE="Ecuador">Ecuador </OPTION>
		<OPTION VALUE="Egypt">Egypt </OPTION>
		<OPTION VALUE="El Salvador">El Salvador </OPTION>
		<OPTION VALUE="Equatorial Guinea">Equatorial Guinea </OPTION>
		<OPTION VALUE="Eritrea">Eritrea </OPTION>
		<OPTION VALUE="Estonia">Estonia </OPTION>
		<OPTION VALUE="Ethiopia">Ethiopia </OPTION>
		<OPTION VALUE="Falkland Islands">Falkland Islands </OPTION>
		<OPTION VALUE="Faroe Islands">Faroe Islands </OPTION>
		<OPTION VALUE="Fiji">Fiji </OPTION>
		<OPTION VALUE="Finland">Finland </OPTION>
		<OPTION VALUE="France">France </OPTION>
		<OPTION VALUE="France, Metropolitan">France, Metropolitan </OPTION>
		<OPTION VALUE="French Guiana">French Guiana </OPTION>
		<OPTION VALUE="French Polynesia">French Polynesia </OPTION>
		<OPTION VALUE="French Southern Territories">French Southern Territories </OPTION>
		<OPTION VALUE="Gabon">Gabon </OPTION>
		<OPTION VALUE="Gambia">Gambia </OPTION>
		<OPTION VALUE="Georgia">Georgia </OPTION>
		<OPTION VALUE="Germany">Germany </OPTION>
		<OPTION VALUE="Ghana">Ghana </OPTION>
		<OPTION VALUE="Gibraltar">Gibraltar </OPTION>
		<OPTION VALUE="Greece">Greece </OPTION>
		<OPTION VALUE="Greenland">Greenland </OPTION>
		<OPTION VALUE="Grenada">Grenada </OPTION>
		<OPTION VALUE="Guadeloupe">Guadeloupe </OPTION>
		<OPTION VALUE="Guam">Guam </OPTION>
		<OPTION VALUE="Guatemala">Guatemala </OPTION>
		<OPTION VALUE="Guinea">Guinea </OPTION>
		<OPTION VALUE="Guinea-Bissau">Guinea-Bissau </OPTION>
		<OPTION VALUE="Guyana">Guyana </OPTION>
		<OPTION VALUE="Haiti">Haiti </OPTION>
		<OPTION VALUE="Heard and Mc Donald Islands">Heard and Mc Donald Islands </OPTION>
		<OPTION VALUE="Honduras">Honduras </OPTION>
		<OPTION VALUE="Hong Kong">Hong Kong </OPTION>
		<OPTION VALUE="Hungary">Hungary </OPTION>
		<OPTION VALUE="Iceland">Iceland </OPTION>
		<OPTION VALUE="India">India </OPTION>
		<OPTION VALUE="Indonesia">Indonesia </OPTION>
		<OPTION VALUE="Iran">Iran </OPTION>
		<OPTION VALUE="Iraq">Iraq </OPTION>
		<OPTION VALUE="Ireland">Ireland </OPTION>
		<OPTION VALUE="Israel">Israel </OPTION>
		<OPTION VALUE="Italy">Italy </OPTION>
		<OPTION VALUE="Jamaica">Jamaica </OPTION>
		<OPTION VALUE="Japan">Japan </OPTION>
		<OPTION VALUE="Jordan">Jordan </OPTION>
		<OPTION VALUE="Kazakhstan">Kazakhstan </OPTION>
		<OPTION VALUE="Kenya">Kenya </OPTION>
		<OPTION VALUE="Kiribati">Kiribati </OPTION>
		<OPTION VALUE="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of </OPTION>
		<OPTION VALUE="Korea, Republic of">Korea, Republic of </OPTION>
		<OPTION VALUE="Kuwait">Kuwait </OPTION>
		<OPTION VALUE="Kyrgyzstan">Kyrgyzstan </OPTION>
		<OPTION VALUE="Lao People's Democratic Republic">Lao People's Democratic Republic </OPTION>
		<OPTION VALUE="Latvia">Latvia </OPTION>
		<OPTION VALUE="Lebanon">Lebanon </OPTION>
		<OPTION VALUE="Lesotho">Lesotho </OPTION>
		<OPTION VALUE="Liberia">Liberia </OPTION>
		<OPTION VALUE="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya </OPTION>
		<OPTION VALUE="Liechtenstein">Liechtenstein </OPTION>
		<OPTION VALUE="Lithuania">Lithuania </OPTION>
		<OPTION VALUE="Luxembourg">Luxembourg </OPTION>
		<OPTION VALUE="Macau">Macau </OPTION>
		<OPTION VALUE="Macedonia">Macedonia </OPTION>
		<OPTION VALUE="Madagascar">Madagascar </OPTION>
		<OPTION VALUE="Malawi">Malawi </OPTION>
		<OPTION VALUE="Malaysia">Malaysia </OPTION>
		<OPTION VALUE="Maldives">Maldives </OPTION>
		<OPTION VALUE="Mali">Mali </OPTION>
		<OPTION VALUE="Malta">Malta </OPTION>
		<OPTION VALUE="Marshall Islands">Marshall Islands </OPTION>
		<OPTION VALUE="Martinique">Martinique </OPTION>
		<OPTION VALUE="Mauritania">Mauritania </OPTION>
		<OPTION VALUE="Mauritius">Mauritius </OPTION>
		<OPTION VALUE="Mayotte">Mayotte </OPTION>
		<OPTION VALUE="Mexico">Mexico </OPTION>
		<OPTION VALUE="Micronesia, Federated States of">Micronesia, Federated States of </OPTION>
		<OPTION VALUE="Moldova, Republic of">Moldova, Republic of </OPTION>
		<OPTION VALUE="Monaco">Monaco </OPTION>
		<OPTION VALUE="Mongolia">Mongolia </OPTION>
		<OPTION VALUE="Montserrat">Montserrat </OPTION>
		<OPTION VALUE="Morocco">Morocco </OPTION>
		<OPTION VALUE="Mozambique">Mozambique </OPTION>
		<OPTION VALUE="Myanmar">Myanmar </OPTION>
		<OPTION VALUE="Namibia">Namibia </OPTION>
		<OPTION VALUE="Nauru">Nauru </OPTION>
		<OPTION VALUE="Nepal">Nepal </OPTION>
		<OPTION VALUE="Netherlands">Netherlands </OPTION>
		<OPTION VALUE="Netherlands Antilles">Netherlands Antilles </OPTION>
		<OPTION VALUE="New Caledonia">New Caledonia </OPTION>
		<OPTION VALUE="New Zealand">New Zealand </OPTION>
		<OPTION VALUE="Nicaragua">Nicaragua </OPTION>
		<OPTION VALUE="Niger">Niger </OPTION>
		<OPTION VALUE="Nigeria">Nigeria </OPTION>
		<OPTION VALUE="Niue">Niue </OPTION>
		<OPTION VALUE="Norfolk Island">Norfolk Island </OPTION>
		<OPTION VALUE="Northern Mariana Islands">Northern Mariana Islands </OPTION>
		<OPTION VALUE="Norway">Norway </OPTION>
		<OPTION VALUE="Oman">Oman </OPTION>
		<OPTION VALUE="Pakistan">Pakistan </OPTION>
		<OPTION VALUE="Palau">Palau </OPTION>
		<OPTION VALUE="Panama">Panama </OPTION>
		<OPTION VALUE="Papua New Guinea">Papua New Guinea </OPTION>
		<OPTION VALUE="Paraguay">Paraguay </OPTION>
		<OPTION VALUE="Peru">Peru </OPTION>
		<OPTION VALUE="Philippines">Philippines </OPTION>
		<OPTION VALUE="Pitcairn">Pitcairn </OPTION>
		<OPTION VALUE="Poland">Poland </OPTION>
		<OPTION VALUE="Portugal">Portugal </OPTION>
		<OPTION VALUE="Puerto Rico">Puerto Rico </OPTION>
		<OPTION VALUE="Qatar">Qatar </OPTION>
		<OPTION VALUE="Reunion">Reunion </OPTION>
		<OPTION VALUE="Romania">Romania </OPTION>
		<OPTION VALUE="Russian Federation">Russian Federation </OPTION>
		<OPTION VALUE="Rwanda">Rwanda </OPTION>
		<OPTION VALUE="Saint Kitts and Nevis">Saint Kitts and Nevis </OPTION>
		<OPTION VALUE="Saint Lucia">Saint Lucia </OPTION>
		<OPTION VALUE="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines </OPTION>
		<OPTION VALUE="Samoa">Samoa </OPTION>
		<OPTION VALUE="San Marino">San Marino </OPTION>
		<OPTION VALUE="Sao Tome and Principe">Sao Tome and Principe </OPTION>
		<OPTION VALUE="Saudi Arabia">Saudi Arabia </OPTION>
		<OPTION VALUE="Senegal">Senegal </OPTION>
		<OPTION VALUE="Seychelles">Seychelles </OPTION>
		<OPTION VALUE="Sierra Leone">Sierra Leone </OPTION>
		<OPTION VALUE="Singapore">Singapore </OPTION>
		<OPTION VALUE="Slovakia (Slovak Republic)">Slovakia (Slovak Republic) </OPTION>
		<OPTION VALUE="Slovenia">Slovenia </OPTION>
		<OPTION VALUE="Solomon Islands">Solomon Islands </OPTION>
		<OPTION VALUE="Somalia">Somalia </OPTION>
		<OPTION VALUE="South Africa">South Africa </OPTION>
		<OPTION VALUE="Spain">Spain </OPTION>
		<OPTION VALUE="Sri Lanka">Sri Lanka </OPTION>
		<OPTION VALUE="St. Helena">St. Helena </OPTION>
		<OPTION VALUE="St. Pierre and Miquelon">St. Pierre and Miquelon </OPTION>
		<OPTION VALUE="Sudan">Sudan </OPTION>
		<OPTION VALUE="Suriname">Suriname </OPTION>
		<OPTION VALUE="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands </OPTION>
		<OPTION VALUE="Swaziland">Swaziland </OPTION>
		<OPTION VALUE="Sweden">Sweden </OPTION>
		<OPTION VALUE="Switzerland">Switzerland </OPTION>
		<OPTION VALUE="Syrian Arab Republic">Syrian Arab Republic </OPTION>
		<OPTION VALUE="Taiwan">Taiwan </OPTION>
		<OPTION VALUE="Tajikistan">Tajikistan </OPTION>
		<OPTION VALUE="Tanzania, United Republic of">Tanzania, United Republic of </OPTION>
		<OPTION VALUE="Thailand">Thailand </OPTION>
		<OPTION VALUE="Togo">Togo </OPTION>
		<OPTION VALUE="Tokelau">Tokelau </OPTION>
		<OPTION VALUE="Tonga">Tonga </OPTION>
		<OPTION VALUE="Trinidad and Tobago">Trinidad and Tobago </OPTION>
		<OPTION VALUE="Tunisia">Tunisia </OPTION>
		<OPTION VALUE="Turkey">Turkey </OPTION>
		<OPTION VALUE="Turkmenistan">Turkmenistan </OPTION>
		<OPTION VALUE="Turks and Caicos Islands">Turks and Caicos Islands </OPTION>
		<OPTION VALUE="Tuvalu">Tuvalu </OPTION>
		<OPTION VALUE="Uganda">Uganda </OPTION>
		<OPTION VALUE="Ukraine">Ukraine </OPTION>
		<OPTION VALUE="United Arab Emirates">United Arab Emirates </OPTION>
		<OPTION VALUE="United Kingdom">United Kingdom </OPTION>
		<OPTION VALUE="United States Minor Outlying Islands">United States Minor Outlying Islands </OPTION>
		<OPTION VALUE="Uruguay">Uruguay </OPTION>
		<OPTION VALUE="Uzbekistan">Uzbekistan </OPTION>
		<OPTION VALUE="Vanuatu">Vanuatu </OPTION>
		<OPTION VALUE="Vatican City State (Holy See)">Vatican City State (Holy See) </OPTION>
		<OPTION VALUE="Venezuela">Venezuela </OPTION>
		<OPTION VALUE="Vietnam">Vietnam </OPTION>
		<OPTION VALUE="Virgin Islands (British)">Virgin Islands (British) </OPTION>
		<OPTION VALUE="Virgin Islands (U.S.)">Virgin Islands (U.S.) </OPTION>
		<OPTION VALUE="Wallis And Futuna Islands">Wallis And Futuna Islands </OPTION>
		<OPTION VALUE="Western Sahara">Western Sahara </OPTION>
		<OPTION VALUE="Yemen">Yemen </OPTION>
		<OPTION VALUE="Yugoslavia">Yugoslavia </OPTION>
		<OPTION VALUE="Zaire">Zaire </OPTION>
		<OPTION VALUE="Zambia">Zambia </OPTION>
		<OPTION VALUE="Zimbabwe">Zimbabwe </OPTION>
		<OPTION VALUE="United States">United States </OPTION>
	</select>
</td>
		</tr>
		<tr> 
			<td class="formtext">Zip / Postal Code :</td>
			<td><input type="text" name="zippostalcode" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext"><span class="errortext">*</span>&nbsp;E-mail :</td>
			<td><input type="text" name="email" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext"><span class="errortext">*</span>&nbsp;Phone :</td>
			<td><input type="text" name="phone" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext">Fax :</td>
			<td><input type="text" name="fax" class="textbox" value=""></td>
		</tr>
		<tr> 
			<td class="formtext">Company Type :</td>
			<td> <SELECT NAME="companytype" class="textbox">
					<OPTION SELECTED VALUE="">Please Choose from List</OPTION>
					<OPTION VALUE="Service Provider">Service Provider</OPTION> 
					<OPTION VALUE="Manufacturer">Manufacturer</OPTION> 
					<OPTION VALUE="Integrator">Integrator</OPTION> 
					<OPTION VALUE="Reseller">Reseller</OPTION> 
					<OPTION VALUE="Consumer">Consumer</OPTION> 
					<OPTION VALUE="Other">Other</OPTION> 
					</SELECT> </td>
		</tr>
		<tr> 
			<td class="formtext">Company Web Site :</td>
			<td><input type="text" name="companywebsite" class="textbox" value=""></td>
		</tr>
		<tr><td height="12"></td></tr>
		<tr> 
			<td class="formtext">Product(s) :</td>
			<td><textarea name="productslist" class="textbox"></textarea></td>
		</tr>
		<tr> 
			<td class="formtext">Serial No(s):</td>
			<td><textarea name="serialnoslist" class="textbox"></textarea></td>
		</tr>
		<tr> 
			<td class="formtext">Purchase /<BR/>Contract No(s). :</td>
			<td><textarea name="purchasecontractnoslist" class="textbox"></textarea></td>
		</tr>
		<tr><td height="12"></td></tr>
		<tr> 
			<td class="formtext">Details of Problem(s) :</td>
			<td><textarea name="problemsdetails" class="textbox"></textarea></td>
		</tr>
		<tr> 
			<td class="formtext">Details of network / envirornment :</td>
			<td><textarea name="networkenvironmentdetails" class="textbox"></textarea></td>
		</tr>
		<tr> 
			<td colspan="2" align="center">
				<BR/>
				<input class="btn btn-success" id="f_submit1" type="submit" value="Submit"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="btn btn-danger" type="reset" value="Clear"> 
				 <span id="f_error1"></span>
			</td>
		</tr>
		</table>
	</td>
</form>
</tr>
</table>
        
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