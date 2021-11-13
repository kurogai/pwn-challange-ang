<?php

include_once "bank_config/login.php";
use BANK_ACCOUNT\account;

$verify = account::handle($_COOKIE["user"]);
if(!$verify){ 
    header("Location: login.php",true); 
    setcookie("user",null);
    die(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPA - Transferir</title>
    <link rel="stylesheet" href="css/base.css">
    <style>
        #notification{
            height: 70%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Transferencias</h1>
        <ul>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="message.php">Enviar Mensagem</a></li>
            <li><a href="list.php">Lista mensagens</a></li>
            <li><a href="transfer.php">Transferir dinheiro</a></li>
        </ul>
    </header>
    <!-- In devel -->
    <div id="notification">
        <h1>O banco está com manutenção, obrigado</h1>
    </div>
    <!-- 
        S
    -->
</body>
</html>