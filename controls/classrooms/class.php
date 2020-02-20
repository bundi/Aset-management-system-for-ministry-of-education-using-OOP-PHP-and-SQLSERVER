<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/dataaccess.php";

class Class_Rooms extends DataAccess {

    //class attributes
    var $table_name = "class";
    var $database_fields = array();
    var $id;
    var $name;
    var $lname;
    var $timestamp;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }

    public function check_if_class_exist($name) {
        $sql = "SELECT count(*) as count FROM " . $this->table_name . " where name=?";
        $params = array('s', $name);
        if ($this->get_count($sql, $params) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function selectAllClasses() {
        $params = array();
        $sql = "SELECT * FROM " . $this->table_name . " ";
        return $this->do_select($sql, $params);
    }

    public function selectClassesById($id) {
        $params = array("i", $id);
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id=? ";
        return $this->do_select($sql, $params);
    }
    
    public function selectClassesByName($name) {
        $params = array("s", $name);
        $sql = "SELECT * FROM " . $this->table_name . " WHERE name=? ";
        return $this->do_select($sql, $params);
    }

}
