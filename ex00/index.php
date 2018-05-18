<?php

session_start();
if (isset($_GET["login"], $_GET["passwd"], $_GET["submit"]) && !empty($_GET["login"]) && !empty($_GET["passwd"]) && $_GET["submit"] === "OK")
{
    $login = $_GET["login"];
    $pw = $_GET["passwd"];
    $_SESSION["login"] = $login;
    $_SESSION["passwd"] = $pw;
}
if (isset($_SESSION["login"], $_SESSION["passwd"]))
{
    $login = $_SESSION["login"]; 
    $pw = $_SESSION["passwd"]; 
}
else
{
    $login = "login";
    $pw = "password";
}

?>

<html><body>
<form action="index.php" method="get">
    Identifiant: <input type="text" name="login" value="<?php echo $login ?>" />
    <br />
    Mot de passe: <input type="password" name="passwd" value="<?php echo $pw ?>" />
    <input type="submit" name="submit" value="OK" />
</form>
</body></html>
