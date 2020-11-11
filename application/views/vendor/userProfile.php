<?php include('rightMenu.php') ;?>

<div class="container-fluid inner">
    <div class="row">
        <div class="container-fluid updates" id="account">
            <div id="myDIV">
                <div class="col-lg-6">
                    <h3>Update Profile</h3>
                    <?php
								 $attr = array('method' =>
                    'post','id'=>'ven_update'); echo form_open_multipart('vendor/vendor/updateProfile',$attr); ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <p>NORMAL COURIER SERVICE</p>
                            <select id="NORMAL" name="courier[]" multiple="multiple" required>
                                <?php 
$user_cou = explode(',',$user['couriers']);
foreach( $couriers as $cour ): 
?>

                                <option value="<?= $cour->id?>" <?php if(in_array($cour->id,$user_cou)){echo 'selected';}?>><?= $cour->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <p>CARGO SERVICE</p>
                            <select name="cargo[]" id="CARGO" multiple="multiple" required>
                                <?php
$user_car = explode(',',$user['cargo']);
 foreach( $Allcargo as $cargo ): ?>

                                <option value="<?= $cargo->id?>" <?php if(in_array($cargo->id,$user_car)){echo 'selected';}?>><?= $cargo->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <p>SUSCRIPTION PACKAGE</p>
                            <select name="package" style="color: #000000;" required>
                                <option value="<?= $user['package']?>"><?= $user['package']?></option>
                            </select>
                        </div>
                        <div class="field_wrapper">
                            <div class="col-sm-11">
                                <label for="inputState">SERVICE PIN CODE(add pincode on pressing + button)</label>

                                <input type="text" name="pincode[]" required maxlength="6" />
                            </div>
                            <div class="col-sm-1">
                                <a href="javascript:void(0);" class="add_button"><img src="<?php echo base_url('assets/images/add-icon.png'); ?>" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="upbtn">
                        <div class="col-sm-12 col-xs-12">
                            <span id="f_error2"></span>
                            <input type="submit" class="btn btn-primary" id="v_submit2" value="UPDATE ACCOUNT" />
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>

                <div class="col-lg-6">
                    <h3>Change Password</h3>
                    <div id="myDIV">
                        <div class="form-group">
                            <?php
								 $attr = array('method' =>
                            'post','id'=>'vprofile'); echo form_open_multipart('vendor/vendor/updatePass',$attr); ?>
                            <div class="col-sm-12 col-xs-12">
                                <input type="text" name="cupass" id="fname" class="form-control" placeholder="ENTER CURRENT PASSWORD" required />
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <input type="password" name="password" id="bname" class="form-control" placeholder="ENTER NEW PASSWORD" required />
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <input type="password" name="cpassword" id="accn" class="form-control" placeholder="RENTER NEW PASSWORD" required />
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <span id="f_error1"></span>
                                <input type="submit" class="btn btn-primary pull-right" id="v_submit1" value="CHANGE PASSWORD" />
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="container-fluid service">
                <div class="row">
                    <table class="table">
                        <h2 class="text-center pull-left">Serviceable Pincodes</h2>
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <?php if($serPin): 

   foreach( $serPin  as $pin) : 
  ?>
                        <tr>
                            <td style="color: #000;"><?= $pin->pincode ?></td>

                            <td>
                                <a class="btn btn-sm btn-danger delete_pin" href="#" data-pin="<?= $pin->id ?>" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; 
        endif;
  ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        var y = document.getElementById("account");
        var x = document.getElementById("myDIV");

        if (x.style.display === "none" || y.style.display == "none") {
            x.style.display = "block";
            y.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('[data-toggle="offcanvas"]').click(function () {
            $("#navigation").toggleClass("hidden-xs");
        });
    });
</script>
<script>
    function addRow() {
        // get input values
        var fname = document.getElementById("fname").value;
        var bname = document.getElementById("bname").value;
        var accn = document.getElementById("accn").value;
        var ifsc = document.getElementById("ifsc").value;

        if (fname == "") {
            alert("Enter Name");
            return false;
        }
        if (bname == "") {
            alert("Enter Bank Name");
            return false;
        }
        if (accn == "") {
            alert("Enter Account Number");
            return false;
        }
        if (ifsc == "") {
            alert("Enter IFSC Code");
            return false;
        } else {
            //return true;
            // get the html table
            // 0 = the first table
            var table = document.getElementsByTagName("table")[0];

            // add new empty row to the table
            // 0 = in the top
            // table.rows.length = the end
            // table.rows.length/2+1 = the center
            var newRow = table.insertRow(table.rows.length / 3 + 1);

            // add cells to the row
            var cel1 = newRow.insertCell(0);
            var cel2 = newRow.insertCell(1);
            var cel3 = newRow.insertCell(2);
            var cel4 = newRow.insertCell(3);
            // add values to the cells
            cel1.innerHTML = fname;
            cel2.innerHTML = bname;
            cel3.innerHTML = accn;
            cel4.innerHTML = ifsc;

            $('input[type="text"]').val("");
            $(".account").css("display", "none");
        }
    }
</script>

<script>
    $(function () {
        $("#CARGO").multiselect({
            includeSelectAllOption: true,
        });

        $("#btnget").click(function () {
            alert($("#CARGO").val());
        });
    });
</script>
<script>
    $(function () {
        $("#NORMAL").multiselect({
            includeSelectAllOption: true,
        });

        $("#btnget").click(function () {
            alert($("#CARGO").val());
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $(".add_button"); //Add button selector
        var wrapper = $(".field_wrapper"); //Input field wrapper
        var fieldHTML =
            '<div><div class="col-sm-11"><input type="text" name="pincode[]" class="form-control" maxlength="6" placeholder="PIN CODE" required /></div><a href="javascript:void(0);" class="remove_button"><img src="https://www.jobefy.com/jobs/assets/img/remove-icon.png" /></a></div><div class="clearfix"></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on("click", ".remove_button", function (e) {
            e.preventDefault();
            $(this).parent("div").remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#v_submit1").click(function () {
            $("#vprofile").submit(function (e) {
                $("#f_error1").html("<img src='http://fiesttech.com/assets/images/loading.gif' alt='Loading'/>");
                var postData = $(this).serializeArray();
                var formURL = $(this).attr("action");
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data, textStatus, jqXHR) {
                        if ($.trim(data)) {
                            $("#f_error1").html('<p><span class="prettyprintS" style="color:#00ff00;">' + data + "</span></p>");
                            $('input[type="text"],textarea').val("");
                            location.reload();
                        } else {
                            $("#f_error1").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">' + data + "</span></p>");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#f_error1").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus=' + textStatus + ", errorThrown=" + errorThrown + "</code></pre>");
                    },
                });
                e.preventDefault(); //STOP default action
                e.unbind();
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#v_submit2").click(function () {
            $("#ven_update").submit(function (e) {
                $("#f_error2").html("<img src='http://fiesttech.com/assets/images/loading.gif' alt='Loading'/>");
                var postData = $(this).serializeArray();
                var formURL = $(this).attr("action");
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data, textStatus, jqXHR) {
                        if ($.trim(data)) {
                            $("#f_error2").html('<p><span class="prettyprintS" style="color:#00ff00;">' + data + "</span></p>");
                            $('input[type="text"],textarea').val("");
                            location.reload();
                        } else {
                            $("#f_error2").html('<p><span class="prettyprint" style="color:#ff0000;text-align:center">' + data + "</span></p>");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#f_error2").html('<pre><code class="prettyprint" style="color:#ff0000;">AJAX Request Failed<br/> textStatus=' + textStatus + ", errorThrown=" + errorThrown + "</code></pre>");
                    },
                });
                e.preventDefault(); //STOP default action
                e.unbind();
            });
        });
    });
</script>
<script>
    jQuery(document).ready(function () {
        //Gallery Delete

        jQuery(document).on("click", ".delete_pin", function () {
            var pin = $(this).data("pin"),
                hitURL = "<?= base_url('vendor/vendor/deletePin/'); ?>",
                currentRow = $(this);

            var confirmation = confirm("Are you sure to delete this item ?");

            if (confirmation) {
                jQuery
                    .ajax({
                        type: "POST",
                        dataType: "json",
                        url: hitURL,
                        data: { pin: pin },
                    })
                    .done(function (data) {
                        console.log(data);
                        currentRow.parents("tr").remove();
                        if ((data.status = true)) {
                            alert("Item successfully deleted");
                        } else if ((data.status = false)) {
                            alert("Item deletion failed");
                        } else {
                            alert("Access denied..!");
                        }
                    });
            }
        });
    });
</script>
