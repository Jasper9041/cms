<?php

class Pictures_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function get($id) {
        $picture = $this->db->select("SELECT * FROM pictures WHERE id=:id LIMIT 1", array(
            'id' => $id
        ));
        if (isset($picture[0]))
            return $picture[0];
    }

    public function getList() {
        $pictures = $this->db->select("SELECT * FROM pictures");
        foreach ($pictures as &$picture) {
            $picture['albumName'] = $this->getAlbumName($picture['album']);
        }
        return $pictures;
    }

    public function getListByAlbum($albumId) {
        $pictures = $this->db->select("SELECT * FROM pictures WHERE album=:album", array("album" => $albumId));
        foreach ($pictures as &$picture) {
            $picture['albumName'] = $this->getAlbumName($picture['album']);
        }
        return $pictures;
    }

    public function getAlbumName($id) {
        $albumName = $this->db->select("SELECT name FROM albums WHERE id=:id", array(
            "id" => $id
        ));
        return $albumName[0]['name'];
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

    public function saveEdit($id, $name, $description, $album, $url) {
        $this->db->update("UPDATE pictures SET name=:name, description=:description, album=:album, url=:url WHERE id=:id", array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
            "album" => $album,
            "url" => $url
        ));
        header('Location: ' . URL . 'pictures/');
    }

    public function getAlbums() {
        $albums = $this->db->select("SELECT name,id FROM albums");
        return $albums;
    }

    public function saveCreate($name, $description, $album, $url) {
        $this->db->insert("pictures", array(
            "name" => $name,
            "description" => $description,
            "album" => $album,
            "url" => $url
        ));
        header('Location: ' . URL . 'pictures/');
    }

    public function saveUpload($file) {
        $allowedExts = array("gif", "jpeg", "jpg", "png", "PNG");
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        if (in_array($extension, $allowedExts)){
            if ($file["error"] > 0) {
                echo "Return Code: " . $file["error"] . "<br>";
            } else {
                if (file_exists("upload/" . $file["name"])) {
                    echo $file["name"] . " already exists. ";
                } else {
                    //make upload final
                    $fileName = $_SERVER['DOCUMENT_ROOT'] . ROOTURL . "images/" . $file["name"];
                    move_uploaded_file($file["tmp_name"], $fileName);
                    header("Location: " . URL . "pictures/create/");
                }
            }
        } else {
            echo "Invalid file";
        }
    }

}
