<?php

//include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/util/dataaccess.php";

class Menu extends DataAccess {

    //class attributes
    var $table_name = "menu";
    var $database_fields = array();
    var $id;
    var $name;
    var $link;
    var $parent;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }

    public function selectAllMenus() {
        $params = array();
        $sql = "SELECT * FROM " . $this->table_name . " ";
        return $this->do_select($sql, $params);
    }

    public function selectMenusByParentId($parentId) {
        $params = array("s", $parentId);
        $sql = "SELECT * FROM " . $this->table_name . " where parent=?  ORDER BY name ASC ";
        return $this->do_select($sql, $params);
    }

}
