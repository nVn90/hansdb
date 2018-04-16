<?php include("design/header.html"); 
session_start();
?>

<SCRIPT TYPE="text/javascript">

function popup(mylink, windowname, w, h)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
myWindow=window.open(href, windowname, "width="+w+",height="+h+",scrollbars=yes" );
myWindow.document.bgcolor="#e74c3c";
return false;
}

</SCRIPT>

<div class="wrapper4 row2">
  <br/>
  <?php
$mutmatrix= array();
$swiss_id=$_POST["swiss_id"];
//echo $protein_seq;
$swiss_id2=trim($swiss_id);
?>
<h3><font color="# ">SWISSPORT ID : &nbsp;&nbsp;<font color=" #e74c3c"><?php echo $swiss_id2; ?></font></font></h3>
    <div class="wrapper2 row3">
</div>
    <div class="wrapper1">
<?php
$inp=$swiss_id2.".out";
//echo $inp;
$inp_swiss_file="Data_for_Db/".$inp;
$fileopen=@fopen("$inp_swiss_file", "r") or die("Unable to open file!");
//echo $inp_swiss_file;
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
//echo $length;
    ?>
    <br/>
    <?php
$x=0;
$y=0;
$i=0;
?>
<br/>

    <div class="zui-wrapper">
    <div class="zui-scroller">
        <table class="zui-table">
            <thead>
      
        <tr>
          <th class="zui-sticky-col">
    

Sequence<br/><br/><br/>
A<br/>
C<br/>
D<br/>
E<br/>
F<br/>
G<br/>
H<br/>
I<br/>
K<br/>
L<br/>
M<br/>
N<br/>
P<br/>
Q<br/>
R<br/>
S<br/>
T<br/>
V<br/>
W<br/>
Y<br/>
<!--</div>-->

</th>

<?php

while($i < $length-1) {
//echo $i;

$splitmatrix=explode("\t", $mutmatrix[$i]);
?>

<td>
<center><B>
<?php
echo  $splitmatrix[1];
?>
<br/>
&#124;
</br>
<?php
echo  $splitmatrix[2];
?>
</B></center>
<?php
$y=$i+19;
//echo $i;
//echo $y;
for ($x = $i; $x <= $y; $x++) {
$splitmatrix2=explode("\t", $mutmatrix[$x]);
    if ($splitmatrix2[12]==0){
       
?>
<br/>
<a href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>" onClick="return popup(this, 'output data', '400', '500')"><span  style="background-color: #00ff00;" ><B>
    <div class="circleG">
    
<?php //echo   $splitmatrix2[3];
?>
        
    </div> </B></span></a>

    <?php
}
    elseif ($splitmatrix2[12]==1){

?>
<br/>
<a href="swisspopup.php?id=<?php echo $swiss_id2 ; ?>_<?php echo $splitmatrix2[2] ; ?>_<?php echo $splitmatrix2[3] ; ?>"  onClick="return popup(this, 'output data', '400', '500')"><span  style="background-color: #FF0000; "><B>
    <div class="circleR">
 <?php //echo   $splitmatrix2[3]; ?> 
        </div>   </B></span></a> 
    <?php
}
else {
?>
<br/>  
    <?php
echo   $splitmatrix2[3];
?>        
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
</tr></tbody>
        </table>
    </div>
</div>

<?php

        ?></div></div>






<?php include("design/footer.html"); ?>
