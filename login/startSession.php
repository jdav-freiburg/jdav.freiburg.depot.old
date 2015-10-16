<?php
    require "../config.inc";
    connect();
    session_start();
    $sql = "SELECT ustatus, urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
    $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
    $user = mysql_fetch_assoc($result);
?>
