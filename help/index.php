<?php
    require "../login/startSession.php";
    $CURRENT_SITE = $SITE_HELP;
    $page_title = "Hilfe & FAQ";
    require "../templates/header.php";
    if (!$_SESSION['eingeloggt']) {
        require "../login/loginForm.php";
    }
    ?>
<main>
    <h1>Hier findest du Antworten auf deine Fragen</h1>
    <article>
        <h2>Was ist das hier?</h2>
        Das ist die Depotreservierung der JDAV-Freiburg. Hier kannst du
        Ausrüstung reservieren, um sie ausleihen zu können.
    </article>
    <article>
        <h2>Wie melde ich mich an?</h2>
        Durch einen Klick auf Anmelden im Login-Fenster kommst du zu einem
        Formular. Dieses Formular musst du vollständig ausfüllen. Wenn du es
        vollständig ausgefüllt hast, kannst du dich durch einen Klick auf die Schaltfläche
        anmelden registrieren. Deine Daten gehen sofort per e-Mail an die Administratoren.
        Wenn deine Daten vollständig sind und du zur Ausleihe berechtigt bist, wird dein
        Account baldmöglichst vn Ihnen freigeschaltet. Erst dann kannst du dich einloggen!
    </article>
    <article>
        <h2>Wie reserviere Ich Ausrüstung?</h2>
        Wenn du erfolgreich registriert bist und ein Admin deinen Account freigeschaltet hat,
        kannst du durch einen Klick auf "Neue Reservierung" eine Reservierung erstellen.
        Trage die Daten ein, zu denen du die Ausrüstung abholst und wieder zurückbringst! Nicht
        die Daten deiner Tour!!! Mit der Schaltfläche "Daten bestätigen" kommst du auf eine Seite,
        auf der du alle Artikel siehst. Zum reservieren markierst du einfach die Kästchen neben den
        Artikeln die du reservieren möchtest und klickst auf "Ausrüstung reservieren". Ausrütungsteile
        mit dem Hinweis "Bereits ausgeliehen" sind schon ausgeliehen und können von dir nicht reserviert
        werden! Abschließend kommst du auf eine Seite, auf der deine Reservation noch einmal
        zusammengefasst ist. !!!Drucke diese Seite am besten aus!!! damit du später auch weist, was für
        Ausrüstung du reserviert hast!
    </article>
    <article>
        <h2>Wie bekomme Ich die Ausrüstung?</h2>
        Um die Ausrüstung zu bekommen, die du reserviert hast, triffst du dich am eingegebenen
        Abholtermin (oder später(aber nicht früher!!!)) mit deinem Gruppenleiter, der dir die Ausrüstung aushändigt.
        Bitte fülle dort auch die Karteikarten deiner Ausrüstungsteile vollständig und korrekt aus!
        Wenn irgendetwas nicht genau mit der Online-reservierung übereinstimmen sollte, überlege dir
        eine Lösung, die keinen ohne Ausrüstung dastehen lässt! Kontaktiere in Zweifelsfällen die
        Verantwortlichen und ändere deine Online Reservierung so ab, dass sie wieder stimmt!
    </article>
    <article>
        <h2>Wie ändere Ich Reservierungen?</h2>
        Durch einen Klick auf "Reservierung ändern" erscheint ein Fenster in dem alle deine Reservierungen
        zu sehen sind. Hier kannst du neue Artikel deiner Reservierung hinzufügen (Verfügbarkeit
        bitte im linken Dropdown-Fenster überprüfen), die Daten ändern, einzelne Artikel und die gesamte Reservierung
        löschen.
    </article>
</main>
<?php require "../templates/footer.php"; ?>