#!/bin/bash
#echo "<h3>DAILY DNS QUERY AND SERVFAIL:</h3>"
echo -ne "ns1,"
sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.12 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.8.1.1 | awk '{print $4}' 2> /dev/null
echo -en "ns2,"
sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.20 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.8.1.1 | awk '{print $4}' 2> /dev/null
echo -en "ns3,"
sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.26 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.8.1.1 | awk '{print $4}' 2> /dev/null
