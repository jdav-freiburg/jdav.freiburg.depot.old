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
 
 
 
      //Reservierung neu
              $sql= "INSERT INTO `$tab_reservierung` (  `unr` , `rdatumvon` , `rdatumbis` , `rziel` , `rbemerkung` )
                    VALUES (
                     '$_SESSION[usernr]', '$_POST[datumvon]', '$_POST[datumbis]', '$_POST[ort]', '$_POST[bemerkung]'
                    )";

               // 1 bitte durch session unr ersetzen
              $result = mysql_query($sql);
              $rnr = mysql_insert_id();
              


    //Artikel in reservierung
           $i=1;
           $n=mysql_query("SELECT * FROM '$tab_artikel'");

           while ($i < $s ){
            /* $var1= "$";
             $var2="_POST['$i']";
             $var="$var1$var2";
             echo $var ;    */
            if (isset($_POST[$i])){
                $sql= " INSERT INTO $tab_enthaelt( rnr,anr)
                        VALUES ( '$rnr', '$i')";
                $result = mysql_query($sql);
                     }
            $i=$i+1;
           }


?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>
   <form method="post">
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Reservierung wurde gespeichert </h1></tr>
         <tr><h1>Hier noch einmal deine Reservierungsdaten. Diese Seite musst du ausdrucken und wenn du die Sachen aus den Schränken holst im Ordner abheften!
                 </h1><h4>  </tr>
         <tr><td> Username:  </td><td><?php echo $_SESSION['username'];//ersetze potzi durch $_SESSIONusername ?></td></tr>
         <tr><td> Reservierungsnummer:  </td><td><?php echo "$rnr";  ?></td></tr>
         <tr><td> vom:  </td><td><?php echo"$_POST[datumvon]";  ?></td></tr>
         <tr><td> bis:  </td><td><?php echo"$_POST[datumbis]";  ?></td></tr>
         <tr><td> Art:  </td><td><?php echo"$_POST[ort]";  ?></td></tr>
         <tr><td> Bemerkung:  </td><td><?php echo"$_POST[bemerkung]";  ?></td></tr>
         <tr> </tr>
         <tr bgcolor=#80FF80><td> Reservierte Ausrüstung</td><td></td></table>

         <table align="center"  width="90%">

         <tr><td width="5%"> Anr.</td><td width="35%">Name</td><td width="55%">Beschreibung</td> </tr>
          <?php
           $sql="SELECT a.anr, a.aname, a.abeschreibung
                 FROM $tab_artikel AS a, $tab_enthaelt AS e
                 WHERE e.rnr = '$rnr'
                 AND e.anr = a.anr";
           $ergebnis=mysql_query($sql);
           while ($a=mysql_fetch_row($ergebnis)){
              echo "<tr><td>$a[0]</td><td>$a[1]</td><td>$a[2]</td></tr>";
           }

           $text= "Neue Reservierung
                        Neue Reservierung: Nr. $rnr
                        durch Username: $_SESSION[username]

                        Kontrolle unter www.jdav-freiburg.de/depot/uebersicht.php";
                if ($email_admin1){
                   mail($email_admin1,"Neue Reservierung",$text);
                }
                if ($email_admin2){
                   mail($email_admin2,"Neue Reservierung",$text);
                }
                if ($email_admin3){
                   mail($email_admin3,"Neue Reservierung",$text);
                }
           ?>
     </table>
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><a href="start.php">
                               Zurück zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>
<?php
}  // ende des schutz ifs    ?>