#!/usr/bin/perl -w
#usage: perl seq2len.pl in_seq.fasta > out_seq.txt
 
$file=$ARGV[0];
open(FH,$file);
while($line=<FH>){
    chomp($line);
   if($line !~"^>"){
    chomp($line);
    $len=length($line);
 print"$line\t$len\n";
  
}
 
}
