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

        }
 $db = new DatabaseConnection();