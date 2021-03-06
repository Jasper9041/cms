<?php

class View {

    private $_headerData = array();
    private $viewloc;

    function __construct() {
        
    }

    public function render($paths, $type = "frontend") {
        $this->viewloc = URL . "views/templates/" . $type . "/";
        require 'views/templates/' . $type . '/header.php';
        if (is_array($paths)) {
            foreach ($paths as $path) {
                require 'views/' . $path . '.php';
            }
        } else {
            require 'views/' . $paths . '.php';
        }
        require 'views/templates/' . $type . '/footer.php';
    }

    public function addToHeader($data) {
        $this->_headerData[] = $data;
    }

}
