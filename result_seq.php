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
//system($command);
$fileopen=@fopen("program/output", "r") or die("Unable to open file!");
?>
<table border="2px">
  <tr><th>Features</th><th>Values</th></tr>
<?php
while(!feof($fileopen)){
    
$mutmatrix[] = fgets($fileopen);
//echo "\n";

//$splitmatrix=preg_split("/[\t]/", $mutmatrix[0];
}
$length= count($mutmatrix);
//echo $length;
$length2=$length-1;
//echo $length2;
//$x=0;
for ($x = 0; $x < $length2; $x++) 
//while($x<$length2)
{

$splitmatrix2=explode("\t", $mutmatrix[$x]);

    if ($splitmatrix2[14]==0){

?><tr><td>PSAP-Mut</td><td><?php echo $splitmatrix2[4];?></td></tr>
<tr><td>(PSAP-W)-(PSAP-Mut)</td><td><?php echo $splitmatrix2[5];?></td></tr>
<tr><td>Gribs-Mut</td><td><?php echo $splitmatrix2[6];?></td></tr>
<tr><td>(Gribs-W)-(Gribs-Mut)</td><td><?php echo $splitmatrix2[7];?></td></tr>
<tr><td>Secondary Structure (SS)</td><td><?php echo $splitmatrix2[8];?></td></tr>
<tr><td>Solvent Accesbility(SA)</td><td><?php echo $splitmatrix2[9];?></td></tr>
<tr><td>Blosum Score</td><td><?php echo $splitmatrix2[10];?></td></tr>
<tr><td>Free-Energy</td><td><?php echo $splitmatrix2[11];?></td></tr>
<?php
}
elseif ($splitmatrix2[14]==1){

?><tr><td>PSAP-Mut</td><td><?php echo $splitmatrix2[4];?></td></tr>
<tr><td>(PSAP-W)-(PSAP-Mut)</td><td><?php echo $splitmatrix2[5];?></td></tr>
<tr><td>Gribs-Mut</td><td><?php echo $splitmatrix2[6];?></td></tr>
<tr><td>(Gribs-W)-(Gribs-Mut)</td><td><?php echo $splitmatrix2[7];?></td></tr>
<tr><td>Secondary Structure (SS)</td><td><?php echo $splitmatrix2[8];?></td></tr>
<tr><td>Solvent Accesbility(SA)</td><td><?php echo $splitmatrix2[9];?></td></tr>
<tr><td>Blosum Score</td><td><?php echo $splitmatrix2[10];?></td></tr>
<tr><td>Free-Energy</td><td><?php echo $splitmatrix2[11];?></td></tr>
<?php
}

}
?>
</table>
  
<?php unlink('input_seq.txt');
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>




<?php include("design/footer.html"); ?>
