#!/usr/bin/perl
use strict;
use warnings;

my @words;
system("/var/www/miramon/dnsmon/get_ns_info.sh > /var/www/miramon/dnsmon/blox_info");
open (my $inFile, '<', '/var/www/miramon/dnsmon/blox_info') or die $!;

while (<$inFile>) {
  chomp;
  @words = split(',');
  print "<tr>";
  foreach my $word (@words) { 
		print "<td>$word</td>";
 }
print "</tr>"
}

close ($inFile);
