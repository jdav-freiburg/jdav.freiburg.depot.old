<?php
    require "../_configs.php";
    $CURRENT_SITE = $SITE_RESERVATIONS;
    $page_title = "alle Reservierungen";
    require "../login/denyNoLogin.php";
    if ($loggedIn) {
        require "../templates/header.php";
        $sql_untilDateCheck = "AND ((r.rdatumbis) + 1 > (CURRENT_DATE))"; //FIXME I assume that sql call works
        require "_reservations.php";
    }
    require "../templates/footer.php";
?>
