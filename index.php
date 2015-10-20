<?php
    session_start();
    require "_configs.php";
    $page_title = "Startseite";

    require "_utils/functions.php";
    connectDatabase($dbServer, $dbUser, $dbPassword, $dbName);

    $loginSubmitted = $_POST["lusername"];

    if ($loginSubmitted) {
        $_SESSION["username"] = $_POST["lusername"];
        $_SESSION["userpw"] = $_POST["lpw"];

        $user = $_REQUEST["lusername"];
        $pass = $_REQUEST["lpw"];

        $sql = "SELECT unr, upw, ustatus, urechte FROM $tab_user WHERE uname = '$user'";
        $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: " . mysql_error());
        $check = mysql_num_rows($result);

        if ($check < 1) {
            $errors[] = "Der Benutzer ist nicht vorhanden.";
        } else {
            $wert = mysql_fetch_assoc($result);
            $passwort = $wert['upw'];
        }
    }

    if ($loginSubmitted and ($pass != $passwort or !isset($wert))) {
        $errors[] = "Das Passwort ist falsch.";
        session_destroy();
    } else if ($loginSubmitted) {
        $_SESSION['eingeloggt'] = TRUE;
        $_SESSION['usernr'] = $wert['unr'];
        $_SESSION['userrechte'] = $wert['urechte'];
    }

    require "_templates/header.php";

    if (!$_SESSION['eingeloggt']) {
        require "login/loginForm.php";
    }

    showError($errors);

    require "_templates/rules.php";
    require "_templates/footer.php";
?>
