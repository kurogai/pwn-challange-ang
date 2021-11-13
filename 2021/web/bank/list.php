<?php

include_once "bank_config/login.php";
include_once "bank_config/message.php";
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
    <title>BPA - Caixa de entrada</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <header>
        <h1>Lista de mensagens</h1>
        <ul>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="message.php">Enviar Mensagem</a></li>
            <li><a href="list.php">Lista mensagens</a></li>
            <li><a href="transfer.php">Transferir dinheiro</a></li>
        </ul>
    </header>
    <br>
    <div id="container">
        <?php
            $message = message::show($_COOKIE["user"]);
            if($message){
                foreach($message as $item){ 
                    if($item["id"]){?>
                        <div id="message_container">
                            <div id="message">
                                <p><strong>De: <?=$item["emissor"]?></strong> - Para: <?=$item["receptor"]?></p> 
                                <div id="right">
                                    
                                    <p><?=$item["content"]?></p>
                                </div>   
                                <a id="final" href="view.php?msg=<?= $item['id'] ?>">Ler</a>
                            </div>
                        </div>
            <?php   } 
            } 
        }?>
    </div>
</body>
</html>