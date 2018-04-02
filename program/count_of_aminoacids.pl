# This script will count the number of acidic/basic/neutral amino acids

# While executing this script it asks for the file name of the protein sequence. If the sequence file is not available in the same directory of this script, enter the name of the file along with the path.  eg.In windows:  c:\proteinfile.txt, In Linux: /home/user/sequence/proteinfile.txt

print "\n\n\t\#################### Count the number of acidic/basic/neutral amino acids #################### \n\n";
print "This script will count the number of acidic/basic/neutral amino acids\n\n";
use strict;

#variables
my $count_of_acidic=0;
my $count_of_basic=0;
my $count_of_neutral=0;
my @prot;
my $prot_filename;
my $line;
my $sequence;
my $aa;

#print "PLEASE ENTER THE FILENAME OF THE PROTEIN SEQUENCE:=";
#chomp($prot_filename=proteininfile.txt);
$prot_filename=proteininfile.txt;
open(PROTFILE,$prot_filename) or die "unable to open the file";
@prot=<PROTFILE>;
close PROTFILE;


foreach $line (@prot) {

# discard blank line
if ($line =~ /^\s*$/) {
next;

# discard comment line
} elsif($line =~ /^\s*#/) {
next;

# discard fasta header line
} elsif($line =~ /^>/) {
next;

# keep line, add to sequence string
} else {
$sequence .= $line;
}
}

# remove non-sequence data (in this case, whitespace) from $sequence string
$sequence =~ s/\s//g;
@prot=split("",$sequence); #splits string into an array
print " \nThe original PROTEIN file is:\n$sequence \n";

while(@prot){
$aa = shift (@prot);
if($aa =~/[DNEQ]/ig){
$count_of_acidic++;
}
if($aa=~/[KRH]/ig){
$count_of_basic++;
}
if($aa=~/[DNEQKRH]/ig){
$count_of_neutral++;
}
}

print "\nNumber of acidic amino acids:".$count_of_acidic."\n";
print "Number of basic amino acids:".$count_of_basic."\n";
print "Number of neutral amino acids:".$count_of_neutral."\n";

                          
