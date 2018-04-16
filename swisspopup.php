<html>
<head>
  <style type="text/css">
body{
  margin:0; 
  padding:20px; 
  font-size:14px; 
  font-family:Garamond, "Times New Roman", Times, serif; 
  color:#444444;  
  background-color:#ffcccc;
}

table {
    width: 500px;
    border-radius: 10px;
    overflow: hidden;
    border:2px;
  align-self: center;
    border-collapse: collapse;
    border-spacing: 0;
    vertical-align: top;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
}
table tr th{
  color: #ffffff;
  background: #7ae06c;
  padding-top: 5px;
    padding-bottom: 5px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 30px;
    padding-right: 10px;
}
 table tr td {
  font-size: 14px;
    color: #808080;
    line-height: 18px;
    padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 30px;
  border-bottom: 1px solid #AAAAAA;
}

  </style>
</head>
<body>


  <br/>
<?php
$idswiss= $_GET['id'];
//echo $idswiss;
$splitid=explode("_", $idswiss);
?>
        
<center><B><font size="4" color="red">
  <?php
echo $splitid[0];
?></font></B></center>
        <br/>

  <?php

//echo $splitid[1];
?>
        

  <?php
  //echo $splitid[2];

  $inp=$splitid[0].".out";
//echo $inp;
$inp_swiss_file="Data_for_Db/".$inp;
$fileopen=@fopen("$inp_swiss_file", "r") or die("Unable to open file!");

while(!feof($fileopen)){
    
$mutmatrix[] = fgets($fileopen);
//echo "\n";

//$splitmatrix=preg_split("/[\t]/", $mutmatrix[0];
}
$length= count($mutmatrix);
//echo $length;
$length2=$length-1;
?>
<table>
  <tr><th>Features</th><th>Values</th></tr>
<?php
for($i=0; $i < $length2; $i++) {
	
//echo $i;

$splitmatrix=explode("\t", $mutmatrix[$i]);


if(($splitmatrix[2]==$splitid[1]) && ($splitmatrix[3] == $splitid[2])){
?><tr><td>PSAP-Mut</td><td><?php echo $splitmatrix[4];?></td></tr>
<tr><td>(PSAP-W)-(PSAP-Mut)</td><td><?php echo $splitmatrix[5];?></td></tr>
<tr><td>Gribs-Mut</td><td><?php echo $splitmatrix[6];?></td></tr>
<tr><td>(Gribs-W)-(Gribs-Mut)</td><td><?php echo $splitmatrix[7];?></td></tr>
<tr><td>Secondary Structure (SS)</td><td><?php echo $splitmatrix[8];?></td></tr>
<tr><td>Solvent Accesbility(SA)</td><td><?php echo $splitmatrix[9];?></td></tr>
<tr><td>Blosum Score</td><td><?php echo $splitmatrix[10];?></td></tr>
<tr><td>Free-Energy</td><td><?php echo $splitmatrix[11];?></td></tr>



<?php


}
else{
	
}

}

?></table>




</body>
</html>