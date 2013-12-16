<?php

class Menu extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->title = "Menus";
        $this->view->render('menus/index');
    }
    
}
