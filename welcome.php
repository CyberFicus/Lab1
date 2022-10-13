<?php
    $flag = $_GET['flag'] ?? '0';
    $name = $_GET['name'] ?? '';
    $pass = $_GET['pass'] ?? '';   
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title>Welcome!</title>
</head>
<body>
    <center>
        <br> 
        <br>
        <h1> Welcome! </h1>
        <br> 
        <h3 style="color:#FF0000;">
            <?php
                switch($flag) {
                    case "1": echo "Incorrect login or password"; break;
                    case "2": echo "Password must be longer than 5 letters. It also must include at least one latin letter and at least one number"; break;
                    case "3": echo "This login is already taken"; break;
                    default: break;
                }
            ?>
        </h3> 
        <h3 style="color:#1DD300;">
                <?php
                    switch($flag) {
                        case "-1"; echo "Successfull signup"; break;
                        default: break;
                    }
                ?>
        </h3>
        <br>
        <form method="GET" action="login.php">
            <table> 
                <tr> <td> <div> Login: </div> </td> </tr> 
                <tr> <td> <input type="text" name='name' value="<?php echo $name?>" /> <br /> <br /> </td> </tr>
                <tr> <td> <div> Password: </div> </td> </tr>
                <tr> <td> <input type="password" name='pass' value="<?php echo $pass?>"/> <br /> <br /> </td> </tr>
                <tr> <td> <input type="submit" value="Sign up" formaction="signup.php"/> 
                <input type="submit" value="Log in"/> </td> <tr>
            </table>
        </form>
    </center>
</body>
</html>