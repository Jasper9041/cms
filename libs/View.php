<?php

class View {

    private $_headerData = array();
    
    function __construct() {
        
    }

    public function render($paths) {
        require 'views/frontend/header.php';
        if(is_array($paths)){
            foreach ($paths as $path) {
                require 'views/' . $path . '.php';
            }
        }else{
            require 'views/' . $paths . '.php';
        }
        require 'views/frontend/footer.php';
    }
    
    public function renderAdmin($paths) {
        require 'views/backend/header.php';
        if(is_array($paths)){
            foreach ($paths as $path) {
                require 'views/' . $path . '.php';
            }
        }else{
            require 'views/' . $paths . '.php';
        }
        require 'views/backend/footer.php';
    }
    
    public function addToHeader($data){
        $this->_headerData[] = $data;
    }
}