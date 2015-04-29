#!/bin/bash
#echo "<h3>DAILY DNS QUERY AND SERVFAIL:</h3>"
for server in `cat /tmp/dor/done/all_bdns_fin`
do
echo -n "$server,"
sshpass -p 'V,jkv&Jsav$' ssh dory@$server.bezeqint.net sudo /tmp/query_count 2> /dev/null
#sshpass -p 'V,jkv&Jsav$' ssh dory@$server.bezeqint.net cat /tmp/serFailcheck.log 2> /dev/null
done

