<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE,DB_HOST,DB_DATABASE,DB_USER,DB_PASSWORD);
    }

}
