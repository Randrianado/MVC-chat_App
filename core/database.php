<?php
        class Database{
            private $host=DB_HOST;
            private $name=DB_NAME;
            private $passe=DB_PASS;
            private $user=DB_USER;
            private $conn;
            private $db;
            public function __construct()
            {
                $prem='mysql:host=' .$this->host. ';dname='.$this->name;
                $option=array(
                    PDO::ATTR_PERSISTENT =>true,
                    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
                );
                try {
                    $this->conn=new PDO($prem,$this->user,$this->passe,$option);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            public function prepare($sql){
                $this->db=$this->conn->prepare($sql);
            }
            //recuperation des valeurs
            public function bind($param,$value,$type = null){
                if(is_null($type)){
                    switch (true) {
                        case is_int($value):
                            $type=PDO::PARAM_INT;
                            break;
                        case is_bool($value):
                            $type=PDO::PARAM_BOOL;
                            break;
                        case is_null($value):
                            $type=PDO::PARAM_NULL;
                            break;
                        default:
                            $type=PDO::PARAM_STR;
                            break;
                    }
                }
                $this->db->bindValue($param,$value,$type);
            }

           public function execute(){
                return $this->db->execute();
           }
        
           public function resultAll(){
                $this->execute();
                return $this->db->fetchAll(PDO::FETCH_OBJ);
           }
         
           public function result(){
                $this->execute();
                return $this->db->fetch(PDO::FETCH_OBJ);
           }

           public function count(){
            return $this->db->rowCount();
           }
        }
?>