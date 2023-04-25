<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');
?>


<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>TroubleShootr's Frequently Asked Questions</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<header id="header" class="header">
			<h2 class="logo">TroubleShootr</h2>
			<nav class="navigation">
				<a href="#" class="navigation_item">Home</a>
				<a href="profile.html" class="navigation_item">Profile</a>
            	<a href="faq_page.html" class="navigation_item">FAQ</a>
				<a href="#" class="navigation_item">Settings</a>
				<a href="#" class="navigation_item">Sign Out</a>
			</nav>
		</header>
		<div id="page-container">
			<main id="main">
				<div class="questions_box">
					<div class="title">
						<h2 class="title">TroubleShootr's Frequently Asked Questions</h2>
					</div>
					<div class="questions_list">
						<div class="question">
							<h2>1. First Question</h2>
							<p>Example Answer</p>
						</div>
						<div class="question">
							<h2>2. First Question</h2>
							<p>Example Answer</p>
						</div>
						<div class="question">
							<h2>3. First Question</h2>
							<p>Example Answer</p>
						</div>
						<div class="question">
							<h2>4. First Question</h2>
							<p>Example Answer</p>
						</div>
						<div class="question">
							<h2>5. First Question</h2>
							<p>Example Answer</p>
						</div>
						<div class="question">
							<h2>6. First Question</h2>
							<p>Example Answer</p>
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
