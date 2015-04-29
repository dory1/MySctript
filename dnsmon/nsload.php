<?php  
  `./get_ns_data.sh > /tmp/dor/done/nsq_data`;
  $output=shell_exec('cat /tmp/dor/done/nsq_data');
  $a=explode("\n",$output);
  $ns1_q=explode(",",$a[0]);
  $ns2_q=explode(",",$a[1]);
  $ns3_q=explode(",",$a[2]);
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
      gaugeData.addColumn('number', '<?php echo 'NS1';?>');
      gaugeData.addColumn('number', '<?php echo 'NS2';?>');
      gaugeData.addColumn('number', '<?php echo 'NS3';?>');
      gaugeData.addRows(3);
      gaugeData.setCell(0, 0, 0);
      gaugeData.setCell(0, 1, 0);
      gaugeData.setCell(0, 2, 0);

      gauge = new google.visualization.Gauge(document.getElementById('gauge'));
      gaugeOptions = {
          width: 500, height: 200,
          min: 0,
          max: 800,
          greenFrom: 1,
          greenTo: 150,
          yellowFrom: 150,
          yellowTo: 550,
          redFrom: 550,
          redTo: 800,
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
      gaugeData.setValue(0, 0, <?php echo $ns1_q[1];?>);
      gaugeData.setValue(0, 1, <?php echo $ns2_q[1];?>);
      gaugeData.setValue(0, 2, <?php echo $ns3_q[1];?>);
      gauge.draw(gaugeData, gaugeOptions);
    }


    google.setOnLoadCallback(drawGauge);
    </script>
  </head>
  <body onload ="setToRed()">
    <div id="gauge"></div>
  </body>
