#!/usr/bin/perl

use Data::Dumper;
use GD::3DBarGrapher qw(creategraph); # or require "3dbargrapher.pl"; if using in '.pl' form


$x=`/tmp/dor/done/get_ns_data.sh >/tmp/dor/done/nsq_data`;

open FILE,"<","/tmp/dor/done/nsq_data";
my @scores;


while (<FILE>)
{
@insert=split(",", $_);
push @scores, [@insert];
@data = sort { $a <=> $b } @scores;
}



my %options = (
'file' => '/var/www/miramon/dnsmon/nsqgraph.jpg',
vltgrey     => { R => 245, G => 245, B => 245 },
ltgrey      => { R => 250, G => 250, B => 250 },
midgrey     => { R => 180, G => 180, B => 180 },
cust        => { R => 205, G => 92, B => 92 },
plinecol    => 'midgrey',   # COLOUR NAME; line colour
pflcol      => 'vltgrey',   # COLOUR NAME; floor colour
pbgcol      => 'ltgrey',    # COLOUR NAME; back/side colour
pbgfill     => 'gradient',  # 'gradient' or 'solid'; back/side fill
plnspace    => 10,          # minimum pixel spacing between divisions
pnumdivs    => 60,           # maximum number of y-axis divisions
imgw        => 300,         # preferred width in pixels
imgh        => 220,         # preferred height in pixels
iplotpad    => 2,           # padding between axis vals & plot area
ipadding    => 7,          # padding between other items
ibgcol      => 'ltgrey',     # COLOUR NAME; background colour
iborder     => '',          # COLOUR NAME; border, if any
bfacecol    => 'cust',
);

my $imagemap = creategraph(\@data, \%options);
