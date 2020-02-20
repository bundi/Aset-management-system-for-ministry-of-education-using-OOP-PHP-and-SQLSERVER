<?php

//include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/dataaccess.php";

class User extends DataAccess {

    //class attributes
    var $table_name = "users";
    var $database_fields = array();
    var $id;
    var $username;
    var $name;
    var $email;
    var $password;
    var $personalNo;
    var $idNo;
    var $phone;
    var $designation;
    var $officeNo;
    var $status;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }

    public function check_if_user_email_exist($email) {
        $sql = "SELECT count(*) as count FROM " . $this->table_name . " where email=? ";
        $params = array('s', $email);
        if ($this->get_count($sql, $params) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_if_user_exist($personalNo) {
        $sql = "SELECT count(*) as count FROM " . $this->table_name . " where personalNo=? ";
        $params = array('s', $personalNo);
        if ($this->get_count($sql, $params) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function selectUserByEmail($email) {
        $params = array('s', $email);
        $sql = "SELECT * FROM " . $this->table_name . " where email=? limit 1";
        return $this->do_select($sql, $params);
    }

    public function selectAllUsers() {
        $params = array();
        $sql = "SELECT * FROM " . $this->table_name . " ";
        return $this->do_select($sql, $params);
    }

    function selectUserByID($id) {
        $params = array('i', $id);
        $sql = "SELECT * FROM users where id=?  limit 1";
        return $this->do_select($sql, $params);
    }

    function selectUserByUsername($username) {
        $params = array('i', $id);
        $sql = "SELECT * FROM users where id=?  limit 1";
        return $this->do_select($sql, $params);
    }

    function authenticateUser($email, $password) {
        $passwordUtil = new PasswordUtil();
        $user = new User();
        $logged = FALSE;

        $params = array('s', $email);
        $sql = "SELECT password FROM users where email =?  limit 1";
        foreach ($user->do_select($sql, $params) as $user) {
            
        }

        $logged = $passwordUtil->checkHash($user->password, $password);


        return $logged;
    }

    function changeUserPassword($userid, $password) {
        $manageDb = new DatabaseConnection();
        $managePassword = new PasswordUtil();
        $conn = $manageDb->connection();
        $update = false;

        $query = "UPDATE users set password=? where id=?";
        $stmt = $conn->prepare($query);
        $pass = $managePassword->hashPassword($password);
        $stmt->bind_param("si", $pass, $userid);
        if ($stmt->execute()) {

            $update = true;
        } else {

            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }

        $stmt->close();
        $conn->close();
        return $update;
    }

    function checkUserAllowed($userid, $menu) {
        $manageDb = new DatabaseConnection();
        $conn = $manageDb->connection();
        $allowed = FALSE;
        $query = "SELECT * FROM permissions where userid=? and menuid=? and state='active' ";
        $stmt = $conn->prepare($query);

        $stmt->bind_param("ii", $userid, $menu);

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();

            while ($myrow = $result->fetch_assoc()) {
                $allowed = true;
            }
            $stmt->close();
        } else {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return $allowed;
    }

}
