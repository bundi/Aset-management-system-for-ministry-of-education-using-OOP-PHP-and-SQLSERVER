<?php
if (!isset($_REQUEST['u_id']) || empty($_REQUEST['u_id'])) {
    header("Location: viewusers.php");
}
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "controls/users/user.php";
$user=new User();
$user_id=$_REQUEST['u_id'];

$counter = 0;
foreach ($user->selectUserByID($user_id) as $user) {
   $counter++; 
}
if ($counter == 0) {
    echo '<script>window.location="viewusers.php";</script>';
}
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header" style="color:#00a7da; font-weight: bold">View User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6 text-right">
                                   <a href="views/users/viewusers.php" style=" color: blue;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a> | User Details 
                                </div>
                                <div class="col-sm-6">
        
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.panel-heading -->
                      
                        <div class="panel-body">
                            <form id="adduserform" class="form-horizontal form-label-left">
                               
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="name_group">
                                      <input type="text" id="name" name="name" value="<?php echo $user->fname; ?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">UserName <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="username_group">
                                    <input type="text" id="username" value="<?php echo $user->username?>" name="username" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                  </div>
                                </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12" id="email_field_group">
                                    <input type="text" id="email_field" name="email_field" value="<?php echo $user->email ?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
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
<?php include_once $webpath . 'site_footer.php'; 