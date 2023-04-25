<?php declare(restrict_types = 1);
require_once(__DIR__.'/../php/drawcommon.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>TroubleShootr's Frequently Asked Questions</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="faq-page-container">
			<div class="faq_main_box">
				<div class="faq_message">
					<span class="troubleshootr_logo"></span>
					<h2 class="faq_message_title">
						TroubleShootr's Frequently Asked Questions
					</h2>
				</div>
				<form action="#" class="faq_input">
					<label class="label">User's question</label>
					<input type="text" class="input" />
					<label class="label">Answer</label>
					<textarea class="input"></textarea>
					<input type="submit" value="Send" class="submit_btn" />
				</form>
			</div>
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
