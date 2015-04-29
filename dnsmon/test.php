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

	echo $d[0][0];	
	echo $d[1][0];	
	echo $d[1][1];	
?>
