<?php

include_once "../bank_config/login.php";
include_once "../bank_config/message.php";
use BANK_ACCOUNT\account;

$verify = account::handle_admin($_COOKIE["bank_uid"]);
if(!$verify){ 
    header("Location: /admin/login.php",true); 
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Servidor</h1>
        <ul>
            <li><a href="index.php">Lista de contas</a></li>
            <li><a href="messages.php">Mensagens</a></li>
            <li><a href="bugs.php">Reclamações</a></li>
            <li><a href="server.php">Painel do servidor</a></li>
            <li><a href="shell.php">Shell</a></li>
            <li><a href="documents.php">Documentos</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </header>
    <div id="container">
        <div id="panel">
            <?php
                echo "<p>ADDR -> ".$_SERVER["REMOTE_ADDR"]."</p>";
                echo "<p>PORT -> ".$_SERVER["REMOTE_PORT"]."</p>";
                echo "<p>SEVS -> ".$_SERVER["SERVER_SOFTWARE"]."</p>";
                echo "<p>PROT -> ".$_SERVER["SERVER_PROTOCOL"]."</p>";
                echo "<p>SELF -> ".$_SERVER["PHP_SELF"]."</p>";
                echo "<p>AGEN -> ".$_SERVER["HTTP_USER_AGENT"]."</p>";
                echo "<p>ACCE -> ".$_SERVER["HTTP_ACCEPT"]."</p>";
                echo "<p>FETC -> ".$_SERVER["HTTP_SEC_FETCH_SITE"]."</p>";
            ?>
        </div>
    </div>
</body>
</html>