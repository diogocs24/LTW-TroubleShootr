<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="style.css" rel="stylesheet" />
		<title>Setting Page</title>
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
				<div id="settings">
					<div id="settings_text">
						<h1 class="settings_title">Settings</h1>
						<div class="settings_row">
							<p>
							Dark-Mode:
							</p>
							<img src="moon-outline.svg" id="dark-mode-icon" onclick="darkmode()">
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
						</div>
						<div class="settings_row">
							<p>
							Other Setting:
							</p>
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
