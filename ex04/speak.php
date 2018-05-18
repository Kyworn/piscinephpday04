<?php

if (isset($_POST["msg"]))
{
    session_start();
    if (!isset($_SESSION["loggued_on_user"]))
        header("Redirect:0; url=\"index.html\"");
    date_default_timezone_set("Europe/Paris");
    if (!file_exists("../private"))
        mkdir("../private");
    $content = [];
    if (!file_exists("../private/chat"))
        file_put_contents("../private/chat", "");
    $fd = fopen("../private/chat", "r");
    flock($fd, LOCK_SH);
    if (!empty($file_content = file_get_contents("../private/chat")))
        $content = unserialize($file_content);
    flock($fd, LOCK_UN);
    fclose($fd);
    $time_stamp = time();
    $usr_msg = ["login" => $_SESSION["loggued_on_user"], "time" => $time_stamp, "msg" => $_POST["msg"]];
    $content[] = $usr_msg;
    $fd = fopen("../private/chat", "w");
    flock($fd, LOCK_EX);
    file_put_contents("../private/chat", serialize($content));
    flock($fd, LOCK_UN);
    fclose($fd);
}

?>

<html>
    <header>
        <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
    </header>
    <body>
        <form action="speak.php" method="post">
            <input type="text" name="msg" />
            <input type="submit" name="submit" value="OK" />
        </form>
    </body>
</html>