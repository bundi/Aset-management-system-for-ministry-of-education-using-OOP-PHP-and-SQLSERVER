<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/mainMenu.php";
include_once $webpath . "util/menu.php";
include_once $webpath . "controls/users/user.php";


$util = new util();
$mainMenu = new MainMenu();
$menu = new Menu();


$user = new User();
$allmainmenus = $menu->selectAllMenus();
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
        <div class="col-lg-12">
            <h1></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Permissions
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">

                    <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select User</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" onchange="validateUserPermissions();" id="userid">
                                <option value="">Select User</option>
                                <?php
                                $selected_user = "";
                                foreach ($user->selectAllUsers() as $user) {

                                    if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != '') {
                                        if ($_REQUEST['userid'] == $user->id) {
                                            $selected_user = "selected='selected'";
                                        } else {
                                            $selected_user = "";
                                        }
                                    } else {
                                        $selected_user = "";
                                    }

                                    echo '<option value=' . $user->id . ' ' . $selected_user . '>' . $user->username . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix" style="height: 50px;"></div>
                    <div class="clearfix" style="height: 50px;"></div>

                    <form id="inputForm">            

                        <?php
                        $checked = "";
                        if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != '') {

                            echo '<input type="hidden" name="userid" value="' . $_REQUEST['userid'] . '"><ul class="list-unstyled timeline">';

                            foreach ($mainMenu->selectAllMainMenus() as $mainMenu) {
                                $id = $mainMenu->id;

                                echo '<li><div class="block"><div class="tags"><span href="" class="tag"><span>' . $mainMenu->name . '</span></span></div><div class="block_content"><div class="row">';
//                                    var_dump($menu->id);die();
//                                    $allmenus = $manageUser->getAllMenus($myrow['id']);
                                foreach ($menu->selectAllMenus() as $menu) {
                                    if ($menu->parent == $id) {


                                        if ($user->checkUserAllowed($_REQUEST['userid'], $menu->id))
                                            $checked = "checked='checked'";
                                        else
                                            $checked = "";
                                        echo '<div class="col-md-2">';
                                        echo '<table><tr><td>' . $menu->name . '</td>';
                                        echo '<td><div class="checkbox">
                                               <label><input type="checkbox" class="flat" value="' . $menu->id . '" name="permission[]" ' . $checked . '>
                                               </label></div></td></tr></table></div>';
                                    }
                                }

                                echo '</div></div></div></li>';
                            }

                            echo '</ul>';
                        } else {
                            echo '<div class="alert alert-info alert-dismissible fade in" role="ale<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please select user to edit permissions</div>';
                        }
                        ?>

                    </form>  


                    <?php
                    if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != ''){
                    echo '<a class="btn btn-default" onclick="changeUserPermissions()"><i class="fa fa-save"></i> Save</a>';}
                    ?>


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
    $(document).ready(function () {
        $("#datatable-buttons").DataTable({
            dom: "Bfrtip",
            responsive: true
        });


        $('#datatable').dataTable();

    });
</script>

<script>

    function validateUserPermissions() {
        location.href = "views/users/userpermissions.php?userid=" + $('#userid').val();
    }

    function changeUserPermissions() {
        if (!confirm("Are You Sure you want to change permissions for this user?")) {
            return;
        }

        var notice = new PNotify(options_1);
        var str = $('#inputForm').serialize();
        var userid = "";
        var errtype = "";
        var msg = "";
        $(document).ready(function () {
            $.ajax({
                type: 'POST',
                url: 'controls/users/changeuser.php?testsubmit=submitted&action=editpermissions',
                data: str,
                success: function (data, status, xhr) {

                    $(xhr.responseText).find("info").each(function () {
                        var xml = $(this);
                        errtype = xml.find("type").text();
                        userid = xml.find("userid").text();
                        msg = xml.find("msg").text();

                    });

                    if (errtype == "success") {

                        location.href = "views/users/userpermissions.php?err_type=" + errtype + "&err_msg=" + msg + "&userid=" + userid;

                    }

                },
                error: function (xhr, desc, err) {
                    options.title = 'Error!!!';
                    options.type = 'error';
                    options.text = 'A network error occured. Please consult your network administrator.';
                    notice.update(options);
                }
            });
        });
    }

</script>

<?php
if (isset($_REQUEST['err_type'])) {
    echo '<script>';
    echo '$(document).ready(function(){
                new PNotify({
                    title: "' . $_REQUEST['err_type'] . '!!",
                    text: "' . $_REQUEST['err_msg'] . '",
                    type: "' . $_REQUEST['err_type'] . '",
                    styling: "bootstrap3"
                });
              });';
    echo '</script>';
}
?>
