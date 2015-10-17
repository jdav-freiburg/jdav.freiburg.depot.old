<?php
    session_start();

    require "_configs.php";
    $page_title = "JDAV Freiburg - Depot - Login";
    require "global-layout/header.php";

    require "utils/functions.php";
    connectDatabase($dbServer, $dbUser, $dbPassword, $dbName);

    $_SESSION["username"] = $_POST["lusername"];
    $_SESSION["userpw"] = $_POST["lpw"];

    $user = $_REQUEST["lusername"];
    $pass = $_REQUEST["lpw"];

    $sql = "SELECT unr, upw, ustatus, urechte FROM $tab_user WHERE uname = '$user'";
    $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
    $check = mysql_num_rows($result);

    if ($check < 1) {
        message("User ist nicht vorhanden");
    } else {
        $wert = mysql_fetch_assoc($result);
        $passwort = $wert['upw'];
    }

    if ($pass != $passwort or !isset($wert)) {
        message("Falsches Passwort bitte neu einloggen!");
        session_destroy();
?>
<main>
    <h2>Log-In</h2>
    <h3>Bitte logge dich ein</h3>
    <?php require "login/loginForm.php"; ?>
</main>
<?php
    } else {
        $_SESSION['eingeloggt'] = TRUE;
        $_SESSION['usernr'] = $wert['unr'];
        $_SESSION['userrechte'] = $wert['urechte'];
?>
<main>
    <a href="<?php echo $webroot; ?>/start.php">Hier geht es weiter</a>
</main>
<?php } require "global-layout/footer.php"; ?>