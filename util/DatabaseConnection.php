<?php

class DatabaseConnection{
    
    public $conn;
    var $DB_SERVER = "localhost\DESKTOP-IR6AGQD";
    var $CONN_OPTIONS = array("Database" => "moe");
    function connection(){
    //Establishes the connection
        $conn = sqlsrv_connect($DB_SERVER, $CONN_OPTIONS);

        if (!$conn) {
            die('Something went wrong while connecting to MSSQL');
        }
        return $conn;
    }
    
    function querydb($query, $bind_params = array()){
        $manageDb = new DatabaseConnection();
        $conn = $manageDb->connection();
        $stmt = $conn->prepare($query);
        
        if (count($bind_params)){
            call_user_func_array(array($stmt, 'bind_param'), self::refValues($bind_params));
        }
        
        if ($stmt->execute()) {
            $result = $manageDb->get_result($stmt);
            
            $data = $result;
            
            $stmt->close();

        } else {
            echo "Error in : " . $query;
            trigger_error( 'Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return $data;
    }
    
    
    
    function executedb($query, $bind_params = array()){
        $manageDb = new DatabaseConnection();
        $conn = $manageDb->connection();
        $test = false;
        $stmt = $conn->prepare($query);
        if (count($bind_params)){
            $bind_params = $manageDb->set_param_data_types($bind_params);
            call_user_func_array(array($stmt, 'bind_param'),self::refValues($bind_params));
        }
        
        if ( $stmt->execute() ) {
            $test = true;
        } else {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }

        $conn->close();
        
        return $test;
    }
    
    function set_params($bind_params = array()){
        $str = '';
        if (count($bind_params) > 0){
            $iterator = 1;
            foreach ($bind_params as $param){
                $str .= ' ? ';
                if ($iterator < count($bind_params)) $str .= ', ';
                $iterator ++;
            }
        }
        
        return $str;
    }
    
    function set_param_data_types($bind_params = array()){
        $params = array();
        $str = '';
        if (count($bind_params) > 0){
            foreach ($bind_params as $param){
                $str .= 's';
                
            }
            
            $params[] = $str;
            foreach ($bind_params as $param){
                $params[] = $param ;
                
            }
        }
        
        return $params;
    }
    
    public  function get_table_columns($table_name){
        $table_columns = array();
        $sql = 'SHOW COLUMNS FROM '.$table_name;
        $result = $this->querydb($sql);
        while($data = array_shift($result)){
            $table_columns[] = $data['Field'];
        }

        return $table_columns;
    }
    
    function get_result( $Statement ) {
        $RESULT = array();
        $Statement->store_result();
        for ( $i = 0; $i < $Statement->num_rows; $i++ ) {
            $Metadata = $Statement->result_metadata();
            $PARAMS = array();
            while ( $Field = $Metadata->fetch_field() ) {
                $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
            }
            call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
            $Statement->fetch();
        }
        return $RESULT;
    }
    
    function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

    
    
    
}



        