<?php
    require "../_configs.php";
    require "../utils/functions.php";
    session_start();
    $loggedIn = $_SESSION['eingeloggt'];
    connectDatabase($dbServer, $dbUser, $dbPassword, $dbName);
    $sql = "SELECT ustatus, urechte FROM $tab_user WHERE uname = '$_SESSION[username]'";
    $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
    $user = mysql_fetch_assoc($result);
    $userIsAdmin = userIsAdmin($user);
?>
