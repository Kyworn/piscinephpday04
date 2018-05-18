<?php

function ft_correct_input()
{
    if (!isset($_POST["login"], $_POST["oldpw"], $_POST["newpw"], $_POST["submit"]))
        return (FALSE);
    if (empty($_POST["login"]) || empty($_POST["oldpw"]) || empty($_POST["newpw"]) || $_POST["submit"] !== "OK")
        return (FALSE);
    return (TRUE);
}

if (!ft_correct_input())
    exit("ERROR\n");
$login = $_POST["login"];
$oldpw = hash("whirlpool", $_POST["oldpw"]);
$newpw = hash("whirlpool", $_POST["newpw"]);
if (($passwd_file = file_get_contents("../private/passwd")) === FALSE)
    exit("ERROR\n");
$content = unserialize($passwd_file);
foreach ($content as $k=>$usr)
{
    if ($usr["login"] === $login)
    {
        if ($usr["passwd"] === $oldpw)
        {
            $content[$k]["passwd"] = $newpw;
            file_put_contents("../private/passwd", serialize($content));
            exit("OK\n");
        }
        else
        {
            exit("ERROR\n");
        }
    }
}
exit("ERROR\n");