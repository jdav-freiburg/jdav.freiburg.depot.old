<?php
    $page_title = "neue Reservierung angelegt";
    require "../login/denyNoLogin.php"; //FIXME deny "not-unlocked"!
    if ($loggedIn) {
        require "../templates/header.php";

        //Reservierung neu
        $sql= "
            INSERT INTO `$tab_reservierung` (  `unr` , `rdatumvon` , `rdatumbis` , `rziel` , `rbemerkung` )
            VALUES (
                '$_SESSION[usernr]', '$_POST[datumvon]', '$_POST[datumbis]', '$_POST[ort]', '$_POST[bemerkung]'
            )
        ";

        // 1 bitte durch session unr ersetzen
        $result = mysql_query($sql);
        $rnr = mysql_insert_id();


        //Artikel in reservierung
        $i = 1;
        $n = mysql_query("SELECT * FROM '$tab_artikel'");

        while ($i < $s ) {
            if (isset($_POST[$i])) {
                $sql= "INSERT INTO $tab_enthaelt(rnr, anr) VALUES ('$rnr', '$i')";
                $result = mysql_query($sql);
            }
            $i = $i + 1;
        }
?>
<?php showInfo("&#x1F605; Reservierung wurde gespeichert"); ?>
<main>
    <form method="post">
        <article>
            <header>Hier noch einmal deine Reservierungsdaten.
                Diese Seite musst du ausdrucken und wenn du die Sachen aus den Schränken holst im Ordner abheften!
            </header>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?php echo $_SESSION['username']; ?></td>
                </tr>
                <tr>
                    <td>Reservierungsnummer:</td>
                    <td><?php echo "$rnr";  ?></td>
                </tr>
                <tr>
                    <td>vom:</td>
                    <td><?php echo"$_POST[datumvon]";  ?></td>
                </tr>
                <tr>
                    <td>bis:</td>
                    <td><?php echo"$_POST[datumbis]";  ?></td>
                </tr>
                <tr>
                    <td>Art:</td>
                    <td><?php echo"$_POST[ort]";  ?></td>
                </tr>
                <tr>
                    <td>Bemerkung:</td>
                    <td><?php echo"$_POST[bemerkung]";  ?></td>
                </tr>
            </table>
        </article>
        <article>
            <header>Reservierte Ausrüstung</header>
            <table>
                <tr><td width="5%"> Anr.</td><td width="35%">Name</td><td width="55%">Beschreibung</td> </tr>
                <?php
                    $sql = "
                        SELECT a.anr, a.aname, a.abeschreibung
                        FROM $tab_artikel AS a, $tab_enthaelt AS e
                        WHERE e.rnr = '$rnr'
                        AND e.anr = a.anr
                    ";

                    $ergebnis = mysql_query($sql);
                    while ($a = mysql_fetch_row($ergebnis)) {
                        echo "<tr><td>$a[0]</td><td>$a[1]</td><td>$a[2]</td></tr>";
                    }
                ?>
            </table>
        </article>
    </form>
</main>
<?php
        $text = "Neue Reservierung
        Neue Reservierung: Nr. $rnr
        durch Username: $_SESSION[username]";

        if ($email_admin){
            mail($email_admin, "Neue Reservierung", $text);
        }
    }
    require "../templates/footer.php";
?>