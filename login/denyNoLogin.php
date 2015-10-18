<?php
    require "startSession.php";
    $loggedIn = $_SESSION['eingeloggt'];
    if (!$loggedIn) {
        require "../templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
