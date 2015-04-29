#!/bin/bash
for server in `cat /home/scripts/TZ/server_list | grep -v '#'`
do
echo "$server:"
/home/scripts/TZ/time_check.sh $server 
done

