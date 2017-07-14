<?php
date_default_timezone_set('UTC');
include('ini.php');
if(in_array($_GET['log'], $_SESSION['json']->allowed_logs)){
    //Datei als Download
    $file_url = $_GET['log'].".adif";
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");

    //Datenbank export
    // Ausführen einer SQL-Anfrage
    $log = $mysql->real_escape_string($_GET['log']);
    $query = "SELECT * FROM `$log` ORDER BY `id`";
    $result = $mysql->query($query) or die("Anfrage fehlgeschlagen: " . $mysql->error);

?>
<ADX>
  <HEADER>
    <ADIF_VER>3.0.5</ADIF_VER>
    <PROGRAMID>TowerLog</PROGRAMID>
    <PROGRAMVERSION><? echo $TowerLogVersion; ?></PROGRAMVERSION>
    <CREATED_TIMESTAMP><?php echo date("Ymd His"); ?></CREATED_TIMESTAMP>
  </HEADER>

  <RECORDS>
<?
    while ($qso = $result->fetch_assoc()) {
?>
    <RECORD>
      <CALL><? echo $qso['call']; ?></CALL>
      <NAME><? echo $qso['name']; ?></NAME>
      <MODE><? echo $qso['mode']; ?></MODE>
      <FREQ><? echo $qso['freq']; ?></FREQ>

      <RST_RCVD><? echo $qso['rstr']; ?></RST_RCVD>
      <RST_SENT><? echo $qso['rsts']; ?><RST_SENT>

      <GRIDSQUARE><? echo $qso['qth']; ?></GRIDSQUARE>
      <QTH><? echo $qso['qth']; ?></QTH>

      <QSO_DATE><? echo str_replace("-", "", $qso['date']);?></QSO_DATE>
      <TIME_ON><? echo substr(str_replace(":", "", $qso['utc']), 0, -2);?></TIME_ON>

      <MY_GRIDSQUARE><? echo $_SESSION['json']->my_location; ?></MY_GRIDSQUARE>
      <OPERATOR><? echo $qso['op']; ?></OPERATOR>
    </RECORD>
<?
    }
}
?>
  </RECORDS>
</ADX>
