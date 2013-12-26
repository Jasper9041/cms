<?php

class Menus extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->title = "Menu Items";        
        $this->view->menus = $this->model->createMenuTree();
        $this->view->render('menus/index');
    }
    
}
