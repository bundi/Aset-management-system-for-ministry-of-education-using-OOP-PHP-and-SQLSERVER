<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";

include_once $webpath . "controls/desktop/desktop.php";


$desktop = new Desktop();
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

        <!-- Modal Assign Desktop -->
        <div class="modal fade" id="desktopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="assignDesktop">
                            <div class="row">
                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Search User<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" id="doneBy_group">
                                        <select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="doneBy" onchange="sendTo(this)" id="form-field-select-3" data-live-search="true" data-placeholder="search Options">
                                            <option value=""></option>
                                            <option value="all">User One</option>
                                            <option value="group">2</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 " style="margin: 0 auto;">
            <h1 class="page-header">Header</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            All Desktops  
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="#"><button class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Export Excel Sheet</button></a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="#"><button class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Export Pdf</button></a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="views/desktop/addDesktop.php"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add New</button></a>
                        </div>
                    </div>

                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table data-toggle="table" id="userTable" class="table table-bordered"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr role="row">
                                <th># </th>
                                <th>Serial#</th>
                                <th>Model</th>
                                <th>Office</th>
                                <th>Hdd</th>
                                <th>Ram</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 0;
                            foreach ($desktop->selectAllDesktops() as $desktop) {
                                $count += 1;
                                echo '<tr role="row" class="odd">';
                                echo "<td> " . $count . " </td>";
                                echo "<td> " . $desktop->cpuserial . " " . $desktop->processor . " </td>";
                                echo "<td>" . $desktop->model . "</td>";
                                echo "<td> " . $desktop->Office . "</td>";
                                echo "<td> " . $desktop->Office . " </td>";
                                echo "<td> " . $desktop->hdd . " </td>";
                                echo "<td> " . $desktop->ram . " </td>";
                                echo '<td> <a href=\'views/desktop/editDesktop.php?d_id=' . $desktop->id . '\' class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></a>'
                                . ' | <a href=\'views/desktop/viewDesktop.php?d_id=' . $desktop->id . '\' class="fa fa-eye" data-toggle="tooltip" data-placement="right" title="View Desktop"></a>'
                                . ' |<i class="fa fa-pencil" id="assigDesktop" value="' . $desktop->id . '" data-toggle="tooltip" data-placement="right" title="Assign User"></a>';


                                echo '</tr>';
                            }
                            ?>

                        </tbody>
                    </table>
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
    $("#assigDesktop").click(function () {
        $('#desktopModal').modal('toggle');
    });









    function changeUser(userid, action) {
        if (!confirm("Are You Sure you want to delete this user?")) {
            return;
        }
        var errtype = "";
        $(document).ready(function () {
            $.ajax({
                type: 'POST',
                url: 'tenant/changeTenant.php?testsubmit=submitted&action=' + action + '&tenant_code=' + userid,
                success: function (data, status, xhr) {
                    var info = "";

                    $(xhr.responseText).find("info").each(function () {
                        var xml = $(this);
                        errtype = xml.find("type").text();

                        new PNotify({
                            title: errtype,
                            text: xml.find("msg").text(),
                            type: errtype,
                            styling: 'bootstrap3'
                        });

                    });

                    if (errtype == "success") {
                        setTimeout(function () {
                            location.href = "tenant/manageTenants.php";
                        }, 2000);
                    }

                },
                error: function (xhr, desc, err) {

                    new PNotify({
                        title: "Error",
                        text: 'Network error. please check your network or consult your network administrator.',
                        type: 'error',
                        styling: 'bootstrap3'
                    });

                }
            });
        });
    }

    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });
    $("[data-toggle=popover]")
            .popover();
</script>




