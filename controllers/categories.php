<?php

class Categories extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }

    public function Index() {
        $this->view->categories = $this->model->getList();
        $this->view->render('categories/index','backend');
    }

    public function edit($id) {
        $this->view->title = "Edit Category";
        $this->view->category = $this->model->get($id);
        $this->view->render('categories/edit','backend');
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: " . URL . "categories");
    }

    public function saveEdit() {
        if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['description'])) {
            //Error
        } else {
            $this->model->saveEdit($_POST['id'], $_POST['name'], $_POST['description']);
            header("Location: " . URL . "categories");
        }
    }

    public function create() {
        $this->view->title = "Create Category";
        $this->view->render("categories/create",'backend');
    }

    public function saveCreate() {
        if (empty($_POST['name']) || empty($_POST['description'])) {
            //Error
        } else {
            $this->model->saveCreate($_POST['name'], $_POST['description']);
            header("Location: " . URL . "categories");
        }
    }

}
