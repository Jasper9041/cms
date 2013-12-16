<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index($msg = "An error occured!"){
        $this->view->title = "Error";
        $this->view->message = $msg;
        $this->view->render('error/error');
    }
}
