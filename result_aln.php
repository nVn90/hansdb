<?php include("design/header.html"); 
session_start();
?>
<div class="wrapper4 row2">
  <br/><br/>
<h3><font color="#252222">Search using FASTA sequence </font></h3>
    <div class="wrapper2 row3">
</div>
<?php
$protein_aln=$_POST["pro_aln"];
#echo $protein_seq;
$inp="input_aln.txt";
$fileopen=fopen($inp, "a");
$saveseq=$protein_aln;
fwrite($fileopen,$saveseq);
fclose($fileopen);
$command="perl program/seq_length.pl $inp";
echo $command;
system($command);
unlink('input_aln.txt');
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>




<?php include("design/footer.html"); ?>
