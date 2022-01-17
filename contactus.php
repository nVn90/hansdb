<title>Contact Us | HANS Database</title>
<?php include("design/header.html"); ?>

<body>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php include("design/main-navigation.php"); ?>
	<header class="main-header">
		<div class="container">
			<h3>Contact Us</h3>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="login-blue p-3 shadow-lg rounded">
					<div class="pt-3">
						<h3 class="text-white ">Have Some Questions?</h3>
					</div>
					<hr>
					<form action="" method="POST">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Enter Your Full Name">
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="Enter Your Email">
						</div>
						<div class="form-group">
							<textarea name="message" rows="5" class="form-control" placeholder="Write Your Message"></textarea>
						</div>
						<div class="form-group">
							<div class="g-recaptcha" data-sitekey="6Lc0qwoeAAAAAMs9dK94D3xPOUC1ERjwuAA0EtVp"></div>
						</div>
						<input name="submit" type="submit" value="Send Your Details" class="btn  btn-outline-light col">
						<br>
						<br>
						<input type="reset" value="Reset" class="btn  btn-outline-warning col">
					</form>
					<div class="status" style="margin: 10px auto; text-align:center; color: white;">
					<?php
if (isset($_POST['submit'])) {
	$secretKey = "6Lc0qwoeAAAAADl61RPM5Og3XMIxRBk4SxH-pSyC";
	$responseKey = $_POST['g-recaptcha-response'];
	$userIP = $_SERVER['REMOTE_ADDR'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

	$response = file_get_contents($url);
	$response = json_decode($response);
	if ($response->success) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$email_from = "example@yourdomain.com";
		$email_sub = "New Message from HansDB";
		$email_body = "Name: $name\nEmail: $email\nMessage: $message";

		$to_email = "varamesh@cdfd.org.in";
		$headers = "From: $email_from \r\n";
		$headers .= "Reply-To: $email \r\n";

		$ratval = mail($to_email, $email_sub, $email_body, $headers);
		if ($ratval == true) {
			echo "Message Sent Successfully";
		}
		else {

			echo "Ugh! Message Not Sent";
		}
	}
	else {
		echo "reCaptcha not varified, try again!";
	}
}
?>
				</div>
				</div>
			</div>
			<div class="col-md-3"></div>
			
		</div>
	</div>
	<?php include("design/footer.html"); ?>


</body>

</html>