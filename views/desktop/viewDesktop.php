<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/desktop/desktop.php";

$desktop= new Desktop();
foreach ($desktop->selectDesktopById($_REQUEST['d_id']) as $desktop) {}
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
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">Desktop Details</h1>
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
                            <h4>Desktop Details</h4>
                        </div>
                    </div>
                </div>
           <div class="panel-body">
                    <form id="addDesktop" class="form-horizontal form-label-left">
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Model<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="model_group">
                                <input type="text" id="model" name="model" required="required" value="<?php echo $desktop->model; ?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpuserial_group">Serial Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="serial_group">
                                <input type="text" id="cpuserial" name="cpuserial" required="required" readonly="" value="<?php echo $desktop->cpuserial ?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monitorSerial">Monitor Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="monitorSerial_group">
                                <input type="text" id="monitorSerial" name="monitorSerial" required="required" value="<?php echo $desktop->monitorSerial ?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hdd">Hdd Size<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="placeofbirth_group">
                                <input type="text" id="hdd" value="" name="hdd" required="required" value="<?php echo $desktop->hdd ?>"readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ram">RAM Size<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="dob_group">
                                <input type="text" id="dob" name="ram" required="required" value="" readonly="" value="<?php echo $desktop->ram ?>" class="form-control  col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ram">Os Version<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="dob_group">
                                <input type="text" id="Os" name="Os" required="required"  readonly="" value="<?php echo $desktop->Os ?>" class="form-control  col-md-7 col-xs-12">
                            </div>
                        </div>
                         <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ram">Office Version<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="dob_group">
                                <input type="text" id="Office" name="Office" required="required"  readonly="" value="<?php echo $desktop->Office ?>" class="form-control  col-md-7 col-xs-12">
                            </div>
                        </div>
             

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="antivirus">Antivirus<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="antivirus_group">
                                <input type="text"  id="antivirus" name="antivirus" required="required" value="<?php echo $desktop->antivirus ?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Processor<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="processor_group">
                                <input type="text"  id="processor" name="processor" required="required" value="<?php echo $desktop->processor ?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mouseSerial">Mouse Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="mouseSerial_group">
                                <input type="text"  id="mouse" name="mouseSerial" required="required" readonly="" value="<?php echo $desktop->mouseSerial ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyboardSerial">Keyboard Serial<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="keyboardSerial_group">
                                <input type="text"  id="keyboard" name="keyboardSerial" required="required" readonly="" value="<?php echo $desktop->keyboardSerial ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyboardSerial">VGA Cable<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="keyboardSerial_group">
                                <input type="text"  id="Vga" name="Vga" required="required" readonly="" value="<?php echo $desktop->Vga ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        

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

</script>

