<?php
    $page_title = "Admin Bereich";
    require "../login/denyNoAdmin.php";
    if ($userIsAdmin) {
        require "../templates/header.php";
?>
<main>
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
</main>
<?php } require "../templates/footer.php"; ?>