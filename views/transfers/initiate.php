<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
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
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Initiate Transfer</h1>
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
                            <h4>Initiate</h4>
                        </div>
                    </div>
                </div>
           <div class="panel-body">
                    <form id="addDesktop" class="form-horizontal form-label-left">
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Model<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="model_group">
                                <input type="text" id="model" name="model" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpuserial">Serial Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="cpuserial_group">
                                <input type="text" id="cpuserial" name="cpuserial" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monitorSerial">Monitor Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="monitorSerial_group">
                                <input type="text" id="monitorSerial" name="monitorSerial" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hdd">Hdd Size<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="hdd_group">
                                <input type="text" id="hdd" value="" name="hdd" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ram">RAM Size<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="ram_group">
                                <input type="text" id="ram" name="ram" required="required" value="" class="form-control  col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="os">OS Version<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="Os_group">
                                <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="Os"  id="os" data-placeholder="select Os">
                                    <option value=""></option>
                                    <option value="7">Windows 7</option>
                                    <option value="8">Windows 8</option>
                                    <option value="10">Windows 10</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="office">Office Version<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="Office_group">
                                <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="Office"  id="Office" data-placeholder="select Office">
                                    <option value=""></option>
                                    <option value="2007">2007</option>
                                    <option value="2010">2010</option>
                                    <option value="2016">2016</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="antivirus">Antivirus<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="antivirus_group">
                                <input type="text"  id="antivirus" name="antivirus" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Processor<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="processor_group">
                                <input type="text"  id="processor" name="processor" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mouseSerial">Mouse Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="mouseSerial_group">
                                <input type="text"  id="mouse" name="mouseSerial" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyboardSerial">Keyboard Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="keyboardSerial_group">
                                <input type="text"  id="keyboard" name="keyboardSerial" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                       <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Vga">VGA Cable<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="Vga_group">
                                <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="Vga"  id="Vga" data-placeholder="VGA Issued?">
                                    <option value=""></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                               </select>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-success submit-link" onclick="addDesktop();" >Submit</a>
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
                });
            });


        }
    }

    initcomponents();


    function addDesktop() {

        $('.submit-link').addClass('disabled');
        var notice = new PNotify(options_1);
        var str = $('#addDesktop').serialize();
        $.ajax({
            type: 'POST',
            url: 'controls/desktop/manageDesktop.php?testsubmit=submitted&action=addDesktop',
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
                    

                    options.title = 'Success!!!';
                    options.type = 'success';
                    options.text = message;
                    notice.update(options);

                    


                    setTimeout(function () {
                        window.open("views/desktop/listDesktops.php");
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