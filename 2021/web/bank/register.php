<?php

include_once "bank_config/login.php";
use BANK_ACCOUNT\account;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPA - Registar</title>
</head>
<body>
    <?php
    if(isset($_POST["nome"],$_POST["password"],$_POST["idade"],$_POST["location"])){
        $register = account::register($_POST["nome"],$_POST["password"],$_POST["idade"],$_POST["location"]);
        if($register){
            echo "<p>Conta Criada com sucesso!</p>";
            echo "<p>Seu ID de login: ".$register."</p>";
            echo "<a href='login.php'>Logar</a>";
            die();
        }else{
            echo "<p>Porfavor, tente novamente</p>";
        }
    }
    ?>
    <h1>Registar</h1>
    <form action="#" method="post">
        <input type="text" name="nome" id="">
        <input type="password" name="password" id="">
        <input type="number" max="100" name="idade" id="" placeholder="Idade">
        <input type="text" name="location" id="" placeholder="Localizacao">
        <input type="submit" value="Registar">
    </form>
</body>
</html>