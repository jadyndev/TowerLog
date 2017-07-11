# TowerLog

TowerLog ist ein freies Logbuch für den Amateurfunk.

Es läuft auf _fast_ allen Geräten, da die Benutzung über den Browser (Firefox, Chromium, Chrome, Opera sind Empfohlen) erfolgt.

Außerdem können mehrere Nutzer __gleichzeitig__ ein Logbuch nutzen.

Daher ist es besonders für Club- und Contest-Stationen geeignet.




## Installation

### Schritt 1: Du brauchst folgende Programme

#### Einen Webserver
Zum Beispiel Apache HTTP Server:

[Apache Homepage](https://httpd.apache.org)
```
sudo apt install apache2
```
Du kannst aber auch etwas anderes Verwenden.

#### PHP 
Du brauchst auch PHP, um die verbindung mit der SQL Datenbank herzustellen. (Falls jemand eine einfachere Lösung hat, einfach mal melden):

[PHP Homepage](https://php.net)
```
sudo apt install php 
```

#### SQL Server
Außerdem ist ein SQL Server für die Datenbank erforderlich:

```
sudo apt install mysql-server 
```

### Schritt 2: Dateien kopieren
Du kannst nun die Dateien von Github herunterladen und in das Verzeichnis Kopiert werden in dem der Webserver läuft, unter Linux meist `/var/www/html/`.

Sobald du alle Dateien kopiert hast, kannst du auch schon die ersten Einstellungen treffen.

### Schritt 3: Einstellungen
#### Schritt 1: SQL Server
* Erstelle einen Benutzer für TowerLog
* Erstelle eine Datenbank auf dem Server, auf die der Nutzer zugreifen kann

#### Schritt 2: `bin/ini.php` 
* öffne die Datei `bin/ini.php`
* Verändere die Datei wie, in ihr, beschrieben

#### Schritt 3: Das erste Log
* Öffne nun das Logbuch und gehe auf `[URL zum Log]/admin`, das ganze funktioniert allerdings nur auf dem Rechner auf dem der Server läuft.
* Gehe auf `Neues Logbuch` und erstelle dein Logbuch

### Schritt 4: User
Gehe in den Ordner `users` und kopiere die Datei `example.json` und bennene sie in `[Benutzername].json` um.

Öffne die Datei:
* Trage in `"call"` das Rufzeichen, in Druckbuchstaben, ein.
* Trage in `"pw"` das Passwort des Nutzers ein.
* Trage in `"allowed_logs"` alle Logbücher ein die ein User verwenden darf.

Die Datei sollte so aussehen:
```
{
  "call": "RUFZEICHEN",
  "pw": "PASSWORT",
  "allowed_logs": ["LOG1", "LOG2"]
}
```
__Das User System wird noch überarbeitet!__

#### Du hast nun alle Einstellungen vorgenommen. Nun kannst du das Logbuch verwenden.

## Update Verlauf

### 0.0.2
* Zugang zum Admin-Bereich nun über `ini.php` einstellbar
* Automatische Update Suche, auch über `ini.php` an/ausschaltbar
* Bugfix beim Logbuch erstellen
##### Veränderte Dateien:
```
/admin/index.php
/bin/ini.php
```


### 0.0.1
* Erste Version
