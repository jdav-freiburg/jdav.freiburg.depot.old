<?php
      require "config.inc";
      connect();


      //Folgender Teil läuft nur wenn das Login fenster vorher Daten sendete
       session_start();
       $_SESSION["username"] = $_POST["lusername"];
       $_SESSION["userpw"] = $_POST["lpw"];

       $user=$_REQUEST["lusername"];
       $pass=$_REQUEST["lpw"];

           $sql="SELECT unr,upw,ustatus,urechte FROM $tab_user WHERE uname='$user'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_num_rows($result);
                                                  //Prüfung ob user vorhanden
           if($check<1) {
           echo "<link rel=stylesheet type=text/css href=format.css><h2>
           User ist nicht vorhanden";
           }
           else {
           $wert=mysql_fetch_assoc($result);
           $passwort= $wert['upw'];
           }
if($pass!=$passwort or !isset($wert)) {
    echo " <link rel=stylesheet type=text/css href=format.css><h2>
    Falsches Passwort bitte neu einloggen!";
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
         <tr><h1>Bitte logge dich ein</h1><h4>
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
}
else  {
      $_SESSION['eingeloggt']=1 ;
      $_SESSION['usernr']=$wert['unr'];
      $_SESSION['userrechte']=$wert['urechte'];

      echo '<link rel=stylesheet type=text/css href=format.css>
      <center><h2><a href="start.php">Hier geht es weiter</a>


      ';

      }  //ende else user einloggen

?>