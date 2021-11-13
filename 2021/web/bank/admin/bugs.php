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
    <title>BPA - Admin - Bugs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Bugs</h1>
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
        <h1>Lista de reclamações no bando</h1>
        <table>
            <thead>
                <td>Nome</td>
                <td>Titulo</td>
                <td>Mensagem</td>
            </thead>
            <tr>
                <td id="table_item">Ana</td>
                <td id="table_item">"Quando conseguirei levantar meus dados?"</td>
                <td id="table_item">Não consigo levantar meus dados, porfavor respondam</td>
            </tr>
            <tr>
                <td id="table_item">Miguel</td>
                <td id="table_item">"Leia porfavor até ao fim"</td>
                <td id="table_item">Um ser do mal vai visitar sua casa se não encaminhares este email para 10 amigos
             próximos, cuidado! ele está a caminho</td>
            </tr>
            <tr>
                <td id="table_item">Manuel</td>
                <td id="table_item">"Filas cheias"</td>
                <td id="table_item">As filas estão super cheias, quase sempre, e há poucos postos! Porfavor corrigam issos</td>
            </tr>
            <tr>
                <td id="table_item">Leila</td>
                <td id="table_item">"Onde já se viu um banco como este?"</td>
                <td id="table_item">Os descontos deste banco mensais assustam qualquer pessoa, pior quando nem avisam!</td>
            </tr>
        </table>
    </div>
</body>
</html>