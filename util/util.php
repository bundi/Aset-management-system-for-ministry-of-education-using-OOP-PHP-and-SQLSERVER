<?php 
//include_once $_SERVER['DOCUMENT_ROOT']."/AsMoE/util/DatabaseConnection.php";

class util{
    
    function strToDate($date){
        $some_date =DateTime::createFromFormat('d/m/Y', $date);
        if (!$some_date){
            throw new \UnexpectedValueException("could not parse the date: $date");
        } else {
            $new_date = $some_date->format('Y-m-d');
        }
        return $new_date;
    }
    
    function dateToStr($date){
        $some_date =DateTime::createFromFormat('Y-m-d', $date);
        if (!$some_date){
            throw new \UnexpectedValueException("could not parse the date: $date");
        } else {
            $new_date = $some_date->format('d/m/Y');
        }
        return $new_date;
    }
    
    function test_input($data){
        if (isset($data)){
           $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        } else {
            return '';
        }
    }
    
    function test_number_input($data){
        if (isset($data)){
           $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        } else {
            return 0;
        }
    }
    
    function test_date($data){
        if (isset($data) && !empty($data)){
            $data = trim($data);
            $data = util::strToDate($data);
            return $data;
        } else {
            return '';
        }
    }
    
    function toXML($name, $value){
        $sb = "";
        $sb .= "<". $name .">". $value ."</". $name .">";
        return $sb;
    }
    
    function  redirect($url){
        if(headers_sent()){
            die('<script type="text/javascript">window.location.href="'.$url.'";</script>');
        } else {
            header("Location:".$url);
            die();
        }
    }
    
    public function getYear($pdate, $format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("Y");
    }

    public function getMonth($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("m");
    }

    public function getDay($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("d");
    }
    
    public function getMonthStr($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("M");
    }
    
    public function getDayStr($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("D");
    }
    
    public function getTime($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("H:i");
    }
    
    public function getYYmmdd($pdate,$format) {
        $date = DateTime::createFromFormat($format, $pdate);
        return $date->format("Y-m-d");
    }
}
?>