<?php

class Pictures_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function get($id) {
        $album = $this->db->select("SELECT * FROM albums WHERE id=:id LIMIT 1", array(
            'id' => $id
        ));
        if (isset($album[0]))
            return $album[0];
    }

    public function getList() {
        $albums = $this->db->select("SELECT * FROM albums");
        return $albums;
    }

    public function delete($id) {

        $picture = $this->get($id);
        if (isset($picture)) {
            $this->db->delete("pictures", "id=:id", array("id" => $id));
            header('Location: ' . URL . 'pictures/');
        } else {
            header('Location: ' . URL . 'pictures/');
        }
    }

    public function saveEdit($id,$name,$description,$album,$url){
        $this->db->update("UPDATE pictures SET name=:name, description=:description, album=:album, url=:url WHERE id=:id", array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
            "album" => $album,
            "url" => $url
        ));
        header('Location: ' . URL . 'pictures/');
    }
    
    public function getAlbums(){
        $albums = $this->db->select("SELECT name,id FROM albums");
        return $albums;
    }
    
    public function saveCreate($name,$description,$album,$url){
        $this->db->insert("pictures",array(
            "name" => $name,
            "description" => $description,
            "album" => $album,
            "url" => $url
        ));
        header('Location: ' . URL . 'pictures/');
    }
}
