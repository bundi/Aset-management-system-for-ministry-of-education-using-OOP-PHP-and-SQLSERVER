<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/staff/staff.php";
include_once $webpath . "controls/department/departments.php";


$staff = new Staffs();
$departments = new Department();
?>

<div id="page-wrapper">
    <?php
//    $current_file = $_SERVER['PHP_SELF'];
//    if (!in_array($current_file, $_SESSION["authorized_menu"]['authorized_menu'])) {
//        echo 'You are not Authorised to access this file';
//        return;
//    }
    ?>
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">School Staff Registration</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="margin: 0 auto;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class=" col-lg-12">
                            <p>Staff Registration Form</p>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <form id="register_staff" class="form-horizontal form-label-left">

                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cartegory"> Select Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="cartegory_group">
                                <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="cartegory" onchange="Change(this)" id="form-field-select-3" data-placeholder="search Group">
                                    <option value=""></option>
                                    <option value="teaching">Teaching Staff</option>
                                    <option value="non-teaching">Non Teaching Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;" id="department">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cartegory"> Select Department <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="department_group">
                                <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="department" id="form-field-select-3" data-placeholder="search Group">
                                    <option value=""></option>
                                    <?php
                                    foreach ($departments->selectAllDepartments() as $departments) {
                                        echo '<option value="' . $departments->id . '">' . $departments->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="fname_number">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">First Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="fname_group">
                                <input name="fname" type="text" id="fname" multiple="" placeholder="" class="form-control tag-input-style">                           
                            </div>
                        </div>
                        <div class="form-group" id="lname">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="lname_group">
                                <input name="lname" type="text" id="lname" multiple="" placeholder="" class="form-control tag-input-style">                           
                            </div>
                        </div>
                        <div class="form-group" id="phone">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phone Number: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="phone_group">
                                <input name="phone" id="phone" type="text"  placeholder=" eg. +25472832732" class="form-control tag-input-style">                           
                            </div>
                        </div>
                        <div class="form-group" id="email">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="email_group">
                                <input name="email" type="text" id="email" multiple="" placeholder="valid email" class="form-control tag-input-style">                           
                            </div>
                        </div>
                        <input type="hidden" id="staff-type">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-success submit-link" onclick="registerStaff();" >Submit</a>
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
    function Change(val) {
        var type = '';
        var cartegory = val.value;
        if (cartegory === "teaching") {
            $("#department").show();
            $('#staff-type').val = 'teaching';

        } else {
            $("#department").hide();
            $('#staff-type').val = 'non-teaching';
        }
    }

    function registerStaff() {
        var staff_type = $('#staff-type').val;

        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#register_staff').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/staff/staffManager.php?testsubmit=submitted&action=addStaff&type=' + staff_type,
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
                    $("#cartegory").val("");
                    $("#department").val("");
                    $("#fname").val("");
                    $("#lname").val("");
                    $("#phone").val("");
                    $("#email").val("");


                    options.title = 'Success!!!';
                    options.type = 'success';
                    options.text = message.msg;
                    notice.update(options);
                    setTimeout(function () {
                        window.href="views/staff/listStaff.php";
                    }, 1000);

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

