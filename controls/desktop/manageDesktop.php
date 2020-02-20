<?php
session_start();
date_default_timezone_set('Africa/Nairobi');

$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "util/util.php";
include_once $webpath . "controls/users/user.php";
include_once $webpath . "controls/desktop/desktop.php";
include_once $webpath . "controls/desktop/dbconnect.php";

$desktop=new Desktop();
$user = new User();

$response["results"] = array();
$response['fields'] = Array();

$util = new util();

$output = "";
$errMsg = "";
$test = true;
$inserted = FALSE;
$test_post = $_SERVER["REQUEST_METHOD"] == "POST";


if ($test_post) {
 if ($_REQUEST['action'] == "addDesktop") {
        $desktop->model = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
        $desktop->cpuserial = isset($_REQUEST['cpuserial']) ? $_REQUEST['cpuserial'] : "";
        $desktop->processor= isset($_REQUEST['processor']) ? $_REQUEST['processor'] : "";
        $desktop->monitorSerial= isset($_REQUEST['monitorSerial']) ? $_REQUEST['monitorSerial'] : "";
        $desktop->keyboardSerial= isset($_REQUEST['keyboardSerial']) ? $_REQUEST['keyboardSerial'] : "";
        $desktop->mouseSerial= isset($_REQUEST['mouseSerial']) ? $_REQUEST['mouseSerial'] : "";
        $desktop->Os= isset($_REQUEST['Os']) ? $_REQUEST['Os'] : "";
        $desktop->Office = isset($_REQUEST['Office']) ? $_REQUEST['Office'] : "";
        $desktop->Vga= isset($_REQUEST['Vga']) ? $_REQUEST['Vga'] : "";
        $desktop->antivirus = isset($_REQUEST['antivirus']) ? $_REQUEST['antivirus'] : "";
        $desktop->hdd = isset($_REQUEST['hdd']) ? $_REQUEST['hdd'] : "";
        $desktop->ram = isset($_REQUEST['ram']) ? $_REQUEST['ram'] : "";
      

        if (empty($desktop->model)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "model"));
            $test = FALSE;
        } else {
            $desktop->model = $util->test_input($desktop->model);
        }
        if (empty($desktop->cpuserial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "cpuserial"));
            $test = FALSE;
        } else {
            $desktop->cpuserial = $util->test_input($desktop->cpuserial);
        }
        if (empty($desktop->processor)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "processor"));
            $test = FALSE;
        } else {
           $desktop->processor = $util->test_input($desktop->processor);
        }
        if (empty($desktop->monitorSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "monitorSerial"));
            $test = FALSE;
        } else {
           $desktop->monitorSerial = $util->test_input($desktop->monitorSerial);
        }
        if (empty($desktop->keyboardSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "keyboardSerial"));
            $test = FALSE;
        } else {
            $desktop->keyboardSerial = $util->test_input($desktop->keyboardSerial);
        }
        if (empty($desktop->mouseSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "mouseSerial"));
            $test = FALSE;
        } else {
            $desktop->mouseSerial= $util->test_input($desktop->mouseSerial);
        }
        if (empty($desktop->Office)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Office"));
            $test = FALSE;
        } else {
            $desktop->Office = $util->test_input($desktop->Office);
        }
        if (empty($desktop->Os)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Os"));
            $test = FALSE;
        } else {
            $desktop->Os = $util->test_input($desktop->Os);
        }
          if (empty($desktop->Vga)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Vga"));
            $test = FALSE;
        } else {
            $desktop->Vga = $util->test_input($desktop->Vga);
        }
          if (empty($desktop->antivirus)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "antivirus"));
            $test = FALSE;
        } else {
            $desktop->antivirus = $util->test_input($desktop->Os);
        }
         if (empty($desktop->hdd)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "hdd"));
            $test = FALSE;
        } else {
            $desktop->hdd = $util->test_input($desktop->hdd);
        }
         if (empty($desktop->ram)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "ram"));
            $test = FALSE;
        } else {
            $desktop->ram = $util->test_input($desktop->ram);
        }

        $exists=FALSE;
        if ($test) {
            $exists = $desktop->check_if_desktop_exist($desktop->cpuserial);
            if ($exists) {
                $errMsg = "Desktop could not be created. Check the reason on the field below";
                array_push($response['fields'], array("error" => "Desktop with Similar serial already exist", "field" => "cpuserial"));
                $test = FALSE;
            } else {
                $desktop->status="active";
                
                $query = "MoE.dbo.sp_DesktopCreate  @Manufacturer='$desktop->model', @Model='$desktop->model', @SerialNumber='$desktop->cpuserial',@Processor='$desktop->processor',@Hdmi='$desktop->model', @Vga='$desktop->Vga', @Os='$desktop->Os', @Antivirus='$desktop->antivirus',@MsOffice='$desktop->Office', @MonitorSerial='$desktop->monitorSerial', @MonitorModel='$desktop->model', @MouseSerial='$desktop->mouseSerial', @KeyboardSerial='$desktop->keyboardSerial', @WarrantyNumber='$desktop->model', @HddSize='$desktop->hdd', @RamSize='$desktop->ram'";
                $created = sqlsrv_query($conn, $query);
                if ($created) {
                    $test = TRUE;
                    $errMsg = "Desktop Added Successfully!";
                } else {
                    $test = FALSE;
                    $errMsg = "An error occured. Please contact system administrator now!";
//                    die(print_r(sqlsrv_errors(), true));
                }
            }
        } else {
            $test = FALSE;
            if ($exists) {
                
            } else {
                $errMsg = "Please correct indicated fields.";
            }
        }

        $output = json_encode(array("message" => $errMsg, "status" => $test, "fields" => $response["fields"]));
    } 
    
    else if ($_REQUEST['action'] == "updateDesktop") {
        
        
        $desktop->model = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
        $desktop->cpuserial = isset($_REQUEST['cpuserial']) ? $_REQUEST['cpuserial'] : "";
        $desktop->processor= isset($_REQUEST['processor']) ? $_REQUEST['processor'] : "";
        $desktop->monitorSerial= isset($_REQUEST['monitorSerial']) ? $_REQUEST['monitorSerial'] : "";
        $desktop->keyboardSerial= isset($_REQUEST['keyboardSerial']) ? $_REQUEST['keyboardSerial'] : "";
        $desktop->mouseSerial= isset($_REQUEST['mouseSerial']) ? $_REQUEST['mouseSerial'] : "";
        $desktop->Os= isset($_REQUEST['Os']) ? $_REQUEST['Os'] : "";
        $desktop->Office = isset($_REQUEST['Office']) ? $_REQUEST['Office'] : "";
        $desktop->Vga= isset($_REQUEST['Vga']) ? $_REQUEST['Vga'] : "";
        $desktop->antivirus = isset($_REQUEST['antivirus']) ? $_REQUEST['antivirus'] : "";
        $desktop->hdd = isset($_REQUEST['hdd']) ? $_REQUEST['hdd'] : "";
        $desktop->ram = isset($_REQUEST['ram']) ? $_REQUEST['ram'] : "";
      

        if (empty($desktop->model)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "model"));
            $test = FALSE;
        } else {
            $desktop->model = $util->test_input($desktop->model);
        }
        if (empty($desktop->cpuserial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "cpuserial"));
            $test = FALSE;
        } else {
            $desktop->cpuserial = $util->test_input($desktop->cpuserial);
        }
        if (empty($desktop->processor)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "processor"));
            $test = FALSE;
        } else {
           $desktop->processor = $util->test_input($desktop->processor);
        }
        if (empty($desktop->monitorSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "monitorSerial"));
            $test = FALSE;
        } else {
           $desktop->monitorSerial = $util->test_input($desktop->monitorSerial);
        }
        if (empty($desktop->keyboardSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "keyboardSerial"));
            $test = FALSE;
        } else {
            $desktop->keyboardSerial = $util->test_input($desktop->keyboardSerial);
        }
        if (empty($desktop->mouseSerial)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "mouseSerial"));
            $test = FALSE;
        } else {
            $desktop->mouseSerial= $util->test_input($desktop->mouseSerial);
        }
        if (empty($desktop->Office)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Office"));
            $test = FALSE;
        } else {
            $desktop->Office = $util->test_input($desktop->Office);
        }
        if (empty($desktop->Os)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Os"));
            $test = FALSE;
        } else {
            $desktop->Os = $util->test_input($desktop->Os);
        }
          if (empty($desktop->Vga)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "Vga"));
            $test = FALSE;
        } else {
            $desktop->Vga = $util->test_input($desktop->Vga);
        }
          if (empty($desktop->antivirus)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "antivirus"));
            $test = FALSE;
        } else {
            $desktop->antivirus = $util->test_input($desktop->Os);
        }
         if (empty($desktop->hdd)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "hdd"));
            $test = FALSE;
        } else {
            $desktop->hdd = $util->test_input($desktop->hdd);
        }
         if (empty($desktop->ram)) {
            array_push($response['fields'], array("error" => "This field is required", "field" => "ram"));
            $test = FALSE;
        } else {
            $desktop->ram = $util->test_input($desktop->ram);
        }

        $exists=FALSE;
        if ($test) {
            {
                foreach ($desktop->selectDesktopById($desktop->id) as $desktop){}
                $created = $desktop->update();
                if ($created) {
                    $test = TRUE;
                    $errMsg = "Desktop Updated Successfully!";
                } else {
                    $test = FALSE;
                    $errMsg = "An error occured. Please contact system administrator now!";
                }
            }
        } else {
            $test = FALSE;
            if ($exists) {
                
            } else {
                $errMsg = "Please correct indicated fields.";
            }
        }

        $output = json_encode(array("message" => $errMsg, "status" => $test, "fields" => $response["fields"]));
    }
    else if ($_REQUEST['action'] == "deleteStudent") {
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
    } else {
        $output = "No Action";
    }
} else {
    $output = "No Post";
}


echo $output;


