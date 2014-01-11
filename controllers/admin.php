<?php
class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->render('admin/index');
    }

}
