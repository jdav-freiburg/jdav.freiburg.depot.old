<?php
    $sql="
        SELECT u.uname, u.uschlussel, u.ugruppe, u.umail, r.rnr, r.rdatumvon, r.rdatumbis, r.rziel, r.rbemerkung
        FROM $tab_user AS u, $tab_reservierung AS r
        WHERE r.unr = u.unr
        $sql_untilDateCheck
        ORDER BY r.rdatumvon
        ";
    $resultat = mysql_query($sql);

    echo "<main>";

    while ($rdaten = mysql_fetch_array($resultat)) {

        echo "
<section class='reservation'>
    <aside>$rdaten[rnr]</aside>
    <header>
        <h1>Ausfahrt: $rdaten[rziel]<br>$rdaten[rdatumvon] - $rdaten[rdatumbis]</h1>
    </header>
    <article class='about'>reverviert von: <a href=mailto:$rdaten[umail]>$rdaten[uname]</a>, Telefon: $rdaten[rbemerkung]</article>
    <table class='items'>
            ";

        $sql = "
            SELECT count(*), a.aname, a.abeschreibung
            FROM $tab_artikel AS a, $tab_enthaelt AS e
            WHERE e.rnr = '$rdaten[rnr]'
            AND e.anr = a.anr
            GROUP BY a.aname, a.abeschreibung
            ORDER BY a.aname, a.abeschreibung
            ";
        $result = mysql_query($sql);

        while ($adaten = mysql_fetch_row($result)) {

            echo "
        <tr>
            <td class='count'>$adaten[0]</td>
            <td>$adaten[1] <span class='description'>($adaten[2])</span></td>
        </tr>
            ";

        }

        echo "
    </table>
</section>
            ";

    }

    echo "</main>";
?>