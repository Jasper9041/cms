<?php

class Auth {

    function __construct() {
        
    }

    public static function validateLogin() {
        if (Session::get('username') == null) {
            Session::destroy();
            header('location: ' . URL . 'login/');
            exit;
        }
    }

    public static function Blowfish($encString) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $salt = "";
        for ($i = 0; $i < 22; $i++) {
            $salt .= $chars[rand(0, strlen($chars) - 1)];
        }

        return crypt($encString, '$2a$09$' . $salt);
    }

    public static function checkBlowfish($plaintext, $hash) {
        if (crypt($plaintext, $hash) == $hash) {
            return true;
        } else {
            return false;
        }
    }

}
