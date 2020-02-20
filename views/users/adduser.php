<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
?>

<div id="page-wrapper">
    <?php
//    $current_file = $_SERVER['PHP_SELF'];
//    if ($user_logged->id!=12) {
//        echo 'You are not Authorised to access this file';
//        return;
//    }
    ?>
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Add User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-2" ></div>
        <div class="col-lg-8" style="margin: 0 auto;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users 
                </div>
                <div class="panel-body">
                            <form id="addUser" class="form-horizontal form-label-left">
                                
                               <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="name_group">
                                      <input type="text" id="name" name="name" required="required" placeholder="Full Name" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idNo">Id Number <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="idNo_group">
                                      <input type="text" id="idNo" name="idNo" required="required" placeholder="National ID/Passport Number" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone No <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="phone_group">
                                    <input type="text" value="+254" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mpesa">Personal No <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="personalNo_group">
                                      <input type="text" id="personalNo" name="personalNo" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="email_group">
                                      <input type="text" id="email" name="email" required="required" placeholder="National ID/Passport Number" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Designation<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="designation_group">
                                      <input type="text" id="designation" name="designation" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account">Office No <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="officeNo_group">
                                      <input type="text" id="officeNo" name="officeNo" required="required" placeholder="eg 1036" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                      <a class="btn btn-success submit-link" onclick="addUser();" >Submit</a>
                                  </div>
                                </div>

                              </form>
                        </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <!-- /.row -->

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->



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


    function addUser() {

        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#addUser').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/users/manageUser.php?testsubmit=submitted&action=addUser',
            data: str,
            success: function (json) {
             var message = $.parseJSON(json).message;
                $('.validation').remove();
                if (message.status != true) {
                    var fields = $.parseJSON(json).fields;
                    for (var i = 0; i < fields.length; i++) {
                        var field = fields[i];
                        //console.log(field.field);
                        $('#' + field.field + '_group').append('<l class="validation" style="color:red;">' + field.error + '</i>')
                    }

                    options.title = 'Error!!!';
                    options.type = 'error';
                    options.text = message.msg;
                    notice.update(options);
                } else {
                    $('#username').val('');
                    $('#email_field').val('');
                    $('#name').val('');

                    options.title = 'Success!!!';
                    options.type = 'success';
                    options.text = message.msg;
                    notice.update(options);

                setTimeout(function() {
                  location.href="users/viewusers.php";
                }, 3000);

                }
                $('.submit-link').removeClass('disabled');

            },
            error: function (xhr, desc, err) {

                options.title = 'Error!!!';
                options.type = 'error';
                options.text = 'A network error occured. Please consult your network administrator.';
                notice.update(options);
                $('.submit-link').removeClass('disabled');

            }
        });
    }
</script>