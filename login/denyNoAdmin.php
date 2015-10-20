<?php
    require "startSession.php";
    if (!$userIsAdmin) {
        require "../templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
