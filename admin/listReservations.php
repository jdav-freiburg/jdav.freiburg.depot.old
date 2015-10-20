<?php
    require "../login/denyNoAdmin.php";
    $page_title = "alle Reservierungen";
    require "../_templates/header.php";
    if ($userIsAdmin) {
        require "../reservations/_reservations.php";
    }
    require "../_templates/footer.php";
?>
