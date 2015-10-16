<html>
  <head>
     <title>JDAV-Depot Reservierung</title>
     <link rel="stylesheet" type="text/css" href="format.css">
     <meta http-equiv="expires" content="0">
  </head>

  <body bgcolor="#57b065">

     <table align="right" table align="center" bgcolor="#80FF80" bordercolor="#57b065" border=2pt cellpadding="4">
         <tr><td>Mail an den Admin:</td>
         <?php
           require "config.inc";
           echo "<td><a href=mailto:$email_admin>$email_admin</a></td>";
         ?>
         </td></tr>
     </table>

   </form>
  </body>

</html>