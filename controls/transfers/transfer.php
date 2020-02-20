<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/dataaccess.php";

class Transfer extends DataAccess{
     //class attributes
    var $table_name = "transfers";
    var $database_fields = array();
    
    var $id;
    var $userId;
    var $itemId;
    var $source;
    var $destination;
    var $status;
    
   
    
    
    
    
    
    public function  __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }
   
    
     public function selectAllTransfers(){
        $params = array();
        $sql = "SELECT * FROM ".$this->table_name." WHERE status = 'active' ";
        return $this->do_select($sql,$params);
    }
    
    public function selectTransferByUser($userId){
        $params = array( 'i',$userId);
        $sql = "SELECT * FROM ".$this->table_name." where userId=? AND status = 'active'";
        return $this->do_select($sql,$params);
        
    }
     public function selectDesktopById($id){
        $params = array( 'i',$id);
        $sql = "SELECT * FROM ".$this->table_name." where id=? AND status = 'active'";
        return $this->do_select($sql,$params);
        
    }
    
    
   
}

