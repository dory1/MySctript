#!/bin/bash
#echo "<h3>DAILY DNS QUERY AND SERVFAIL:</h3>"
hw1=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.12 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.4.0 | awk '{print $4}' 2> /dev/null`
hw2=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.20 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.4.0 | awk '{print $4}' 2> /dev/null`
hw3=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.26 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.4.0 | awk '{print $4}' 2> /dev/null`

nio1=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.12 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.7 | awk '{print $4}' 2> /dev/null`
nio2=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.20 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.7 | awk '{print $4}' 2> /dev/null`
nio3=`sshpass -p 'V,jkv&Jsav$' ssh dory@montraptor.bezeqint.net snmpwalk 192.168.171.26 -v 2c -c public  .1.3.6.1.4.1.7779.3.1.1.2.1.7 | awk '{print $4}' 2> /dev/null`



echo ns1,$hw1,$nio1
echo ns2,$hw2,$nio2
echo ns3,$hw3,$nio3
