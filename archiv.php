<?php
 require "config.inc";
 connect();


                          // Ab hier nach jedes connect einf�gen
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
   <form method="post">
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Nachrichtenarchiv </h1></tr>
         <tr><h1>Hier siehst du alle bisher gesendeten Nachrichten

                      <?php

                        $sql = " SELECT u.uname AS uname , m.mmessage AS mmessage, m.mdatum  AS mdatum
                                 FROM $tab_user AS u, $tab_message AS m
                                 WHERE u.unr = m.munr
                                 ORDER  BY m.mdatum DESC
                                 ";
                        $result=mysql_query($sql);
                        $anzahl=mysql_num_rows($result);
                        
                        echo "($anzahl Nachrichten)</h1><h4>";
                        while ($mdaten=mysql_fetch_row($result)){
                              echo"
                              <tr bgcolor=#80FF80> $mdaten[0] schrieb am $mdaten[2] : </tr>
                              <tr bgcolor=#FFFFFF> $mdaten[1] <br><br> </tr>
                                  ";
                        }
                      ?>

                      </tr>

         <tr bgcolor="#57b065"><a href="messages.php">
                               Zur�ck zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>
<?php
}  // ende des schutz ifs    ?>