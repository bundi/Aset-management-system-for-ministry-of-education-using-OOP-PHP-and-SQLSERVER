<?php
if(!function_exists('hash_equals')){
    function hash_equals($str1, $str2){

        if(strlen($str1) != strlen($str2)){

            return false;
        } else {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--) {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }
}

class PasswordUtil{
    function hashPassword($password){
        // A higher "cost" is more secure but consumes more processing power
        $cost = 10;

        // Create a random salt
       $salt = strtr(base64_encode(random_bytes(16)), '+', '.');

        // Prefix information about the hash so PHP knows how to verify it later.
        // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
        $salt = sprintf("$2a$%02d$", $cost) . $salt;

        // Value:
        // $2a$10$eImiTXuWVxfM37uY4JANjQ==

        // Hash the password with the salt
        $hash = crypt($password, $salt);

        // Value:
        // $2a$10$eImiTXuWVxfM37uY4JANjOL.oTxqp7WylW7FCzx2Lc7VLmdJIddZq
        return $hash;
    }
    
    function checkHash($pass,$password) {
        $check = FALSE;
        $check = hash_equals($pass, crypt($password, $pass));
        return $check;
    }
}

