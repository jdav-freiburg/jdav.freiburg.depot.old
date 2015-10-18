<?php
 require "config.inc";
 connect();


     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] or $check['ustatus']!=1)

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
   <form method="post" action="artikel.php">
     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Ausr&uuml;stung reservieren </h1></tr>
         <tr><h1>Bitte gebe alle Daten korrekt ein</h1><h4>  </tr>
                <tr bgcolor=#80FF80> Beginn der Reservierung (Entnahme aus den Schr&auml;nken) </tr>
                <tr>   <br>  <SELECT name="tagvon">
                            <option>01
                            <option>02<option>03<option>04<option>05<option>06
                            <option>07<option>08<option>09<option>10<option>11
                            <option>12<option>13<option>14<option>15<option>16
                            <option>17<option>18<option>19<option>20<option>21
                            <option>22<option>23<option>24<option>25<option>26
                            <option>27<option>28<option>29<option>30<option>31
                         </SELECT>

                         <SELECT name="monatvon">
                            <option>01
                            <option>02
                            <option>03
                            <option>04
                            <option>05
                            <option>06
                            <option>07
                            <option>08
                            <option>09
                            <option>10
                            <option>11
                            <option>12
                         </SELECT>
                         <SELECT name="jahrvon">
                            <option> <?php  $y=date("Y");
                                            echo"$y<option>";
                                            $y=$y+1;
                                            echo"$y"; ?>
                        </SELECT> (TT-MM-JJ)
                        <br><br>
                   <tr bgcolor=#80FF80> Ende der Reservierung (R&uuml;ckgabe der Ausr&uuml;stung! Nicht Ende der Tour!) </tr>
                <tr><br>     <SELECT name="tagbis">
                            <option>01
                            <option>02<option>03<option>04<option>05<option>06
                            <option>07<option>08<option>09<option>10<option>11
                            <option>12<option>13<option>14<option>15<option>16
                            <option>17<option>18<option>19<option>20<option>21
                            <option>22<option>23<option>24<option>25<option>26
                            <option>27<option>28<option>29<option>30<option>31
                         </SELECT>

                         <SELECT name="monatbis">
                            <option>01
                            <option>02
                            <option>03
                            <option>04
                            <option>05
                            <option>06
                            <option>07
                            <option>08
                            <option>09
                            <option>10
                            <option>11
                            <option>12
                         </SELECT>
                         <SELECT name="jahrbis">
                            <option> <?php  $y=date("Y");
                                            echo"$y<option>";
                                            $y=$y+1;
                                            echo"$y"; ?>
                        </SELECT>  (TT-MM-JJ)
                         <br><br>
                        <tr bgcolor=#80FF80> Art der Ausfahrt </tr>
                        <tr> <br><input name="ort"> (zB Gruppenfahrt Jugend 2, pivate Hochtour ect)<br><br></tr>
                        
                        <tr bgcolor=#80FF80> Telefonnummer</tr>
                        <tr> <br><input name="hinweis"> oder wichtige Bemerkung  </tr>

                        <br>



                     <input type="submit" value="Reservierungsdaten best&auml;tigen">  </h4> </tr>
         <tr bgcolor="#57b065"><a href="messages.php">
                               Zur&uuml;ck zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               <br>Hilfe</a></tr>
     <table>
   </form>
  </body>

</html>
<?php
}  // ende des schutz ifs    ?>