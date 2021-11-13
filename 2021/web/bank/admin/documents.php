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
    <title>BPA - Admin - Documentos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Upload</h1>
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
    <?php
            if(isset($_FILES["document"])){
                // first part: extension
                if(substr($_FILES["document"]["name"],-4) == ".pdf"){ 
                    // second: mime type validation
                    if($_FILES["document"]["tmp_name"]){ //is the file securely on the server?
                        if(move_uploaded_file($_FILES["document"]["tmp_name"],"upload/".$_FILES["document"]["name"])){ ?>
                            <p style="color: green;">Envio do arquivo feito com sucesso</p>
                        <?php } else { ?>
                            <p style="color: orange;">Erro ao guardar, o servidor nao conseguiu</p>
                <?php }
                    }else{ ?>
                    <p style="color: red;">Bloqueado pelo WAF! Tentativa fraudulenta reportada ao sysadmin!</p>
                <?php }
                    }else{ ?>
                    <p style="color: red;">Bloqueado pelo WAF! Apenas PDFs são permitidos!</p>
                <?php }
            }
            
        ?>
        <strong>Faça upload do documento aqui (Protected by WAF)</strong>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="file" name="document" id="">
            <input type="submit" value="Enviar">
        </form>
   </div>
</body>
</html>