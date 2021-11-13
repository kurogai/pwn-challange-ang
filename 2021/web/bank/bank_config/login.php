<?php
namespace BANK_ACCOUNT;

include "database.php";
use BANK_DB\database;
use PDO;

class account{
    public static function login($account, $password)
    {
        $login = database::init()->prepare("SELECT * FROM account WHERE login = :login AND password = :password");       
        $login->bindParam(":login",$account); $password = md5($password);
        $login->bindParam(":password",$password);
        $login->execute();
        if($login->rowCount() > 0) return $login->fetch();
        return false;
    }

    public static function register($nome, $password, $data, $loc)
    {
        // gera um id da conta aleatorio
        $account_id = substr(strval(bin2hex(random_bytes(4))),1,4);
        $money = 0;
        $password = md5($password);

        $register = database::init()->prepare("INSERT INTO account(login, password, idade, location, money, nome) VALUES(:p1,:p2,:p3,:p4,:p5,:p6)");
        $register->bindParam(":p1",$account_id);
        $register->bindParam(":p2",$password);
        $register->bindParam(":p3",$data);
        $register->bindParam(":p4",$loc);
        $register->bindParam(":p5",$money,PDO::PARAM_INT);
        $register->bindParam(":p6",$nome);

        if($register->execute()) return $account_id;
        return false;
    }

    public static function handle($id){
        $account = database::init()->prepare("SELECT * FROM account WHERE login = :login");
        $account->bindParam(":login",$id);
        $account->execute();
        if($account->rowCount()) return true;
        return false;
    }

    // for bank managers

    public static function handle_admin($uid){
        //return true;
        $account = database::init()->prepare("SELECT * FROM bank_login WHERE uid = :uid");
        $account->bindParam(":uid",$uid);
        $account->execute();
        if($account->rowCount()) return true;
        return false;
    }

    public static function login_admin($account, $password)
    {
        $login = database::init()->prepare("SELECT * FROM bank_login WHERE login = :login AND password = :password");       
        $login->bindParam(":login",$account); $password = md5($password);
        $login->bindParam(":password",$password);
        $login->execute();
        if($login->rowCount() > 0) return $login->fetch();
        return false;
    }

}

?>