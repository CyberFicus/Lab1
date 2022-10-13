<?php 
    $login = $_COOKIE['login'] ?? '0';
    $link = mysqli_connect('localhost', 'root', '', 'Lab1');
    mysqli_query($link, "UPDATE users SET token='' WHERE login='$login'");
    setcookie('token', '', time());
    setcookie('login', '', time());
    header("Location:welcome.php");
?>