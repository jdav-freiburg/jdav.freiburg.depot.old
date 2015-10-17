<?php
    require "../login/denyNoAdmin.php";
    $page_title = "JDAV Freiburg - Depot - Admin Bereich";
    require "../global-layout/header.php";
    if ($userIsAdmin) {
?>
<main>
    <h1>Admin-Bereich</h1>
    <h1>Hier kannst du verschiedenste Daten administrieren</h1><h4>
    <nav>
        <ul>
            <li><a href="admin_artikel.php">Artikel verwalten</a></li>
            <li><a href="admin_neu.php">Artikel hinzuf&uuml;gen</a></li>
            <li><a href="admin_liste.php">Artikelliste</a></li>
            <li><a href="listReservations.php">alle Reservierungen</a></li>
            <li><a href="admin_reservierung.php">Reservierungen verwalten</a></li>
            <li><a href="admin_userauswahlen.php">User verwalten</a></li>
        </ul>
    </nav>
<?php } require "../global-layout/footer.php"; ?>