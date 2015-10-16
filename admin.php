<?php
 require "config.inc";
 connect();
     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] or $check['urechte']!=1)

     {
      echo "<link rel=stylesheet type=text/css href=format.css>
      <h2> Du bist nicht eingeloggt! <a href=login.php>Bitte einloggen</a>";
     }
     else {
     // bis hier
?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>

     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Admin-Bereich</h1></tr>
         <tr><h1>Hier kannst du verschiedenste Daten administrieren</h1><h4>
     </table>
     <table align="center"  width="80%" >
       <tr bgcolor=#80FF80>
       <a href="admin_artikel.php">Artikel verwalten</a><br>
       <a href="admin_neu.php">Artikel hinzuf&uuml;gen</a><br>
       <br><a href="admin_liste.php">Artikelliste</a> <br>
       <br><a href="reservations/listReservations.php">alle Reservierungen</a> <br>
       <br><a href="admin_reservierung.php">Reservierungen verwalten</a><br>
       <br><a href="admin_userauswahlen.php">User verwalten</a> <br>
       </tr>
       <tr></tr><br>


                      </h4>
         </table>
     <table align="center"  width="90%" >

         <tr bgcolor="#57b065"><a href="start.php">
                               Zur&uuml;ck zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>
<?php
}  // ende des schutz ifs    ?>