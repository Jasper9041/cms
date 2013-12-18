<?php

class Albums extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }

    public function Index(){
        $this->view->albums = $this->model->getList();
        $this->view->render('albums/index');
    }
    
    public function edit($id){
        $this->view->album = $this->model->get($id);
        $this->view->render('albums/edit');
    }
    
    public function delete($id){
        $this->model->delete($id);
        header("Location: ".URL."albums");
    }
    
    public function saveEdit(){
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])){
            $this->model->saveEdit($_POST['id'],$_POST['name'],$_POST['description']);
            header("Location: ".URL."albums");
        }else{
            //Error
        }
    }
    
    public function create(){
        $this->view->render("albums/create");
    }
    
    public function saveCreate(){
        if(isset($_POST['name']) && isset($_POST['description'])){
            $this->model->saveCreate($_POST['name'],$_POST['description']);
            header("Location: ".URL."albums");
        }else{
            //Error
        }
    }
}