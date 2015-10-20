<!DOCTYPE html>
<html>
    <head>
        <meta charset="iso-8859-1">
        <title>JDAV Freiburg - Depot - <?php echo $page_title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $webroot; ?>/css/styles.css" media="all">

        <?php #Google Fonts embed code ?>
        <script type="text/javascript">
            (function() {
                var link_element = document.createElement("link"),
                    s = document.getElementsByTagName("script")[0];
                if (window.location.protocol !== "http:" && window.location.protocol !== "https:") {
                    link_element.href = "http:";
                }
                link_element.href += "//fonts.googleapis.com/css?family=Ubuntu:400";
                link_element.rel = "stylesheet";
                link_element.type = "text/css";
                s.parentNode.insertBefore(link_element, s);
            })();
        </script>
    </head>
    <body>
        <header id="header">
            <section class="admin">
                Mail an den Admin: <?php echo "<a href='mailto:$email_admin'>$email_admin</a>"; ?>
            </section>
            <a href="http://www.jdav-freiburg.de">
                <img src="<?php echo $webroot; ?>/media/logo.jdav.freiburg.png" alt="Logo des JDAV Freiburg" />
            </a>
            <h1><a href="<?php echo $webroot; ?>/">Depot</a></h1>
            <nav>
                <ul>
                    <li><a href="<?php echo $webroot; ?>/reservations">Reservierungs&uuml;bersicht</a></li>
                    <li><a href="<?php echo $webroot; ?>/reservations/new.php">Neue Reservierung</a></li>
                    <li><a href="<?php echo $webroot; ?>/reservations/edit.php" disabled>Reservierung bearbeiten</a></li>
                    <li><a href="<?php echo $webroot; ?>/profil.php" disabled>Profil</a></li>
                    <li><a href="<?php echo $webroot; ?>/statistik.php" disabled>Statistik</a></li>
                    <li><a href="<?php echo $webroot; ?>/help">Hilfe</a></li>
                    <?php
                        if ($userIsAdmin) {
                            echo "<li><a href='$webroot/admin'>Admin</a></li>";
                        }
                        if ($_SESSION['eingeloggt']) {
                            echo "<li><a href='$webroot/logout.php'>Logout</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>