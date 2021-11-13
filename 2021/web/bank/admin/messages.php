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
    <title>BPA - Admin - Mensagens</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
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
        <h1>Mensagens</h1>
        <table>
            <thead>
                <td>ID</td>
                <td>Emissor</td>
                <td>Receptor</td>
                <td>Conteudo</td>
            </thead>
            <?php
                $message = message::show_all_message();
                if($message){
                    foreach($message as $item){ ?>
                    <tr>
                        <td id="table_item" class='select'><?=$item["id"]?></td>
                        <td id="table_item"><?=$item["emissor"]?></td>
                        <td id="table_item"><?=$item["receptor"]?></td>
                        <td id="table_item"><?=$item["content"]?></td>
                    </tr>
                <?php
                } 
            }?>
        </table>
    </div>
</body>
</html>