<?php
if (!isset($_REQUEST['class_id']) || empty($_REQUEST['class_id'])) {
    header("Location: listClass.php");
}
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

$counter = 0;
foreach ($classes->selectClassesById($_REQUEST['class_id']) as $classes) {
    $counter += 1;
}
if ($counter == 0) {
    echo '<script>window.location="views/classes/listClass.php";</script>';
}
?>

<div id="page-wrapper">
    <?php
    $current_file = $_SERVER['PHP_SELF'];
    if ($user_logged->id!=12) {
        echo 'You are not Authorised to access this file';
        return;
    }
    ?>
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Edit Class</h1>
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
                            <h4>Update Class Details</h4>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <form id="formSendSMS" class="form-horizontal form-label-left">

                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Class Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="class_name_group">
                                <input  class="form-control tag-input-style" id="fname" name="class_name" value="<?php echo $classes->name; ?>" placeholder="Classs Name eg Form 1" autocomplete="false"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Stream(s): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="parent_group">
                                <select name="streams[]" multiple="" class="chosen-select form-control tag-input-style" id="form-field-select-3" data-placeholder="Choose a Parent(s)..." style="display: none;">
                                    <option value=""></option>
                                    <?php
                                    foreach ($stream_names->selectAllStreamNames() as $stream_names) {
                                        $printed = FALSE;
                                        foreach ($stream->selectStreamByClassId($classes->id) as $stream) {
                                            if ($stream_names->name == $stream->name) {
                                                echo '<option selected>' . $stream_names->name . '</option>';
                                                $printed = TRUE;
                                            }
                                        }
                                        if (!$printed) {
                                            echo '<option>' . $stream_names->name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3 col-md-6">
                                    <a style="width: 100%;" type="button" onclick="updateClass();" class="btn btn-success submit-link">Update</a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <a style="width: 100%;" type="button" href="views/classes/listclass.php" class="btn btn-info submit-link">Cancel</a>
                                    <!--<a class="btn btn-success submit-link" onclick="saveData();" >Save</a>-->
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
    function initcomponents() {
        if (!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect: true});
            //resize the chosen on window resize

            $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function () {
                        $('.chosen-select').each(function () {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                if (event_name != 'sidebar_collapsed')
                    return;
                $('.chosen-select').each(function () {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            });


            $('#chosen-multiple-style .btn').on('click', function (e) {
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if (which == 2)
                    $('#form-field-select-4').addClass('tag-input-style');
                else
                    $('#form-field-select-4').removeClass('tag-input-style');
            });
        }
    }

    initcomponents();

    function updateClass() {

        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#formSendSMS').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/classrooms/manageClasses.php?testsubmit=submitted&action=updateClass',
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



