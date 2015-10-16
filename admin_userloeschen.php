<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>
   <form method="post" action="admin_userbearbeiten.php">
     <table align="center"  width="40%" >
         <tr bgcolor="#57b065"><h1> User löschen</h1></tr>
         <tr>    <?php
                   require "config.inc";
                          connect();

                   $mysql="DELETE FROM $tab_user WHERE uname= '$_POST[username]'";
                   $tat=mysql_query($mysql);
                   if ($tat){ echo "<h1>User $_POST[username] wurde erfolgreich gelöscht!";
                             }
                      ?>
                      </tr>
         <tr bgcolor="#57b065"><a href="admin.php">
                               Zurück zur Adminpage</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>