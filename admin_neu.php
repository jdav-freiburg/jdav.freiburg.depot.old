<?php
 require "config.inc";
 connect();
          // Ab hier nach jedes connect einfügen (auf admin seiten)
     session_start();
     $sql="SELECT ustatus,urechte FROM $tab_user WHERE uname='$_SESSION[username]'";
           $result=mysql_query($sql) OR die("Es ist folgender Fehler aufgetreten: ".mysql_error());
           $check=mysql_fetch_assoc($result);

     if (!$_SESSION['eingeloggt'] and ($check['ustatus']!=1 and $check['urechte']!=1))

     {
      echo "<link rel=stylesheet type=text/css href=format.css>
      <h2> Du bist nicht eingeloggt! <a href=login.php>Bitte einloggen</a>";
     }
     else {
     // bis hier
 
 
     /*if(isset($_POST['loschen'])) { //Artikel löschen
          $sql = "DELETE FROM $tab_artikel WHERE anr = $_POST[anr]";
          $result = mysql_query($sql);
             if ($result)
                           {echo "<table align='center'  width=90% ><h2>Artikel Nr. $_POST[anr] wurde gelöscht </h2></table>";
                           }
          } */
     if (isset($_POST['neu'])){    //Artikel neu
           /*$sql= "SELECT anr FROM $tab_artikel WHERE anr =$_POST[anr]";
           $result= mysql_query($sql);
           if (!isset($result)) {echo "<h2>Artikel Nr. $_POST[anr] existiert bereits </h2>";}
           else{   */
           $sql= " INSERT INTO $tab_artikel( anr, aname, abeschreibung, agruppe )
                   VALUES ( '$_POST[anr]', '$_POST[aname]', '$_POST[abeschreibung]'
                             ,'$_POST[agruppe]')";
           $result = mysql_query($sql);
             if ($result) {echo "<table align=center  width=90% ><h2>Artikel Nr. $_POST[anr] wurde hinzugefügt </h2></table>";

                           }

     }
     
     if (isset($_POST['alter'])) {    // Artikel ändern
            $sql = " UPDATE `$tab_artikel`
            SET `aname` = '$_POST[aname]',`abeschreibung` = '$_POST[abesch]',`astatus` = '$_POST[astatus]'
            WHERE `Anr` = '$_POST[anr]' ";
            $result = mysql_query($sql);
             if ($result) {echo "<table align=center  width=90% ><h2>Artikel Nr. $_POST[anr] wurde geändert </h2></table>";

                           }
     }
?>
<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body>

     <table align="center"  width="90%" >
         <tr bgcolor="#57b065"><h1> Artikelverwaltung </h1></tr>
         <tr><h1>Hier kannst du Artikel hinzufügen</h1><h4>
     </table>

     <table align="center"  width="90%" >
        <tr bgcolor="#57b065"><h1>Neuen Artikel einfügen:</tr>
         <tr bgcolor="FFFFFF">
            <form method="post">
               <h4>
                 <input name='anr' length='30' value= <?echo $_POST[anr]+1; ?>>  Artikel Nummer  <br>
                 <input name='aname'length='30'>  Artikel Name    <br>
                 <input name='abeschreibung'length='30'>  Artikel Beschreibung    <br>
                 <SELECT name='agruppe'size='1' width='30'>
                                                   <?php /*
                                                     $sql = " SELECT agruppe
                                                     FROM $tab_artikel
                                                     GROUP BY agruppe
                                                     ";
                                                     $ergebnis=mysql_query($sql);
                    while($gruppe=mysql_fetch_row($ergebnis)){
                        echo "<option> $gruppe[0]";
                    }  */
                   ?>
                   <option> Seile </option>
                   <option> Halbseile</option>
                   <option> Spiel- und Statikseile</option>
                   <option> Helm </option>
                   <option> Sitzgurte </option>
                   <option> Brustgurte </option>
                   <option> Karabiner und Achter, Expressen</option>
                   <option> Ski </option>
                   <option> Sonde </option>
                   <option> Schaufel </option>
                   <option> Pieps </option>
                   <option> Pickel </option>
                   <option> Steigeisen </option>
                   <option> Schrauben </option>
                   <option> Zelte, Kocher </option>
                   <option > Biwaksäcke </option>
                   <option> Führer, Karten</option>
                   <option> Spiel- und  Liederbücher </option>
                   <option> Sonstiges </option>
                                  </select>
                  Artikel Gruppe    <br>
                  <input type=hidden name="neu" value="1">
                  <input type=submit value="Hinzufügen">
            </form>
         </tr>
         <tr bgcolor="#57b065"><a href="admin.php">
                               Zurück zur Adminpage</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>
<?php
}  // ende des schutz ifs    ?>