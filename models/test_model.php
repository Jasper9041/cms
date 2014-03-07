<?php

class Test_Model extends Model{

    function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        echo 'this is the test model!<br/>';
        print_r($this->db->select("SELECT * FROM users WHERE id > 1"));
        echo 'this is the test model!<br/>';
    }

}

