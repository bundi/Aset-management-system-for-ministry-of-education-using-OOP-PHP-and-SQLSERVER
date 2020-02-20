<?php

session_start();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
//include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/users/user.php";
include_once $webpath . "util/util.php";
include_once $webpath . "util/passwordutil.php";
include_once $webpath . "util/mainMenu.php";
include_once $webpath . "util/menu.php";

//include_once $webpath . "directories/directories.php";


$util = new util();
$managePassword = new PasswordUtil();
$output = "";
$errMsg = "";
$test = true;
$pass1 = FALSE;
$email1 = FALSE;
$inserted = FALSE;

$user = new user();
$mainMenu = new MainMenu();
$menu = new Menu();
//$directories = new Directories();
$response['fields'] = Array();
$response['message'] = Array();

$test_post = $_SERVER["REQUEST_METHOD"] == "POST";

if ($test_post) {

    if ($_REQUEST['action'] == "user_sign_in") {

        $user = new user();
     
        $user->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $user->password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

        if (empty($user->password)) {
            array_push($response['fields'], array("error" => "Password is required", "field" => "password"));
            $test = FALSE;
        } else {
            $user->password = $util->test_input($user->password);
        }

        if (empty($user->email)) {
            array_push($response['fields'], array("error" => "Email field is required", "field" => "email"));
            $test = FALSE;
        } else if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            array_push($response['fields'], array("error" => "Email value is not correct", "field" => "email"));
            $test = FALSE;
        } else {
            $user->email = $util->test_input($user->email);
        }

        if ($test) {


            $logged = $user->authenticateUser($user->email, $user->password);
            if ($logged) {
                $_SESSION['authorized_menu']['authorized_menu'] = array();
                $test = true;
                $errMsg = "success";
                foreach ($user->selectUserByEmail($user->email) as $user) {
                    $_SESSION['logged_user'] = serialize($user);
                    $_SESSION['email'] = $user->email;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['userid'] = $user->id;
                    $_SESSION['counter'] = 0;

                    $logged_users = new User();

                    $query_count = 0;
                    foreach ($mainMenu->selectAllMainMenus() as $mainMenu) {

                        foreach ($menu->selectMenusByParentId($mainMenu->id) as $menu) {

                            if ($logged_users->checkUserAllowed($user->id, $menu->id)) {
//                                $article = array();
                                // status is either "Success" or "error message"
//                                $article["Number"] = $menu->id;
//                                $article["link"] = '/aSchool/' . $menu->link;
                                array_push($_SESSION["authorized_menu"]['authorized_menu'], '/AsMoE/' . $menu->link . '.php');


                                $query_count ++;
                            }
                        }
                    }
                    array_push($_SESSION["authorized_menu"]['authorized_menu'], '/AsMoE/index.php');
                }
            } else {

                $errMsg = "Invalid Username or Password";
                $test = FALSE;
            }
        } else {

            $errMsg = "Please correct indicated fields.";
            $test = FALSE;
        }

        $response['message'] = array("msg" => $errMsg, "status" => $test);
        $output= json_encode($response);
    }
    if ($_REQUEST['action'] == "addUser") {
        $user = new User();

        $user->name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $user->personalNo = isset($_REQUEST['personalNo']) ? $_REQUEST['personalNo'] : "";
        $user->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $user->idNo = isset($_POST['idNo']) ? $_POST['idNo'] : "";
        $user->phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $user->designation = isset($_POST['designation']) ? $_POST['designation'] : "";
        $user->officeNo = isset($_POST['officeNo']) ? $_POST['officeNo'] : "";



        if (empty($user->name)) {
            array_push($response['fields'], array("error" => "Name  of landlord required", "field" => "name"));
            $test = FALSE;
        } else {
            $user->name = $util->test_input($user->name);
        }
        if (empty($user->personalNo)) {
            array_push($response['fields'], array("error" => "ID  No  is required", "field" => "personalNo"));
            $test = FALSE;
        } else {
            $user->personalNo = $util->test_input($user->personalNo);
        }
         if (empty($user->email)) {
            array_push($response['fields'], array("error" => "Email field is required", "field" => "email"));
            $test = FALSE;
        } else if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            array_push($response['fields'], array("error" => "Email value is not correct", "field" => "email"));
            $test = FALSE;
        }elseif ($user->check_if_user_email_exist($user->email)) {

            $test = FALSE;
            $max = TRUE;
            array_push($response['fields'], array("error" => "Username already exists in the system", "field" => "email"));
            $errMsg = "Email already exists in the system.";
        }
        else {
            $user->email = $util->test_input($user->email);
        }
        if (empty($user->idNo )) {
            array_push($response['fields'], array("error" => "Account No required", "field" => "idNo"));
            $test = FALSE;
        } else {
            $user->idNo  = $util->test_input($user->idNo );
        }
        if (empty($user->phone)) {
            array_push($response['fields'], array("error" => "Bank Name required", "field" => "phone"));
            $test = FALSE;
        } else {
            $user->phone = $util->test_input($user->phone);
        }
        if (empty($user->designation)) {
            array_push($response['fields'], array("error" => "VAT Number is required", "field" => "designation"));
            $test = FALSE;
        } else {
            $user->designation = $util->test_input($user->designation);
        }
        if (empty($user->designation)) {
            array_push($response['fields'], array("error" => "VAT Number is required", "field" => "officeNo"));
            $test = FALSE;
        } else {
            $user->officeNo = $util->test_input($user->officeNo);
        }
         if ($user->check_if_user_exist($user->personalNo)) {

            $test = FALSE;
            $max = TRUE;
            array_push($response['fields'], array("error" => "Username already exists in the system", "field" => "personalNo"));
            $errMsg = "User already exists in the system.";
        }

        if ($test) {
            
            $user->password= $managePassword->hashPassword('1234');
            $user->status = 'active';
            $user->username= $user->personalNo;
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
        $output = json_encode($response);
}
if ($_REQUEST['action'] == "edituser"){
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $user->name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $user->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $user->phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $user->designation = isset($_POST['designation']) ? $_POST['designation'] : "";
        $user->officeNo = isset($_POST['officeNo']) ? $_POST['officeNo'] : "";



        if (empty($user->name)) {
            array_push($response['fields'], array("error" => "Name  of landlord required", "field" => "name"));
            $test = FALSE;
        } else {
            $user->name = $util->test_input($user->name);
        }
        
         if (empty($user->email)) {
            array_push($response['fields'], array("error" => "Email field is required", "field" => "email"));
            $test = FALSE;
        } else if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            array_push($response['fields'], array("error" => "Email value is not correct", "field" => "email"));
            $test = FALSE;
        } else {
            $user->email = $util->test_input($user->email);
        }
        if (empty($user->idNo )) {
            array_push($response['fields'], array("error" => "Account No required", "field" => "idNo"));
            $test = FALSE;
        } else {
            $user->idNo  = $util->test_input($user->idNo );
        }
        if (empty($user->phone)) {
            array_push($response['fields'], array("error" => "Bank Name required", "field" => "phone"));
            $test = FALSE;
        } else {
            $user->phone = $util->test_input($user->phone);
        }
        if (empty($user->designation)) {
            array_push($response['fields'], array("error" => "VAT Number is required", "field" => "designation"));
            $test = FALSE;
        } else {
            $user->designation = $util->test_input($user->designation);
        }
        if (empty($user->designation)) {
            array_push($response['fields'], array("error" => "VAT Number is required", "field" => "officeNo"));
            $test = FALSE;
        } else {
            $user->officeNo = $util->test_input($user->officeNo);
        }
        

        if ($test) {
           
           if ($user->update()) {

                $test = true;
                $errMsg = "Account has been updated";
            } else {

                $errMsg = "Account  was not created .Please contact the system  administrator for further guidelines ";
                $test = FALSE;
            }
        } else {
            $errMsg = "Please correct indicated fields below to complete registration.";

            $test = FALSE;
        }

        $response['message'] = array("msg" => $errMsg, "status" => $test);
        $output = json_encode($response);
}
}
 else {
    $output = "No Post";
}
echo $output;


