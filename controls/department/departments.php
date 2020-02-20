<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/dataaccess.php";

class Department extends DataAccess {

    //class attributes
    var $table_name = "departments";
    var $database_fields = array();
    var $id;
    var $name;
    var $created_by;
    var $hod;
    var $timestamp;
    var $no_ofMembers;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }

    public function selectAllDepartments() {
        $params = array();
        $sql = "SELECT * FROM " . $this->table_name . " ";
        return $this->do_select($sql, $params);
    }
     public function selectDepartById($id) {
        $params = array( 'i',$id);
        $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
        return $this->do_select($sql,$params);
    }
   

}

