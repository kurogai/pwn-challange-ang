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
    <title>BPA - Enviar Mensagem</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <header>
        <h1>Enviar Mensagem</h1>
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
        if(isset($_COOKIE["user"],$_POST["receptor"],$_POST["message"])){
            $message = message::send($_COOKIE["user"],$_POST["receptor"],$_POST["message"]);
            if($message){
                echo "<strong>Mensagem enviada</strong>";
            }else{
                echo "<strong>Mensagem não enviada</strong>";
            }
        }
        
        ?>
        <form id="send_message_form" action="#" method="post">
            <input type="text" name="receptor" placeholder="ID da conta a receber a mensagem" style="background-color: rgb(188, 188, 255); height: 30px;">
            <p>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Mensagem..." style="margin: 0px; width: 636px; height: 399px;"></textarea>
            </p>
            <input type="submit" name="send" id="send_message">
        </form>
    </div>
</body>
</html>