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
?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>

     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Ausrüstungsliste </h1></tr>
         <tr><h1>Diese aktuelle Ausrüstungsliste sollte in regelmäßigen Abständen ausgedruckt
                 werden und im Jugend-Depot ausgehängt werden.</h1><h4>
     </table>
     <table align="center"  width="90%" >
                      <?php
                        //suchen der 1. gruppe
                               $sql = " SELECT agruppe
                                 FROM $tab_artikel
                                 GROUP BY agruppe
                                 ORDER BY anr
                                 ";
                               $ergebnis=mysql_query($sql);
                               echo "<tr bgcolor=#FFFFFF> <td><h1>Anr.</td><td><h1>Artikelname</td><td><h1>Beschreibung</td><td>Status</td>  </tr>";
                             while ($gruppe=mysql_fetch_row($ergebnis)){

                                               echo " <tr bgcolor=#80FF80><td><h1> $gruppe[0]</td><td></td><td></td> <td></td>";
                                                       //Ab hier werden Artikel gesucht
                                                       $sql = " SELECT anr , aname , abeschreibung , agruppe , astatus
                                                                FROM $tab_artikel
                                                                WHERE agruppe= '$gruppe[0]'
                                                                ORDER  BY anr
                                                                ";
                                                       $result=mysql_query($sql);

                                                        while ($adaten=mysql_fetch_row($result)){    //Ausgabe
                                                         echo"

                                                          <tr bgcolor=#FFFFFF> <td> $adaten[0]</td><td>$adaten[1]</td><td>$adaten[2]</td><td>";
                                                                      if ($adaten[4]=="OK!") {
                                                             echo "<h3>";
                                                           }
                                                           else {
                                                           echo "<h2>";
                                                           }
                                                         echo"
                                                          ($adaten[4])</td>

                                                           </tr> </form>
                                                          ";
                                                           }

                              }  //ende while gruppe
                      ?>

                      </h4>
         </table>
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