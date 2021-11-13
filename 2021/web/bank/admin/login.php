<?php

include_once "../bank_config/login.php";
use BANK_ACCOUNT\account;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPA - Login</title>
</head>
<body>
    <?php
        if(isset($_POST["user"], $_POST["password"])){
            $login = account::login_admin($_POST["user"], $_POST["password"]);
            if($login){
                setcookie("bank_uid",$login["uid"]);
                header("Location: /admin/index.php",true);
            }else{
                echo "Senha errada!";
                setcookie("user",null);
            }
        }
    ?>
    <h1>Login</h1>
    <form action="#" method="post">
        <input type="text" name="user" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Logar">
    </form>
</body>
</html>