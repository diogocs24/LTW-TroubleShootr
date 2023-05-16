<?php function draw_header() { ?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home Page</title>
		<link rel="stylesheet" href="/../css/style.css" />
		<script src="/../scripts/script_dark-theme.js" defer> </script>
		<script src="/../scripts/script.js" defer> </script>
	</head>
	<body onload="onload1()">
		<header id="header" class="header">
			<h2 class="logo"><a href="home_page1.php">TroubleShootr</a></h2>
			<nav class="navigation">
				<a href="home_page1.php" class="navigation_item">Home</a>
				<a href="about_page.php" class="navigation_item">About</a>
				<a href="faq_page.php" class="navigation_item">FAQ</a>
				<button class="btnLogin">Login</button> 
			</nav>
		</header>

<?php } ?>

<?php function draw_header_logged_in() { ?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home Page</title>
		<link rel="stylesheet" href="/../css/style.css" />
		<script src="/../scripts/script_dark-theme.js" defer> </script>
		<script src="/../scripts/script.js" defer> </script>
	</head>
	<body onload="onload1()">
		<header id="header" class="header">
			<h2 class="logo"><a href="home_page1.php">TroubleShootr</a></h2>
			<nav class="navigation">
			<a href="home_page1.php" class="navigation_item">Home</a>
			<a href="profile_page.php" class="navigation_item">Profile</a>
			<a href="faq_page.php" class="navigation_item">FAQ</a>
			<a href="settings_page.php" class="navigation_item">Settings</a>
			<a href="home_page1.php" class="navigation_item">Sign Out</a>
			</nav>
		</header>

<?php } ?>

<?php
function draw_footer(){
?>
<footer id="footer">
				<div class="copyright">
					<ul class="left">
						<li>&copy;2023 TroubleShootr</li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
					<ul class="right">
						<li><a href="home_page.html">TroubleShootr</a></li>
						<li>
							<a href="https://twitter.com/" target="_blank"
								><ion-icon name="logo-twitter"></ion-icon
							></a>
						</li>
						<li>
							<a href="https://facebook.com/" target="_blank"
								><ion-icon name="logo-facebook"></ion-icon
							></a>
						</li>
						<li>
							<a href="https://linkedin.com/" target="_blank"
								><ion-icon name="logo-linkedin"></ion-icon
							></a>
						</li>
						<li>
							<a href="https://www.youtube.com/" target="_blank"
								><ion-icon name="logo-youtube"></ion-icon
							></a>
						</li>
					</ul>
				</div>
			</footer>
			</div>
<?php } ?>

<?php function draw_script(){ ?>
<script src="/../scripts/script_dark-theme.js"></script>
		<script src="/../scripts/script.js"></script>
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

<?php } ?>

<?php function draw_main(){ ?> 
	
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

					<div>
						<?php
						if(isset($_POST['create'])) {
							echo 'User submitted';
						}
						?>
					</div>

					<div class="form-box register">
						<h2>Registration</h2>
						<form method='post' action="/../a/registration.php">
							<div class="input-box">
								<span class="icon"><ion-icon name="person"></ion-icon></span>
								<input type="text" name="username" required />
								<label>Username</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="mail"></ion-icon></span>
								<!--Change the type to email-->
								<input type="text" name="email" required />
								<label>Email</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
								<input type="password" name="password" required />
								<label>Password</label>
							</div>
							<div class="remember-forgot">
								<label
									><input type="checkbox" />I agree to the terms & conditions</label
								>
							</div>
							<button type="submit" name="create" class="btn">Register</button>
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
	<?php } ?>
