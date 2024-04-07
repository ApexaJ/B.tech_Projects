<?php

session_start();
echo 'logging you out Please wait!!';
    session_unset();
    session_destroy();
    header('location:/whitehatify/index.php');
    exit();

?>