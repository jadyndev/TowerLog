<?php
/***Folgender Code muss angepasst werden:***/

$root_url = "http://127.0.0.1/TowerLog/"; //Die URL unter der das Logbuch erreichbar ist. z.B 127.0.0.1 oder example.com/Towerlog oder hostname/TowerLog

/*Datenbank*/
$db_host = 'localhost';      //Datenbank Server: Hostname oder IP z.B localhost oder 127.0.0.1
$db_name = 'towerlog';       //Datenbank die für die Speicherung der Logbücher gedacht ist. Empfohlen ist eine Datenbank mit dem Namen "towerlog"
$db_user = '[name]';         //Datenbank Benutzer. Der Benutzer auf dem SQL Server
$db_password = '[passwort]'; //Datenbank Benutzer Passwort. Das Passwort für den Benutzer auf dem SQL Server

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
