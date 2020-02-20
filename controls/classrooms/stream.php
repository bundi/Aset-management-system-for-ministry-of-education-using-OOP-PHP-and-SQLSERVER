<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/dataaccess.php";

class Streams extends DataAccess{
     //class attributes
    var $table_name = "streams";
    var $database_fields = array();
    
    var $id;
    var $class_id;
    var $capacity;
    var $timestamp;
    var $name;
    
    
    
    
    
    public function  __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }
    
     public function selectAllStreams(){
        $params = array();
        $sql = "SELECT * FROM ".$this->table_name." ORDER BY class_id ASC";
        return $this->do_select($sql,$params);
    }
    
    public function selectStreamByClassId($classid){
        $params = array( 'i',$classid);
        $sql = "SELECT * FROM ".$this->table_name." where class_id=?";
        return $this->do_select($sql,$params);
        
    }
    
    public function selectStreamById($id){
        $params = array( 'i',$id);
        $sql = "SELECT * FROM ".$this->table_name." where id=?";
        return $this->do_select($sql,$params);
        
    }
}

