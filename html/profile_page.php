<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="style.css" rel="stylesheet" />
		<title>Profile Page</title>
		<script src="script_dark-theme.js"></script>
	</head>

	<body onload="onload()">
		<header id="header" class="header">
			<h2 class="logo"><a href="home_page.php">TroubleShootr</a></h2>
			<nav class="navigation">
				<a href="home_page.php" class="navigation_item">Home</a>
				<a href="profile_page.php" class="navigation_item">Profile</a>
				<a href="faq_page.php" class="navigation_item">FAQ</a>
				<a href="settings_page.php" class="navigation_item">Settings</a>
				<a href="#" class="navigation_item">Sign Out</a>
			</nav>
		</header>
		<div id="page-container">
			<main id="main">
				<div id="info">
					<div id="info_text">
						<h1 class="user_profile_title">User Profile</h1>
						<div class="row">
							<div class="attribute">
								<span class="label">Name:</span>
								<span class="text_input">João da Silva</span>
							</div>
							<div class="single-input">
								<input
									type="text"
									class="user_profile_input"
									id="name"
									required
								/>
								<label for="#">New Name</label>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Username:</span>
								<span class="text_input">@joaosilva</span>
							</div>
							<div class="single-input">
								<input
									type="text"
									class="user_profile_input"
									id="username"
									required
								/>
								<label for="#">New Username</label>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Birth Date:</span>
								<span class="text_input">1/1/2000</span>
							</div>
							<div class="single-input">
								<input
									type="text"
									class="user_profile_input"
									id="date"
									required
								/>
								<label for="#">Date</label>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Email:</span>
								<span class="text_input">joao@up.pt</span>
							</div>
							<div class="single-input">
								<input
									type="text"
									class="user_profile_input"
									id="email"
									required
								/>
								<label for="#">New Email</label>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Password:</span>
								<span class="text_input">●●●●●●●●</span>
							</div>
							<div class="single-input">
								<input
									type="password"
									class="user_profile_input"
									id="password"
									required
								/>
								<label for="#">New Password</label>
							</div>
						</div>
						<div class="row">
							<div class="attribute"></div>
							<div class="single-input">
								<input
									type="password"
									class="user_profile_input"
									id="confirm_password"
									required
								/>
								<label for="#">Confirm Password</label>
							</div>
						</div>
					</div>
					<div id="profile_img">
						<img src="profile_image.jpg" alt="profile image" />
						<div id ="profile_img_text">
							<button class="button">Change Picture <ion-icon name="camera-outline"></ion-icon></button>
						</div>
					</div>
				</div>
			</main>
			<?php draw_footer(); ?>
		</div>

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
