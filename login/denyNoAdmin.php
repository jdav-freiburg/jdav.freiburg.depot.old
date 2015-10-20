<?php
    require "startSession.php";
    if (!$userIsAdmin) {
        require "../_templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
