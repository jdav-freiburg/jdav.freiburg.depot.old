<?php
 require "config.inc";
 connect();
  // Ab hier nach jedes connect einfügen (auf admin seiten)
     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] and $check['ustatus']!=1 and $check['urechte']!=1)

     {
      echo "<link rel=stylesheet type=text/css href=format.css>
      <h2> Du bist nicht eingeloggt! <a href=login.php>Bitte einloggen</a>";
     }
     else {
     // bis hier
 
 
 $sql = "UPDATE `$tab_user` SET
`uname` = '$_POST[username]',
`ugruppe` = '$_POST[ugruppe]',
`uschlussel` = '$_POST[uschlussel]',
`umail` = '$_POST[umail]',
`urechte` = '$_POST[urechte]',
`ustatus` = '$_POST[ustatus]',
`upw` = '$_POST[upw]' WHERE `unr` = '$_POST[unr]' ";

 $result = mysql_query($sql);
 if ($result){
  echo "<table align=center  width=90% ><h2> Die Userdaten wurden erfolgreich geändert</table>";
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
         <tr bgcolor="#57b065"><h1> User bearbeiten </h1></tr>
         <tr><h1>Hier kannst du Userdaten verändern! Aber
                 nicht ohne Rücksprache mit dem jeweiligen User!
                 <h2>Das Ändern von Adminrechten sowie Statusänderungen
                 können die Funktionsfähigkeit des Users beeinträchtigen!!</h2><h4>
     </table>
     <table align="center"  width="90%" >
     <form method="post">
         <?php

                          $sql="SELECT *
                                FROM $tab_user
                                WHERE uname= '$_POST[username]'";
                          $result = mysql_query($sql);
                          $userdaten = mysql_fetch_array($result);
                ?>
             <tr bgcolor=#80FF80>Username:    </tr>
             <input name="unr" type="hidden" value="<?php echo$userdaten[0]?>" >
             <tr bgcolor=#FFFFFF><br><input name="username" value="<?php echo$userdaten[1]?>">
                   Hier kannst du den Usernamen ändern
             <br> <br></tr>

             <tr bgcolor=#80FF80>User ist Mitglied in dieser Gruppe:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="ugruppe" value="<?php echo$userdaten[2]?>">
                   Trage hier die Gruppe(n) ein, in der dieser User aktiv ist.
             <br> <br></tr>
             
             <tr bgcolor=#80FF80>Verantwortlich:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="uschlussel" value="<?php echo$userdaten[3]?>">
                   Diese Person ist für die Materialausgabe verantwortlich und besitzt einen Schlüssel
             <br> <br></tr>

              <tr bgcolor=#80FF80>Mailadresse:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="umail" value="<?php echo$userdaten[4]?>">
                   Trage hier die aktuelle Mailadresse des Users ein.
             <br> <br></tr>
             
             <tr bgcolor=#80FF80>Userrechte:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="urechte" value="<?php echo$userdaten[5]?>">
                   Trage hier die Rechte des Users ein ( 0 für Normale Rechte 1 für Adminrechte
             <br> <br></tr>
             
             <tr bgcolor=#80FF80>Userstatus:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="ustatus" value="<?php echo$userdaten[6]?>">
                   Hier kannst du User deaktivieren. Deaktivierte User bleiben gespeichert
                   können aber nicht reservieren (z.B. zur Strafe) 0 steht für inaktiv
                   1 für aktiv
             <br> <br></tr>
             
             <tr bgcolor=#80FF80>Passwort:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="upw" type="password" value="<?php echo$userdaten[7]?>">
                   Hier kannst du das Userpasswort ändern.
             <br> <br></tr>
                   <tr bgcolor=#80FF80><br><input type="submit" value="Userdaten ändern">   </h4>
         </form></table>
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><a href="admin.php">
                               Zurück zur Adminpage</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>
<?php
}  // ende des schutz ifs    ?>