<?php
session_start();
error_reporting(E_ALL);
include "koneksi.php";
if (empty($_SESSION['nick'])) {
	if (isset($_COOKIE['nick'])) {
		$_SESSION['nick'] = $_COOKIE['nick'];
		header("location:" . $_SERVER['PHP_SELF']);
	} else {
		belum_login();
	}
} else {
	sudah_login();
}
function belum_login()
{
?>
	<!doctype html>
	<html lang="en">
	<meta charset="utf-8">

	<head>
		<title> SandiChat </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="icon" href="assets/img/logo.png">

		<script src="bootstrap/js/jQuery.js"></script>
		<script src="ajaxku.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>

	</head>

	<body>
		<!-- ======= Header ======= -->
		<section id="header" class="container-fluid">
			<div class="container d-flex align-items-center">
				<h1 class="logo mr-auto"><a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"> SandiChat</a></h1>
			</div>
		</section>
		<!-- End Header -->

		<!-- Start Login Section -->
		<section id="login" class="appointment section-bg">
			<div class="container">
				<div class="section-title">
					<h2>SandiChat</h2>
					<p>Simple Chat Application Secured With End-to-End Super Encryption</p>
				</div>
				<form method="post" id="formmasuk" role="form" class="php-email-form" action="">
					<div class="form-row">
						<div class="col-md-6 form-group">
							<input type="text" class="form-control" id="nick" placeholder="Username" required x-moz-errormessage='Form harus diisi 5-10 Karakter !' pattern="[a-zA-Z1-9]{5,10}">
							<div class="validate"></div>
						</div>
						<div class="col-md-6 form-group">
							<input type="password" class="form-control" name="pass" id="pass" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars without space" pattern="[a-zA-Z1-9]{4,20}">
							<div class="validate"></div>
						</div>
					</div>
					<div class="text-center"><button type="submit" id="masuk">Login</button></div>
				</form>
				<br>
			</div>
			<p id="notif"></p>
		</section>
		<!-- End Login Section -->

		<!-- Start Register Section -->
		<section id="appointment" class="appointment section-bg bg-light">
			<div class="container">
				<div class="section-title">
					<p>Don't Have an Account ?</p>
					<h2>Please Register</h2>
				</div>
				<form method="post" id="formdaftar" role="form" class="php-email-form" action="">
					<div class="form-row">
						<div class="col-md-4 form-group">
							<input type="text" class="form-control" id="dnick" placeholder="Username" required x-moz-errormessage='Form harus diisi 5-10 Karakter !' pattern="[a-zA-Z1-9]{5,10}">
							<div class="validate"></div>
						</div>
						<div class="col-md-4 form-group">
							<input type="email" class="form-control" id="email" placeholder="Email">
							<div class="validate"></div>
						</div>
						<div class="col-md-4 form-group">
							<input type="password" class="form-control" name="dpass" id="dpass" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars without space" pattern="[a-zA-Z1-9]{4,20}">
							<div class="validate"></div>
						</div>
					</div>
					<div class="text-center"><button type="submit" id="daftar">Register</button></div>
				</form>
				<br>
			</div>
			<p id="dnotif"></p>
		</section>

		<!-- ======= Footer ======= -->
		<footer id="footer">
			<div class="container md-flex py-4">
				<div class="mr-md-auto text-center">
					<div class="text-center copyright">
						&copy; Copyright <strong><span>abdulghani28</span></strong>.
					</div>
					<div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
						Template Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

	</body>

	</html>
<?php }
function sudah_login()
{
?>
	<!doctype html>
	<html lang="en">

	<head>
		<title> Sandichat's Room </title>
		<meta charset="utf-8">
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="icon" href="assets/img/logo.png">

		<script src="bootstrap/js/jQuery.js"></script>
		<script src="ajaxku.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
	</head>

	<body>
		<!-- ======= Header ======= -->
		<section id="header" class="container-fluid">
			<div class="container d-flex align-items-center">
				<h1 class="logo mr-auto"><a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"> SandiChat</a></h1>
				<nav class="nav-menu d-none d-lg-block">
					<ul>
						<li><a href="logout.php"> Logout </a></li>
					</ul>
				</nav>
			</div>
		</section>
		<!-- End Header -->

		<!-- Start Header Section -->
		<section id="appointment" class="appointment section-bg">
			<div class="container">
				<div class="section-title">
					<h2>SandiChat's Room</h2>
				</div>
			</div>
		</section>
		<!-- End Header Section -->

		<!-- Start Chatbox Section -->
		<section class="appointment bg-light">
			<div class="container-sm">
				<div class="row">
					<div class="bg-info border border-light p-2" style="height: 50px; width : 75%">
						<h4 class="text-center text-light">Chat Box</h4>
					</div>
					<div class="bg-info border border-light p-2" style="height: 50px; width : 25%">
						<h4 class="text-center text-light">Online</h4>
					</div>
				</div>
				<div class="row">
					<div class="border overflow-auto" style="height: 300px; width : 75%">
						<br>
						<div id="boxpesan">
						</div>
					</div>
					<div class="border overflow-auto" style="height: 300px; width : 25%">
						<br>
						<div class="boxonline">
						</div>
					</div>
				</div>
			</div>
			</br>
			<div class="container text-center">
				<div class="">
					<form method="post" action="" id="formpesan" class="php-email-form">
						<div class="form-group">
							<input class="form-control input-xlarge" name="pesan" type="text" placeholder="Ketik Pesan kemudian Enter !" required x-moz-errormessage="Ketik pesannya gan !">
						</div>
						<div class="form-group">
							<input type='submit' value='Kirim' class='btn btn-info' id='pencet'>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- End Chatbox Section -->

		<!-- ======= Footer ======= -->
		<footer id="footer">
			<div class="container md-flex py-4">
				<div class="mr-md-auto text-center">
					<div class="text-center copyright">
						&copy; Copyright <strong><span>abdulghani28</span></strong>.
					</div>
					<div class="credits">
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
						Template Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

	</body>

	</html>
<?php
}
