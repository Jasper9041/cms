<?php
class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $this->view->mainMenu = MenuUtil::getMenu();
        $this->view->render('index/index');
    }

}
