<?php
$TowerLogVersion = "0.0.3";
/***Folgender Code muss angepasst werden:***/

$root_url = "http://[HOSTNAME / IP]/TowerLog/"; //Die URL unter der das Logbuch erreichbar ist. z.B 127.0.0.1 oder example.com/Towerlog oder hostname/TowerLog

/*Datenbank*/
$db_host = 'localhost';      //Datenbank Server: Hostname oder IP z.B localhost oder 127.0.0.1
$db_name = 'towerlog';       //Datenbank die für die Speicherung der Logbücher gedacht ist. Empfohlen ist eine Datenbank mit dem Namen "towerlog"
$db_user = '[USER]';         //Datenbank Benutzer. Der Benutzer auf dem SQL Server
$db_password = '[USER]'; //Datenbank Benutzer Passwort. Das Passwort für den Benutzer auf dem SQL Server

/***Admin***/
//Passe $admin_zugang so an:
// "local": Zugang nur über den Rechner auf dem TowerLog läuft.
// "all":   Zugang für ALLE
// "none":   Zugang für NIEMANDEN
$admin_zugang = "local";

/**Updates**/
//Automatische suche nach Updates.
//Setze es auf false um die Suche nach Updates auszuschalten
$UPDATE_enable = true;
/*******************************************/

error_reporting(0);
session_start();


if(!isset($no_sql)){
  $mysql = new mysqli($db_host, $db_user, $db_password, $db_name);
}

//Suche nach Updates
if($UPDATE_enable){
  $TowerLogNewVersion = file_get_contents('https://do9thw.de/TowerLog/UPDATE');
  if($TowerLogVersion != $TowerLogNewVersion){
    echo "Update auf Version ".$TowerLogNewVersion." ist verf&#xfc;gbar.";
  }
}
?>
