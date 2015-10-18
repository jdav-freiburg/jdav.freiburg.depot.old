<?php
    require "../login/denyNoLogin.php";
    $page_title = "alle Reservierungen";
    require "../templates/header.php";
    if ($loggedIn) {
        $sql_untilDateCheck = "AND ((r.rdatumbis) + 1 > (CURRENT_DATE))"; //FIXME I assume that sql call works
        require "_reservations.php";
    }
    require "../templates/footer.php";
?>
