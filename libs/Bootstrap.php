<?php

class Bootsrap {

    private $_url = null;

    function __construct() {
        require_once 'config/config.php';
        require_once 'libs/Database.php';
        require_once 'libs/Controller.php';
        require_once 'libs/Model.php';
        require_once 'libs/View.php';
        require_once 'util/Session.php';
        require_once 'util/Auth.php';
        require_once 'util/MenuUtil.php';

        $this->_url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->_url = rtrim($this->_url, '/');
        $this->_url = explode('/', $this->_url);

        switch(count($this->_url)){
            case 5:
                $this->createController();
                 if (method_exists($this->_controller, $this->_url[1])) {
                     $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                 }
                break;
            case 4:
                $this->createController();
                 if (method_exists($this->_controller, $this->_url[1])) {
                     $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                 }
                break;
            case 3:
                $this->createController();
                 if (method_exists($this->_controller, $this->_url[1])) {
                     $this->_controller->{$this->_url[1]}($this->_url[2]);
                 }
                break;
            case 2:
                $this->createController();
                 if (method_exists($this->_controller, $this->_url[1])) {
                     $this->_controller->{$this->_url[1]}();
                 }
                break;
            case 1:
                $this->createController();
                $this->_controller->loadModel($this->_url[0]);
                $this->_controller->index();
                break;
            default:
                require 'controllers/index.php';
                $this->_controller = new Index();
                $this->_controller->index();
                break;
        }
    }

    private function error() {
        require_once 'controllers/error.php';
        $this->_controller = new Error();
        $this->_controller->Index();
        die();
    }
    
    private function createController(){
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            $this->error();
        }
        $this->_controller = new $this->_url[0];
        $this->_controller->loadModel($this->_url[0]);
    }

}
