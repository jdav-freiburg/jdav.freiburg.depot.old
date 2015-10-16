<?php
    // login logic, checks login, starts session
    require "../config.inc";
    connect();
    session_start();
    $sql="SELECT ustatus, urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
    $result = mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
    $check = mysql_fetch_assoc($result);

    if (!$_SESSION['eingeloggt'] and $check['status'] != 1) {
        echo "
<link rel='stylesheet' type='text/css' href='../css/styles.css'>
<content>
    <h1>Du bist nicht eingeloggt!</h1>
    <a href='../login.php'>Bitte einloggen</a>
</content>
        ";
    } else {
        // user is valid login, showing content
?>
<html>
    <head>
        <title>JDAV-Depot Reservierung</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <meta http-equiv="expires" content="0">
    </head>
    <body>
        <header>
             <h1>Reservierungs&uuml;bersicht</h1>
        </header>
        <content>
            <?php
                $sql="
                    SELECT u.uname, u.uschlussel, u.ugruppe, u.umail, r.rnr, r.rdatumvon, r.rdatumbis, r.rziel, r.rbemerkung
                    FROM $tab_user AS u, $tab_reservierung AS r
                    WHERE r.unr = u.unr
                    ORDER BY r.rdatumvon DESC
                    ";
                $resultat = mysql_query($sql);
                while($rdaten = mysql_fetch_array($resultat)) {
                    echo "
            <div class='reservation'>
                <table class='about'>
                    <tr>
                        <td class='name'>Username: <a href=mailto:$rdaten[umail]>$rdaten[uname]</a></td>
                        <td class='description'>Reservierungsnummer: $rdaten[rnr]</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>von: $rdaten[rdatumvon]</td>
                        <td>bis: $rdaten[rdatumbis]</td>
                        <td>Ausfahrt: $rdaten[rziel]</td>
                    </tr>
                    <tr>
                        <td>Gruppe: $rdaten[ugruppe]</td>
                        <td class='description'>Ausgabe durch: $rdaten[uschlussel]</td>
                        <td>Telnr: $rdaten[rbemerkung]</td>
                    </tr>
                </table>
                <table class='items'>
                        ";
                    $sql = "
                        SELECT a.anr, a.aname, a.abeschreibung, a.agruppe, a.astatus
                        FROM $tab_artikel AS a, $tab_enthaelt AS e
                        WHERE e.rnr = '$rdaten[rnr]'
                        AND e.anr = a.anr
                        ORDER BY a.anr
                        ";
                    $result = mysql_query($sql);
                    while ($adaten = mysql_fetch_row($result)) {
                        echo "
                    <tr>
                        <td class='id'>$adaten[0]</td>
                        <td class='name'>$adaten[1]</td>
                        <td class='description'>$adaten[2]</td>
                        <td>($adaten[4])</td>
                    </tr>
                        ";
                    }
                    echo "
                </table>
            </div>
                        ";
                }
            ?>
        </content>
        <footer>
            <a href="start.php">Zur&uuml;ck zur Startseite</a>
            <a href="hilfe.php">Hilfe</a>
        </footer>
    </body>
</html>
<?php
    }  // end of login if
?>