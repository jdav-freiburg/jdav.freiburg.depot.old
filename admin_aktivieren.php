<?php
 require "config.inc";
 connect();
     session_start();
     $sql="SELECT ustatus,urechte,umail FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] and $check['ustatus']!=1 and $check['urechte']!=1)

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

     <table align="center"  width="40%" >
         <tr bgcolor="#57b065"><h1> User aktiviert</h1></tr>
         <tr><h1>User wurde aktiviert</h1><h4>  </tr> </table>

                      <?php
                          $sql="
                            UPDATE `$tab_user` SET `ustatus` = '1'
                            WHERE `unr` = '$_GET[unr]' LIMIT 1
                            ";
                          $result = mysql_query($sql);
                          if ($result) {
                            echo "<table align=center  width=40% ><h2> <tr>Der User wurde aktiviert</tr></table>";
                            $sql="
                                SELECT umail
                                FROM $tab_user
                                WHERE `unr` = '$_GET[unr]'
                                ";
                            $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
                            $check=mysql_fetch_assoc($result);
                            if ($check['umail']) {
                                mail($check['umail'],
                                "Account freigeschaltet",
                                "Dein Account ist freigeschaltet www.jdav-freiburg.de/depot");
                            }
                          }
                      ?>
                      </h4> <table align="center"  width="40%" >
         <tr bgcolor="#57b065"><a href="admin.php">
                               Zur&uuml;ck zur Adminpage</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     </table>

  </body>

</html>
<?php
}  // ende des schutz ifs    ?>