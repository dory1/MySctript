<?php


# Conn to DB
       mysql_connect("localhost", "root", "mb7522zz") or die(mysql_error());
       mysql_select_db("dnsmon") or die(mysql_error());


        $d = array();
        $i=0;

#Insert

$sql = 'select server,servfail from servfail where (timestamp > DATE_SUB(now(), INTERVAL 1 DAY)) ORDER BY servfail DESC limit 3';
        $retval=mysql_query($sql);
        if(! $retval )
        {
          die('Could not enter data: ' . mysql_error());
        }

        while($row = mysql_fetch_array($retval, MYSQL_NUM))
        {
        $d[$i][0]=$row[0];
        $d[$i][1]=$row[1];
        $i++;

        }


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
      gaugeData.addColumn('number', '<?php echo $d[0][0];?>');
      gaugeData.addColumn('number', '<?php echo $d[1][0];?>');
      gaugeData.addColumn('number', '<?php echo $d[2][0];?>');
      gaugeData.addRows(3);
      gaugeData.setCell(0, 0, 0);
      gaugeData.setCell(0, 1, 0);
      gaugeData.setCell(0, 2, 0);

      gauge = new google.visualization.Gauge(document.getElementById('gauge'));
      gaugeOptions = {
          width: 500, height: 200,
          min: 0,
          max: 7000,
          greenFrom: 1,
          greenTo: 2000,
          yellowFrom: 2000,
          yellowTo: 4000,
          redFrom: 4000,
          redTo: 7000,
          minorTicks: 5
      };
      gauge.draw(gaugeData, gaugeOptions);
    }
      function setToRed()
      {

        setTimeout ( "changeTemp()", 7000 );
      }

    function changeTemp(dir) {
      // alert("hello");
      gaugeData.setValue(0, 0, <?php echo $d[0][1];?>);
      gaugeData.setValue(0, 1, <?php echo $d[1][1];?>);
      gaugeData.setValue(0, 2, <?php echo $d[2][1];?>);
      gauge.draw(gaugeData, gaugeOptions);
    }
    google.setOnLoadCallback(drawGauge);
    </script>
  </head>
  <body onload ="setToRed()">
    <div id="gauge"></div>
  </body>

