<?php
    function connectDatabase($dbServer, $dbUser, $dbPasswort, $dbName) {
        $connection = mysql_connect($dbServer, $dbUser, $dbPasswort) or die(mysql_error("Server nicht gefunden"));
        $db = mysql_select_db($dbName, $connection) or die(mysql_error("Datenbank nicht gefunden"));
    }

    function getHTMLContent($url){
        $doc = new DOMDocument("1.0", "UTF-8");
        $doc->preserveWhiteSpace = FALSE;
        @$doc->loadHTMLFile($url);
        return $doc->saveHTML();
    }

    function userIsAdmin($user) {
        if (!$_SESSION['eingeloggt'] or $user['urechte'] != 1) {
            echo getHTMLContent("../error/not-logged-in.html");
            return FALSE;
        } else {
            return TRUE;
        }
    }

?>