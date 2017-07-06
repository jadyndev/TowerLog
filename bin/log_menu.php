<?php
//Log öffnen Code
if(isset($_GET['log'])){
  $_SESSION['log'] = $_POST['log'];
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
      <button onclick="go_back();" id="button">Zur&#xdc;ck</button>
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

function go_back() {
  window.history.back();
}
</script>
