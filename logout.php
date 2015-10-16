<?php
      require "config.inc";
      connect();


      //Folgender Teil läuft nur wenn das Login fenster vorher Daten sendete
       session_start();

    session_destroy();
    echo '
          <html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>
   <form method="post" action="login.php">
     <table align="center"  width="40%" >
         <tr bgcolor="#57b065"><h1> Log-In </h1></tr>
         <tr><h2>Du wurdest erfolgreich ausgeloggt! Du kannst dich wieder anmelden oder
         auf <a href=http://www.jdav-freiburg.de> www.jdav-freiburg.de </a> zurück gehen</h1><h4>
                     <input name="lusername"> Username<br>
                     <input name="lpw" type="password"> Passwort <br>
                     <input type="submit" value="Einloggen">  </h4> </tr>
         <tr bgcolor="#57b065"><a href="anmelden.php">
                               Wenn du noch nicht registriert bist kannst du
                                   dich hier kostenlos registrieren!</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>
    
    
    ';


?>