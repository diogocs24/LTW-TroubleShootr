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
 <?php } ?>

 <?php function draw_nav2() {?>
<nav class="navigation">
	<a href="home_page.php" class="navigation_item">Home</a>
	<a href="profile_page.php" class="navigation_item">Profile</a>
	<a href="faq_page.php" class="navigation_item">FAQ</a>
	<a href="settings_page.php" class="navigation_item">Settings</a>
	<a href="#" class="navigation_item">Sign Out</a>
</nav>
<?php }?>

<?php function draw_nav1() {
?>
<nav class="navigation">
				<a href="home_page.php" class="navigation_item">Home</a>
				<a href="about_page.php" class="navigation_item">About</a>
				<a href="faq_page.php" class="navigation_item">FAQ</a>
				<button class="btnLogin">Login</button>
			</nav>
<?php }?>