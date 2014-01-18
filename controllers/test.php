<?php
class Test extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->mainMenu = MenuUtil::getMenu();
        $this->model->Index();
        $this->view->render('test/test');
    }

}
