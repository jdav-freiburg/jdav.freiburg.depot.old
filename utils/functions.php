<?php
    function getHTMLContent($url){
        $doc = new DOMDocument("1.0", "UTF-8");
        $doc->preserveWhiteSpace = FALSE;
        @$doc->loadHTMLFile($url);
        return $doc->saveHTML();
    }

    function userIsAdmin($user) {
        if (!$_SESSION['eingeloggt'] and $user['status'] != 1) {
            echo getHTMLContent("../error/not-logged-in.html");
            return FALSE;
        } else {
            return TRUE;
        }
    }

?>