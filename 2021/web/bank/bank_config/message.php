<?php
include_once "database.php";
use BANK_DB\database;

class message{
    public static function send($emissor, $receptor, $content){
        // primeiro verifica se o utilizador existe ou nao
        $uid = database::init()->prepare("SELECT id FROM account WHERE login = :login");
        $uid->bindParam(":login",$receptor);
        $uid->execute();
        
        if($uid->rowCount() > 0){
            $message = database::init()->prepare("INSERT INTO message(emissor,receptor,content) VALUES(:p1,:p2,:p3)");
            $message->bindParam(":p1",$emissor);
            $message->bindParam(":p2",$receptor);
            $message->bindParam(":p3",$content);
            if($message->execute()){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public static function read($perfil, $id){
        // codigo correto
        /*
        $message = database::init()->prepare("SELECT * FROM message WHERE emissor = :p1 AND id = :p2");
        $message->bindParam(":p1",$perfil);
        $message->bindParam(":p2",$id);s
        if($message->execute()){
            return $message->fetch();
        }return false;*/
        // codigo vulneravel
        $db = new mysqli("127.0.0.1","root","","bank");
        $result = $db->query("SELECT * FROM message WHERE id = ".$id); // IDOR aqui :)
        return $result->fetch_assoc();
    }

    public static function show($conta){
        //$message = database::init()->prepare("SELECT MIN(receptor) AS receptor, id, content FROM message WHERE emissor = :p1");
        $message = database::init()->prepare("SELECT * FROM message WHERE receptor = :p1");
        $message->bindParam(":p1",$conta); // SELECT * FROM `message` ORDER BY `id` DESC
        if($message->execute()){
            if($message->rowCount()) return $message->fetchAll();
        }return false;
    }

    // for admin
    public static function show_all_account(){
        $message = database::init()->prepare("SELECT * FROM account");
        if($message->execute()){
            if($message->rowCount()) return $message->fetchAll();
        }return false;
    }

    public static function show_all_message(){
        $message = database::init()->prepare("SELECT * FROM message");
        if($message->execute()){
            if($message->rowCount()) return $message->fetchAll();
        }return false;
    }
}

?>