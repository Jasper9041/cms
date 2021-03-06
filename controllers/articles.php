<?php

class Articles extends Controller {

    function __construct() {
        parent::__construct();
    }

    //List
    public function Index() {
        Auth::validateLogin();
        $this->view->title = "Articles";
        $this->view->articles = $this->model->getList();
        $this->view->render('articles/index','backend');
    }

    //Create
    public function create() {
        Auth::validateLogin();
        $this->view->title = "Create Article";
        $this->view->categories = $this->model->getCategory();
        $this->view->addToHeader('<script type="text/javascript" src="' . URL . 'libs/tinymce/tinymce.min.js"></script>');
        $this->view->render('articles/create','backend');
    }

    public function saveCreate() {
        Auth::validateLogin();
        if (empty($_POST['title']) || empty($_POST['content'])) {
            die('Fill in everything!');
        }else{
            $this->model->saveCreate(htmlentities($_POST['title']),htmlentities($_POST['content']),$_POST["category"]);
        }
    }

    //Edit
    public function edit($id) {
        Auth::validateLogin();
        $this->view->title = "Edit Article";
        $this->view->categories = $this->model->getCategory();
        $this->view->article = $this->model->get($id);
        $this->view->addToHeader('<script type="text/javascript" src="' . URL . 'libs/tinymce/tinymce.min.js"></script>');

        if (empty($this->view->article)) {
            require 'controllers/error.php';
            $this->_controller = new Error();
            $this->_controller->Index();
            die();
        }

        $this->view->render('articles/edit','backend');
    }

    public function saveEdit() {
        Auth::validateLogin();
        if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['content']) || empty($_POST['category'])) {
            die('Fill in everything!');
        } else {
            $this->model->saveEdit($_POST['id'], htmlentities($_POST['title']), htmlentities($_POST['content']),$_POST['category']);
        }
    }

    //Delete
    public function delete($id) {
        Auth::validateLogin();
        $this->model->delete($id);
    }
    
    //Display single article
    public function view($id){
        $this->view->mainMenu = MenuUtil::getMenu();
        $article = $this->model->get($id);
        $this->view->article = $article;
        $this->view->title = $article["title"];
        $this->view->render("articles/view");
    }
    
    //Display article archive
    public function viewArchive($categoryId){
        $this->view->mainMenu = MenuUtil::getMenu();
        $articles = $this->model->getListByCategory($categoryId);
        $this->view->articles = $articles;
        $this->view->title = $this->model->getCategoryName($categoryId);
        $this->view->render("articles/viewArchive");
    }

}
