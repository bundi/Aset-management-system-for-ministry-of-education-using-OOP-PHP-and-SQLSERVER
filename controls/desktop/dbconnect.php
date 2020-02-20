<?php

class DatabaseConnection {

    public $conn;

    public function connect() {
        // we don't need to connect twice
        $serverName = "KIPTOO";
        $connectionOptions = array(
            "Database" => "MoE");
        //Establishes the connection
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        return $conn;
    }

}

//}
//}
//$con=new DatabaseConnection();
//$con->connect();