<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>DNSmon - DNS system management</title>
<link rel="shortcut icon" href="images/favicon.ico">
<b><script type="text/javascript" src="date_time.js"></script><b>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div style="background-image: url(images/dec.gif);" width="100%" height="20">&nbsp
<span id="date_time"></span>
<script type="text/javascript">window.onload = date_time('date_time');</script>
</div>
<div style="top:0; right:0; position:absolute;">
</div>
<?php include("menu.html"); ?>

</body>
<!-- <body style="background-color:#FAFAFA;" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"> </body> -->
<?php
?>
<div style="background-color:#FAFAFA; height: 100%;" width="100%">
<style>
#iframe1 {
position: absolute;
top: 205px;
left: 60px;
height: 370px;
width: 850px;
}

#iframe2 {
position: absolute;
top: 470px;
left: 60px;
height: 270px;
width: 870px;
}

#iframe3 {
position: absolute;
top: 205px;
left: 700px;
height: 370px;
width: 700px;
}

</style>
<iframe frameborder=0 src="ns_load_con.php" scrolling="yes" id="iframe3"></iframe>
<iframe frameborder=0 src="hard_stat.php" scrolling="no" id="iframe1"></iframe>
</div>
<div style="background-image: url(images/dec.gif);" width="100%" height="20">
</div>
</html>
