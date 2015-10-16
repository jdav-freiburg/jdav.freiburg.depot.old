<?php
    session_start();
    require "../utils/functions.php";
    require "../_configs.php";
    connectDatabase($dbServer, $dbUser, $dbPassword, $dbName);
    $sql = "SELECT ustatus, urechte FROM $tab_user WHERE uname = '$_SESSION[username]'";
    $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
    $user = mysql_fetch_assoc($result);
?>
