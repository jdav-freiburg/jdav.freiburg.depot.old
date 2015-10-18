<?php
    require "../login/denyNoAdmin.php";
    $page_title = "alle Reservierungen";
    require "../templates/header.php";
    if ($userIsAdmin) {
        require "../reservations/_reservations.php";
    }
    require "../templates/footer.php";
?>
