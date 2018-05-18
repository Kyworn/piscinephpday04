<?php

include "auth.php";

function ft_redirect($msg, $page)
{
    echo $msg;
    header("Refresh:3; url=$page");
    exit();
}

session_start();
if (!isset($_POST["login"], $_POST["passwd"]) || empty($_POST["login"]) || empty($_POST["passwd"]))
{
    $_SESSION["loggued_on_user"] = "";
    ft_redirect("ERROR\n", "index.html");
}
$login = $_POST["login"];
$pw = $_POST["passwd"];
if (auth($login, $pw) === FALSE)
{
    $_SESSION["loggued_on_user"] = "";
    ft_redirect("ERROR\n", "index.html");
}
$_SESSION["loggued_on_user"] = $login;
echo "OK\n";

?>

<html>
    <header>
        <meta charset="utf-8" />
    </header>
    <body>
        <br />
        <iframe src="chat.php" height="550" width="650" name="chat"></iframe>";
        <br />
        <iframe src="speak.php" height="50" width="650" name="speak"></iframe>"; 
    </body>
</html>