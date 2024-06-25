<?php
    require_once'../models/message.php';
    class MessageContoller{
        private $message;
        public function __construct()
        {
            $this->message=new Messages();
        }

        public function sendMessage(){
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                session_start();
                $sender_id=$_SERVER["user"];
                $message=$_POST["message"];
                $receiver_id=$_POST["receiver_id"];
                $envoye=$this->message->sendMessages($sender_id,$receiver_id,$message);
                if($envoye){
                    header('Location: ../views/chat.php');
                }else{
                    echo "Erreur de l' envoie de message";
                }
            }else{
                require_once'../views/chat.php';
            }
        }
        public function getMessages(){
            session_start();
            $receiver_id=$_SESSION["user"];
            return $this->message->getMessages($receiver_id);
        }
    }
?>