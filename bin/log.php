<div class="log-page">
  <div class="log">
    <h1>TowerLog</h1>
    <h3>Operator: <?php echo $_SESSION["call-sign"];?> Logbuch: <?php echo $_SESSION["log"];?></h3>

    <div id="menu">
      <button onclick="go_menu();">Ins Men&#xdc;</button>
    </div>
    <h2 id="QSO">QSO</h2>
    <form class="log-form" method="post">
      <div>
        Rufzeichen: <input type="text" name="call" placeholder="Rufzeichen" autofocus autocomplete="off" onkeypress="load_list();"/>
      </div>
      <div>
        Datum: <input type="date" name="date" placeholder="Datum" autocomplete="off" onfocus="time_set();"/>
      </div>
      <div>
        UTC: <input type="time" name="UTC" placeholder="UTC" autocomplete="off" onfocus="time_set();"/>
      </div>
      <div>
        RST s: <input type="number" name="RSTS" placeholder="Raport gesendet" autocomplete="off"/>
      </div>
      <div>
        RST r: <input type="number" name="RSTR" placeholder="Raport empfangen" autocomplete="off"/>
      </div>
      <div>
        Frequnz: <input type="number" name="FREQ" placeholder="MHz" autocomplete="off"/>
      </div>
      <div>
        QTH: <input type="text" name="QTH" placeholder="QTH/Locator" autocomplete="off"/>
      </div>
      <div>
        Name: <input type="text" name="name" placeholder="Name" autocomplete="off"/>
      </div>
      <div>
        Mode: <input type="text" name="mode" placeholder="Mode" autocomplete="off"/>
      </div>
      <div>
        DOK: <input type="text" name="DOK" placeholder="DOK" autocomplete="off"/>
      </div>
      <a class="message"></a>
    </form>
    <div>
      <button onclick="save_log();" >Speichern</button>
      <button onclick="clear_log();" >L&#xf6;schen</button>
    </div>
    <br>
    <h2>QSO Liste</h2>
    <div id="QSO-Liste" class="QSL">
        <div class="loader"></div>
    </div>
  </div>
</div>
<script>
document.addEventListener("keypress", function(event) {
    if (event.keyCode == 13) {
        save_log();
    }
})

//Zeit / Datumsfelder
var time_click = false;

window.setInterval(function(){
  console.log(time_click);
  if(time_click == false){
    $(function(){
      $('input[type="time"][name="UTC"]').each(function(){
        console.log("TIME");
        var d = new Date(),
            h = d.getHours(),
            m = d.getMinutes();
        if(h < 10) h = '0' + h;
        if(m < 10) m = '0' + m;
        $(this).attr({
          'value': h + ':' + m
        });
      });
    });

    $(function(){
      $('input[type="date"][name="date"]').each(function(){
        console.log("DATE");
        var date = new Date(),
            d = date.getDay(),
            m = date.getMonth();
            y = date.getFullYear();
        if(d < 10) d = '0' + d;
        if(m < 10) m = '0' + m;
        $(this).attr({
          'value': y + '-' + d + "-" + m
        });
      });
    });
  }
}, 1000);

function time_set(){
  time_click = true;
}

//Log absenden
function save_log(){
          var call = $('input[name=call]').val();
          var date = $('input[name=date]').val();
          var UTC = $('input[name=UTC]').val();
          var RSTS = $('input[name=RSTS]').val();
          var RSTR = $('input[name=RSTR]').val();
          var FREQ = $('input[name=FREQ]').val();
          var QTH = $('input[name=QTH]').val();
          var name = $('input[name=name]').val();
          var DOK = $('input[name=DOK]').val();
          var mode = $('input[name=mode]').val();

          if(call != "" && RSTS != "" && RSTR != "" && FREQ != "" && mode != ""){
            $.post("log/save.php",
            {
              call: call,
              freq: FREQ,
              date: date,
              utc: UTC,
              rsts: RSTS,
              rstr: RSTR,
              qth: QTH,
              name: name,
              dok: DOK,
              mode: mode
            },
            function(data,status){
                $( "a.message" ).html(data);
                if(data != "ERROR"){
                  $('input[name=call]').val('');
                  $('input[name=RSTS]').val('');
                  $('input[name=RSTR]').val('');
                  $('input[name=QTH]').val('');
                  $('input[name=name]').val('');
                  $('input[name=DOK]').val('');
                  time_click = false;
                  $("input[name=call]").focus();
                }
            });
          }else{
            $( "a.message" ).html("Es fehlen noch Angaben!");
          }
}

function clear_log() {
  $('input[name=call]').val('');
  $('input[name=RSTS]').val('');
  $('input[name=RSTR]').val('');
  $('input[name=QTH]').val('');
  $('input[name=name]').val('');
  $('input[name=DOK]').val('');
  time_click = false;
  $("input[name=call]").focus();
}

window.onload = load_list();

var list_call = null;
function load_list(){
  console.log("Liste laden");
  if($('input[name=call]').val() != list_call){
    list_call = $('input[name=call]').val();
    $( "#QSO-Liste" ).html('<div class="loader"></div>');
    $.get( "log/list.php",
      {
      call_filter: list_call
      },
      function( data ) {
      $( "#QSO-Liste" ).html( data );
    });
  }
}

window.setInterval(function() {
  load_list();
}, 100);

function go_menu() {
  window.location = "bin/session.php?tool=menu";
}
</script>
