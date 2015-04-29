#!/usr/bin/perl

use MIME::Lite;

open FILE,"<","/tmp/summary";

$total=`wc -l /tmp/summary|cut -d\" \" -f1`;

my $message="<style>td{border:solid 1px #666666;}</style>";
$message .="<center>";
$message .= "\<h2\>IPs list - last hour \</h2\>";
$message .= "\<h3\>Total " . $total . "\</h3\>";
$message .= "\<table style='text-align:center; border:solid 1px #666666'\>\<tr style='border:solid 1px #666666; background-color:#5970B2; color:#FFFFFF'\>\<td style='border:solid 1px #666666'\>IP\</td\>\</tr\>";

while (<FILE>){
$message .= "<tr><td>$_</td></tr>";
                }
$message .= "\</table\>\<br\>\<br\>\<font color=blue\>\<b\>\<i\>System Unix &copy 2013\<i\>\</b\>\</font\></center>";

my $email = 'dory@BEZEQINT.CO.IL';
my $msg = MIME::Lite->new
(
Subject => "IPs list",
From    => 'reports@bdns11.bezeqint.net',
To      => $email,
Type    => 'text/html',
Data    => $message
);

$msg->attach (
 Encoding => 'base64',
 Type => "text/csv",
 Path => "/tmp/summary",
 Filename => "ips.csv",
 Disposition => 'attachment'
 ) or die "Error adding $datafile: $!\n";

$msg->send();
