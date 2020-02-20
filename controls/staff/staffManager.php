
<?php
session_start();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "util/util.php";
include_once $webpath . "controls/staff/staff.php";
$util = new util();
$output = "";
$errMsg = "";
$test = true;
$inserted = FALSE;
$test_post = $_SERVER["REQUEST_METHOD"] == "POST";

if ($test_post) {
if ($_REQUEST['action'] == "addStaff") {
        $staff=new Staffs();
        $response['fields'] = Array();
        $response['message'] = Array();
        
        $type=$_REQUEST['type'];
        $staff->teaching_noneteaching = isset($_REQUEST['cartegory']) ? $_REQUEST['cartegory'] : "";
        $staff->department = isset($_REQUEST['department']) ? $_REQUEST['department'] : "";
        $staff->fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : "";
        $staff->lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : "";
        $staff->phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "";
        $staff->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        
        if (empty($staff->teaching_noneteaching)) {
            array_push($response['fields'], array("error" => "Select Cartegory", "field" => "cartegory"));
            $test = FALSE;
        } else {
            $staff->teaching_noneteaching = $util->test_input($staff->teaching_noneteaching);
        }
        if (empty($staff->department) and $type=='teaching') {
            array_push($response['fields'], array("error" => "Select Department", "field" => "department"));
            $test = FALSE;
        } else {
            $staff->department = $util->test_input($staff->department);
        }
        if (empty($staff->fname)) {
            array_push($response['fields'], array("error" => "First name  is required", "field" => "fname"));
            $test = FALSE;
        } else {
            $staff->fname = $util->test_input($staff->fname);
        }
        
        if (empty($staff->lname)) {
            array_push($response['fields'], array("error" => "Required", "field" => "lname"));
            $test = FALSE;
        } else {
            $staff->lname = $util->test_input($staff->lname);
        }
        
        if (empty($staff->phone)) {
            array_push($response['fields'], array("error" => "Mobile Phone  is required", "field" => "phone"));
            $test = FALSE;
        } else {
            $staff->phone = $util->test_input($staff->phone);
        }
        if (empty($staff->email)) {
            array_push($response['fields'], array("error" => "Email field is required", "field" => "email"));
            $test = FALSE;
        } else if (!filter_var($staff->email, FILTER_VALIDATE_EMAIL)) {
            array_push($response['fields'], array("error" => "Email value is not correct", "field" => "email"));
            $test = FALSE;
        } else {
            $staff->email = $util->test_input($staff->email);
        }
        if ($staff->check_if_staff_exist($staff->email)) {
            $test = FALSE;
            array_push($response['fields'], array("error" => "Email already exists in the system", "field" => "email"));
            $errMsg = "Email already exists in the system.";
        }
             if ($test) {
                $inserted = $staff->create();

            if ($inserted) {
               $test = true;
                $errMsg = "Account  created";
            } else {

                $errMsg = "Account  was not created .Please contact the system  administrator for further guidelines ";
                $test = FALSE;
            }
        } else {

            $errMsg = "Please correct indicated fields below to complete registration.";
            $test = FALSE;
        }
        $response['message'] = array("msg" => $errMsg, "status" => $test);
           echo json_encode($response);
    }
    
}