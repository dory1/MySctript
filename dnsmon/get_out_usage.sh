#!/bin/bash
#echo "<h3>DAILY DNS QUERY AND SERVFAIL:</h3>"
for server in `cat /tmp/dor/done/all_bdns_fin`
do
echo -n "$server,"
version=`sshpass -p 'V,jkv&Jsav$' ssh dory@$server.bezeqint.net sudo cat /etc/redhat-release  2> /dev/null`
uptime=`sshpass -p 'V,jkv&Jsav$' ssh dory@$server.bezeqint.net sudo uptime  2> /dev/null`

echo $version, $uptime
#sshpass -p 'V,jkv&Jsav$' ssh dory@$server.bezeqint.net cat /tmp/serFailcheck.log 2> /dev/null
done

