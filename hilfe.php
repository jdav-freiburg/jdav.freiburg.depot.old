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
         <tr bgcolor="#57b065"><h1> Hilfe </h1></tr>
         <tr><h1>Hier findest du Antworten auf deine Fragen</h1><h4>
     </table>
     <table align="center"  width="80%" >
       <tr bgcolor=#80FF80> Was ist das hier?:</tr>
       <tr>Das ist die Depotreservierung der JDAV-Freiburg. Hier kannst du
           Ausrüstung reservieren, um sie ausleihen zu können. </tr><br>

       <tr bgcolor=#80FF80> Wie melde ich mich an?:</tr>
       <tr>Durch einen Klick auf Anmelden im Login-Fenster kommst du zu einem
           Formular. Dieses Formular musst du vollständig ausfüllen. Wenn du es
           vollständig ausgefüllt hast, kannst du dich durch einen Klick auf die Schaltfläche
           anmelden registrieren. Deine Daten gehen sofort per e-Mail an die Administratoren.
           Wenn deine Daten vollständig sind und du zur Ausleihe berechtigt bist, wird dein
           Account baldmöglichst vn Ihnen freigeschaltet. Erst dann kannst du dich einloggen!</tr><br>

       <tr bgcolor=#80FF80> Wie reserviere Ich Ausrüstung?:</tr>
       <tr>Wenn du erfolgreich registriert bist und ein Admin deinen Account freigeschaltet hat,
           kannst du durch einen Klick auf "Neue Reservierung" eine Reservierung erstellen.
           Trage die Daten ein, zu denen du die Ausrüstung abholst und wieder zurückbringst! Nicht
           die Daten deiner Tour!!! Mit der Schaltfläche "Daten bestätigen" kommst du auf eine Seite,
           auf der du alle Artikel siehst. Zum reservieren markierst du einfach die Kästchen neben den
           Artikeln die du reservieren möchtest und klickst auf "Ausrüstung reservieren". Ausrütungsteile
           mit dem Hinweis "Bereits ausgeliehen" sind schon ausgeliehen und können von dir nicht reserviert
           werden! Abschließend kommst du auf eine Seite, auf der deine Reservation noch einmal
           zusammengefasst ist. !!!Drucke diese Seite am besten aus!!! damit du später auch weist, was für
            Ausrüstung du reserviert hast!</tr><br>

       <tr bgcolor=#80FF80> Wie bekomme Ich die Ausrüstung?:</tr>
       <tr>Um die Ausrüstung zu bekommen, die du reserviert hast, triffst du dich am eingegebenen
           Abholtermin (oder später(aber nicht früher!!!)) mit deinem Gruppenleiter, der dir die Ausrüstung aushändigt.
           Bitte fülle dort auch die Karteikarten deiner Ausrüstungsteile vollständig und korrekt aus!
           Wenn irgendetwas nicht genau mit der Online-reservierung übereinstimmen sollte, überlege dir
           eine Lösung, die keinen ohne Ausrüstung dastehen lässt! Kontaktiere in Zweifelsfällen die
           Verantwortlichen und ändere deine Online Reservierung so ab, dass sie wieder stimmt!</tr><br>

       <tr bgcolor=#80FF80> Wie ändere Ich Reservierungen?:</tr>
       <tr>Durch einen Klick auf "Reservierung ändern" erscheint ein Fenster in dem alle deine Reservierungen
           zu sehen sind. Hier kannst du neue Artikel deiner Reservierung hinzufügen (Verfügbarkeit
           bitte im linken Dropdown-Fenster überprüfen), die Daten ändern, einzelne Artikel und die gesamte Reservierung
           löschen.</tr><br>

       <tr bgcolor=#80FF80> Was ist das Messageboard auf der Startseite:</tr>
       <tr>das Messageboard soll die Möglichkeit bieten, wichtige Nachrichten auszutauschen. Wenn
           zum Beispiel etwas defekt ist oder nicht zurückgebracht wurde sollte dies dort bekannt gemacht
           werden.  </tr><br>

       <tr bgcolor=#80FF80> Was ist neu in der Version 3.0?:</tr>
       <tr><ul>
           <li>Neues Layout
           <li>Übersichtliche Gestaltung
           <li>Bessere Useridentifikation durch Accounts
           <li>Messageboard zur Kommunikation
           <li>Login
           <li>Hilfe
           <li>Reservierungen können geändert werden
           <li>Verbesserte Datumseingabe !!! Ausgabe ist gleichgeblieben (JJJJ-MM-TT)!!!
           <li>Ausgebaute Administrationsfunktionen
           <li>Ausrüstungsgruppen
           <li>einfach alles :-)
       </ul> </tr><br>


                      </h4>
         </table>
     <table align="center"  width="90%" >

         <tr bgcolor="#57b065"><a href="start.php">
                               Zurück zur Startseite</a></tr>
         <tr bgcolor="#57b065"><a href="hilfe.php">
                               Hilfe</a></tr>
     <table>

  </body>

</html>