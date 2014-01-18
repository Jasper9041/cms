<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $this->view->title= "Login";
        $this->view->renderAdmin("login/index");
    }
    
    public function Login() {
        $this->model->Login();
    }

}

