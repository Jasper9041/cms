<?php

class Albums_model extends Model {

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
        $album = $this->get($id);
        if (isset($album)) {
            $this->db->delete("albums", "id=:id", array("id" => $id));
            header('Location: ' . URL . 'albums/');
        } else {
            header('Location: ' . URL . 'albums/');
        }
    }

    public function saveEdit($id, $name, $description) {
        $this->db->update("UPDATE albums SET name=:name, description=:description WHERE id=:id", array(
            "id" => $id,
            "name" => $name,
            "description" => $description
        ));
        header('Location: ' . URL . 'albums/');
    }

    public function saveCreate($name, $description) {
        $this->db->insert("albums", array(
            "name" => $name,
            "description" => $description
        ));
        header('Location: ' . URL . 'albums/');
    }

}
