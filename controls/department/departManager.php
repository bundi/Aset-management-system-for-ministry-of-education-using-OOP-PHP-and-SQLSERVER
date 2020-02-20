<?php

session_start();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "util/util.php";
include_once $webpath . "controls/department/departments.php";
$util = new util();

$errMsg = "";
$test = TRUE;

if ($_REQUEST['action'] == "add_department") {
    $department = new Department();
    $response['fields'] = Array();
    $response['message'] = Array();

    $department->name = isset($_POST['name']) ? $_POST['name'] : "";
    $department->hod = isset($_POST['hod']) ? $_POST['hod'] : "";


    if (empty($department->name)) {
        array_push($response['fields'], array("error" => "Field required", "field" => "name"));
        $test = FALSE;
    } else {
        $department->name = $util->test_input($department->name);
    }
    if (empty($department->hod)) {
        array_push($response['fields'], array("error" => "Field   is required", "field" => "hod"));
        $test = FALSE;
    } else {
        $department->hod = $util->test_input($department->hod);
    }
   if ($test) {
        
            if ($department->create()) {
                 $test = true;
                $errMsg = "Department Created";
            } else {
                $errMsg = "House was not added.Please contact the system  administrator for further guidelines ";
                $test = FALSE;
            }
        }
    else {
        $errMsg = "Please correct indicated fields below to complete registration.";
        $test = FALSE;
    }
    $response['message'] = array("msg" => $errMsg, "status" => $test);
    echo json_encode($response);
    
} 