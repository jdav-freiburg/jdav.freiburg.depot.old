<?php
 require "config.inc";
 connect();
                  // Ab hier nach jedes connect einfügen
     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] and $check['status']!=1)

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
         <tr bgcolor="#57b065"><h1> Statistik </h1></tr>
         <tr><h1>Hier siehst du ein paar Statistiken über diese Seite</h1><h4>
     </table>
     <table align="center"  width="80%" >
       <?php
       //Reservierungen gesamt
            echo "<tr bgcolor=#80FF80> Reservierungen gesamt:</tr>";

                 $sql="SELECT rnr
                       FROM $tab_reservierung";
                 $resultat=mysql_query($sql);
                 $anzahl = mysql_num_rows($resultat);
            echo "<tr>Bisher wurden $anzahl Reservierungen abgegeben<br><br></tr>";

       // Reservierungen im letzten Monat
            echo "<tr bgcolor=#80FF80> Reservierungen im letzten Monat:</tr>";

                 $sql="SELECT rnr
                       FROM $tab_reservierung
                       WHERE
                        ((rdatumbis)+31)>(CURRENT_DATE)
                       ";
                 $resultat=mysql_query($sql);
                 $monat = mysql_num_rows($resultat);
                 $prozent=  ($monat/$anzahl) *100 ;
            echo "<tr>Diesen Monat wurden $monat Reservierungen abgegeben
            ($prozent% aller Reservierungen)</tr><br>";
            
       // Meistreservierte Artikel
       
           echo "<tr bgcolor=#80FF80> Meistreservierte Artikel:</tr>";
               $sql="SELECT a.anr, a.aname as name, a.abeschreibung as b, COUNT( a.anr ) as anzahl
                     FROM `$tab_artikel` AS a, $tab_enthaelt AS e
                     WHERE a.anr = e.anr
                     GROUP BY a.anr
                     ORDER BY anzahl DESC
                     LIMIT 0 , 10 " ;
               $result = mysql_query($sql);
               echo "<tr> <ul>";
               while ($artikel = mysql_fetch_array($result)) {
                  echo "<li> $artikel[anzahl]-mal ausgeliehen:
                  $artikel[name] $artikel[b]";
               }
               echo "</ul> </tr>";

       //Anzahl Artikel
       
          echo "<tr bgcolor=#80FF80> Anzahl der Artikel:</tr>";

                 $sql="SELECT anr
                       FROM $tab_artikel
                       ";
                 $resultat=mysql_query($sql);
                 $anzahl = mysql_num_rows($resultat);
            echo "<tr>In der Datenbank sind $anzahl Artikel gespeichert</tr><br>";


        //letzte Ziele
            echo "<tr bgcolor=#80FF80> Die letzten Ziele:</tr>";
               $sql="SELECT r.rziel as ziel
                     FROM `$tab_reservierung` AS r
                     ORDER BY r.rdatumbis DESC
                     LIMIT 0 , 10 " ;
               $result = mysql_query($sql);
               echo "<tr> <ul>";
               while ($ziel = mysql_fetch_array($result)) {
                  echo "<li> $ziel[ziel]";
               }
               echo "</ul> </tr>";
               
        //USER
            echo "<tr bgcolor=#80FF80> Unsere angemeldeten User:</tr>";
               $sql="SELECT uname, umail, ugruppe, uschlussel
                     FROM `$tab_user`
                     ORDER BY ugruppe DESC
                     " ;
               $result = mysql_query($sql);

               while ($ziel = mysql_fetch_array($result)) {
                  echo "<tr><td> $ziel[uname]</td><td> <a href=mailto:$ziel[umail]>$ziel[umail]</a></td>
                            <td> $ziel[ugruppe] </td><td> Ausgabe durch $ziel[uschlussel]</td></tr>";
               }


        
        
?>


                      </h4>
         </table> <br>
     <table align="center"  width="90%" >

         <tr bgcolor="#57b065"><a href="start.php">
                               Zurück zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>
<?php
}  // ende des schutz ifs    ?>