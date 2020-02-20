<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
//include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/users/user.php";
?>

<div class="main-content">
    <?php
//    $current_file = $_SERVER['PHP_SELF'];
//    if ($user_logged->id!=12) {
//        echo 'You are not Authorised to access this file';
//        return;
//    }
    ?>
    <div class="main-content-inner">
        <div class="page-content">


            <div class="page-header">
                <h1>Change Password</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">


                    <form id="adduserform" class="form-horizontal form-label-left">
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="name_group">
                                <input type="password" id="pass_current" name="pass_current" required="required" class="form-control col-md-7 col-xs-12">
                                <p id="pass_current_group" class="errtxt"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="username_group">
                                <input type="password" id="pass_1" name="pass_1" required="required" class="form-control col-md-7 col-xs-12">
                                <p id="pass_1_group" class="errtxt"></p>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="email_field_group">
                                <input type="password" id="pass_2" name="pass_2" required="required" class="form-control col-md-7 col-xs-12">
                                <p id="pass_2_group" class="errtxt"></p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-success" onclick="changePassword();" >Submit</a>
                            </div>
                        </div>

                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->



<?php include_once $webpath . 'site_footer.php'; ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            responsive: true
        });
    });
</script>

<script>


    function changePassword() {

        $('.errtxt').html('');
        var str = $('#adduserform').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/users/changeuser.php?testsubmit=submitted&action=changepassword',
            data: str,
            success: function (json) {

                var message = $.parseJSON(json).message;
                $('.validation').remove();
                if (message.status != true) {

                    var fields = $.parseJSON(json).fields;
                    for (var i = 0; i < fields.length; i++) {
                        var field = fields[i];
                        $('#' + field.field + '_group').html('<span style="color: red;">' + field.error + '</span>')
                    }

                    new PNotify({
                        title: 'Error!!!',
                        text: message.msg,
                        type: 'error',
                        styling: 'bootstrap3'
                    });

                } else {

                    new PNotify({
                        title: 'Success!!!',
                        text: message.msg,
                        type: 'success',
                        styling: 'bootstrap3'
                    });

                    setTimeout(function () {
                        location.href = "views/users/viewusers.php";
                    }, 3000);

                }

            },
            error: function (xhr, desc, err) {
                console.log("error");
            }
        });
    }
</script>