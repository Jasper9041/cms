<?php

class Articles extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }

    //List
    public function Index() {
        $this->view->title = "Articles";
        $this->view->articles = $this->model->getList();
        $this->view->render('articles/index');
    }

    //Create
    public function create() {
        $this->view->title = "Create Article";
        $this->view->render('articles/create');
    }

    public function saveCreate() {
        $this->model->saveCreate();
    }

    //Edit
    public function edit($id) {
        $this->view->title = "Edit Article";
        $this->view->article = $this->model->get($id);
        
        if (empty($this->view->article)) {
            require 'controllers/error.php';
            $this->_controller = new Error();
            $this->_controller->Index();
            die();
        }
        
        $this->view->render('articles/edit');
    }

    public function saveEdit() {
        $this->model->saveEdit();
    }

    //Delete    
    public function delete($id) {
        $this->model->delete($id);
    }

}
