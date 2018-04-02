<?php
if (isset($_REQUEST['page']))
{
if($_REQUEST['page'] !="")
if(file_exists("pages/".$_REQUEST['page'].".html"))
$page_content = file_get_contents("pages/".$_REQUEST['page'].".html");
else
if (file_exists($_REQUEST['page'].".html"))
$page_content = file_get_contents($_REQUEST['page'].".html");
else
echo "<center>Page:".$_REQUEST['page']." does not exist! Please check the url and try again!</center>";
}
else
$page_content = file_get_contents("pages/main.html");
$page_content = str_replace("!!HEADER!!", file_get_contents("design/header.html"),$page_content);
$page_content = str_replace("!!FOOTER!!", file_get_contents("design/footer.html"),$page_content);

echo $page_content;
?>
