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
$mut_seq=$_POST["mutat_list"];

//write input form sequence to file

$seq_inp = "program/input_seq.txt";
$input = fopen($seq_inp, 'w') or die("can't write file");
$input1 = $protein_seq;
fwrite($input,$input1);
fclose($input);

//write mutation list to file

$mut_inp = "program/mut_list_seq.txt";
$mut_input = fopen($mut_inp, 'w') or die("can't open file");
$mut_input1 = $mut_seq;
fwrite($mut_input,$mut_input1);
fclose($mut_input);

$sequence_result = "program/output";
$output = fopen($sequence_result, 'w') or die("can't open file");

//echo $protein_seq;
$uploadfile = "program/" . basename($_FILES['localFasta']['name']);
move_uploaded_file($_FILES['localFasta'] ['tmp_name'], "program/{$_FILES['localFasta'] ['name']}");
$show_uplodseq = file("$uploadfile");

//echo $uploadfile;
//$targetdir = 'program/';   
      // name of the directory where the files should be stored
  //$targetfile = $targetdir.$_FILES['file']['name'];

  //if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
    // file uploaded succeeded
  //} else { 
    // file upload failed
  //}
//$fileopen=@fopen("program/output", "r") or die("Unable to open file!");
if($protein_seq !=''){

$command="perl program/seq_length.pl $seq_inp $mut_inp $sequence_result";

echo $command;
?>

<table border="2px">
  <tr><th>Features</th><th>Values</th></tr>
<?php
while(!feof($sequence_result)){
    
$mutmatrix[] = fgets($sequence_result);
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
<?php
system($command);
}
else if($uploadfile !=''){
$command="perl program/seq_length.pl $uploadfile $mut_inp $sequence_result";
echo $command;
//system($command);
?>
<table border="2px">
  <tr><th>Features</th><th>Values</th></tr>
<?php
while(!feof($sequence_result)){
    
$mutmatrix[] = fgets($sequence_result);
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
<?php


}
else{

}

?>
<br/>
<?php
//echo $show_uploadseq;
?>
<br/>
<?php
//echo $seq_mutat;
?>
<br/>
<?php
//$inp="input_seq.txt";
//$fileopen=fopen($inp, "a");
//$saveseq=$protein_seq;
//fwrite($fileopen,$saveseq);
//fclose($fileopen);
//$command="perl program/seq_length.pl $inp";
#echo $command;
//system($command);

?>

  
<?php //unlink('input_seq.txt');
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>




<?php include("design/footer.html"); ?>
