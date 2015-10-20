<?php
    require "startSession.php";
    if (!$loggedIn) {
        require "../templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
