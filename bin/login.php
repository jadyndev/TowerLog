<?php
$error_msg = "";

if(isset($_GET['login'])){
  $call = $_POST['call'];
  if(file_exists("users/".$call.".json")){
    $_SESSION['json'] = json_decode(file_get_contents("users/".$call.".json", true));
    if($_SESSION['json']->pw == $_POST['passwort']){
      $_SESSION['call-sign'] = $_SESSION['json']->call;
      header('Location: '.$root_url);
    }else{
      $error_msg = "Das Passwort stimmt nicht!";
    }
  }else{
    $error_msg = "Dieses Rufzeichen ist nicht bekannt!";
  }
}
?>

<div class="login-page">
  <div class="form">
    <h1>TowerLog</h1>
    <a><?php echo $error_msg; ?>
    <form class="login-form" method="post" action="?login">
      <input type="text" name="call" placeholder="Rufzeichen" autocomplete="off"/>
      <input type="password" name="passwort" placeholder="Passwort" autocomplete="off"/>
      <button>Anmelden</button>
    </form>
  </div>
</div>
