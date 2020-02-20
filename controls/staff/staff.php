<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/passwordutil.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/util.php";
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/dataaccess.php";

class Staffs extends DataAccess{
     //class attributes
    var $table_name = "staff";
    var $database_fields = array();
    
    var $id;
    var $teaching_noneteaching;
    var $fname;
    var $lname;
    var $phone;
    var $email;
    var $marrital_status;
    var $subjects;
    var $class_subject;
    var $role;
    var $location;
    var $address;
    var $department;
    var $timestamp;
    
    
    
    
    
    public function  __construct() {
        $db = new DatabaseConnection();
        $this->database_fields = $db->get_table_columns($this->table_name);
    }
    
     public function selectAllStaffs(){
        $params = array();
        $sql = "SELECT * FROM ".$this->table_name." ";
        return $this->do_select($sql,$params);
    }
    public function selectTeachingStaffByDepartId($id,$type) {
        $params = array( 'is',$id,$type);
        $sql = "SELECT * FROM ".$this->table_name." WHERE department=? AND teaching_noneteaching=?";
        return $this->do_select($sql,$params);
    }
     public function check_if_staff_exist($email){
        $sql = "SELECT count(*) as count FROM ".$this->table_name." where email=? ";
        $params = array( 's',$email );
        if ( $this->get_count($sql,$params) > 0 ){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

