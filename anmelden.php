                                      <?php
 require "config.inc";
 connect();

?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>

     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Neu registrieren </h1></tr>
         <tr><h1>Hier kannst du dich kostenlos anmelden, um Ausrüstung reservieren zu können.
         
                 <h4> Deine Daten werden zuerst durch einen Administrator geprüft.
                 Erst nachdem er den Account freigeschaltet hat, kannst du Ausrüstung reservieren.
     </table>
     <table align="center"  width="90%" >
     <form method="post" action="anmeldebestatigung.php">

             <tr bgcolor=#80FF80>Name:    </tr>

             <tr bgcolor=#FFFFFF><br><input name="username" >
                   Vor- und Nachname eintragen
             <br> <br></tr>

             <tr bgcolor=#80FF80>Gruppe:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="ugruppe" >
                   Trage hier die Gruppe(n) ein, in der du aktiv bist.
             <br> <br></tr>

             <tr bgcolor=#80FF80>Verantwortlich:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="uschlussel" >
                   Trage hier den Namen der Person ein, die in deiner
                   Gruppe für die Ausrüstung verantwortlich ist und dir
                   die Ausrüstung aushändigt.
             <br> <br></tr>

              <tr bgcolor=#80FF80>Mailadresse:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="umail" >
                   Trage hier deine aktuelle Mailadresse ein.
             <br> <br></tr>



             <tr bgcolor=#80FF80>Passwort:    </tr>
             <tr bgcolor=#FFFFFF><br><input name="upw" type="password" >
                   Trage hier dein Passwort ein und merke es dir gut!
             <br> <br></tr>
                   <tr bgcolor=#80FF80><br><input type="submit" value="Anmelden">   </h4>
         </form></table>
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><a href="start.php">
                               Zurück zum Login</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>