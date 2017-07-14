<?php
include("../bin/ini.php");
//Log Daten bekommen
$call = $mysql->real_escape_string($_POST["call"]);
$freq = $mysql->real_escape_string($_POST["freq"]);
$date = $mysql->real_escape_string($_POST["date"]);
$utc =  $mysql->real_escape_string($_POST["utc"].":00");
$rsts = $mysql->real_escape_string($_POST["rsts"]);
$rstr = $mysql->real_escape_string($_POST["rstr"]);
$qth =  $mysql->real_escape_string($_POST["qth"]);
$name = $mysql->real_escape_string($_POST["name"]);
$dok = $mysql->real_escape_string($_POST["dok"]);
$mode = $mysql->real_escape_string($_POST["mode"]);
$op = $mysql->real_escape_string($_SESSION["call-sign"]);
$log = $mysql->real_escape_string($_SESSION["log"]);
if(in_array($log, $_SESSION['json']->allowed_logs)){
  //Speichern
  $query = "INSERT INTO `$log` (`id`, `call`, `freq`, `date`, `utc`, `rsts`, `rstr`, `qth`, `name`, `dok`, `mode`, `op`) VALUES (NULL, '$call', '$freq', '$date', '$utc', '$rsts', '$rstr', '$qth', '$name', '$dok', '$mode', '$op')";
  $result = $mysql->query($query) or die("Anfrage fehlgeschlagen: " . $mysql->error);






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
