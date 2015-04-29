/********* Javascript Generated with phpChart **********/ 
var _chart3_plot_properties;
$(document).ready(function(){ 
setTimeout( function() { 
_chart3_plot_properties = {
  "seriesDefaults":{
    "renderer":$.jqplot.MeterGaugeRenderer,"rendererOptions":{
      "label":"Metric Tons per Year","labelPosition":"bottom","labelHeightAdjust":-5,"intervalOuterRadius":85,"intervals":[
        22000,55000,70000
      ],"ticks":[
        10000,30000,50000,70000
      ],"intervalColors":[
        "#66cc66","#E7E658","#cc6666"
      ]
    }
  }
}



$.jqplot.config.enablePlugins = true;
$.jqplot.config.defaultHeight = 300;
$.jqplot.config.defaultWidth  = 400;
 _chart3= $.jqplot("chart3", [[322]], _chart3_plot_properties);

}, 200 );
});
