<div class="login-page">
  <div class="form">
    <h1>TowerLog</h1>
      <button onclick="button('QSO')">Logbuch &#xd6;ffnen</button>
      <br><br>
      <button onclick="button('EXPORT')">Logbuch exportieren</button>
      <br><br>
      <button onclick="button('abmelden')">Abmelden</button>
  </div>
</div>
<script>
function button(func){
   switch (func) {
     case "QSO":
       window.location = "bin/session.php?tool=change_log";
     break;
     case "abmelden":
       window.location = "bin/session.php?tool=logout";
     break;
     case "EXPORT":
       window.location = "bin/session.php?tool=log_export";
     break;
   }
}

</script>
