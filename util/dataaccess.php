<?php
include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";
class DataAccess{
    
    //class attributes
    var $table_name = "";
    var $database_fields = array();
    
    
    public function  __construct() {
        
    }
    
    
    /*************************************** resident functions ********************************/
    
    function do_select($sql,$params){
        $object_array = array();
        $db = new DatabaseConnection();
        $result_set = $db->querydb($sql, $params);
        
        while ($row = array_shift( $result_set )) {
            $object_array[] = $this->instanciate($row);
        }
        return $object_array;
    }
    
    function get_count($sql,$params){
        $db = new DatabaseConnection();
        $result_set = $db->querydb($sql, $params);
        $row = array_shift($result_set);
        return $row['count'];
    }
    
    
    function select_item($sql,$params){
        $db = new DatabaseConnection();
        $result_set = $db->querydb($sql, $params);
        if (count($result_set)){
            $row = array_shift($result_set);
            $item = $this->instanciate($row);
            return $item;
        } else {
            return null;
        }
    }
    
    function get_records($sql,$params){
        $db = new DatabaseConnection();
        $result_set = $db->querydb($sql, $params);
        $row = array_shift($result_set);
        return $row;
    }
    
    function instanciate($record)
    {
        $object = new $this;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribubute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;

    }
    

    function has_attribubute($attribute)
    {
        // This function find out whether the class has
        $object_vars = $this->all_attributes();
        //get_object_vars returns an array of the class properties.
        // return true or false.
        return array_key_exists($attribute, $object_vars);

    }

    function all_attributes()
    {
        // Return an assoc array with the keys and their correspondent value:
        $attributes = array();
        foreach ($this->database_fields as $field) {
            if (property_exists($this, $field) ) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    function set_attributes()
    {
        // Return an assoc array with the keys and their correspondent value:
        $attributes = array();
        foreach ($this->database_fields as $field) {
            if (property_exists($this, $field) && isset($this->$field) ) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
    
    function create()
    {
        $db = new DatabaseConnection();
        $attributes = $this->set_attributes();
        $sql = "INSERT INTO " . $this->table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES(";
        $sql .= $db->set_params(array_values($attributes)) . ")";
        if ($db->executedb($sql,array_values($attributes))) {
            return true;
        } else {
            return false;
        }
    }
    
    

    function delete()
    {
        $db = new DatabaseConnection();
        $conn = $db->connection();
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    function update()
    {
        $db = new DatabaseConnection();
        $attributes = $this->set_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key} =? ";
        }
        $attributes[] = $this->id;
        $sql = "UPDATE " . $this->table_name . "
		SET " . join(",", $attribute_pairs) . " WHERE id = ? ";
        if ($db->executedb($sql,  array_values($attributes))) {
            return true;
        } else {
            return false;
        }
    }
    
    function update_where($where = array())
    {
        $db = new DatabaseConnection();
        $attributes = $this->set_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key} =? ";
        }
        
        foreach ($where as $key => $value) {
            $where_pairs[] = "{$key} =? ";
            $attributes[] = $value;
        }
        
        $sql = "UPDATE " . $this->table_name . "
		SET " . join(",", $attribute_pairs) . " WHERE " . join(",", $where_pairs) ;
        if ($db->executedb($sql,  array_values($attributes))) {
            return true;
        } else {
            return false;
        }
    }
    
    

}