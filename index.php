<?php
    $page_title = "JDAV Freiburg - Startseite";
    require "global-layout/header.php";
?>

<main>
    <h1> Depot-Regeln</h1></tr>

    Alle JugendleiterInnen und Mitglieder der Jugendgruppen können sich Ausrüstung bei uns kostenlos ausleihen.
    Der Materialverleih läuft auf Vertrauensbasis, weshalb sich alle an diese Regeln halten müssen!!
    <ol>
        <li>Ausleihen können alle Mitglieder der JDAV Freiburg nach Absprache mit ihren zuständigen LeiterInnen.</li>

        <li>Jugendgruppen haben immer Vorrang vor Einzelpersonen.</li>

        <li>Jeder richtet sich ein Konto bei der Online-Reservierung ein, trägt sich
            <a href="http://ml01.ispgateway.de/mailman/listinfo/depot_jdav-freiburg.de">hier</a> in den Verteiler
            <a href="http://ml01.ispgateway.de/mailman/listinfo/depot_jdav-freiburg.de">depot-at-jdav-freiburg.de</a>
            und in die Ausleiher-Innenkartei ein!</li>

        <li>Alle ausgeliehenen Sachen müssen zuerst hier im Internet reserviert werden.
            <b>Achtung: Neu: Die Reservierung wird ausgedruckt und beim Ausleihen in den "Ausgeliehen"-Ordner geheftet! </b></li>

        <li>Beim Gebrauch ist jedeR dafür verantwortlich, das Material auf Funktionstüchtigkeit zu überprüfen und
            Mängel sofort bei den Zuständigen (Jugendreferat oder Depotverwaltung) zu melden!</li>

        <li>Die Rückgabe erfolgt so schnell wie möglich und innerhalb des reservierten Zeitraums!</li>

        <li>Bei der Rückgabe wird der Reservierungsausdruck umgeheftet in den Ordner "zurück".</li>

        <li>Wer sich nicht an die Regeln hält, kommt auf die Schwarze Liste und kann nicht mehr ausleihen.</li>
    </ol>
    gez. Jugendreferat

    <h1>Mit dem Login akzeptierst du die Regelungen unseres Materialdepots</h1>
    <form method="post" action="login">
        <input name="lusername"> Username<br>
        <input name="lpw" type="password"> Passwort <br>
        <input type="submit" value="Einloggen">  </h4> </tr>
        <a href="anmelden.php">Wenn du noch nicht registriert bist kannst du dich hier kostenlos registrieren!</a>
        <a href="hilfe.php">Hilfe</a>
   </form>
<?php require "global-layout/footer.php"; ?>
