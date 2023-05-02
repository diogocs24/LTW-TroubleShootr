<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="style.css" rel="stylesheet" />
		<title>About Page</title>
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

                <div id="about">
					<div id="about_text">
						<h1 class="about_title">About Us</h1>
						<p>Thanks for visiting Troubleshoot with Us! We are a committed group of technical support experts available to assist you with any issue, no matter how big or minor. We can assist you whether you're having problems resolving a technical problem or need help configuring a device.<br><br>
							At Troubleshoot with Us, we think that technology should enhance your life, not make it more difficult. Our goal is to give you excellent, efficient technical support so you can get the most out of your products and services. We take pride in our ability to deliver specialized solutions that are tailored to your specific needs and solve issues fast.<br><br>
							Whether you're a small business owner or a home user, we're here to help you overcome your technology challenges. Join us now and let's troubleshoot together!</p>
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
