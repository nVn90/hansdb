<div class="popupbg">

  <br/>
<?php
$idswiss= $_GET['id'];
//echo $idswiss;
$splitid=explode("_", $idswiss);
?>
        </br>    

  <?php
echo $splitid[0];
?>
        </br>    

  <?php

echo $splitid[1];
?>
        </br>    

  <?php
  echo $splitid[2];

  $inp=$splitid[0].".out";
echo $inp;
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
for($i=0; $i < $length2; $i++) {
	
//echo $i;

$splitmatrix=explode("\t", $mutmatrix[$i]);


if(($splitmatrix[2]==$splitid[1]) && ($splitmatrix[3] == $splitid[2])){

echo $splitmatrix[4];
?>
<br/>
<?php

echo $splitmatrix[5];
?>
<br/>
<?php

echo $splitmatrix[6];
?>
<br/>
<?php

echo $splitmatrix[7];
?>
<br/>
<?php
echo $splitmatrix[8];
?>
<br/>
<?php

echo $splitmatrix[9];
?>
<br/>
<?php

echo $splitmatrix[10];
?>
<br/>
<?php

echo $splitmatrix[11];
?>
<br/>
<?php
echo $splitmatrix[12];
?>
<br/>
<?php

echo $splitmatrix[13];
?>
<br/>
<?php


}
else{
	
}

}

?>
<br/><br/><br/>
</div>

