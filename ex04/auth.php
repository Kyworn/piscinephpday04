<?php

function auth($login, $passwd)
{
    if (($file = file_get_contents("../private/passwd")) === FALSE)
        return (FALSE);
    $content = unserialize($file);
    $search_passwd = hash("whirlpool", $passwd);
    foreach ($content as $usr)
        if ($usr["login"] === $login)
            if ($usr["passwd"] === $search_passwd)
                return (TRUE);
    return (FALSE);
}

?>