<?php
if($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
  switch ($_GET['tool']) {
    include("../bin/ini.php");
    include("../bin/header.php");
    //Tools

    //Neues Log
    if(isset($_GET['new_log'])){
      $new_log_name = mysql_real_escape_string($_POST['log']);

      $query = "CREATE TABLE IF NOT EXISTS `$new_log_name` (
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `call` varchar(255) NOT NULL,
        `freq` int(11) NOT NULL,
        `mode` varchar(255) NOT NULL,
        `date` date NOT NULL,
        `utc` time NOT NULL,
        `rsts` int(11) NOT NULL,
        `rstr` int(11) NOT NULL,
        `qth` varchar(255) NOT NULL,
        `name` varchar(255) NOT NULL,
        `dok` varchar(255) NOT NULL,
        `op` varchar(255) NOT NULL
      ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
      $result = $mysql->query($query) or $mysql_error = true;
      
      if($mysql_error){
        $_GET['tool'] = "error";
        $error_msg = "Es ist ein <b>MSQL-Fehler</b> beim erstellen des Logbuchs aufgetreten: ".$mysql->error;
      }else{
        $_GET['tool'] = "msg";
        $msg_msg = "Logbuch wurde erstellt. Vergiss nicht die User-Dateien entsprechend anzupassen!";
      }
    }


    //Seite
    case 'new_log':
    ?>
    <div class="login-page">
      <div class="form">
        <h1>TowerLog</h1>
        <h3>Neues Logbuch</h3>
        <form class="login-form" method="post" action="?new_log">
          <input type="text" name="log" placeholder="Neus Logbuch" autocomplete="off" onkeypress="enable();"/>
          <button id="button">Neuses Logbuch erstellen</button>
        </form>
        <button onclick="button('back')" id="button">Men&#xdc;</button>
      </div>
    </div>
    <?php
    break;

    case 'error':
    ?>
    <div class="login-page">
      <div class="form">
        <h1>TowerLog</h1>
        <h3>Fehler</h3>
        <a><?php echo $error_msg; ?></a>
        <button onclick="button('new_log')" id="button">Zur&#xdc;ck</button>
      </div>
    </div>
    <?php
    break;

    case 'msg':
    ?>
    <div class="login-page">
      <div class="form">
        <h1>TowerLog</h1>
        <a><?php echo $msg_msg; ?></a>
        <button onclick="button('back')" id="button">OK</button>
      </div>
    </div>
    <?php
    break;

    default:
    ?>
      <div class="login-page">
        <div class="form">
          <h1>TowerLog</h1>
          <h2>Admin</h2>
            <button onclick="button('new_log')">Neues Logbuch</button>
        </div>
      </div>
    <?php
    break;
  }
}else{
  echo "Kein zugang!";
}
?>


<script>
function button(func){
   switch (func) {
     case "new_log":
       window.location = "?tool=new_log";
     break;
     case "back":
       window.location = "?tool=";
     break;
   }
}

</script>
