<?php
    require "startSession.php";
    $userIsAdmin = userIsAdmin($user);
    if (!$userIsAdmin) {
        require "../templates/header.php";
        require "../error/not-logged-in.php";
    }
?>
