<?php
    require "startSession.php";
    $loggedIn = $_SESSION['eingeloggt'];
    if (!$loggedIn) {
        require "../error/not-logged-in.php";
    }
?>
