<?php include("design/header.html"); 
session_start();
?>

<SCRIPT TYPE="text/javascript">

function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=500,height=300,scrollbars=yes');
return false;
}




</SCRIPT>





<div class="wrapper4 row2">
  <br/><br/>
<h3><font color="#252222">SWISSPORT ID </font></h3>
    <div class="wrapper2 row3">
</div>
    <div class="wrapper1">
<?php
$mutmatrix= array();
$swiss_id=$_POST["swiss_id"];
//echo $protein_seq;
$swiss_id2=trim($swiss_id);
$inp=$swiss_id2.".out";
echo $inp;
$inp_swiss_file="Data_for_Db/".$inp;
$fileopen=@fopen("$inp_swiss_file", "r") or die("Unable to open file!");
echo $inp_swiss_file;
//echo fgets($fileopen);
//$data = file_get_contents('$fileopen', true);
//foreach(file($fileopen) as $line) {
//echo $line[0]."\n";
//}
while(!feof($fileopen)){
    
$mutmatrix[] = fgets($fileopen);
//echo "\n";

//$splitmatrix=preg_split("/[\t]/", $mutmatrix[0];
}
$length= count($mutmatrix);
echo $length;
    ?>
    <br/>
    <?php
$x=0;
$y=0;
$i=0;
?>
<br/>
<div class="containerscroll">

<table border="1px"><tr>


<?php

while($i < $length-1) {
//echo $i;

$splitmatrix=explode("\t", $mutmatrix[$i]);
?>
<td>
<?php
echo  $splitmatrix[1];
?>
<br/>
<?php
echo  $splitmatrix[2];
$y=$i+19;
//echo $i;
//echo $y;
for ($x = $i; $x <= $y; $x++) {
  //print $mutmatrix[$i];
?>

<?php
$splitmatrix2=explode("\t", $mutmatrix[$x]);
    if ($splitmatrix2[14]==0){
?>
<br/>
    <div class="circleR">
    
<a href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>"  style="text-decoration:none;" onClick="return popup(this, 'output data')"><span  style="background-color: #FF0000;" ><B> <?php echo   $splitmatrix2[3];
?> </B></span></a>
        
    </div>

    <?php
}
    elseif ($splitmatrix2[14]==1){
?>
<br/>
    <div class="circleG">
<a href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>"  onClick="return popup(this, 'output data')"><span  style="background-color: #00ff00; "><B> <?php echo   $splitmatrix2[3]; ?> </B></span></a>
        </div>    

    <?php
}
else {
?>
<br/>
    <div class="circleW">
    <?php
echo   $splitmatrix2[3];
?>
        
    </div> 
    <?php
}    

}
?>
<br/>
<?php
$y=$y+1;
$i=$y; 

?>
</td>
<?php
}
?>
</tr></table>

</div>
<?php

        ?></div>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div>




<?php include("design/footer.html"); ?>
