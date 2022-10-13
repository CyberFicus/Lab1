<?php
    $flag = $_GET['flag'] ?? 0;
    $result = NULL;

    if (isset($_COOKIE['token']) and isset($_COOKIE['login'])) {
        $token = $_COOKIE['token'] ?? '0';
        $login = $_COOKIE['login'] ?? '0';
        $link = mysqli_connect('localhost', 'root', '', 'Lab1');
        $result = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE login='$login'"));
    }
//    var_dump($result);
//    var_dump($token);
//    var_dump($login);

    if ($result == NULL or !password_verify($result['token'] ,$token))
        header('Location:welcome.php');
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta charset="utf-8"/>
<title>...</title>
</head>
<body>
    <br> <br>
    <center>
        <h1> You have been successfully authorized </h1>
        <h2> There's nothing to do here :( <br> </h2>
        <form method="get" action="leave.php">
        <input type="submit" value="Leave">
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
        </form>
    </center>
</body>
</html>