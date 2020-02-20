<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "controls/transfers/transfer.php";
include_once $webpath . "controls/users/user.php";
$transfer= new Transfer();
$user=new User();

if (isset($_REQUEST['p'])) {
    $_SESSION['parent'] = $_REQUEST['p'];
}else{
    $_SESSION['parent'] = 0;
}
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
        <div class="col-lg-8 " style="margin: 0 auto;">
            <h1 class="page-header"></h1>
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
                            <a href="views/desktop/addDesktop.php"><button class="btn btn-primary"><span class="fa fa-plus"></span>Initiate</button></a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table data-toggle="table" id="userTable" class="table table-bordered"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr role="row">
                                <th># </th>
                                <th>User</th>
                                <th>Asset</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 0;
                            foreach ($desktop->selectAllDesktops() as $desktop) {
                                foreach ($user->selectUserByID($transfer->userId) as $user){
                                $count += 1;
                                echo '<tr role="row" class="odd">';
                                echo "<td> " . $count . " </td>";
                                echo "<td> " . $user->name. "</td>";
                                echo "<td>" . $transfer->itemId. "</td>";
                                echo "<td> " . $transfer->source  . "</td>";
                                echo "<td> " .  $transfer->destination . " </td>";
                                echo '<td> <a href=\'views/desktop/editDesktop.php?d_id=' . $desktop->id. '\' class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></a>'
                                . ' | <a href=\'views/desktop/viewDesktop.php?d_id=' . $desktop->id. '\' class="fa fa-eye" data-toggle="tooltip" data-placement="right" title="View Desktop"></a>' . ' '
                                . '</div></td>';
                                echo '</tr>';
                                }
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

<?php include_once $webpath . 'site_footer.php'; ?>

