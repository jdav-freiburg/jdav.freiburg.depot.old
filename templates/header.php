<html>
    <head>
        <title>JDAV Freiburg - Depot - <?php echo $page_title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot; ?>/css/styles.css">
        <meta charset="iso-8859-1">
    </head>
    <body>
        <header>
            <section class="admin">
                Mail an den Admin: <?php echo "<a href='mailto:$email_admin'>$email_admin</a>"; ?>
            </section>
            <img src="<?php echo $webroot; ?>/media/logo.jdav.freiburg.png" alt="Logo des JDAV Freiburg" />
            <h1><a href="<?php echo $webroot; ?>/">Depot</a></h1>
            <nav>
                <ul>
                    <li><a href="<?php echo $webroot; ?>/reservations">Reservierungs&uuml;bersicht</a></li>
                    <li><a href="<?php echo $webroot; ?>/messages.php">Message-Board</a></li>
                    <li><a href="<?php echo $webroot; ?>/reservierung.php">Neue Reservierung</a></li>
                    <li><a href="<?php echo $webroot; ?>/reservierungbearbeiten.php">Reservierung bearbeiten</a></li>
                    <li><a href="<?php echo $webroot; ?>/profil.php">Profil</a></li>
                    <li><a href="<?php echo $webroot; ?>/statistik.php">Statistik</a></li>
                    <li><a href="<?php echo $webroot; ?>/hilfe.php">Hilfe</a></li>
                    <li><a href="<?php echo $webroot; ?>/admin">Admin</a></li>
                    <li><a href="<?php echo $webroot; ?>/logout.php">Logout/in</a></li>
                </ul>
            </nav>
        </header>