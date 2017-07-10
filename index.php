<?php
include("bin/ini.php");
include("bin/header.php");
if($_SESSION["call-sign"] == null){
  include("bin/login.php");
}else{
  switch ($_SESSION['page']) {
    case 'log':
      include("bin/log.php");
    break;

    case 'log_menu':
      include("bin/log_menu.php");
    break;

    default:
      include("bin/menu.php");
    break;
  }
}
?>
