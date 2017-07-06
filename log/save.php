<?php
include("../bin/ini.php");
//Log Daten bekommen
$call = mysql_real_escape_string($_POST["call"]);
$freq = mysql_real_escape_string($_POST["freq"]);
$date = mysql_real_escape_string($_POST["date"]);
$utc =  mysql_real_escape_string($_POST["utc"].":00");
$rsts = mysql_real_escape_string($_POST["rsts"]);
$rstr = mysql_real_escape_string($_POST["rstr"]);
$qth =  mysql_real_escape_string($_POST["qth"]);
$name = mysql_real_escape_string($_POST["name"]);
$dok = mysql_real_escape_string($_POST["dok"]);
$mode = mysql_real_escape_string($_POST["mode"]);
$op = mysql_real_escape_string($_SESSION["call-sign"]);
$log = mysql_real_escape_string($_SESSION["log"]);
if(in_array($log, $_SESSION['json']->allowed_logs)){
  //Speichern
  $query = "INSERT INTO `$log` (`id`, `call`, `freq`, `date`, `utc`, `rsts`, `rstr`, `qth`, `name`, `dok`, `mode`, `op`) VALUES (NULL, '$call', '$freq', '$date', '$utc', '$rsts', '$rstr', '$qth', '$name', '$dok', '$mode', '$op')";
  $result = mysql_query($query) or die("Anfrage fehlgeschlagen: " . mysql_error());






  //Nachricht
  if($name != null){
    $msg_name = $name;
  }else{
    $msg_name = $call;
  }
  echo "Dein QSO mit ".$msg_name." wurde gespeichert!";
}else{
  echo "Du kannst in diesem Log <b>nichts</b> speichern!";
}
  ?>
