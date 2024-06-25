<?php
    class Messages{
        private $conn;
        public function __construct()
        {
            $this->conn=new Database();
        }
        
        //function de l'envoi des messages
        public function sendMessages($send_id,$receive_id,$message){
            $this->conn->prepare('INSERT INTO messages(sender_id,receiver_id,message) VALUES (:send_id,:receive_id,:message)');
            $this->conn->bind(':send_id',$send_id);
            $this->conn->bind(':receive_id',$receive_id);
            $this->conn->bind(':message',$message);
            return $this->conn->execute();
        }

        //fonction qui prend les messages
        public function getMessages($receive_id){
            $this->conn->prepare('SELECT m.id,m.message,u.username AS sender FROM messages m JOIN users u ON m.sender_id=u.id WHERE m.receiver_id=:receiver_id ORDER BY m.timestamp DESC ');
            $this->conn->bind(':receiver_id',$receive_id);
            return $this->conn->resultAll();
        }
    }
?>