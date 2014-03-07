<?php

class Albums extends Controller {

    function __construct() {
        parent::__construct();
    }

    //List
    public function Index() {
        Auth::validateLogin();
        $this->view->title = "Albums";
        $this->view->albums = $this->model->getList();
        $this->view->render('albums/index','backend');
    }

    //Create
    public function create() {
        Auth::validateLogin();
        $this->view->title = "Create an album";
        $this->view->render('albums/create');
    }

    public function saveCreate() {
        Auth::validateLogin();

    }

    //Edit
    public function edit($id) {
        Auth::validateLogin();
        $this->view->title = "Edit album";
        $this->view->mainMenu = MenuUtil::getMenu();
        $this->view->album = $this->model->get($id);
        $this->view->render('album/edit');
    }

    public function saveEdit() {
        Auth::validateLogin();
        
    }

    //Delete
    public function delete($id) {
        Auth::validateLogin();
        $this->model->delete($id);
    }
    
    //Display Gallery
    public function view($id){

    }

}
