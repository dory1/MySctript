#!/usr/bin/perl

open FILE,"<","/tmp/dor/done/out_usage_data";
my @scores;
my @data;

while (<FILE>)
{
@insert2=split(',', $_);
print "@$_,\n" for @insert2;

push @scores, [@insert2];
@data = sort { $a <=> $b } @scores;
}
#print $data[0] . "\n" . $data[1] . "\n" . $data[2];
print "@$_,\n" for @scores;

