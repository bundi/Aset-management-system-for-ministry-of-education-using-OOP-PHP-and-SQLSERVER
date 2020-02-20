<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
define('SITE_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/AsMoE/');
include_once $webpath . "util/util.php";
$util=new util();
session_start();
session_unset();
session_destroy();
 $util->redirect(SITE_ROOT."views/users/signin.php");


