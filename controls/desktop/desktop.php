<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/dataaccess.php";

class Desktop extends DataAccess{
     //class attributes
    var $table_name = "desktop";
    var $database_fields = array();
    
    var $id;
    var $cpuserial;
    var $model;
    var $monitorSerial;
    var $hdd;
    var $ram;
    var $Os;
    var $Office;
    var $processor;
    var $mouseSerial;
    var $keyboardSerial;
    var $antivirus;
    var $Vga;
    var $status;
    
   
    
    
    
    
    
    public function  __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }
    
    public function check_if_desktop_exist($cpuSerial){
        $sql = "SELECT count(*) as count FROM ".$this->table_name." where monitorSerial=? AND status='active'";
        $params = array( 's',$cpuSerial);
        if ( $this->get_count($sql,$params) > 0 ){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     public function selectAllDesktops(){
        $params = array();
        $sql = "SELECT * FROM ".$this->table_name." WHERE status = 'active' ";
        return $this->do_select($sql,$params);
    }
    
    public function selectDesktopBySerial($serialNo){
        $params = array( 'i',$serialNo);
        $sql = "SELECT * FROM ".$this->table_name." where cpuserial=? AND status = 'active'";
        return $this->do_select($sql,$params);
        
    }
     public function selectDesktopById($id){
        $params = array( 'i',$id);
        $sql = "SELECT * FROM ".$this->table_name." where id=? AND status = 'active'";
        return $this->do_select($sql,$params);
        
    }
    
    
   
}

