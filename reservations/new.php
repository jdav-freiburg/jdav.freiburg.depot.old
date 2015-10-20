<?php
    require "../_configs.php";
    $CURRENT_SITE = $SITE_NEW_RESERVATION;
    $page_title = "neue Reservierung";
    require "../login/denyNoLogin.php"; //FIXME deny "not-unlocked"!
    if ($loggedIn) {
        require "../_templates/header.php";
?>
<main>
    <form method="post" action="<?php echo $webroot; ?>/reservations/new_selectItems.php">
        <section>
            <label>Beginn der Reservierung (Entnahme aus den Schr&auml;nken)</label>
            <select name="tagvon">
                <option>01
                <option>02<option>03<option>04<option>05<option>06
                <option>07<option>08<option>09<option>10<option>11
                <option>12<option>13<option>14<option>15<option>16
                <option>17<option>18<option>19<option>20<option>21
                <option>22<option>23<option>24<option>25<option>26
                <option>27<option>28<option>29<option>30<option>31
            </select>
            <select name="monatvon">
                <option>01
                <option>02
                <option>03
                <option>04
                <option>05
                <option>06
                <option>07
                <option>08
                <option>09
                <option>10
                <option>11
                <option>12
            </select>
            <select name="jahrvon">
                <option>
                    <?php
                        $y = date("Y");
                        echo "$y<option>";
                        $y = $y + 1;
                        echo "$y";
                    ?>
            </select> (TT-MM-JJ)
        </section>
        <section>
            <label>Ende der Reservierung (R&uuml;ckgabe der Ausr&uuml;stung! Nicht Ende der Tour!)</label>
            <select name="tagbis">
                <option>01
                <option>02<option>03<option>04<option>05<option>06
                <option>07<option>08<option>09<option>10<option>11
                <option>12<option>13<option>14<option>15<option>16
                <option>17<option>18<option>19<option>20<option>21
                <option>22<option>23<option>24<option>25<option>26
                <option>27<option>28<option>29<option>30<option>31
            </select>
            <select name="monatbis">
                <option>01
                <option>02
                <option>03
                <option>04
                <option>05
                <option>06
                <option>07
                <option>08
                <option>09
                <option>10
                <option>11
                <option>12
            </select>
            <select name="jahrbis">
                <option>
                    <?php
                        $y = date("Y");
                        echo "$y<option>";
                        $y = $y + 1;
                        echo "$y";
                    ?>
            </select>  (TT-MM-JJ)
        </section>
        <section>
            <label>Art der Ausfahrt<label>
            <input name="ort">(zB Gruppenfahrt Jugend 2, pivate Hochtour ect)
        </section>
        <section>
            <label>Telefonnummer oder wichtige Bemerkung</label>
            <input name="hinweis">
        </section>
        <section>
            <input type="submit" value="Reservierungsdaten best&auml;tigen">
        </section>
    </form>
</main>
<?php } require "../_templates/footer.php"; ?>