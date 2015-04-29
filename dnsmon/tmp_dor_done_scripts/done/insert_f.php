<?php
#	sleep(30);

# Get data
       $raw=`cat servf_data`;
       $all=explode("\n", $raw);

# Conn to DB
       mysql_connect("localhost", "root", "mb7522zz") or die(mysql_error());
       mysql_select_db("dnsmon") or die(mysql_error());

# Break data

foreach ($all as &$line) {
    $l_data = explode(",", $line);
	if (empty($l_data[0])) {break;}
	else{
#print
    echo "server: " . $l_data[0] . "\n";
    echo "query: " . $l_data[1] . "\n";


#Insert

$sql = 'INSERT INTO servfail (server,servfail) '.
       'VALUES (\'' . $l_data[0] . '\', ' . $l_data[1] . ' )';
	$retval=mysql_query($sql);
	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}

    } #end of else
} #end of for



?>
