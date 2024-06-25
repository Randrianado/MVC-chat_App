<?php
    require_once'../core/database.php';
    class User{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }
        public function inscription($username,$password){
            $this->db->prepare("INSERT INTO users (username,password) VALUES(:username,:password)");
            $this->db->bind(':username',$username);
            $this->db->bind(':password',password_hash($password,PASSWORD_BCRYPT));
            return $this->db->execute();
        }

        public function login ($username,$password){
            $this->db->prepare("SELECT id,password  FROM users WHERE username=:username");
            $this->db->bind(':username',$username);
            $result=$this->db->result();
            if($result && password_verify($password,$result->password)){
                return $result->id;
            }
            return false;
        }

        public function  getUsers(){
            $this->db->prepare("SELECT id,username FROM users");
            $result=$this->db->resultAll();
            return $result;
        }
    }
?>