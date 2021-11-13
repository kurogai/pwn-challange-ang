<?php

use BROKEN_SESSION\session;

include ("__session__.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken - Check code</title>
</head>
<body>
    <?php
    if(isset($_POST["code"])){
        $session = session::recover($_POST["code"]);
        if($session){
            echo "<p>Conta confirmada! Iniciando sessao...</p>";
            setcookie("id",$session["id"]);
            setcookie("name",$session["user"]);
            echo "
            <script>
                setTimeout(()=>{
                    document.location = '/app/index.php'
                },3000)
            </script>
            ";
        }else{
            echo "<p>Codigo invalido</p>";
        }
    }
    ?>
    <p>Porfavor introduza o codigo de 3 digitos enviado ao seu email (ex: 123)</p>
    <form action="#" method="post">
        <input type="number" name="code" id="" placeholder="000" maxlength="3" minlength="3">
        <input type="submit" name="Verificar" id="">
    </form>
</body>
</html>