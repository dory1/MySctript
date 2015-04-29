<html>
  <head>
    <script type="text/javascript" src="jsapi.js"></script>
  <script>
    google.load('visualization', '1', { 'packages': ['map'] });
    google.setOnLoadCallback(drawMap);

    function drawMap() {
  var data = google.visualization.arrayToDataTable([
    ['Lat', 'Long', 'Name'],
    [32.0847, 34.8585, 'PTK-ns1'],
    [32.0956, 34.8519, 'PTK-med1-ns2'],
    [50.081, 8.736, 'FRK-NS3'],
  ]);

    var options = { showTip: true ,
        width: 700,
        height: 300,



};


    var map = new google.visualization.Map(document.getElementById('chart_div'));

    map.draw(data, options);
  };
  </script>
  </head>
  <body>
    <div id="chart_div"></div>
  </body>
</html>
