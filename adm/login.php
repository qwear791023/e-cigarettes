<?php
$username = null;
$password = null;
$allowips = array('61.222.58.235', '60.250.109.151', '34.173.225.164');
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $ip = $_SERVER["REMOTE_ADDR"];
}
if (!in_array($ip, $allowips)) {
    header('HTTP/1.0 403 Forbidden');
    echo "You $ip are forbidden!";
    exit(0);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if($username == 'mohw22report' && $password == 'reportmohw22') {
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: index.php');
        }
        else {
            header('Location: login.php');
        }
        
    } else {
        header('Location: login.php');
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Creating a simple to-do application - Part 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="page">
    <!-- [banner] -->
    <header id="banner">
        <hgroup>
            <h1>Login</h1>
        </hgroup>        
    </header>
    <!-- [content] -->
    <section id="content">
        <form id="login" method="post">
            <label for="username">Username:</label>
            <input id="username" name="username" type="text" required>
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" required>                    
            <br />
            <input type="submit" value="Login">
        </form>
    </section>
    <!-- [/content] -->
    
    <footer id="footer">
        <details>
            <summary>Copyright 2022</summary>
        </details>
    </footer>
</div>
<!-- [/page] -->
</body>
</html>
<?php
}
?>
