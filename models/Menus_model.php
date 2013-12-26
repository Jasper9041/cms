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

    public function delete($id){
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
    
}
