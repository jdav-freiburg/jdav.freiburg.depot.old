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
         <tr bgcolor="#57b065"><h1> Reservierungsübersicht </h1></tr>
         <tr><h1>Hier kannst du alle Reservierungen auf einen Blick sehen</h1><h4>
     </table>
     <table align="center"  width="80%" >
       <?php
          $sql="SELECT u.uname,u.uschlussel,u.ugruppe,u.umail,
                       r.rnr, r.rdatumvon, r.rdatumbis, r.rziel,r.rbemerkung
                FROM $tab_user AS u,$tab_reservierung AS r
                WHERE r.unr = u.unr
                AND ((r.rdatumbis)+1>(CURRENT_DATE))
                ORDER BY r.rdatumvon";
          $resultat=mysql_query($sql);
          while($rdaten = mysql_fetch_array($resultat)){
                     echo "<tr heigth=20>          </tr><tr bgcolor=#57b065>
                        <td>Username: <a href=mailto:$rdaten[umail]>$rdaten[uname]</a></td><td> Reservierungsnummer: $rdaten[rnr]</td><td></td><td></tr>
                        <tr bgcolor=#80FF80><td>von: $rdaten[rdatumvon] </td><td>bis: $rdaten[rdatumbis]</td><td>Ausfahrt: $rdaten[rziel]</td><td></tr>
                        <tr bgcolor=#80FF80><td>Gruppe: $rdaten[ugruppe] </td><td>Ausgabe durch: $rdaten[uschlussel]</td><td>Telnr: $rdaten[rbemerkung]</td><td></tr>

                      ";
                     








                        //hier beginnen die Artikel _________________________________


                                                       //Ab hier werden Artikel gesucht
                                                       $sql = " SELECT a.anr , a.aname , a.abeschreibung , a.agruppe ,a.astatus
                                                                FROM $tab_artikel AS a , $tab_enthaelt AS e
                                                                WHERE e.rnr =  '$rdaten[rnr]'
                                                                AND e.anr = a.anr
                                                                ORDER  BY a.anr
                                                                ";
                                                       $result=mysql_query($sql);

                                                        while ($adaten=mysql_fetch_row($result)){    //Ausgabe
                                                         echo"

                                                          <tr bgcolor=#FFFFFF> <td> $adaten[0]</td><td>$adaten[1]</td><td>$adaten[2]</td><td> ";
                                                           if ($adaten[4]=="OK!") {
                                                             echo "<h3>";
                                                           }
                                                           else {
                                                           echo "<h2>";
                                                           }
                                                         echo"
                                                          ($adaten[4])</td><td>

                                                          </td> </tr>
                                                          <tr><td></td></tr>";
                                                           }


                                // Hier enden die Artikel ______________________

                      echo"<tr><td><br><br><br><br></td></tr>";
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

</html>                             <?php
}  // ende des schutz ifs    ?>