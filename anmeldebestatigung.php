                               <?php
 require "config.inc";
 connect();
 $sql = "SELECT `uname`
FROM `$tab_user`
WHERE 1 AND `uname` = '$_POST[username]' ";
 $result = mysql_query($sql);
 if ($test = mysql_fetch_row($result) ){
   echo "<table align=center  width=90% ><h2>Usernr.
   existiert bereits! Anmeldung fehlgechlagen!</h2></table> ";
 }
 else {$sql = "INSERT INTO `$tab_user`
 ( `uname` , `ugruppe` , `uschlussel`, `urechte` , `ustatus`  , `umail` ,  `upw` )
VALUES (
'$_POST[username]', '$_POST[ugruppe]', '$_POST[uschlussel]','0','0', '$_POST[umail]', '$_POST[upw]'
)
";

 $result = mysql_query($sql);
 if ($result){
  echo "<table align=center  width=90% ><h2> Die Userdaten wurden erfolgreich gespeichert</table>";
 }
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
         <tr bgcolor="#57b065"><h1> Deine Userdaten </h1></tr>
         <tr><h1>Das sind dein deine Userdaten. Bitte aufbewahren! (Speichern oder ausdrucken)
                 <h2>Ausr&uuml;stung reservieren kannst du erst wenn ein Administrator
                 deinen Account aktiviert hat.</h2><h4>
     </table>
     <table align="center"  width="90%" >
       <?php

                          $sql="SELECT *
                                FROM $tab_user
                                WHERE uname= '$_POST[username]'";
                          $result = mysql_query($sql);
                          $userdaten = mysql_fetch_array($result);
                     echo"

                        <tr><td>Usernummer:</td><td>$userdaten[0]</td></tr>
                        <tr><td>Username:</td><td>$userdaten[1]</td></tr>
                        <tr><td>Gruppe:</td><td>$userdaten[2]</td></tr>
                        <tr><td>Verantwortlich:</td><td>$userdaten[3]</td></tr>
                        <tr><td>E-mail:</td><td>$userdaten[4]</td></tr>

                        Deine Daten wurden an den Administrator versandt und
                        der Account wird in K&uuml;rze aktiviert.";
                $text= "


                User Neuregistrierung
                        Es hat sich ein User mit folgenden Daten registriert:
                        Usernummer:$userdaten[0]
                        Username:$userdaten[1]
                        Gruppe:$userdaten[2]
                        Verantwortlich:$userdaten[3]
                        E-mail:$userdaten[4]
                        Wenn diese Daten korrekt sind, bitte durch klick auf folgenden Link
                        aktivieren:

                        www.jdav-freiburg.de/depot/admin_aktivieren.php?unr=$userdaten[0]

                        ";
                if ($email_admin){
                   mail($email_admin,"Neuanmeldung",$text);
                }
                ?>

     </table>
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><a href="messages.php">
                               Zur&uuml;ck zum Login</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>