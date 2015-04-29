<?php  
  $output=shell_exec('scripts/topload.pl');
  $a=explode("\n",$output);
 $b=explode(" ",$a[0]);
?>  
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="jsapi.js"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['gauge']});
    </script>
    <script type="text/javascript">
    var gauge;
    var gaugeData;
    var gaugeOptions;
    function drawGauge() {
      gaugeData = new google.visualization.DataTable();
      gaugeData.addColumn('number', '<?php echo 'bdns101';?>');
      gaugeData.addColumn('number', '<?php echo 'bdns8';?>');
      gaugeData.addColumn('number', '<?php echo 'bdns114';?>');
      gaugeData.addRows(3);
      gaugeData.setCell(0, 0, 0);
      gaugeData.setCell(0, 1, 0);
      gaugeData.setCell(0, 2, 0);

      gauge = new google.visualization.Gauge(document.getElementById('gauge'));
      gaugeOptions = {
          width: 500, height: 200,
          min: 0,
          max: 20,
          greenFrom: 1,
          greenTo: 5,
          yellowFrom: 5,
          yellowTo: 10,
          redFrom: 10,
          redTo: 20,
          minorTicks: 5
      };
      gauge.draw(gaugeData, gaugeOptions);
    }
      function setToRed()
      {

        setTimeout ( "changeTemp()", 3000 );
      }

    function changeTemp(dir) {
      // alert("hello");
      gaugeData.setValue(0, 0, <?php echo '65%';?>);
      gaugeData.setValue(0, 1, <?php echo '68%';?>);
      gaugeData.setValue(0, 2, <?php echo '64%';?>);
      gauge.draw(gaugeData, gaugeOptions);
    }


    google.setOnLoadCallback(drawGauge);
    </script>
  </head>
  <body onload ="setToRed()">
    <div id="gauge"></div>
  </body>
