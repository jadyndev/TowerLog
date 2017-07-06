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
