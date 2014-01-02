<?php

class View {

    private $_headerData = array();
    
    function __construct() {
        
    }

    public function render($path) {
        require 'views/header.php';
        require 'views/' . $path . '.php';
        require 'views/footer.php';
    }
    
    public function addToHeader($data){
        $this->_headerData[] = $data;
    }
}