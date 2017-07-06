<?php
  $nosql = true;
  include("ini.php");
  switch ($_GET['tool']) {
    case 'logout':
    session_destroy();
    break;

    case 'change_log':
    $_SESSION['page'] = "log_menu";
    break;

    case 'menu':
    $_SESSION['page'] = "menu";
    break;

  }
  header('Location: '.$root_url);
?>
