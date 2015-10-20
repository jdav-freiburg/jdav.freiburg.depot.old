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
        Ausr�stung reservieren, um sie ausleihen zu k�nnen.
    </article>
    <article>
        <h2>Wie melde ich mich an?</h2>
        Durch einen Klick auf Anmelden im Login-Fenster kommst du zu einem
        Formular. Dieses Formular musst du vollst�ndig ausf�llen. Wenn du es
        vollst�ndig ausgef�llt hast, kannst du dich durch einen Klick auf die Schaltfl�che
        anmelden registrieren. Deine Daten gehen sofort per e-Mail an die Administratoren.
        Wenn deine Daten vollst�ndig sind und du zur Ausleihe berechtigt bist, wird dein
        Account baldm�glichst vn Ihnen freigeschaltet. Erst dann kannst du dich einloggen!
    </article>
    <article>
        <h2>Wie reserviere Ich Ausr�stung?</h2>
        Wenn du erfolgreich registriert bist und ein Admin deinen Account freigeschaltet hat,
        kannst du durch einen Klick auf "Neue Reservierung" eine Reservierung erstellen.
        Trage die Daten ein, zu denen du die Ausr�stung abholst und wieder zur�ckbringst! Nicht
        die Daten deiner Tour!!! Mit der Schaltfl�che "Daten best�tigen" kommst du auf eine Seite,
        auf der du alle Artikel siehst. Zum reservieren markierst du einfach die K�stchen neben den
        Artikeln die du reservieren m�chtest und klickst auf "Ausr�stung reservieren". Ausr�tungsteile
        mit dem Hinweis "Bereits ausgeliehen" sind schon ausgeliehen und k�nnen von dir nicht reserviert
        werden! Abschlie�end kommst du auf eine Seite, auf der deine Reservation noch einmal
        zusammengefasst ist. !!!Drucke diese Seite am besten aus!!! damit du sp�ter auch weist, was f�r
        Ausr�stung du reserviert hast!
    </article>
    <article>
        <h2>Wie bekomme Ich die Ausr�stung?</h2>
        Um die Ausr�stung zu bekommen, die du reserviert hast, triffst du dich am eingegebenen
        Abholtermin (oder sp�ter(aber nicht fr�her!!!)) mit deinem Gruppenleiter, der dir die Ausr�stung aush�ndigt.
        Bitte f�lle dort auch die Karteikarten deiner Ausr�stungsteile vollst�ndig und korrekt aus!
        Wenn irgendetwas nicht genau mit der Online-reservierung �bereinstimmen sollte, �berlege dir
        eine L�sung, die keinen ohne Ausr�stung dastehen l�sst! Kontaktiere in Zweifelsf�llen die
        Verantwortlichen und �ndere deine Online Reservierung so ab, dass sie wieder stimmt!
    </article>
    <article>
        <h2>Wie �ndere Ich Reservierungen?</h2>
        Durch einen Klick auf "Reservierung �ndern" erscheint ein Fenster in dem alle deine Reservierungen
        zu sehen sind. Hier kannst du neue Artikel deiner Reservierung hinzuf�gen (Verf�gbarkeit
        bitte im linken Dropdown-Fenster �berpr�fen), die Daten �ndern, einzelne Artikel und die gesamte Reservierung
        l�schen.
    </article>
</main>
<?php require "../templates/footer.php"; ?>