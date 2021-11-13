<?php

include_once "bank_config/login.php";
use BANK_ACCOUNT\account;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPA - Login</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <div id="bank_main_login">
        <h1>Login</h1>
        <form action="#" method="post">
            <?php
                if(isset($_POST["user"], $_POST["password"])){
                    $login = account::login($_POST["user"], $_POST["password"]);
                    if($login){
                        setcookie("user",$login["login"]);
                        header("Location: profile.php");
                    }else{
                        echo "<div style='background-color: rgb(255, 65, 65); color : white; padding : 0.5rem;'>";
                        echo "usuario ou senha errados";
                        echo "</div>";
                        setcookie("user",null);
                    }
                }
            ?>
            <input type="text" name="user" id="" placeholder="usuario">
            <input type="password" name="password" id="" placeholder="senha">
            <input type="submit" value="Logar">
        </form>
    </div>
</body>
</html>