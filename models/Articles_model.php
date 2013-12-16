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
    public function saveEdit() {
        if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['content'])) {
            die('Fill in everything!');
        }
        $id = $_POST['id'];
        $title = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);

        $this->db->update("UPDATE articles SET title=:title, content=:content WHERE id=:id", array(
            "id" => $id,
            "title" => $title,
            "content" => $content
        ));
        header('Location: ' . URL . 'articles/');
    }

    //saveCreate
    public function saveCreate(){
        if (empty($_POST['title']) || empty($_POST['content'])) {
            die('Fill in everything!');
        }
        $title = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);

        $this->db->insert("articles",array(
            "title" => $title,
            "content" => $content
        ));
        header('Location: ' . URL . 'articles/');
    }
}
