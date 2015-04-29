<?php
  `./get_ns_hw_data.sh > /tmp/dor/done/nsh_data`;
  $output=shell_exec('cat /tmp/dor/done/nsh_data');
  $a=explode("\n",$output);
  $ns1_h_c=explode(",",$a[0]);
  $ns2_h_c=explode(",",$a[1]);
  $ns3_h_c=explode(",",$a[2]);

  $ns1_h_m=explode(",",$a[3]);
  $ns2_h_m=explode(",",$a[4]);
  $ns3_h_m=explode(",",$a[5]);

  $ns1_h_t=explode(",",$a[6]);
  $ns2_h_t=explode(",",$a[7]);
  $ns3_h_t=explode(",",$a[8]);


?>

<html>
  <head>
    <script type="text/javascript" src="jsapi.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['SERVER', 'MEM%', 'TEMP(in celsius)', 'CPU%'],
          ['NS1', <?php echo $ns1_h_m[1];?> , <?php echo $ns1_h_t[1];?>, <?php echo $ns1_h_c[1];?>],
          ['NS2',<?php echo $ns2_h_m[1];?>, <?php echo $ns2_h_t[1];?>, <?php echo $ns2_h_c[1];?>],
          ['NS3', <?php echo $ns3_h_m[1];?>, <?php echo $ns3_h_t[1];?>, <?php echo $ns3_h_c[1];?>],
        ]);

        var options = {
	width: 700,
	height: 300,
	backgroundColor: { fill: "#F4F4F4" },
          chart: {
            title: 'Infoblox hardware stats',
            subtitle: 'Temp,cpu and mem',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
