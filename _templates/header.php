<!DOCTYPE html>
<html>
    <head>
        <meta charset="iso-8859-1">
        <title>JDAV Freiburg - Depot - <?php echo $page_title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $webroot; ?>/_css/styles.css" media="all">

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
                <img src="<?php echo $webroot; ?>/_media/logo.jdav.freiburg.png" alt="Logo des JDAV Freiburg" />
            </a>
            <h1><a href="<?php echo $webroot; ?>/">Depot</a></h1>
            <nav>
                <ul>
                    <?php
                        function getActiveClass($currentSite, $link) {
                            if ($currentSite == $link) {
                                return "active";
                            }
                            return "";
                        }
                    ?>
                    <li>
                        <a href="<?php echo $webroot; ?>/reservations" class="<?php echo getActiveClass($CURRENT_SITE, $SITE_RESERVATIONS); ?>">
                            Reservierungs&uuml;bersicht
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $webroot; ?>/reservations/new.php" class="<?php echo getActiveClass($CURRENT_SITE, $SITE_NEW_RESERVATION); ?>">
                            Neue Reservierung
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $webroot; ?>/reservations/edit.php" class="<?php echo getActiveClass($CURRENT_SITE, $SITE_EDIT_RESERVATION); ?>">
                            Reservierung bearbeiten
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $webroot; ?>/profil.php" disabled class="<?php echo getActiveClass($CURRENT_SITE, $SITE_PROFILE); ?>">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $webroot; ?>/statistik.php" disabled class="<?php echo getActiveClass($CURRENT_SITE, $SITE_STATISTICS); ?>">
                            Statistik
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $webroot; ?>/help" class="<?php echo getActiveClass($CURRENT_SITE, $SITE_HELP); ?>">
                            Hilfe
                        </a>
                    </li>
                    <?php
                        if ($userIsAdmin) {
                            $activeClass = getActiveClass($CURRENT_SITE, $SITE_ADMIN);
                            echo "
                    <li>
                        <a href='$webroot/admin' class='$activeClass'>
                            Admin
                        </a>
                    </li>";
                        }
                        if ($_SESSION['eingeloggt']) {
                            echo "
                    <li>
                        <a href='$webroot/logout.php'>
                            Logout
                        </a>
                    </li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>
        <aside class="dev-message">work in progress</aside>