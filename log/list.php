<?php
include("../bin/ini.php");
$call = mysql_real_escape_string($_GET["call_filter"]);
$log = mysql_real_escape_string($_SESSION["log"]);
if(in_array($log, $_SESSION['json']->allowed_logs)){
    // Ausführen einer SQL-Anfrage
    $query = "SELECT * FROM `$log` WHERE `call` LIKE '$call%' ORDER BY `id` DESC";
    $result = mysql_query($query) or die("Anfrage fehlgeschlagen: " . mysql_error());

    // Ausgabe der Ergebnisse in HTML
    ?>
    <table>
    <thead>
      <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Rufzeichen</th>
        <th scope="col">Frequenz</th>
        <th scope="col">Mode</th>
        <th scope="col">Datum</th>
        <th scope="col">UTC</th>
        <th scope="col">RST s</th>
        <th scope="col">RST r</th>
        <th scope="col">QTH</th>
        <th scope="col">Name</th>
        <th scope="col">DOK</th>
        <th scope="col">OP</th>
      </tr>
    </thead>
    <tbody>
    <?
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      echo "<tr>";
      foreach ($line as $col_value) {
          echo "\t\t<td>$col_value</td>\n";
      }
      echo "</tr>";
    }
    ?>
    </tbody>
<?php
}else{
    echo "Du kannst dieses Logbuch nicht einsehen!";
}
?>
