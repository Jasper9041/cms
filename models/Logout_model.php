<?php

class Logout_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function logout(){
        Session::destroy();
        header('Location: '.URL);
    }
}

