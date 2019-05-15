<?php

    session_start();
    //unset
    $_SESSION = array();
    //session destroy
    session_destroy();

    //redirect
header('location: login.php');
exit;
?>