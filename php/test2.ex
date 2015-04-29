#!/usr/bin/expect 
set pass [lindex $argv 1]
set host [lindex $argv 0]
set user [lindex $argv 2]
spawn scp "/tmp/testshobab" $user@$host:/tmp
expect "yes/no" {
    send "yes\r"
    expect "*?assword:" { send "$pass\r" }
    }
#expect ":" { send "$pass\r" }
spawn ssh  "$host" -l  "$user" /tmp/testshobab 
expect "yes/no" {
   send "yes\r"
  expect "*?assword:" { send "$pass\r" }
}
 #   expect "*?assword:" { send "$pass\r" }
#sleep 10
interact
