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
        $this->view->categories = $this->model->getAlbums();
        $this->view->render('articles/create');
    }

    public function saveCreate() {
        if (empty($_POST['title']) || empty($_POST['content'])) {
            die('Fill in everything!');
        }else{
            $this->model->saveCreate(htmlentities($_POST['title']),htmlentities($_POST['content']),$_POST[category]);
        }
    }

    //Edit
    public function edit($id) {
        $this->view->title = "Edit Article";
        $this->view->categories = $this->model->getAlbums();
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
        if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['content']) || empty($_POST['category'])) {
            die('Fill in everything!');
        } else {
            $this->model->saveEdit($_POST['id'], htmlentities($_POST['title']), htmlentities($_POST['content']),$_POST['category']);
        }
    }

    //Delete    
    public function delete($id) {
        $this->model->delete($id);
    }

}
