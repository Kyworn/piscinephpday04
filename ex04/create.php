<?php

function ft_redirect($msg, $page)
{
    echo $msg;
    header("Refresh:1; url=$page");
}

$content = [];
if (!file_exists("../private"))
    mkdir("../private");
if (file_exists("../private/passwd"))
    $content = unserialize(file_get_contents("../private/passwd"));
if (!isset($_POST["login"], $_POST["passwd"], $_POST["submit"]) || empty($_POST["login"]) || empty($_POST["passwd"]) || $_POST["submit"] !== "OK")
    ft_redirect("ERROR\n", "create.html");
$login = $_POST["login"]; 
foreach ($content as $e)
    if ($e["login"] === $login)
        ft_redirect("ERROR\n", "create.html");
$pw = hash("whirlpool", $_POST["passwd"]); 
$usr = ["login" => $login, "passwd" => $pw];
$content[] = $usr;
file_put_contents("../private/passwd", serialize($content));
ft_redirect("OK\n", "index.html");

?>