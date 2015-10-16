<?php
    require "../utils/functions.php";
    require "startSession.php";
    $userIsAdmin = userIsAdmin($user);
    if (!$userIsAdmin) {
        echo getHTMLContent("../error/not-logged-in.html");
    }
?>
