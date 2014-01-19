<?php

class Menus extends Controller {

    function __construct() {
        parent::__construct();
        Auth::validateLogin();
    }
    
    public function Index(){
        $this->view->title = "Menu Items";        
        $this->view->menus = $this->model->createMenuTree();
        $this->view->render('menus/index','backend');
    }
    
    public function delete($id){
        $this->model->delete($id);
    }
    
    public function edit($id,$type=null){
        $this->view->title = "Edit Menu Item";
        $this->view->addToHeader("<script type='text/javascript' src='".URL."views/menus/typeChanged.js'></script>");
        $this->view->menu = $this->model->get($id);
        $this->view->parents = $this->model->getParentsList();
        $this->view->types = $this->model->getTypes();
        if ($type != null){
            $this->view->menu["type"] = $type;
        }
        
        switch ($this->view->menu["type"]){
            case "link":
                $this->view->render("menus/edit/link",'backend');
                break;
            case "archive":
                $this->view->data = $this->model->getCategoryList();
                $this->view->render("menus/edit/archive",'backend');
                break;
            case "article":
                $this->view->data = $this->model->getArticleList();
                $this->view->render("menus/edit/article",'backend');
                break;
            case "home":
                $this->view->render("menus/edit/home",'backend');
                break;
            default:
                $this->view->render("menus/edit/link",'backend');
                break;
        }
        
    }
    
    public function saveEdit(){
        if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['alias']) || empty($_POST['type']) || $_POST['parentId']=="") {
            die('Fill in everything!<br/>');
        } else {
            $this->model->saveEdit($_POST['id'], $_POST['title'], $_POST['alias'], $_POST['parentId'], $_POST['type']);
        }
    }
    
    public function create($type = null){
        $this->view->title = "Create New Menu Item";
        $this->view->addToHeader("<script type='text/javascript' src='".URL."views/menus/typeChanged.js'></script>");
        $this->view->parents = $this->model->getParentsList();
        $this->view->types = $this->model->getTypes();
        $this->view->type = $type;
        
        switch ($type){
            case "link":
                $this->view->render("menus/create/link",'backend');
                break;
            case "archive":
                $this->model->data = $this->model->getCategoryList();
                $this->view->render("menus/create/archive",'backend');
                break;
            case "article":
                $this->view->data = $this->model->getArticleList();
                $this->view->render("menus/create/article",'backend');
                break;
            case "home":
                $this->view->render("menus/create/home",'backend');
                break;
            default:
                $this->view->render("menus/create/link",'backend');
                break;
        }
    }
    
    public function saveCreate(){
        if (empty($_POST['title']) || empty($_POST['alias']) || empty($_POST['type']) || $_POST['parentId']=="") {
            die('Fill in everything!<br/>'.
               $_POST['title'] . '<br/>' . $_POST['alias'] . '<br/>' . $_POST['link'] . '<br/>' . $_POST['parentId'] . '<br/>' . $_POST['type']     
                    );
        } else {
            $this->model->saveCreate($_POST['title'], $_POST['alias'], $_POST['parentId'], $_POST['type']);
        }
        
    }
    
}
