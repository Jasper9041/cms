<?php

class Menus_model extends Model {

    function __construct() {
        parent::__construct();
    }

    //get functions
    public function get($id) {
        $menu = $this->db->select("SELECT * FROM menus WHERE id=:id LIMIT 1", array(
            'id' => $id
        ));
        if (isset($menu[0]))
            return $menu[0];
    }

    public function getList() {
        $menus = $this->db->select("SELECT * FROM menus");
        return $menus;
    }

    public function getListByParent($parent = 0) {
        $menus = $this->db->select("SELECT * FROM menus WHERE parentId=:parentId ORDER BY id ASC", array(
            "parentId" => $parent
        ));
        return $menus;
    }

    public function getParentsList() {
        $parents = $this->getList();
        $parents[] = array(
            "id" => 0,
            "title" => "menu root"
        );
        return $parents;
    }

    public function createMenuTree($parentId = 0) {
        $tree = array();
        $nodes = $this->getListByParent($parentId);

        foreach ($nodes as $node) {
            if ($this->countChildren($node["id"]) > 0) {
                $node["Children"] = $this->createMenuTree($node["id"]);
            }
            $tree[] = $node;
        }
        return $tree;
    }

    public function countChildren($parentId) {
        $menus = $this->db->count("SELECT COUNT(*) FROM menus WHERE parentId=:parentId", array(
            "parentId" => $parentId
        ));
        return $menus;
    }

    public function delete($id) {
        $menu = $this->get($id);
        if (isset($menu)) {
            $this->db->delete('menus', 'id = :id', array(
                "id" => $id
            ));
            //succes
            //echo 'succes';
            header('Location: ' . URL . 'menus/');
        } else {
            //no such menu
            //echo 'no such menu';
            header('Location: ' . URL . 'menus/');
        }
    }

    public function saveEdit($id, $title, $alias, $parentId, $type) {
        $this->db->update("UPDATE menus SET title=:title, alias=:alias, link=:link, parentId=:parentId, type=:type WHERE id=:id", array(
            "id" => $id,
            "title" => $title,
            "alias" => $alias,
            "link" => $this->getLink($type),
            "parentId" => $parentId,
            "type" => $type
        ));
        header('Location: ' . URL . 'menus/');
    }

    public function saveCreate($title, $alias, $parentId, $type) {
        $this->db->insert("menus", array(
            "title" => $title,
            "alias" => $alias,
            "link" => $this->getLink($type),
            "parentId" => $parentId,
            "type" => $type
        ));
        header('Location: ' . URL . 'menus/');
    }

    public function getTypes() {
        return array("link", "article", "archive", "home");
    }

    public function getLink($type) {
        switch ($type) {
            case null:
                return $_POST["link"];
            case "article":
                return URL . "viewArticle/" . $_POST["articleId"];
            case "archive":
                return URL . "viewArchive/" . $_POST["categoryId"];
            case "link":
                return $_POST["link"];
            case "home":
                return URL;
        }
    }

    public function getArticleList(){
        require_once 'models/Articles_model.php';
        $this->tempModel = new Articles_model();
        return $this->tempModel->getList();
    }
    
    public function getCategoryList(){
        require_once 'models/Categories_model.php';
        $this->tempModel = new Categories_model();
        return $this->tempModel->getList();
    }
}
