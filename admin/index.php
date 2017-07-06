<?php
if($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
  echo "Admin";
}else{
  echo "Kein zugang!";
}
?>
