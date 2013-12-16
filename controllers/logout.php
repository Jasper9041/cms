<?php

class Logout extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->title = "Logout";
        $this->view->render('logout/index');
    }
    
    public function Logout(){
        $this->model->logout();
    }

}
