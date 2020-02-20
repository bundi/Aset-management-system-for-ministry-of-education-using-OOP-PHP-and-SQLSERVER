<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/parent/parent.php";
include_once $webpath . "controls/classrooms/class.php";
include_once $webpath . "controls/classrooms/stream.php";
include_once $webpath . "controls/classrooms/stream_names.php";
include_once $webpath . "controls/student/student.php";

$classes = new Class_Rooms();
$stream = new Streams();
$parent = new Parents();
$students = new Student();

$stream_names = new Stream_Names();
?>

<div id="page-wrapper">

    <?php
    $current_file = $_SERVER['PHP_SELF'];
    
//    if (!in_array($current_file, $_SESSION["authorized_menu"]['authorized_menu'])) {
//        echo 'You are not Authorised to access this file';
//        return;
//    }
    ?>
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Add Class</h1>
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
                            <h4>New Class</h4>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <form id="formAddSubj" class="form-horizontal form-label-left">

                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Subject Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="subject_code_group">
                                <input  class="form-control tag-input-style" id="code" name="subject_code" placeholder="Subject Code" autocomplete="false"/>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="subject_name_group">
                                <input  class="form-control tag-input-style" id="name" name="subject_name" placeholder="Subject Name" autocomplete="false"/>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviation">Abbreviation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="class_abbrev_group">
                                <input  class="form-control tag-input-style" id="abbrev" name="subject_abbrev" placeholder="Subject Abbreviation eg KIS" autocomplete="false"/>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grading">Grading <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="class_grading_group">
                                <input  class="form-control tag-input-style" id="grading" name="subject_grading" placeholder="Subject Grading" autocomplete="false"/>
                            </div>
                        </div>

                        

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-success submit-link" onclick="saveData();" >Save</a>
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

function saveData() {

        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#formAddSubj').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/classrooms/manageClasses.php?testsubmit=submitted&action=addClass',
            data: str,
            success: function (json) {

                var message = $.parseJSON(json).message;
                var status = $.parseJSON(json).status;
//                var results = $.parseJSON(json).results;
                $('.validation').remove();
                if (status != true) {
                    var fields = $.parseJSON(json).fields;
                    for (var i = 0; i < fields.length; i++) {
                        var field = fields[i];
                        //console.log(field.field);
                        $('#' + field.field + '_group').append('<l class="validation" style="color:red;">' + field.error + '</i>')
                    }

                    options.title = 'Error!!!';
                    options.type = 'error';
                    options.text = message;
                    notice.update(options);
                } else {
                    $("#reg_no").val("");
                    $("#lname").val("");
                    $("#fname").val("");


                    options.title = 'Success!!!';
                    options.type = 'success';
                    options.text = message;
                    notice.update(options);

//                    console.log(JSON.stringify(results));

//
//                    setTimeout(function () {
//                        window.open("views/sms/showDelivery.php?table=" + JSON.stringify(results), "Delivery Report", "width=500,height=500");
//                    }, 1000);

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



