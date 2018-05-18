<?php

$content = [];
if (!file_exists("../private/chat"))
    file_put_contents("../private/chat", "");
$fd = fopen("../private/chat", "r");
flock($fd, LOCK_SH);
if (!empty($file_content = file_get_contents("../private/chat")))
    $content = unserialize(file_get_contents("../private/chat"));
foreach ($content as $e)
    echo "[".date("H:i", $e["time"])."] <b>".$e["login"]."</b>: ".$e["msg"]."<br/>";
flock($fd, LOCK_UN);
fclose($fd);