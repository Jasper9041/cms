<?php

class Categories_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getList(){
        $categories = $this->db->select("SELECT * FROM categories");
        return $categories;
    }
    
    public function get($id){
        $category = $this->db->select("SELECT * FROM categories WHERE id=:id",array(
            "id" => $id
        ));
        return $category[0];
    }
    
    public function delete($id){
        $category = $this->get($id);
        if(isset($category)){
            $this->db->delete("categories","id=:id",array(
                "id" => $id
            ));
        }else{
            require 'controllers/error.php';
            $this->_controller = new Error();
            $this->_controller->Index();
            die();
        }
    }
    
    public function saveEdit($id,$name,$description){
        $this->db->update("UPDATE categories SET name=:name, description=:description WHERE id=:id LIMIT 1",array(
            "id" => $id,
            "name" => $name,
            "description" => $description
        ));
    }
    
    public function saveCreate($name,$description){
        $this->db->insert("categories",array(
            "name" => $name,
            "description" => $description
        ));
    }

}