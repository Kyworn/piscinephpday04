<?php

$content = [];
if (!file_exists("../private"))
    mkdir("../private");
if (file_exists("../private/passwd"))
    $content = unserialize(file_get_contents("../private/passwd"));
if (!isset($_POST["login"], $_POST["passwd"], $_POST["submit"]) || empty($_POST["login"]) || empty($_POST["passwd"]) || $_POST["submit"] !== "OK")
    exit("ERROR\n");
$login = $_POST["login"]; 
foreach ($content as $e)
    if ($e["login"] === $login)
        exit("ERROR\n");
$pw = hash("whirlpool", $_POST["passwd"]); 
$usr = ["login" => $login, "passwd" => $pw];
$content[] = $usr;
file_put_contents("../private/passwd", serialize($content));
echo "OK\n";

?>