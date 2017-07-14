<?php
//Log öffnen Code
if(isset($_GET['log'])){
  $_SESSION['log'] = $_POST['log'];
  $_SESSION['page'] = "log";
  header('Location: '.$root_url);
}

//Neues Log Code
if(isset($_GET['new_log'])){
  $new_log_name = $mysql->real_escape_string($_POST['log']);

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
  $result = mysql_query($query) or $mysql_error = true;
  if($mysql_error){
    $_GET['mode'] = "error";
    $error_msg = "Es ist ein <b>MSQL-Fehler</b> beim erstellen des Logbuchs aufgetreten: ".mysql_error();
  }
  $_SESSION['log'] = $new_log_name;
  $_SESSION['page'] = "log";
  header('Location: '.$root_url);
}


switch ($_GET['mode']) {
  //Log öffnen Seite
  default:
  ?>
  <div class="login-page">
    <div class="form">
      <h1>TowerLog</h1>
      <h3>W&#xe4;hle ein Logbuch</h3>
      <form class="login-form" method="post" action="?log">
        <select name="log" placeholder="Logbuch">
          <?php
          $query = "SHOW TABLES";
          $result = mysql_query($query) or die("Anfrage fehlgeschlagen: " . mysql_error());
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
              echo "<tr>";
              foreach ($line as $col_value) {
                  if(in_array($col_value, $_SESSION['json']->allowed_logs)){
                    echo "\t\t<option>$col_value</option>\n";
                  }
              }
              echo "</tr>";
          }
          ?>
        </select>
        <button id="button">Logbuch &#xf6;ffnen</button>
      </form>
      <button onclick="new_log();" id="button">Neuses Logbuch</button>
    </div>
  </div>
  <?php
  break;

  //Neues Log Seite
  case 'new_log':
  ?>
  <div class="login-page">
    <div class="form">
      <h1>TowerLog</h1>
      <h3>Neues Logbuch</h3>
      <form class="login-form" method="post" action="?new_log">
        <input type="text" name="log" placeholder="Neus Logbuch" autocomplete="off" onkeypress="enable();"/>
        <button disabled="true" id="button">Neuses Logbuch erstellen</button>
      </form>
      <button onclick="open_log();" id="button">Existierendes Logbuch &#xf6;ffnen</button>
    </div>
  </div>
  <?php
  break;

  //Neues Log Seite
  case 'error':
  ?>
  <div class="login-page">
    <div class="form">
      <h1>TowerLog</h1>
      <h3>Fehler</h3>
      <a><?php echo $error_msg; ?></a>
      <button onclick="go_home();" id="button">Zur&#xdc;ck</button>
    </div>
  </div>
  <?php
  break;
}
?>

<script>
function enable(){
  if($('input[name=log]').val() != ""){
    document.getElementById("button").disabled = false;
  }
}

function new_log(){
    window.location = "?mode=new_log";
}

function open_log(){
    window.location = "?";
}

function go_home(){
    window.location = "<?php echo $root_url; ?>";
}
</script>
