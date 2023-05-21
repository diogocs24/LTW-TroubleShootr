<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php'); 
require_once(__DIR__ . '/../database/ticket.php');
require_once(__DIR__ . '/../database/message.php');
require_once(__DIR__ . '/../database/user.php');
require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/ticket_hashtag.php');
require_once(__DIR__ . '/../database/hashtag.php');
require_once(__DIR__ . '/../database/departments.php');
?>

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
				<?php draw_wrapper()?>
            </main>
			
<?php } ?>

<?php function draw_home_page1(){ ?>
	<div id="page-container">
		<main id="main">
				<div class="content">
					<h1 data-text="Troubleshoot with us!">Troubleshoot with us!</h1>
					<p>Get efficient and effective 
						support from our team and solve any problem, no matter how big or small. Join us now and 
						let's troubleshoot together!</p>
				</div>	
<?php } ?>

<?php function draw_faq($db, $user, $id, $faq) { ?>
	<div id="page-container">
			<main id="main">
				<div class="questions_box">
					<div class="title">
						<h2 class="title">TroubleShootr's Frequently Asked Questions</h2>
						<?php if($user->isAgent($db,$id)){ ?>
							<a href="add_question_faq.php"
							><button class="add_question">
								<ion-icon name="add-circle"></ion-icon></button
							></a>
						<?php }?>
					</div>
					<div class="questions_list">
					<?php foreach($faq as $question){ ?>
						<div class="question">
							<h2><?php echo $question->title?></h2>
							<p><?php echo $question->FAQmessage?></p>
						</div>
					<?php } ?>	
					</div>
				</div>
			</main>
<?php } ?>

<?php function draw_answer_ticket($db , $opened_tickets) { ?>
	<div id="page-container">
		<main id="main">
			<div class="opened_tickets">
			<?php foreach($opened_tickets as $ticket){ ?>
				<a href="ticket_details_page.php?ticket_id=<?php echo $ticket->idTicket; ?>">
						<div class="ticket">
							<div class="ticket_info">
								<h4><?php echo $ticket->title?></h4>
								<p>Priority: <span><?php echo $ticket->ticket_priority; ?> </span></p>
								<p class="details">Details: <span> <?php echo $ticket->ticket_message ?></span></p>
								<p>Status: <span><?php echo $ticket->ticket_status; ?></span></p>
							</div>
							<div class="ticket_trailing">
								<div class="agent_info">
									<p>Department: <span> <?php echo Department::getDepartmentName($db ,$ticket->idDepartment); ?></span></p>
								</div>
							</div>
						</div>
					</a>
					<?php } ?>
			</div>
			<div class="faq_main_box">
				<div class="faq_message">
					<span class="troubleshootr_logo"></span>
					<h2 class="faq_message_title">
						Ticket
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

<?php function draw_admin_section($all_users) {?> 
	<div id="page-container">
		<main id="main">
	<div class="admin-promote">
    <h2>Promote Users</h2>
    <form action="/../a/promote_user.php" method='post' class="promote_admin">
      <label class="label">Username:</label>
      <select name="username1" required>
		<?php foreach($all_users as $user){ ?>
				<option><?php echo $user->username ?></option>
		<?php } ?>
	  </select>
      <input type="submit" value="Promote" class="promote_btn" name="promote_btn">
    </form>
  </div>

  <div class="admin-department">
    <h2>Create Department</h2>
    <form action="/../a/add_department.php" method='post' class="department_admin">
      <label for="departmentName">Department Name:</label>
      <input type="text" id="departmentName" name="departmentName" required>
      <input type="submit" value="Create" class="submit-department">
    </form>
  </div>
</main>
  </div>

<?php } ?>

<?php function draw_main_page($all_tickets, $user_tickets, $department_tickets, $user, $db, $id) { ?>
	<div id="page-container">
		<main id="main">
            <div id="main_page">
				<div id="main_page_text">
					<h2 class="main_page_title">Tickets</h2>
					<a href="submit_ticket.php">
						<button class="submit_ticket_btn"><ion-icon name="add-circle"></ion-icon></button>
					</a>
				</div>
				<button type="submit" class="btn" onclick="openPopup1()">Submit </button>
					<div class="all_tickets_list" id="popup1">
						<?php foreach($all_tickets as $ticket){ ?>
							<a href="ticket_details_page.php?ticket_id=<?php echo $ticket->idTicket; ?>">
								<div class="ticket">
									<div class="ticket_info">
										<h4><?php echo $ticket->title?></h4>
										<p>Priority: <span><?php echo $ticket->ticket_priority; ?> </span></p>
										<p class="details">Details: <span> <?php echo $ticket->ticket_message ?></span></p>
										<p>Status: <span><?php echo $ticket->ticket_status; ?></span></p>
									</div>
									<div class="ticket_trailing">
										<div class="agent_info">
											<p>Department: <span> <?php echo Department::getDepartmentName($db ,$ticket->idDepartment); ?></span></p>
										</div>
											<?php if($user->isAgent($db,$id)){ ?>
										<div class="response_button">
											<form action="/../a/update_ticket_status.php" method="post">
                	        					<input type="hidden" name="ticket_id" value="<?php echo $ticket->idTicket; ?>">
												<input type="submit" name="open_ticket" value="Send" class="open_ticket">
                	    					</form>
                						</div>
											<?php } ?>
									</div>
								</div>
							</a>
						<?php } ?>
                	</div>
				<button type="button" onclick="closePopup1()"> OK </button>
				<button type="submit" class="btn" onclick="openPopup2()">Submit </button>
				<div class="user_tickets_list" id="popup2">
					<?php foreach($user_tickets as $ticket){ ?>
						<a href="ticket_details_page.php?ticket_id=<?php echo $ticket->idTicket; ?>">
							<div class="ticket">
								<div class="ticket_info">
									<h4><?php echo $ticket->title?></h4>
										<p>Priority: <span><?php echo $ticket->ticket_priority; ?> </span></p>
										<p class="details">Details: <span> <?php echo $ticket->ticket_message ?></span></p>
										<p>Hashtags: <span><?php
                                		$hashtags = Ticket_hashtag::getHashtagsWithTickedId($db,$ticket->idTicket); 
                                		foreach($hashtags as $hashtag){
                                    		echo Hashtag::getHashtagName($db,$hashtag->tag);
											echo " ";
                        					}?></span></p>
										<p>Status: <span><?php echo $ticket->ticket_status; ?></span></p>
								</div>
								<div class="ticket_trailing">
								<div class="agent_info">
									<p>Department: <span> <?php echo Department::getDepartmentName($db ,$ticket->idDepartment); ?></span></p>
								</div>
									<?php if($user->isAgent($db,$id)){ ?>
									<div class="response_button">
										<form action="/../a/update_ticket_status.php" method="post">
                	        			<input type="hidden" name="ticket_id" value="<?php echo $ticket->idTicket; ?>">
										<input type="submit" name="open_ticket" value="Send" class="open_ticket">
                	    				</form>
                					</div>
									<?php } ?>
							</div>
						</div>
						</a>
					<?php } ?>
                </div>
				<button type="button" onclick="closePopup2()"> OK </button>

				<?php if($user->isAgent($db,$id)){ ?>
				<button type="submit" class="btn" onclick="openPopup3()">Submit </button>
						<div class="department_tickets_list" id="popup3">
    						<?php foreach($department_tickets as $ticket){ ?>
								<a href="ticket_details_page.php?ticket_id=<?php echo $ticket->idTicket; ?>">
    			    				<div class="ticket">
    			        				<div class="ticket_info">
    			            				<h4><?php echo $ticket->title?></h4>
    			            				<p>Priority: <span><?php echo $ticket->ticket_priority; ?> </span></p>
    			            				<p class="details">Details: <span><?php echo $ticket->ticket_message ?></span></p>
    			        					<p>Status: <span><?php echo $ticket->ticket_status; ?></span></p>
    			        				</div>
    			        				<div class="ticket_trailing">
    			            				<div class="agent_info">
    			                				<p>Department: <span><?php echo Department::getDepartmentName($db ,$ticket->idDepartment); ?></span></p>
    			            				</div>
    			            			<div class="response_button">
											<form action="/../a/update_ticket_status.php" method="post">
    			                    			<input type="hidden" name="ticket_id" value="<?php echo $ticket->idTicket; ?>">
    			                    			<input type="submit" name="open_ticket" value="Send" class="open_ticket">
    			                			</form>
    			            			</div>
    			        			</div>
								</a>
    						<?php } ?>
						</div>
					<button type="button" onclick="closePopup3()"> OK </button>
				<?php } ?>
			</div>
        </main>
	</div>
<?php } ?>

<?php function draw_profile($username, $email) { ?>
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
							<form action="/../a/update_user.php" method='post' class="form_class" name="new_username">
								<input type="text" class="user_profile_input" name="new_name"/>
								<label for="#">New Name</label>
							</form>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Username: </span>
								<span class="text_input"><?php echo($username) ?></span>
							</div>
							<div class="single-input">
							<form action="/../a/update_user.php" method='post' class="form_class" name="new_username">
								<input type="text" class="user_profile_input" name="new_username"/>
								<label for="#">New Username</label>
							</form>
							</div>
						</div>
						<div class="row">
							<div class="attribute">
								<span class="label">Email:</span>
								<span class="text_input"><?php echo($email)?></span>
							</div>
							<div class="single-input">
							<form action="/../a/update_user.php" method='post' class="form_class" name="new_email">
								<input type="text" class="user_profile_input" name="new_email" />
								<label> New Email</label>
							</form>
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


<?php function draw_submit_ticket($departments) { ?>
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
					<select name="department" required>
					<?php foreach($departments as $department){ ?>
							<option><?php echo $department->name ?></option>
						<?php } ?>
					</select>
					<label class="label">Ticket hashtag</label>
					<input type="text" class="input" name="hashtag"/>
					<input type="submit" value="Send" name="submit_btn" class="submit_btn" />
				</form>
			</div>
	</main>
		</div>
<?php } ?>

<?php function draw_add_question_faq() { ?>
	<div id="page-container">
		<main id="main">
			<div class="faq_main_box">
				<div class="faq_message">
					<h2 class="faq_message_title">
						Ticket Submission
					</h2>
				</div>
				<form action="/../a/faq_class.php" method='post' class="faq_input">
					<label class="label">User's question</label>
					<input type="text" class="input" name="title" required/>
					<label class="label">Answer</label>
					<textarea class="input" name="message" required></textarea>
					<input type="submit" value="Send" name="question_submit_btn" class="submit_btn" />
				</form>
			</div>
		</main>
</div>
<?php } ?>


<?php function draw_ticket_details_page($ticket, array $messages) {?>
	<div id="page-container">
   		<main id="main">
				<div class="chat_page">
					<div class="ticket_details">
						<div class="ticket_details_info">
							<h2 class="ticket_details_title"><?php echo $ticket->title?></h2>
							<p class="ticket_details_text">Priority: <span><?php echo $ticket->ticket_priority; ?> </span></p>
							<p class="details" id="details-content">Details: <span> <?php echo $ticket->ticket_message ?></span></p>
							<p class="ticket_details_text" name="ticket_status">Status: <span><?php echo $ticket->ticket_status; ?></span></p>
						</div>
						<div class="ticket_details_trailing">
							<div class="ticket_details_agent_info">
								<p class="ticket_details_text">Agent: <span> <?php echo $ticket->idAgent; ?></span></p>
							</div>
						</div>
					</div>
					<div class="chat">
						<div class="other_user">
							<span class="name_user"><span> Chat Conversation </span></span>
						</div>
    					<div class="chat-container">
							<?php foreach($messages as $message) draw_message($message); ?>
    					</div>
						<form action="/../a/send_message.php" method='post' class="input-container">
							<input type="hidden" name="idTicket" value="<?php echo $ticket->idTicket; ?>">
    			    		<input type="text" name="message" class="message" placeholder="Type your message">
							<input type="submit" value="Send" name="chat_submit_btn" class="submit_btn" />
						</form>
					</div>
				</div>
    </main>
<?php } ?>

<script>



</script>



<?php function draw_message(Message $message){ 	$db = getDatabaseConnection();?>
	<div class="message">
    	<span class="sender"><span> <?php echo User::getUser($db, $message->idUser)->username ?></span>:</span>
    	<span class="text"><?php echo $message->message; ?></span>
		<span class="message_time"><?php echo date('H:i', strtotime($message->created_at)); ?></span>
    </div>
	<?php } ?>

