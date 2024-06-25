<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);    
    require_once'../models/user.php';
    class UserController{
        private $user;
        public function __construct()
        {
            $this->user=new User();
        }
        public function inscription(){
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $username=$_POST["username"];
                $password=$_POST["password"];
                $user_id=$this->user->inscription($username,$password);
                if(!empty($username) && !empty($password)){
                    if($user_id){
                        header('Location: ../views/login.php');
                    }else{
                        echo "Erreur de l' inscription.";
                    }
                }
            }else{
                require_once '../views/inscription.php';
            }
        }
        public function login(){
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $username=$_POST["username"];
                $password=$_POST["password"];
                $user_id=$this->user->login($username,$password);
                    if($user_id){
                        session_start();
                        $_SESSION["user"]=$user_id;
                        header('Location: ../views/chat.php');
                    }else{
                        echo "Mot de passe Incorrect ou User name incorrect.";
                    }
            }else{
                require_once '../views/login.php';
            }
        }
    }
?>