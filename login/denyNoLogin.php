<?php
    require "startSession.php";
    if (!$loggedIn) {
        require "../_templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
