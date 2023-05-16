<?php function draw_about() { ?>
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
<?php } ?>

<?php function draw_faq() { ?>
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
			</main>
<?php } ?>

<?php function draw_agents_faq() { ?>
	<div id="page-container">
			<main id="main">
				<div class="questions_box">
					<div class="title">
						<h2 class="title">TroubleShootr's Frequently Asked Questions</h2>
						<a href="add_question_faq.php"
							><button class="add_question">
								<ion-icon name="add-circle"></ion-icon></button
						></a>
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
<?php } ?>

<?php function draw_add_question_faq() { ?>
	<div id="page-container">
		<main id="main">
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
</main>
		</div>
<?php } ?>

<?php function draw_main_page() { ?>
	<div id="page-container">
		<main id="main">
            <div id="main_page">
				<div id="main_page_text">
					<h2 class="main_page_title">Tickets</h2>
					<a href="submit_ticket.php">
						<button class="submit_ticket_btn"><ion-icon name="add-circle"></ion-icon></button>
					</a>
				</div>
				<div class="tickets_list">
                    <p>Tickets</p>
					<p>AMOD</p>
                </div>
			</div>
        </main>
<?php } ?>

<?php function draw_profile() { ?>
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
						<img src="/../images/profile_image.jpg" alt="profile image" />
						<div id ="profile_img_text">
							<button class="button">Change Picture <ion-icon name="camera-outline"></ion-icon></button>
						</div>
					</div>
				</div>
			</main>		
<?php } ?>

<?php function draw_settings() { ?>
	<div id="page-container">
			<main id="main">
				<div id="settings">
					<div id="settings_text">
						<h1 class="settings_title">Settings</h1>
						<div class="settings_row">
							<p>
							Dark-Mode:
							</p>
							<img src="/../images/moon-outline.svg" id="dark-mode-icon" onclick="darkmode()">
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
<?php } ?>

<?php function draw_submit_ticket() { ?>
	<div id="page-container">
		<main id="main">
			<div class="faq_main_box">
				<div class="faq_message">
					<h2 class="faq_message_title">
						Ticket Submission
					</h2>
				</div>
				<form action="/../a/tickets.php" method='post' class="faq_input">
					<label class="label">Ticket title</label>
					<input type="text" class="input" name="title" required/>
					<label class="label">Ticket message</label>
					<textarea class="input" name="message" required></textarea>
					<label class="label">Ticket department</label>
					<input type="text" class="input" name="department" required/>
					<label class="label">Ticket hashtag</label>
					<input type="text" class="input" name="hashtag" required/>
					<input type="submit" value="Send" name="submit_btn" class="submit_btn" />
				</form>
			</div>
</main>
		</div>
<?php } ?>