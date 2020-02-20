<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/dataaccess.php";

class Stream_Names extends DataAccess{
     //class attributes
    var $table_name = "stream_names";
    var $database_fields = array();
    
    var $id;
    var $name;
    var $timestamp;
    
    
    
    
    
    public function  __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }
    
     public function selectAllStreamNames(){
        $params = array();
        $sql = "SELECT * FROM ".$this->table_name." ORDER BY name ASC";
        return $this->do_select($sql,$params);
    }
}

