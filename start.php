<?php
     require "config.inc";
     connect();
     // Ab hier nach jedes connect einfügen
     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] and $check['ustatus']!=1)

     {
      echo "<link rel=stylesheet type=text/css href=format.css>
      <h2> Du bist nicht eingeloggt! <a href=login.php>Bitte einloggen</a>";
     }

     else {
     // bis hier



  $sql = "INSERT INTO $tab_message( munr, mmessage, mdatum )
VALUES ( '$_SESSION[usernr]', '$_POST[smessage]', '$_POST[sdatum]' ) ";     // 1 bitte durch usernr. ersetzen
  $result = mysql_query($sql);
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
         <tr bgcolor="#57b065"><h1> Herzlich Willkommen bei der
         Depotverwaltung vom JDAV Freiburg </h1></tr>
         <tr><h1>Hier kannst du wichtige Nachrichten hinterlassen</h1><h4>

                      <?php

                        $sql = " SELECT u.uname AS uname , u.umail AS umail, m.mmessage AS mmessage, m.mdatum  AS mdatum
                                 FROM $tab_user AS u, $tab_message AS m
                                 WHERE u.unr = m.munr
                                 ORDER  BY m.mdatum DESC
                                 LIMIT 0 , 7";
                        $result=mysql_query($sql);
                        while ($mdaten=mysql_fetch_row($result)){
                              echo"
                              <tr bgcolor=#80FF80> <a href=mailto:$mdaten[1]>$mdaten[0]</a> schrieb am $mdaten[3] : </tr>
                              <tr bgcolor=#FFFFFF> $mdaten[2] <br><br> </tr>
                                  ";
                        }
                      ?>

                      </tr>
         <tr bgcolor="#57b065">Nachricht:<input name="smessage" lenght=300 lenght=100>
                     <input name="susername" type="hidden" value="$_SESSION['susername']">
                     <input name="sdatum" type="hidden" value="<?php echo date("Y-m-d H:i:s")?>" >
                     <input type="submit" value="Nachricht abschicken">  </h4></tr>
         <tr bgcolor="#57b065"><a href="archiv.php">
                               Alle Nachrichten (Archiv)</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>

<?php
}  // ende des schutz ifs    ?>