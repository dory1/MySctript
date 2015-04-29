<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div style="background-color:#FAFAFA; height: 100%;" width="100%">
<style>
#rounded-corner{font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;font-size:12px;width:850px;text-align:left;border-collapse:collapse;margin:20px;}#rounded-corner thead th.rounded-company{background:#b9c9fe url("images/table/left.png") left -1px no-repeat;}#rounded-corner thead th.rounded-q4{background:#b9c9fe url("images/table/right.png") right -1px no-repeat;}#rounded-corner th{text-align:center; font-weight:normal;font-size:13px;color:#039;background:#b9c9fe;padding:8px;}#rounded-corner td{text-align:center; background:#e8edff;border-top:1px solid #fff;color:#669;padding:8px;}#rounded-corner tfoot td.rounded-foot-left{background:#e8edff url("images/table/botleft.png") left bottom no-repeat;}#rounded-corner tfoot td.rounded-foot-right{background:#e8edff url("images/table/botright.png") right bottom no-repeat;}#rounded-corner tbody tr:hover td{background:#d0dafd;}#background-image{font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;font-size:12px;width:480px;text-align:left;border-collapse:collapse;background:url("images/table/blurry.jpg") 330px 59px no-repeat;margin:20px;}#background-image th{font-weight:normal;font-size:14px;color:#339;padding:12px;}#background-image td{color:#669;border-top:1px solid #fff;padding:9px 12px;}#background-image tfoot td{font-size:11px;}#background-image tbody td{background:url("images/table/back.png");}* html #background-image tbody td{filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='table-images/back.png',sizingMethod='crop');background:none;}
</style>
<table>
<tr><td width=520px align=right>
<font family="Times New Roman",Times,serif"><b>Infoblox NS servers - system information</b></font>
</td>
<td width=80px></td>
<td>
<a href="info.php">
<img src="images/Refresh-icon.png" border=0/></a>
</td></tr>
</table>
<table id="rounded-corner">
<thead>
<tr><th scope='col' class='rounded-company'>Host</th>
<th scope='col'>HW type</th>
<th scope='col'>Version</th>

</thead>
<tbody>
</tr>
</tbody>
<tfoot>
<?php
$output = shell_exec('/var/www/miramon/dnsmon/spil_info.pl');
echo "$output";
?>
</tfoot>
</table>
</center>
</div>
</body>
