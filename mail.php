
<?php include("design/header.html"); ?>

<div class="wrapper4 row2">
  <br/>
<h3><font color="#252222">Contact Us</font></h3>
    <div class="wrapper2 row3">
</div>
<br/><br/>

<?php $name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "emailaddress@here.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>

<br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>


<?php include("design/footer.html"); ?>
