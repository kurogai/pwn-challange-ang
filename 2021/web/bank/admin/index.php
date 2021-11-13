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
    <title>BPA - Admin</title>
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
        <h1>Lista de contas no Banco</h1>
        <table>
            <thead>
                <td>ID</td>
                <td>nome</td>
                <td>nome de login</td>
                <td>senha</td>
                <td>idade</td>
                <td>localização</td>
                <td>montante</td>
            </thead>
            <?php
            $message = message::show_all_account();
            if($message){
                foreach($message as $item){ ?>
                    <tr>
                        <td id="table_item" class='select'><?=$item["id"]?></td>
                        <td id="table_item"><?=$item["nome"]?></td>
                        <td id="table_item"><?=$item["login"]?></td>
                        <td id="table_item"><?=$item["password"]?></td>
                        <td id="table_item"><?=$item["idade"]?></td>
                        <td id="table_item"><?=$item["location"]?></td>
                        <td id="table_item" class="money"><?=$item["money"]?> KZ</td>
                    </tr>
                <?php
                } 
            }?>
        </table>
    </div>
</body>
</html>