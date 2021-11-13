<?php

use BROKEN_SESSION\session;

include ("../__session__.php");
// verifica a sessao
$session = session::check($_COOKIE["id"]);
if(!$session){
    setcookie("id",null);
    header("Location: /login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BROKEN - Chat</title>
    <link rel="stylesheet" href="../css/terminal.css">
</head>
<body>  
    <header>
        <a href="exit.php">Sair</a>
    </header>
    <hr>
    <div id="chat">
        <div id="container">
            <div id="terminal">
            <?php
            $messages = session::show();
            if($messages){
                foreach($messages as $message){ ?>
                    <div id="terminal_content">
                        <div id="terminal_user">[<?= $message["nome"] ?>][<?= $message["data"] ?>]$ &ensp;</div>
                        <div id="terminal_output"><?= $message["content"] ?></div>
                    </div>
                <?php }
            }
            ?>
            </div>
        </div>
    </div>
    <div id="terminal_content">
        <div id="terminal_user" class="user" username='<?= $_COOKIE["name"] ?>'><?= $_COOKIE["name"] ?>@ctfhackathon $ &ensp;</div>
        <div id="terminal_output">
            <input type="text" name="input" placeholder="Click here to start writting">
        </div>
    </div>
    <script>
        let input = document.getElementsByName("input")[0];
        let user = document.getElementsByClassName("user")[0];

        document.getElementsByTagName("body")[0].onkeydown = function(event){ 
            let message = input.value;
            if(message.length > 0){
                if(event.key == "Enter"){
                    if(message.length > 0){
                        let request = new XMLHttpRequest();
                        request.open("POST","/server/send_message.php");
                        request.onload = ()=>{
                            const data = request.response;
                            console.log(data);
                            if(!data.match(/\"Erro ao enviar mensagem\"/)){
                                setTimeout(()=>{
                                    document.location = "/app/index.php";
                                },3000);
                            }else alert(`Erro ao enviar mensagem`);
                        }
                        let form = new FormData();
                        form.append("user",user.getAttribute("username"));
                        form.append("message",message);
                        request.send(form);
                    }
                    input.value = '';
                }
            }
            window.scrollBy(0,500);
            function print_content(content,type){
                let terminal = document.getElementById("terminal");
                let terminal_content = document.createElement("div");
                    terminal_content.id = "terminal_content";
                let terminal_user = document.createElement("div");
                    terminal_user.id = "terminal_user";
                    terminal_user.innerHTML = "broken@ctfhackathon $ &ensp;";
                let terminal_output = document.createElement("div");
                    terminal_output.id = "terminal_output";
                    terminal_output.innerHTML = content;

                terminal_content.append(terminal_user,terminal_output);
                terminal.append(terminal_content);
            }
        }
    </script>
</body>
</html>