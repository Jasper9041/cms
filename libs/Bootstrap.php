<?php

class Bootsrap {

    private $_url = null;
    private $_fullUrl = null;

    function __construct() {
        require_once 'config/config.php';
        require_once 'libs/Database.php';
        require_once 'libs/Controller.php';
        require_once 'libs/Model.php';
        require_once 'libs/View.php';
        require_once 'util/Session.php';
        require_once 'util/Auth.php';
        require_once 'util/MenuUtil.php';


        //check for admin functions
        $this->_fullUrl = isset($_GET['url']) ? $_GET['url'] : null;
        $this->_url = rtrim($this->_fullUrl, '/');
        $this->_url = explode('/', $this->_url);



        if ($this->_fullUrl == "") {
            require 'controllers/index.php';
            $this->_controller = new Index();
            $this->_controller->index();
        } elseif ($this->checkController()) {
            $this->load();
        } else {
            //no such controller file! Check db
            $this->db = new Database(DB_TYPE, DB_HOST, DB_DATABASE, DB_USER, DB_PASSWORD);
            $res = $this->db->Select("SELECT * FROM menus WHERE alias = :alias LIMIT 1", array("alias" => $this->_fullUrl));
            if (isset($res[0])) {
                if ($res[0]["type"] == "link") {
                    header("Location: " . $res[0]["link"]);
                } else {
                    $this->_fullUrl = $res[0]["link"];
                    $this->_url = rtrim($this->_fullUrl, '/');
                    $this->_url = explode('/', $this->_url);

                    if ($this->_fullUrl == "") {
                        require 'controllers/index.php';
                        $this->_controller = new Index();
                        $this->_controller->index();
                    } else {
                        $this->checkController();
                        $this->load();
                    }
                }
            } else {
                $this->error();
            }
        }
    }

    private function error() {
        require_once 'controllers/error.php';
        $this->_controller = new Error();
        $this->_controller->Index();
        die();
    }

    private function checkController() {
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        } else {
            return false;
        }
    }

    private function load() {

        $this->_controller = new $this->_url[0];
        $this->_controller->loadModel($this->_url[0]);
        switch (count($this->_url)) {
            case 5:
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                }
                break;
            case 4:
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                }
                break;
            case 3:
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}($this->_url[2]);
                }
                break;
            case 2:
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}();
                }
                break;
            case 1:
                $this->_controller->index();
                break;
            default:
                require 'controllers/index.php';
                $this->_controller = new Index();
                $this->_controller->index();
                break;
        }
    }

}
