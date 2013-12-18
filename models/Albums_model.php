<?php

class Albums_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getList(){
        $albums = $this->db->select("SELECT * FROM albums");
        return $albums;
    }
    
    public function get($id){
        $album = $this->db->select("SELECT * FROM albums WHERE id=:id",array(
            "id" => $id
        ));
        return $album[0];
    }
    
    public function delete($id){
        $album = $this->get($id);
        if(isset($album)){
            $this->db->delete("Albums","id=:id",array(
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
        $this->db->update("UPDATE albums SET name=:name, description=:description WHERE id=:id LIMIT 1",array(
            "id" => $id,
            "name" => $name,
            "description" => $description
        ));
    }
    
    public function saveCreate($name,$description){
        $this->db->insert("albums",array(
            "name" => $name,
            "description" => $description
        ));
    }

}