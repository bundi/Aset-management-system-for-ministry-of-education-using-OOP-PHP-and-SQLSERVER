<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/aSchool/";
include_once $webpath . "site_header.php";
include_once $webpath . "controls/staff/staff.php";
include_once $webpath . "util/DatabaseConnection.php";
$staff = new Staffs();
if (isset($_REQUEST['p'])) {
    $_SESSION['parent'] = $_REQUEST['p'];
}else{
    $_SESSION['parent'] = 0;
}
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
        <div class="col-lg-2" style="text-align: center;margin: 0 auto; padding-top: 15px;"><a href="index.php"><button class="btn btn-sm"><span class="fa fa-arrow-left"></span>Back</button></a></div>
        <div class="col-lg-10" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold">All School  Staffs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class=" col-lg-12" style="text-align: left;">
                            <a href="views/staff/addStaff.php?p=<?php echo $_SESSION['parent']; ?>"><button class="btn btn-sm"><span class="fa fa-plus"></span>Add New Staff</button></a>
                        </div> 
                    </div>

                </div>

                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table data-toggle="table" id="userTable" class="table table-bordered"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr role="row">
                                <th>ID </th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Cartegory</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($staff->selectAllStaffs() as $staff) {

                                echo '<tr role="row" class="odd">';
                                echo "<td> " . $staff->id . " </td>";
                                echo "<td> " . $staff->fname . " </td>";
                                echo "<td>" . $staff->lname . "</td>";
                                echo "<td> " . $staff->phone . " </td>";
                                echo "<td> " . $staff->email . " </td>";
                                echo "<td> " . $staff->teaching_noneteaching . " </td>";
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





