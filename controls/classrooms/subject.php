<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subject
 *
 * @author kiptoo
 */
class Subject {
    //put your code here
       //class attributes
    var $table_name = "subject";
    var $database_fields = array();
    var $id;
    var $code;
    var $name;
    var $grading;

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

    public function selectAllSubjects() {
        $params = array();
        $sql = "SELECT * FROM " . $this->table_name . " ";
        return $this->do_select($sql, $params);
    }

    public function selectSubjectById($id) {
        $params = array("i", $id);
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id=? ";
        return $this->do_select($sql, $params);
    }
    
    public function selectSubjectName($name) {
        $params = array("s", $name);
        $sql = "SELECT * FROM " . $this->table_name . " WHERE name=? ";
        return $this->do_select($sql, $params);
    }

}

