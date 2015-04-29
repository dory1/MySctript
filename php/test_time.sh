#!/bin/bash
host=$1
t=$2
user=$3
#echo "$host" >> /tmp/testtime
#php /home/leonidle/scripts/php/ssh-brute1.php -h $host -u root -w /home/leonidle/scripts/php/pass -o 111 -t 300
#if [[ $? != "0" ]]
#then
#php /home/leonidle/scripts/php/ssh-brute1.php -h $host -u leonidle -w /home/leonidle/scripts/php/pass -o 111 -t 300 
if [[ $t == "-l" ]]
then
#/usr/bin/ssh $host -l $user
php /home/scripts/php/ssh-brute1.php -h $host -u $user -w  /home/scripts/php/pass -o 111 -t 300
exit
else
php /home/scripts/php/ssh-brute1.php -h $host -u root -w  /home/scripts/php/pass -o 111 -t 300
if [[ $? != "0" ]]
then
php  /home/scripts/php/ssh-brute1.php -h $host -u leonidle -w  /home/scripts/php/pass -o 111 -t 300

#then
#echo "$host" >> /tmp/php/norout
#else echo "$host" >> /tmp/php/testtime
fi
fi
#else echo "$host" >> /tmp/php/testtime
#php /tmp/php/ssh-brute1.php -h $host -u root -w /tmp/php/pass -o 111 -t 300 ; 
