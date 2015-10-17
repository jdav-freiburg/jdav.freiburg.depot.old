<?php
    require "startSession.php";
    $userIsAdmin = userIsAdmin($user);
    if (!$userIsAdmin) {
        require "../error/not-logged-in.php";
    }
?>
