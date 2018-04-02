<?php include("design/header.html"); 
session_start();
?>
<div class="wrapper4 row2">
  <br/><br/>
<h3><font color="#252222">Search using FASTA sequence </font></h3>
    <div class="wrapper2 row3">
</div>
<?php
$protein_seq=$_POST["pro_seq"];
$seq_mutat=$_POST["mutat_list"];
//echo $protein_seq;
$uploadfile = "program/" . basename($_FILES['localFasta']['name']);
move_uploaded_file($_FILES['localFasta'] ['tmp_name'], "program/{$_FILES['localFasta'] ['name']}");
$show_uplodseq = file("$uploadfile");
?>
<br/>
<?php
echo $show_uploadseq;
?>
<br/>
<?php
echo $seq_mutat;
?>
<br/>
<?php
$inp="input_seq.txt";
$fileopen=fopen($inp, "a");
$saveseq=$protein_seq;
fwrite($fileopen,$saveseq);
fclose($fileopen);
$command="perl program/seq_length.pl $inp";
#echo $command;
system($command);
unlink('input_seq.txt');
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>




<?php include("design/footer.html"); ?>
