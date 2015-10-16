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
 
 //hier wird der Reservierungskopf erneuert
     $sql = "UPDATE $tab_reservierung SET
            `rdatumvon` = '$_POST[rdatumvon]',
            `rdatumbis` = '$_POST[rdatumbis]',
            `rziel` = '$_POST[rziel]',
            `rbemerkung` = '$_POST[rbemerkung]' WHERE `rnr` = '$_POST[rnr]'";

     $tatsache = mysql_query($sql) or die("Konnte nicht schreiben");

 //hier werden Artikel hinzugefügt
     $sql="INSERT INTO `$tab_enthaelt` ( `rnr` , `anr` )
                  VALUES (
                  '$_POST[rnr]', '$_POST[neuerartikel]'
                  )";
      $tatsache1 = mysql_query($sql) or die("Konnte nicht schreiben");
      
 //hier werden artikel gelöscht
    $sql="DELETE FROM $tab_enthaelt WHERE rnr = '$_POST[rnr]' AND anr='$_POST[artikelnummer]' ";
    $tatsache2 =mysql_query ($sql) or die("Konnte nicht schreiben");

 //hier werden ganze Reservierungen gelöscht
    if ($_POST[rloschen]){$sql="DELETE FROM $tab_enthaelt WHERE rnr = '$_POST[rloschen]' ";
    $tatsache3 =mysql_query ($sql) or die("Konnte nicht schreiben");
    $sql="DELETE FROM $tab_reservierung WHERE rnr = '$_POST[rloschen]' ";
    $tatsache3 =mysql_query ($sql) or die("Konnte nicht schreiben");
    }
?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>

     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Reservierungen bearbeiten </h1></tr>
         <tr><h1>Hier kannst du alle deine Reservierungen auf einen Blick sehen!<br>
                 Um Sie zu bearbeiten, ändere den Inhalt der Felder und klicke auf Reservierung aktualisieren!</h1><h4>
     </table> <form method="post">
     <table align="center"  width="80%" >
       <?php
                                     //In dieser Nachfolgenden Abfrage das 1 durch $sessunr ersetzen
          $sql="SELECT u.uname,u.uschlussel,u.ugruppe,
                       r.rnr, r.rdatumvon, r.rdatumbis, r.rziel,r.rbemerkung
                FROM $tab_user AS u,$tab_reservierung AS r
                WHERE r.unr = u.unr
                AND r.unr = '$_SESSION[usernr]'
                AND ((r.rdatumbis)+1>(CURRENT_DATE))
                ORDER BY r.rdatumvon";
          $resultat=mysql_query($sql);
          while($rdaten = mysql_fetch_array($resultat)){
                     echo "<form method=post><tr heigth=20>          </tr><tr bgcolor=#57b065>
                        <td>Username: $rdaten[uname]</td>
                        <td> Reservierungsnummer: <input type=hidden name=rnr value=$rdaten[rnr]>$rdaten[rnr]</td><td></tr>
                        <tr bgcolor=#80FF80><td>von: <input name=rdatumvon value=$rdaten[rdatumvon]> </td>
                        <td>bis: <input name=rdatumbis value=$rdaten[rdatumbis]>
                        </td><td>Art der Ausfahrt: <input name=rziel value=$rdaten[rziel]></tr>
                        <tr bgcolor=#80FF80><td>Gruppe: $rdaten[ugruppe] </td>
                        <td>Ausgabe durch: $rdaten[uschlussel]</td>
                        <td>Telnr: <input name=rbemerkung value=$rdaten[rbemerkung]></tr>

                      ";









                        //hier beginnen die Artikel _________________________________


                                                       //Ab hier werden Artikel gesucht
                                                       $sql = " SELECT a.anr , a.aname , a.abeschreibung , a.agruppe
                                                                FROM $tab_artikel AS a , $tab_enthaelt AS e
                                                                WHERE e.rnr =  '$rdaten[rnr]'
                                                                AND e.anr = a.anr
                                                                ORDER  BY a.anr
                                                                ";
                                                       $result=mysql_query($sql);

                                                        while ($adaten=mysql_fetch_row($result)){    //Ausgabe
                                                         echo"

                                                          <tr bgcolor=#FFFFFF> <td> $adaten[0]</td><td>$adaten[1]</td><td>$adaten[2] <input type=checkbox name=artikelnummer value=$adaten[0]>Löschen?</td> </tr>

                                                          ";
                                                           }


                                // Hier enden die Artikel ______________________
                            // hier folgt das select mit bereits reserviertem
                           echo"
                           <tr bgcolor=#80FF80> <td> <h2>Bereits reservierte Artikel</h2> <SELECT >";
                                 $sql="SELECT a.anr,a.aname,a.abeschreibung
                                       FROM $tab_artikel AS a,$tab_enthaelt as e,$tab_reservierung as r
                                       WHERE (
                                          a.anr = e.anr
                                          AND e.rnr = r.rnr
                                          AND (
                                             ((r.rdatumvon) >= ('$rdaten[rdatumvon]') AND (r.rdatumvon)<= ('$rdaten[rdatumbis]'))
                                          OR ((r.rdatumbis) >= ('$rdaten[rdatumvon]') AND (r.rdatumbis)<= ('$rdaten[rdatumbis]'))
                                          OR ((r.rdatumvon) <= ('$rdaten[rdatumvon]') AND (r.rdatumbis)>= ('$rdaten[rdatumbis]'))
                                          OR ((r.rdatumvon) >= ('$rdaten[rdatumvon]') AND (r.rdatumbis)<= ('$rdaten[rdatumbis]'))
                                          ))

                                        ORDER BY a.anr  ";
                                 $insult = mysql_query($sql);
                                 while ($option= mysql_fetch_array($insult)) {
                                     echo "<OPTION value=$option[0]>$option[0] - $option[1] $option[2]";
                                   }
                             echo  //SELECT bei dem der Artikel reserviert wird
                              "
                            <td> <h4>Neuen Artikel hinzufügen
                            (bitte vorher links überprüfen ob die Ausrüstung frei ist)
                            <SELECT name=neuerartikel><option> ";
                                 $sql="SELECT a.anr,a.aname,a.abeschreibung
                                       FROM $tab_artikel AS a";
                                 $insult = mysql_query($sql);
                                 while ($option= mysql_fetch_array($insult)) {
                                     echo "<OPTION value=$option[0]>$option[0] - $option[1] $option[2]";
                                 }
                           echo "</select> </td><td></td></tr>
                           <tr bgcolor=#80FF80> <td> <input type=submit value='Reservierung aktualisieren'></form></td>
                           <td><form method=post>
                           <input type=hidden name=rnr value=$rdaten[rnr]>
                           <input type=hidden name=rloschen value=$rdaten[rnr]>
                           <input type=submit value='Reservierung löschen'></td><td></td></tr></form>
                           <tr><td><br><br><br><br></td></tr>";
                  } //ende while aller reservierungen
                      ?>

                      </h4>
         </table>
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