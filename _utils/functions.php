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
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function showError($log) {
        if ($log) {
            if (is_array($log)) {
                for ($i = 0; $i < count($log); $i++) {
                    echo "<aside class='log error'>$log[$i]</aside>";
                }
            } else {
                echo "<aside class='log error'>$log</aside>";
            }
        }
    }

    function showInfo($log) {
        if ($log) {
            if (is_array($log)) {
                for ($i = 0; $i < count($log); $i++) {
                    echo "<aside class='log info'>$log[$i]</aside>";
                }
            } else {
                echo "<aside class='log info'>$log</aside>";
            }
        }
    }


    function js_console($log) {
        if ($log) {
            if (is_array($log)) {
                for ($i = 0; $i < count($log); $i++) {
                    echo "<script>console.log('$log[$i]');</script>";
                }
            }
            echo "<script>console.log('$log');</script>";
        }
    }

?>