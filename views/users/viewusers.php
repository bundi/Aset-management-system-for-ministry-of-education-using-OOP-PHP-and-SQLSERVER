<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/users/user.php";


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
                        <div class="col-lg-3 text-center"><a href="#"><h3><i class="fa fa-arrow-left"></i>Back</h3></a></div>
                        <div class="col-lg-6 text-left"><a href="views/users/userpermissions.php?p=<?php echo $_SESSION['parent']; ?>"><button class="btn btn-primary small"><span class="fa fa-lock"></span>&nbsp;Permissions</button></a></div>
                        <div class="col-lg-3 text-left"><a href="views/users/adduser.php?p=<?php echo $_SESSION['parent']; ?>"><button class="btn btn-primary small"><span class="fa fa-plus"></span>Add User</button></a></div>
                    </div>

                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                            <table data-toggle="table" id="userTable" class="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                             <thead>
                               <tr role="row">
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Office</th>
                                   <th>Department</th>
                                   <th>Address</th>
                                   <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>

                                 <?php 
                            $user = new User();
                            foreach ($user->selectAllUsers() as $user) {
                                     echo '<tr role="row" class="odd">';
                                echo '<td>' . $user->name . '</td>';
                                echo '<td>' . $user->username . '</td>';
                                echo '<td>' . $user->email . '</td>';
                                echo '<td>' . $user->username . '</td>';
                                echo '<td>' . $user->email . '</td>';
                                     echo '<td><div class="tooltip-demo"><a href=\'javascript:changeUser("'. $user->id.'","del");\' class="fa fa-bitbucket " data-toggle="tooltip" data-placement="left" title="Delete"></a>  '
                                             . ' | <a href=\'views/users/edituser.php?u_id='. $user->id .'\' class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></a>'
                                             . ' | <a href=\'views/users/viewUser.php?u_id='.  $user->id .'\' class="fa fa-eye" data-toggle="tooltip" data-placement="right" title="View User"></a>'
                                             . '</div></td>';
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
    $(document).ready(function() {
        $('#userTable').DataTable({
            responsive: true
        });
    });
    </script>

    
    <script>
    function changeUser(userid,action){
        if ( !confirm("Are You Sure you want to delete this user?") ){
            return;
        }
        var errtype = "";
        $(document).ready(function(){
            $.ajax({
                type:'POST',
                url: 'users/changeuser.php?testsubmit=submitted&action='+ action +'&user_code='+userid,
                success: function(data, status, xhr) {
                    var info = "";

                    $(xhr.responseText).find("info").each(function() {
                        var xml = $(this);
                        errtype = xml.find("type").text();
                        
                        new PNotify({
                            title: errtype,
                            text: xml.find("msg").text(),
                            type: errtype,
                            styling: 'bootstrap3'
                        });

                    });
                    
                    if ( errtype == "success") {
                        setTimeout(function() {
                            location.href="users/viewusers.php";
                        }, 2000);
                    }

                },
                error: function (xhr, desc, err){
                        
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


