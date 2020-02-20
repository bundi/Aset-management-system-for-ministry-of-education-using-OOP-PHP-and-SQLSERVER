<?php

session_start();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
//include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/users/user.php";
include_once $webpath . "util/util.php";
include_once $webpath . "util/ArrayList.php";
include_once $webpath . "util/passwordutil.php";
$password = new PasswordUtil();
$util = new util();


$output = "";
$errEmail = "";
$errName = "";
$errMsg = "";
$errPass = "";
$name = "";
$email = "";
$pass_one = "";
$test = true;
$inserted = FALSE;
$test_post = $_SERVER["REQUEST_METHOD"] == "POST";

if ($test_post) {

    if ($_REQUEST['action'] == "adduser") {
        $user = new User();

        $response['fields'] = Array();
        $response['message'] = Array();

        $user->fname = isset($_POST['name']) ? $_POST['name'] : "";
        $user->username = isset($_POST['username']) ? $_POST['username'] : "";
        $user->email = isset($_POST['email_field']) ? $_POST['email_field'] : "";

        if (empty($user->fname)) {
            array_push($response['fields'], array("error" => "Name  is required", "field" => "name"));
            $test = FALSE;
        } else {
            $user->fname = $util->test_input($user->fname);
        }
        if (empty($user->username)) {
            array_push($response['fields'], array("error" => "UserName  is required", "field" => "username"));
            $test = FALSE;
        } else {
            $user->username = $util->test_input($user->username);
        }
        if (empty($user->email)) {
            array_push($response['fields'], array("error" => "Email field is required", "field" => "email_field"));
            $test = FALSE;
        } else if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            array_push($response['fields'], array("error" => "Email value is not correct", "field" => "email_field"));
            $test = FALSE;
        } else {
            $user->email = $util->test_input($user->email);
        }

        if ($user->check_if_user_email_exist($email)) {

            $test = FALSE;
            array_push($response['fields'], array("error" => "Email already exists in the system", "field" => "email_field"));
            $errMsg = "Email already exists in the system.";
        } else if ($user->check_if_username_exist($user->username)) {

            $test = FALSE;
            $max = TRUE;
            array_push($response['fields'], array("error" => "Username already exists in the system", "field" => "username"));
            $errMsg = "Email already exists in the system.";
        } else if ($test) {
            $user->password = $password->hashPassword('1234');
            $user->status = 'active';
            if ($user->create()) {

                $test = true;
                $errMsg = "Account has been created";
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

    if ($_REQUEST['action'] == "changepassword") {

        $user = new user();
        if (isset($_SESSION['username'])) {

            $user_logged = $_SESSION['username'];
        } else {
//            $util->redirect($webpath . 'views/users/signin.php');
        }

        $response['fields'] = Array();
        $response['message'] = Array();

        $pass_current = isset($_POST['pass_current']) ? $_POST['pass_current'] : "";
        $pass_one = isset($_POST['pass_1']) ? $_POST['pass_1'] : "";
        $pass_two = isset($_POST['pass_2']) ? $_POST['pass_2'] : "";

        if (empty($pass_current)) {
            array_push($response['fields'], array("error" => "Current Password cannot be empty", "field" => "pass_current"));
            $test = FALSE;
        } else {
            $pass_current = $util->test_input($pass_current);
        }
        if (empty($pass_one)) {
            array_push($response['fields'], array("error" => "New password is required", "field" => "pass_1"));
            $test = FALSE;
        } else if (empty($pass_one)) {
            array_push($response['fields'], array("error" => "Please confirm new password", "field" => "pass_2"));
            $test = FALSE;
        } else if ($pass_one != $pass_two) {
            array_push($response['fields'], array("error" => "Passwords do not match", "field" => "pass_2"));
            $test = FALSE;
        }


        if ($test) {

            if (!$user->authenticateUser($_SESSION['email'], $pass_current)) {

                $test = FALSE;
                array_push($response['fields'], array("error" => "Wrong Password. Please enter ther correct password for this user ", "field" => "pass_current"));
                $errMsg = "Wrong password for this user.";
            }

            if ($test) {

                $manageUser = new User();
                $manageUser->password = $pass_two;

                $inserted = $manageUser->changeUserPassword($_SESSION['userid'], $pass_one);
                $inserted = $manageUser->update();

                if ($inserted) {

                    $test = true;
                    $errMsg = "Your Password  has been updated";
                } else {

                    $errMsg = "Password was not updated.Please contact the system  administrator for further guidelines ";
                    $test = FALSE;
                }
            } else {

                $errMsg = "Please correct indicated fields below to complete the process.";
                $test = FALSE;
            }
        } else {
            $errMsg = "Please correct indicated fields below to complete the process.";
            $test = FALSE;
        }


        $response['message'] = array("msg" => $errMsg, "status" => $test);
        echo json_encode($response);
    }

    if ($_REQUEST['action'] == "editpermissions") {

        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $permissions = $_POST['permission'];
        $dB = new DatabaseConnection();
        $conn = $dB->connection();

        $query = "UPDATE permissions set state='del' where userid=?";
        $stmt1 = $conn->prepare($query);
        $stmt1->bind_param("i", $userid);

        if ($stmt1->execute()) {
            $i = 0;
            $smt_test = true;
            foreach ($permissions as $permission) {

                $menu_id = $permission;
                $query = "INSERT INTO permissions (menuid,userid,state) Values (?,?,'active') ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ii", $menu_id, $userid);
                $smt_test = $stmt->execute();
                $i++;
            }
        }



        if ($smt_test) {

            $output = "<?xml version='1.0' encoding='utf-8'?><output>";
            $output .= "<info><type>success</type><msg>User Permissions have been Updated</msg><userid>" . $userid . "</userid></info>";
            $output .= "</output>";
        } else {

            $output = "<?xml version='1.0' encoding='utf-8'?><output>";
            $output .= "<info><type>error</type><msg>Some error occured. Please consult the administrator. </msg></info>";
            $output .= "</output>";
        }
        echo $output;

//        $stmt->close();
//        $conn->close();
    }
}


