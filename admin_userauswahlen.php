<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>
   <form method="post" action="admin_userbearbeiten.php">
     <table align="center"  width="40%" >
         <tr bgcolor="#57b065"><h1> User bearbeiten</h1></tr>
         <tr><h1>Um Userdaten zu verändern, wähle bitte den zu bearbeitenden User aus!</h1><h4>
                     <SELECT name="username" size=1>
                      <?php
                          require "config.inc";
                          connect();
                          $sql="SELECT uname
                                FROM $tab_user
                                ";
                          $result = mysql_query($sql);
                          while ($username = mysql_fetch_row($result)){
                             echo "<OPTION> $username[0]";
                          }
                      
                      ?>
                     </SELECT>

                     <input type="submit" value="User bearbeiten">  </h4>
                     </form>
                     <form method="post" action="admin_userloeschen.php">
                     <SELECT name="username" size=1>
                      <?php

                          $sql="SELECT uname
                                FROM $tab_user
                                ";
                          $result = mysql_query($sql);
                          while ($username = mysql_fetch_row($result)){
                             echo "<OPTION> $username[0]";
                          }

                      ?>
                     </SELECT>

                     <input type="submit" value="User löschen">  </h4>

                      </tr>
         <tr bgcolor="#57b065"><a href="admin.php">
                               Zurück zur Adminpage</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>