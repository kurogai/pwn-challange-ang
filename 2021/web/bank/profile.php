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
    <title>BPA - Conta</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <header>
        <h1>Conta</h1>
        <ul>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="message.php">Enviar Mensagem</a></li>
            <li><a href="list.php">Lista mensagens</a></li>
            <li><a href="transfer.php">Transferir dinheiro</a></li>
        </ul>
    </header>
    <br>
    <div id="container">
        <p>imagem, nome completo, idade, id da conta, localizacao ...  depois se adiciona</p>
    </div>
</body>
</html>