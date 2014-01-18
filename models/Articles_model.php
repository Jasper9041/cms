<?php

class Articles_model extends Model {

    function __construct() {
        parent::__construct();
    }

    //get functions
    public function get($id) {
        $article = $this->db->select("SELECT * FROM articles WHERE id=:id LIMIT 1", array(
            'id' => $id
        ));
        if (isset($article[0]))
            return $article[0];
    }

    public function getList() {
        $articles = $this->db->select("SELECT * FROM articles");
        foreach($articles as &$article){
            $article['categoryName'] = $this->getAlbumName($article['category']);
        }
        return $articles;
    }

    //Delete
    public function delete($id) {
        $article = $this->get($id);
        if (isset($article)) {
            $this->db->delete('articles', 'id = :id', array(
                "id" => $id
            ));
            //succes
            //echo 'succes';
            header('Location: ' . URL . 'articles/');
        } else {
            //no such article
            //echo 'no such article';
            header('Location: ' . URL . 'articles/');
        }
    }

    //saveEdit
    public function saveEdit($id,$title,$content,$category) {
        
        $this->db->update("UPDATE articles SET title=:title, content=:content, category=:category WHERE id=:id", array(
            "id" => $id,
            "title" => $title,
            "content" => $content,
            "category" => $category
        ));
        header('Location: ' . URL . 'articles/');
    }

    //saveCreate
    public function saveCreate($title,$content,$category){
        
        $this->db->insert("articles",array(
            "title" => $title,
            "content" => $content,
            "category" => $category
        ));
        header('Location: ' . URL . 'articles/');
    }
    
    //category functions
    public function getCategory(){
        $categories = $this->db->select("SELECT name,id FROM categories");
        return $categories;
    }
    
    public function getCategoryName($id){
        $albumName = $this->db->select("SELECT name FROM categories WHERE id=:id",array(
            "id" => $id
        ));
        return $albumName[0]['name'];
    }
}
