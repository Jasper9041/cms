<?php
class Index extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->render('index/index');
    }

}
