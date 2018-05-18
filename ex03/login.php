<?php

include "auth.php";

session_start();
if (!isset($_GET["login"], $_GET["passwd"]) || empty($_GET["login"]) || empty($_GET["passwd"]))
{
    $_SESSION["loggued_on_user"] = "";
    exit("ERROR\n");
}
$login = $_GET["login"];
$pw = $_GET["passwd"];
if (auth($login, $pw) === FALSE)
{
    $_SESSION["loggued_on_user"] = "";
    exit("ERROR\n");
}
$_SESSION["loggued_on_user"] = $login;
echo "OK\n";