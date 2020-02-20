<?php

session_start();
date_default_timezone_set('Africa/Nairobi');

$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "util/util.php";
include_once $webpath . "util/AfricasTalkingGateway.php";
include_once $webpath . "controls/sms/sms.php";
include_once $webpath . "controls/parent/parent.php";
include_once $webpath . "controls/classrooms/class.php";
include_once $webpath . "controls/classrooms/stream.php";
include_once $webpath . "controls/student/student.php";
include_once $webpath . "controls/student/studentLog.php";
include_once $webpath . "controls/staff/staff.php";
include_once $webpath . "controls/classrooms/subject.php";

$staff = new Staffs();
$subject=new Subject();

$sms = new SMS();

$classes = new Class_Rooms();
$stream = new Streams();
$parent = new Parents();

$students = new Student();
$studentLog = new StudentLog();

$response["results"] = array();
$response['fields'] = Array();

// Specify your authentication credentials
$username = "shivatech";
$apikey = "a4f1e740cfb75a5027bd97d16844cf153cb50057d493466a1763afa7e5004eb9";

$gateway = new AfricasTalkingGateway($username, $apikey);

$util = new util();

$output = "";
$errMsg = "";
$test = true;
$inserted = FALSE;
$test_post = $_SERVER["REQUEST_METHOD"] == "POST";


if ($test_post) {

    if ($_REQUEST['action'] == "addClass") {

        $classes->name = isset($_REQUEST['class_name']) ? $_REQUEST['class_name'] : "";

        $streams = isset($_REQUEST['streams']) ? $_REQUEST['streams'] : "";


        if (empty($classes->name)) {
            array_push($response['fields'], array("error" => "Class name is required", "field" => "class_name"));
            $test = FALSE;
        } else {
            $classes->name = $util->test_input($classes->name);
        }
        if ($classes->check_if_class_exist($classes->name)) {
            array_push($response['fields'], array("error" => "Class with this name Already Exists", "field" => "class_name"));
            $test = FALSE;
        }

        if ($test) {
            $created = $classes->create();
            if ($created) {
                foreach ($classes->selectClassesByName($classes->name) as $classes) {
                    
                }
                if (is_array($streams)) {
                    for ($i = 0; $i < count($streams); $i++) {
                        $stream->name = $streams[$i];
                        $stream->class_id = $classes->id;
                        $stream->create();
                    }
                }
                $test = TRUE;
                $errMsg = "Class Added Successfully!";
            } else {
                $test = FALSE;
                $errMsg = "An error occured. Please contact system administrator now!";
            }
        } else {
            $test = FALSE;
            $errMsg = "Please correct indicated fields.";
        }

        $output = json_encode(array("message" => $errMsg, "status" => $test, "fields" => $response["fields"]));
    }
    
    else if($_REQUEST['action'] == "updateClass") {

        $classes->name = isset($_REQUEST['class_name']) ? $_REQUEST['class_name'] : "";

        $streams = isset($_REQUEST['streams']) ? $_REQUEST['streams'] : "";


        if (empty($classes->name)) {
            array_push($response['fields'], array("error" => "Class name is required", "field" => "class_name"));
            $test = FALSE;
        } else {
            $classes->name = $util->test_input($classes->name);
        }
        if ($classes->check_if_class_exist($classes->name)) {
            array_push($response['fields'], array("error" => "Class with this name Already Exists", "field" => "class_name"));
            $test = FALSE;
        }

        if ($test) {
            $created = $classes->create();
            if ($created) {
                foreach ($classes->selectClassesByName($classes->name) as $classes) {
                    
                }
                if (is_array($streams)) {
                    for ($i = 0; $i < count($streams); $i++) {
                        $stream->name = $streams[$i];
                        $stream->class_id = $classes->id;
                        $stream->create();
                    }
                }
                $test = TRUE;
                $errMsg = "Class Added Successfully!";
            } else {
                $test = FALSE;
                $errMsg = "An error occured. Please contact system administrator now!";
            }
        } else {
            $test = FALSE;
            $errMsg = "Please correct indicated fields.";
        }

        $output = json_encode(array("message" => $errMsg, "status" => $test, "fields" => $response["fields"]));
    } else if ($_REQUEST['action'] == "deleteStudent") {
        $student_id = $_REQUEST['student_id'];

        $count = 0;
        foreach ($students->selectStudentByID($student_id) as $students) {
            $count += 1;
        }
        if ($count > 0) {
            $test = TRUE;
        }

        if ($test) {
            $students->status = 'del';
            $updated = $students->update();
            if ($updated) {
                $test = TRUE;
                $errMsg = "Student deleted Successfully!";
            } else {
                $test = FALSE;
                $errMsg = "An error occured. Please contact system administrator now!";
            }
        } else {
            $test = FALSE;
            $errMsg = "Please correct indicated fields.";
        }

        $output = json_encode(array("message" => $errMsg, "status" => $test, "fields" => $response["fields"]));
    } else if ($_REQUEST['action'] == "getStreams") {
        $class_id = $_REQUEST['class_id'];

        $count = 0;
        $output .= '<select class="chosen-select col-xs-12 col-sm-12 col-md-12" name="stream" id="form-field-select-4" data-placeholder="search Stream" style="display: none;">
                                    <option value=""></option>
                   ';
        foreach ($stream->selectStreamByClassId($class_id) as $stream) {
            $output .= '<option value="' . $stream->id . '">' . $stream->name . '</option>';
        }
        $output .= '</select>';
    } else {
        $output = "No Action";
    }
} else {
    $output = "No Post";
}


echo $output;


