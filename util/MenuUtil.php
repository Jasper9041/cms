<?php

class MenuUtil{
    
    function __construct() {
        
    }
    
    public static function getMenu(){
        require_once 'models/Menus_model.php';
        $menumodel = new Menus_model;
        return $menumodel->createMenuTree();
    }
    
    
}