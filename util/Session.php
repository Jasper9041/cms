<?php

class Session {

    function __construct() {
        
    }

    public static function init() {
        session_start();/*
        if(session_id() == ''){
            echo 'derp';
            
        }¨*/
    }

    public static function set($param, $val) {
        $_SESSION[$param] = $val;
    }

    public static function get($param) {
        if (isset($_SESSION[$param])){
            return $_SESSION[$param];
        }
    }

    public static function destroy() {
        session_destroy();
    }

}
