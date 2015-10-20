<?php
    require "../_configs.php";
    $CURRENT_SITE = $SITE_EDIT_RESERVATION;
    $page_title = "Reservierung bearbeiten";
    require "../login/denyNoLogin.php";
    if ($loggedIn) {
    require "../templates/header.php";

    // hier wird der Reservierungskopf erneuert
    $sql = "UPDATE $tab_reservierung
            SET
                `rdatumvon` = '$_POST[rdatumvon]',
                `rdatumbis` = '$_POST[rdatumbis]',
                `rziel` = '$_POST[rziel]',
                `rbemerkung` = '$_POST[rbemerkung]'
            WHERE `rnr` = '$_POST[rnr]'";

    $tatsache = mysql_query($sql) or die("Konnte nicht schreiben");

    // hier werden Artikel hinzugefügt
    $sql = "INSERT INTO `$tab_enthaelt` (`rnr` , `anr`)
            VALUES ('$_POST[rnr]', '$_POST[neuerartikel]')";
    $tatsache1 = mysql_query($sql) or die("Konnte nicht schreiben");
      
    // hier werden artikel gelöscht
    $sql = "DELETE FROM $tab_enthaelt WHERE rnr = '$_POST[rnr]' AND anr = '$_POST[artikelnummer]'";
    $tatsache2 = mysql_query ($sql) or die("Konnte nicht schreiben");

    // hier werden ganze Reservierungen gelöscht
    if ($_POST[rloschen]) {
        $sql = "DELETE FROM $tab_enthaelt WHERE rnr = '$_POST[rloschen]'";
        $tatsache3 = mysql_query ($sql) or die("Konnte nicht schreiben");
        $sql = "DELETE FROM $tab_reservierung WHERE rnr = '$_POST[rloschen]' ";
        $tatsache3 = mysql_query ($sql) or die("Konnte nicht schreiben");
    }
?>
<main>
    <h1>Hier kannst Du Deine aktuellen Reservierungen ändern!</h1>
    <?php
        // In dieser Nachfolgenden Abfrage das 1 durch $sessunr ersetzen
        $sql = "SELECT r.rnr, r.rdatumvon, r.rdatumbis, r.rziel,r.rbemerkung
                FROM $tab_user AS u,$tab_reservierung AS r
                WHERE r.unr = u.unr
                    AND r.unr = '$_SESSION[usernr]'
                    AND ((r.rdatumbis) + 1 > (CURRENT_DATE))
                ORDER BY r.rdatumvon";
        $resultat = mysql_query($sql);

        while ($rdaten = mysql_fetch_array($resultat)) {

            echo "
    <section class='reservation'>
        <form method='post'>
            <input type='hidden' name='rnr' value='$rdaten[rnr]'>
            <input type='hidden' name='rloschen' value='$rdaten[rnr]'>
            <input type='submit' value='&#xe800;' class='icon' title='Reservierung löschen'>
        </form>
        <form method='post'>
            <input type='submit' value='&#xe803;' class='icon' title='Reservierung aktualisieren'>
            <aside>$rdaten[rnr]<input type='hidden' name='rnr' value='$rdaten[rnr]'></aside>
            <section>
                <label>von</label>
                <input type='text' name='rdatumvon' value='$rdaten[rdatumvon]' class='date'>
                <label>bis</label>
                <input type='text' name='rdatumbis' value='$rdaten[rdatumbis]' class='date'>
            </section>
            <section>
                <label>Art der Ausfahrt</label>
                <input type='text' name='rziel' value='$rdaten[rziel]'>
            </section>
            <section>
                <label>Telefon</label>
                <input type='text' name='rbemerkung' value='$rdaten[rbemerkung]'>
            </section>
            <table class='items'>
            ";

            // hier beginnen die Artikel _________________________________
            $sql = "SELECT count(*), a.aname , a.abeschreibung
                    FROM $tab_artikel AS a, $tab_enthaelt AS e
                    WHERE e.rnr =  '$rdaten[rnr]' AND e.anr = a.anr
                    GROUP BY a.aname, a.abeschreibung
                    ORDER BY a.aname, a.abeschreibung
                    ";
            $result = mysql_query($sql);

            while ($adaten = mysql_fetch_row($result)) {
                echo "
                <tr>
                    <td class='count'>
                        <span class='icon-plus'></span>
                        <span>$adaten[0]</span>
                        <span class='icon-minus'></span>
                    </td>
                    <td>$adaten[1] <span class='description'>($adaten[2])</span></td>
                </tr>";
            }

            //SELECT bei dem der Artikel reserviert wird
            echo "
            </table>
            <section>
                <label>Neuen Artikel hinzufügen</label>
                <select name='neuerartikel'>
                    <option>";

            $sql = "SELECT a.aname, a.abeschreibung
                    FROM $tab_artikel AS a
                    GROUP BY a.aname, a.abeschreibung
                    ORDER BY a.aname, a.abeschreibung";
            $insult = mysql_query($sql);
            while ($option = mysql_fetch_array($insult)) {
                echo "<option value='$option[0]#$option[1]'>$option[0] ($option[1])</option>";
            }

            echo "
                </select>
            </section>
        </form>

    </section>
            ";
        }
    ?>
</main>
<?php } require "../templates/footer.php"; ?>