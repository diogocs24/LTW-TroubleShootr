<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php'); 
require_once(__DIR__ . '/../database/ticket.php');
require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/user.php');
?>



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
			<h2 class="logo"><a href="main_page.php">TroubleShootr</a></h2>
			<nav class="navigation">
				<a href="main_page.php" class="navigation_item">Home</a>
				<a href="about_page.php" class="navigation_item">About</a>
				<img src="/../images/moon-outline.svg" id="dark-mode-icon" onclick="darkmode()">
				<button class="btnLogin">Login</button> 
			</nav>
		</header>

<?php } ?>

<?php function draw_header_logged_in($db, $id) { ?>

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
		<script src="/../scripts/popup_tickets.js" defer> </script>

	</head>
	<body onload="onload1()">
		<header id="header" class="header">
			<h2 class="logo"><a href="main_page.php">TroubleShootr</a></h2>
			<nav class="navigation">
			<a href="main_page.php" class="navigation_item">Home</a>
			<a href="profile_page.php" class="navigation_item">Profile</a>
			<?php if(User::isAdmin($db ,$id)) {?>
			<a href="admin_section.php" class="navigation_item">Admin Section</a>
			<?php } ?>
			<?php if(User::isAgent($db, $id)) {?>
			<a href="tickets_agents.php" class="navigation_item">Tickets</a>
			<?php } ?>
			<a href="faq_page.php" class="navigation_item">FAQ</a>
			<img src="/../images/moon-outline.svg" id="dark-mode-icon" onclick="darkmode()">
			<a href="/../a/logout.php" class="navigation_item">Sign Out</a>
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
						<li><a href="main_page.php">TroubleShootr</a></li>
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
		<script src="/../scripts/popup_tickets.js"></script>
		</body>
		<script src="/../scripts/script_height.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>

<?php } ?>

<?php function draw_wrapper(){ ?> 
	
				<div class="wrapper">
					<span class="icon-close"
						><ion-icon name="close"></ion-icon
					></span>
					<div class="form-box login">
						<h2>Login</h2>
						<form method='post' action="/../a/login.php">
							<div class="input-box">
								<span class="icon"><ion-icon name="mail"></ion-icon></span>
								<!--Change the type to email-->
								<input type="text" name = "email" required/>
								<label>Email</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></span>
								<input type="password" name="password" required>
								<label>Password</label>
							</div>
							<div class="remember-forgot">
								<label><input type="checkbox">Remember me</label>
								<a href="#">Forgot Password</a>
							</div>
							<button type="submit" name="login" class="btn">Login</button>
							<div class="login-register">
								<p>Don't have an account? <a href="#" class="register-link">Register</a></p>
							</div>
						</form>
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
								<input type="text" name="email" required />
								<label>Email</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
								<input type="password" name="password" required />
								<label>Password</label>
							</div>
							<div class="input-box">
								<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
								<input type="password" name="password_confirm" required />
								<label>Confirm Password</label>
							</div>
							<div class="remember-forgot">
								<label
									><input type="checkbox" required/>I agree to the terms & conditions</label
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

