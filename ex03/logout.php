<?php

session_start();
if (isset($_SESSION["loggued_on_user"]))
    unset($_SESSION["loggued_on_user"]);