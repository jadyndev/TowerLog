<?php
/***Folgender Code muss angepasst werden:***/

$root_url = "http://192.168.178.34/TowerLog/"; //Die URL unter der das Logbuch erreichbar ist. z.B 127.0.0.1 oder example.com/Towerlog oder hostname/TowerLog
$db_host = 'localhost';
$db_name = 'towerlog';
$db_user = 'root';
$db_password = '';

/*******************************************/

//error_reporting(0);
session_start();

if(!isset($no_sql)){
  $mysql = mysql_connect($db_host, $db_user, $db_password) or die("Keine Verbindung möglich: " . mysql_error());
  $db_selected = mysql_select_db($db_name, $mysql);

  if (!$db_selected) {
      die ('Kann Datenbank nicht verwenden: ' . mysql_error());
  }
}
?>
