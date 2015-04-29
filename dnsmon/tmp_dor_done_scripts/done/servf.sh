#!/usr/bin/perl

use Data::Dumper;
use GD::3DBarGrapher qw(creategraph); # or require "3dbargrapher.pl"; if using in '.pl' form
$x=`/tmp/dor/done/get_servf_data.sh>/tmp/dor/done/servf_data`;

open FILE,"<","/tmp/dor/done/servf_data";
my @scores;


while (<FILE>)
{
@insert=split(",", $_);
push @scores, [@insert];
@data = sort { $a <=> $b } @scores;
}

#@data=`cat /tmp/dor/array`;
#my @data=(
#['bdns2',161947],
#['bdns3',98662],
#['bdns4',99070],
#['bdns6',97095],
#['bdns7',101074],
#['bdns8',113695],
#['bdns9',136057],
#['bdns100',97449],
#['bdns101',101196],
#['bdns102',105075],
#['bdns103',123502],
#['bdns104',113454],
#['bdns105',101294],
#['bdns106',97614],
#['bdns107',106976],
#['bdns108',99385],
#['bdns109',104526],
#['bdns110',98268],
#['bdns111',101073],
#['bdns112',100238],
#['bdns113',107007],
#['bdns114',109497]
#
#);





my %options = (
'file' => '/var/www/miramon/dnsmon/sfgraph.jpg',
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

