<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function Login() {
        
        if(!isset($_POST['username']) || !isset($_POST['password'])){
            header('Location: ' . URL . 'login/');
            die();
        }
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->db->select("SELECT * FROM users WHERE username=:username LIMIT 1", array(
            'username' => $username
        ));

        if (isset($user[0])) {
            if (Auth::checkBlowfish($password, $user[0]['password'])) {
                Session::set('username', $username);
                header('Location: '.URL.'admin/');
            }else{
               header('Location: ' . URL . 'login/');
            }
        } else {
            header('Location: ' . URL . 'login/');
        }
    }

}
