<?php

class Pictures extends Controller {

    function __construct() {
        parent::__construct();
    }

    //List
    public function Index() {
        Auth::validateLogin();
        $this->view->title = "Pictures";
        $this->view->pictures = $this->model->getList();
        $this->view->render('pictures/index', 'backend');
    }

    //Create
    public function create() {
        Auth::validateLogin();
        $this->view->title = "Upload a picture";
        $this->view->mainMenu = MenuUtil::getMenu();
        $this->view->albums = $this->model->getAlbums();
        if (Session::get("picture")) {
            $this->view->upload = true;
            $this->view->url = Session::get("picture");
        }else{
            
        }
        $this->view->render('pictures/create', 'backend');
    }

    public function saveCreate() {
        Auth::validateLogin();
        if (empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["album"]) || empty($_POST["url"])) {
            die('Fill in everything!');
        } else {
            if (isset($_POST["fileName"])){
                $this->model->saveCreate($_POST["name"], $_POST["description"], $_POST["album"], $_POST["url"],$_POST["fileName"]);
            }else{
                $this->model->saveCreate($_POST["name"], $_POST["description"], $_POST["album"], $_POST["url"]);
            }
        }
    }

    //Edit
    public function edit($id) {
        Auth::validateLogin();
        $this->view->title = "Edit a pciture";
        $this->view->mainMenu = MenuUtil::getMenu();
        $this->view->albums = $this->model->getAlbums();
        $this->view->picture = $this->model->get($id);
        $this->view->render('pictures/edit', 'backend');
    }

    public function saveEdit() {
        Auth::validateLogin();
        if (empty($_POST["id"]) || empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["album"]) || empty($_POST["url"])) {
            die('Fill in everything!');
        } else {
            $this->model->saveEdit($_POST["id"], $_POST["name"], $_POST["description"], $_POST["album"], $_POST["url"]);
        }
    }

    //Delete
    public function delete($id) {
        Auth::validateLogin();
        $this->model->delete($id);
    }

    //Display Gallery
    public function view($id) {
        $this->view->mainMenu = MenuUtil::getMenu();
        $picture = $this->model->get($id);
        $this->view->picture = $picture;
        $this->view->title = $picture["name"];
        $this->view->render('pictures/view');
    }

    public function viewAlbum($albumId) {
        $this->view->mainMenu = MenuUtil::getMenu();
        $pictures = $this->model->getListByAlbum($albumId);
        $this->view->pictures = $pictures;
        $this->view->title = $this->model->getAlbumName($albumId);
        $this->view->render('pictures/viewAlbum');
    }

    public function saveUpload() {
        Auth::validateLogin();
        $this->model->saveUpload($_FILES["image"]);
    }

    public function upload() {
        Auth::validateLogin();
        $this->view->title = "Upload picture";
        $this->view->render("pictures/upload", "backend");
    }

}
