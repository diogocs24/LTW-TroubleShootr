<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home Page</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body onload="onload()">
		<header id="header" class="header">
			<h2 class="logo"><a href="home_page.php">TroubleShootr</a></h2>
			<nav class="navigation">
				<a href="home_page.php" class="navigation_item">Home</a>
				<a href="about_page.php" class="navigation_item">About</a>
				<a href="faq_page.php" class="navigation_item">FAQ</a>
				<button class="btnLogin">Login</button>
			</nav>
		</header>
		<div id="page-container">
			<main id="main">
				<div class="content">
					<h1 data-text="Troubleshoot with us!">Troubleshoot with us!</h1>
					<p>Get efficient and effective 
						support from our team and solve any problem, no matter how big or small. Join us now and 
						let's troubleshoot together!</p>
				</div>
				<div class="wrapper">
					<span class="icon-close"
						><ion-icon name="close"></ion-icon
					></span>
					<div class="form-box login">
						<h2>Login</h2>
						<form action="#">
							<div class="input-box">
								<span class="icon"><ion-icon name="mail"></ion-icon></span>
								<!--Change the type to email-->
								<input type="text" required/>
								<label>Email</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></span>
								<input type="password" required>
								<label>Password</label>
							</div>
							<div class="remember-forgot">
								<label><input type="checkbox">Remember me</label>
								<a href="#">Forgot Password</a>
							</div>
							<button type="submit" class="btn">Login</button>
							<div class="login-register">
								<p>Don't have an account? <a href="#" class="register-link">Register</a></p>
							</div>
						</form>
					</div>
					<div class="form-box register">
						<h2>Registration</h2>
						<form action="#">
							<div class="input-box">
								<span class="icon"><ion-icon name="person"></ion-icon></span>
								<input type="text" required />
								<label>Username</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="mail"></ion-icon></span>
								<!--Change the type to email-->
								<input type="email" required />
								<label>Email</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
								<input type="password" required />
								<label>Password</label>
							</div>
							<div class="remember-forgot">
								<label
									><input type="checkbox" />I agree to the terms & conditions</label
								>
							</div>
							<button type="submit" class="btn">Register</button>
							<div class="login-register">
								<p>
									Already have an account?
									<a href="#" class="login-link">Login</a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</main>
			<?php draw_footer(); ?>
		</div>
		<script src="script_dark-theme.js"></script>
		<script src="script.js"></script>
		<script
			type="module"
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
		></script>
		<script
			nomodule
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
		></script>
	</body>
</html>
