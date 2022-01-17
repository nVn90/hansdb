#!/usr/bin/env perl

use strict;
use warnings;

open( my $fasta_file, '<', $ARGV[0] );
open( my $muts,       '<', $ARGV[1] );
open( my $out_file,   '>', $ARGV[2] );

open( my $test_out, '>', "test_output" );

chomp( my @fasta_lines = <$fasta_file> );
chomp( my @mut_lines   = <$muts> );

my $seq;

for my $i ( 1 .. $#fasta_lines ) {
    chomp( my $line = $i );
    $seq .= $line;
}

print {$test_out} "seq is\n$seq\n";

while (<$mut_lines>) {
    chomp( my $line = $_ );
    my @words = split( /\h/, $line );
    my $wt    = $words[0];
    my $pos   = $words[1];
    my $mut   = $words[2];
    print {$test_out} "muts @words\n";
}

print {$out_file} "";