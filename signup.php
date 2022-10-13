<?php
    $name = $_GET['name'] ?? '';
    $pass = $_GET['pass'] ?? '';

    if(empty($_GET)) {
        $flag= '0'; //предохранение от захода без запроса
    } else if($name == '' or $pass == '') {
        $flag = '1'; //некорректный логин или пароль
    } else if(strlen($pass) < 6 or !preg_match("#[0-9]+#", $pass ) or !preg_match("#[a-z]+#", $pass)) {
        $flag = '2'; //пароль не прошёл валидацию
    } else {
        $link = mysqli_connect('localhost', 'root', '', 'Lab1');
        $result = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE login='$name'"));    
        
        if ($result === NULL) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $token = random_bytes(16);
            $token = password_hash("$token", PASSWORD_DEFAULT);
            mysqli_query($link, "INSERT INTO users (login, hash, token) VALUES ('$name', '$hash', '$token')");
            $flag='-1'; //успех 
        } else {
            $flag='3'; // логин занят
        }
    }
    header("Location:welcome.php?flag=$flag&name=$name&pass=$pass");
?>
