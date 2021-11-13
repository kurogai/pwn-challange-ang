<?php

include_once "bank_config/login.php";
include_once "bank_config/message.php";
use BANK_ACCOUNT\account;

$verify = account::handle($_COOKIE["user"]);
if(!$verify){ 
    header("Location: login.php",true); 
    setcookie("user",null);
    //die(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPA - Ler</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <header>
        <h1>Ler</h1>
        <ul>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="message.php">Enviar Mensagem</a></li>
            <li><a href="list.php">Lista mensagens</a></li>
            <li><a href="transfer.php">Transferir dinheiro</a></li>
        </ul>
    </header>
    <br>
    <!-- So para testar -->
    <?php
        if(isset($_GET['msg'])){
            $msg = message::read($_COOKIE["user"],$_GET["msg"]);
            if($msg){ ?>
                <div id="container_msg">
                    <strong><?= $msg["receptor"] ?></strong>
                    <p><?= $msg["content"] ?></p>
                </div>
            <?php }
        }
    ?>
</body>
</html>