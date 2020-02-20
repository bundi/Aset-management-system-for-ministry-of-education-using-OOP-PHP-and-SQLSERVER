<?php
if (!isset($_REQUEST['u_id']) || empty($_REQUEST['u_id'])) {
    header("Location: viewusers.php");
}
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/users/user.php";

$user = new User();
$u_id = $_REQUEST['u_id'];
foreach ($user->selectUserByID($u_id) as $user) {}
?>

<div id="page-wrapper">
    <?php
//    $current_file = $_SERVER['PHP_SELF'];
//    if ($user_logged->id != 12) {
//        echo 'You are not Authorised to access this file';
//        return;
//    }
    ?>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Edit User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6 text-right">
                            <a href="views/users/viewusers.php" style=" color: blue;"><i class="fa fa-arrow-left"></i>Back</a> | Edit Users
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                     
                </div>
              <div class="panel-body">
                    <form id="editUser_form" class="form-horizontal form-label-left">

                        <input type="hidden" value="<?php echo  $user->id ?>" name="user_id">
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="name_group">
                                <input type="text" id="name" name="name" value="<?php echo $user->name ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="designation_group">
                                <input type="text" id="designation" value="<?php echo $user->designation ?>" name="designation" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="email_field_group">
                                <input type="text" id="email_field" name="email_field" value="<?php echo $user->email ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Office Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="officeNo_group">
                                <input type="text" id="officeNo" name="officeNo" value="<?php echo $user->officeNo ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div style="text-align: center;">
                            <div class="row">
                      
                                <div class="col-lg-12 text-center">
                                    <button class="btn-success submit-link" onclick="editUser();">Update</button>
                                   
                                </div>
                               
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
<script>
    
    function editUser() {
        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#editUser_form').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/users/changeuser.php?testsubmit=submitted&action=edituser',
            data: str,
            success: function (json) {

                var message = $.parseJSON(json).message;
                $('.validation').remove();
                if (message.status != true) {
                    var fields = $.parseJSON(json).fields;
                    for (var i = 0; i < fields.length; i++) {
                        var field = fields[i];
                        //console.log(field.field);
                        $('#' + field.field + '_group').append('<ul class="parsley-errors-list filled validation" id="parsley-id-7"><li class="parsley-required">' + field.error + '</li></ul>')
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

                    setTimeout(function () {
                        location.href = "views/users/viewusers.php";
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