<?php
    require "../_configs.php";
    $CURRENT_SITE = $SITE_NEW_RESERVATION;
    $page_title = "neue Reservierung - Material auswählen";
    require "../login/denyNoLogin.php"; //FIXME deny "not-unlocked"!
    if ($loggedIn) {
        require "../_templates/header.php";

        $datumvon = "$_POST[jahrvon]-$_POST[monatvon]-$_POST[tagvon]";
        $datumbis = "$_POST[jahrbis]-$_POST[monatbis]-$_POST[tagbis]";
?>
<main>
    <form method='post' action="<?php echo $webroot; ?>/reservations/save.php">
        <div class="formHeader">
            <h1> Ausrüstung reservieren </h1>
            <p>Um Ausrüstung für den angegebenen Zeitraum zu reservieren, markiere die jeweiligen Ausrüstungsteile in der Spalte "Reservieren"</p>
                Du reservierst Ausrüstung für den Zeitraum:
            <h1>von:  <?php echo $datumvon ; ?> bis:  <?php echo $datumbis ; ?></h1>
            <h4>für die Ausfahrt :<?php echo "$_POST[ort] ($_POST[hinweis])" ; ?></h4>
            <a href="new.php">Zurück um Daten zu ändern</a>
            <div class="formSubmit">
                <input type=submit value='Ausrüstung reservieren'>
            </div>
            <input type="hidden" name="datumvon" value="<?php echo $datumvon ; ?>">
            <input type="hidden" name="datumbis" value="<?php echo $datumbis ; ?>">
            <input type="hidden" name="unr" value="<?php echo "$_SESSION[unr]" ; //Usernr. 1 bitte ersetzen durch $_SESSION[unr] ?>">
            <input type="hidden" name="ort" value="<?php echo "$_POST[ort]" ; ?>">
            <input type="hidden" name="bemerkung" value="<?php echo "$_POST[hinweis]" ; ?>">
        </div>
        <table class="formArticles" align="center"  width="90%" >
            <?php
                //suchen der 1. gruppe
                $sql = "
                    SELECT agruppe
                    FROM $tab_artikel
                    GROUP BY agruppe
                    ORDER BY anr
                 ";
                $ergebnis=mysql_query($sql);

                echo "<tr><td><h1>Anr.</td><td><h1>Artikelname</td><td><h1>Beschreibung</td><td><h1>Reservieren</td><td></td>  </tr>";

                while ($gruppe=mysql_fetch_row($ergebnis)) {

                    echo "<tr><td><h1> $gruppe[0]</td><td></td> <td></td><td></td><td></td></tr>";

                    //Ab hier werden Artikel gesucht
                    $sql = "
                      SELECT anr , aname , abeschreibung , agruppe ,astatus
                      FROM $tab_artikel
                      WHERE agruppe= '$gruppe[0]'
                      ORDER  BY anr
                    ";
                    $result=mysql_query($sql);

                    while ($adaten=mysql_fetch_row($result)) {
                        echo "<tr><td> $adaten[0]</td><td>$adaten[1]</td><td>$adaten[2]</td><td>";
                        if ($adaten[4]=="OK!") {
                            echo "<h3>";
                        } else {
                            echo "<h2>";
                        }
                        echo "($adaten[4])</td><td>";

                        $mql = "
                            SELECT r.rdatumvon, r.rdatumbis
                            FROM $tab_reservierung AS r, $tab_enthaelt AS e
                            WHERE e.anr = '$adaten[0]'
                            AND e.rnr = r.rnr
                        ";
                        $resultat=mysql_query($mql);

                        while ($ab = mysql_fetch_row($resultat)) {
                            if ($datumvon >= $ab[0] and $datumvon <= $ab[1]
                               or $datumbis <= $ab[1] and $datumbis >= $ab[0]
                               or $datumvon >= $ab[0] and $datumbis <= $ab[1]
                               or $datumvon <= $ab[0] and $datumbis >= $ab[1]) {
                                echo "<h2>Artikel bereits reserviert!";
                            }
                        }

                        echo "<input type=checkbox name='$adaten[0]' value='2'>";
                        echo "</td></tr>";
                    }
                }
            ?>
        </table>
    </form>
</main>
<?php } require "../_templates/footer.php"; ?>