<?php
    $flag = -1;
    $name = $_GET['name'] ?? '';
    $pass = $_GET['pass'] ?? '';
    
    if(empty($_GET)) {
        $flag = '0'; //предохранение от захода без запроса
    } else if($name == '' or $pass == '') {
        $flag = '1'; //некорректный логин или пароль
    } else {
        $link = mysqli_connect('localhost', 'root', '', 'Lab1');
        $res = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE login='$name'"));
        if ($res !== NULL and password_verify($pass, $res['hash'])) {
            $token = $res['token'];
            $token = password_hash("$token", PASSWORD_DEFAULT);
            setcookie("login", "$name", time()+3600*24);
            setcookie("token", "$token", time()+3600*24);
            header("Location:index.php");
        } else {
            $flag = '1'; //некорректный логин или пароль
        }
    }
    
    if ($flag>=0)
        header("Location:welcome.php?flag=$flag&name=$name&pass=$pass");    
?>