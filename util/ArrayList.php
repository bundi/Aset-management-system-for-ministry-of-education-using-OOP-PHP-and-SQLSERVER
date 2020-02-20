<?php    
/**
     * ArrayList class
     * @version 0.2
     * @author Tim Anlauf <schranzistorradio@gmx.de>
     * @url http://www.phpclasses.org/browse/file/4191.html
     **/
    class ArrayList {
        private $list = array();


        public function Add($obj)
        {
            array_push($this->list, $obj);
        }

        public function Remove($key)
        {
            if(array_key_exists($key, $this->list))
            {
                unset($this->list[$key]);
            }
        }

        public function Size()
        {
            return count($this->list);
        }

        public function IsEmpty()
        {
            return empty($this->list);
        }

        public function GetObj($key)
        {
            if(array_key_exists($key, $this->list))
            {
                return $this->list[$key];
            }
            else
            {
                return NULL;
            }
        }

        public function GetKey($obj)
        {
            $arrKeys = array_keys($this->list, $obj);

            if(empty($arrKeys))    
            {
                return -1;
            }
            else
            {
                return $arrKeys[0];
            }
        }

    }
    
?>