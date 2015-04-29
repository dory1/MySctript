#!/usr/bin/expect 
set pass [lindex $argv 1]
set host [lindex $argv 0]
set user [lindex $argv 2]
spawn ssh  "$host" -l  "$user" 
expect "yes/no" {
    send "yes\r"
    expect "*?assword:" { send "$pass\r" }
#	To exec command on remote server
# 	Uncomment the nex line
#    expect "#" { send "hostname\r" }
    }
#expect ":" { send "$pass\r" }

interact
