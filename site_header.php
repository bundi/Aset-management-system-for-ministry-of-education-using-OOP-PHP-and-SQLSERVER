<?php
session_start();
//var_dump($_SESSION['userid']);
//die();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
define('SITE_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/AsMoE/');
include_once $webpath . "util/util.php";
include_once $webpath . "util/mainMenu.php";
include_once $webpath . "util/menu.php";
include_once $webpath . "controls/users/user.php";


$util = new util();
$mainMenu = new MainMenu();
$menu = new Menu();

if (!isset($_SESSION['username'])) {
    $util->redirect(SITE_ROOT . "views/users/signin.php");
}
if (isset($_REQUEST['p'])) {
    $_SESSION['parent'] = $_REQUEST['p'];
}else{
    $_SESSION['parent'] = 0;
}
//$default_class = '';
//if($_SESSION['parent'] == 0){
//    $default_class = "active open";
//}

if (isset($_SESSION['logged_user'])) {

    $user_logged = new user();
    $user_logged = unserialize($_SESSION['logged_user']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>AsMoE</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <base href="<?php echo SITE_ROOT; ?>">
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" href="pnotify/pnotify.custom.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css">

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!-- Datepicker -->
        <link href="assets/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">


        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="assets/js/ace-extra.min.js"></script>
        
        <style>
            body{
                overflow-x: hidden;
            }
        </style>
        <!--End of Tawk.to Script-->


        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Asset Management System
                        </small>
                    </a>


                </div>

                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">


                        <li class="light-blue dropdown-modal user-min">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $_SESSION['username']; ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="views/users/changepassword.php">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Change Password
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="controls/users/signout.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {
                    }
                </script>



                <ul class="nav nav-list">
                    <li class="<?php echo $default_class; ?> hover">
                        <a href="index.php" style="text-align: center;">
                            <img style="height:40px;width:40px;" src="assets/custom_icons/dashboard.png"/><br/>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <?php
                    $user = new User;
                    $menu_str = "";
                    
                    foreach ($mainMenu->selectAllMainMenus() as $mainMenu) {
                        $query_count = 0;
                        foreach ($menu->selectMenusByParentId($mainMenu->id) as $menu) {

                            if ($user->checkUserAllowed($user_logged->id, $menu->id)) {

                                $menu_str .= '<li class="hover"><a href="' . $menu->link . '?p='. $menu->parent .'"><i class="menu-icon fa fa-caret-right"></i>
                                                                ' . $menu->name . '</a><b class="arrow"></b></li>';

                                $query_count ++;
                            }
                        }


                        if ($query_count > 0) {
                            $class = '';
                            if($_SESSION['parent'] == $mainMenu->id){
                                    $class = "active open";
                            }
                            echo '<li class="'.$class.' hover"><a href="'.$mainMenu->link.'" class="dropdown-toggle" style="text-align:center;"><i> <img style="height:40px;width:40px;" src="assets/custom_icons/' . $mainMenu->icon . '"/> </i><br/>
                                                <span class="menu-text">' . $mainMenu->name . ' </span><b class="arrow "></b></a><b class="arrow"></b>
                                                <ul class="submenu">';
                            echo $menu_str;
                            echo '</ul></li>';
                        }

                        $menu_str = "";
                    }
                    ?>

                </ul><!-- /.nav-list -->
            </div>


