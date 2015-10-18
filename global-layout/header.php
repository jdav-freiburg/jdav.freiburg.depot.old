<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot; ?>/css/styles.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <img src="<?php echo $webroot; ?>/media/logo.jdav.freiburg.png" alt="Logo des JDAV Freiburg" />
            <h1><a href="<?php echo $webroot; ?>/">Depot</a></h1>
            <nav>
                <ul>
                    <li><a href="uebersicht.php"> Reservierungs&uuml;bersicht </a></li>
                    <li><a href="start.php"> Message-Board </a></li>
                    <li><a href="reservierung.php"> Neue Reservierung </a></li>
                    <li><a href="reservierungbearbeiten.php"> Reservierung bearbeiten </a></li>
                    <li><a href="profil.php"> Profil </a></li>
                    <li><a href="statistik.php"> Statistik </a></li>
                    <li><a href="hilfe.php"> Hilfe </a></li>
                    <li><a href="<?php echo $webroot; ?>/admin"> Admin </a></li>
                    <li><a href="logout.php"> Logout/in</a></li>
                </ul>
            </nav>
        </header>