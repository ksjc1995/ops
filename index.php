<?php
		session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
	<title>Online polling system</title>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="./css/about.css">
	<link rel="stylesheet" type="text/css" href="./css/contact-form.css">
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/semantic.min.js"></script>
	<script type="text/javascript" src="./js/index.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- menu bar -->

	<div class="ui stackable secondary large fixed menu" id="home-menu">
			  <div class="item">
			  	<img class="fluid ui centered mini rounded image" src="./images/vote.png">
			  </div>
			  <a  class="active item blue" id="home-button">Home </a>
			  <a  class="item blue" id="about-button">About</a>
			  <a  class="item blue" id="contact-button">Contact</a>
			  

		  <div class="right menu" id="right-menu">

		      	<div class="item" id="right-menu-register">
    				<div class="fluid ui grey basic button" id="regButton"><a style="color:#424242;" href="./register.php">Registration</a></div>
  				</div>
			 
				<div class="item" id="right-menu-login">
    				<div class="fluid ui teal basic button" id="loginButton"><a style="color: teal;" href="./login.php">Login</a></div>
  				</div>
  				<?php 
  						if(isset($_SESSION['username']))

						{
							echo '<div class="item" id="right-menu-profile">
						    				<div class="fluid ui teal basic button" id="loginButton"><a style="color: teal;" href="./php/user-page.php">Your page</a></div>
						  				</div>';
						}  	

						if(isset($_SESSION['cand-username']))

						{
							echo '<div class="item" id="right-menu-profile">
						    				<div class="fluid ui teal basic button" id="loginButton"><a style="color: teal;" href="./php/cand-page.php">Your page</a></div>
						  				</div>';
						}  							

  				?>
  				<div class="item" id="right-menu-logout">
    				<div class="fluid ui red basic button" id="logoutButton"><a style="color: red;" href="./php/logout.php">Logout</a></div>
  				</div>

		   </div>

	</div>

<!--Home Page -->
	<div class="ui container" id="home-page-container">
		<div class="stackable ui grid">
				<div class="twelve wide column">
				<div class="ui raised segment">
					<div id="home-header">
							<h1>National Online voting System</h1>
					</div>
					<img class="fluid ui image" src="./images/vote1.jpg">
				</div>
						
				</div>

				<div class="four wide column">
					<div class="row">
						<div class="ui raised segment">
							<div id="home-header">
								<h3>Latest News</h3>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="row">
						<div class="ui raised segment">
							<div id="home-header">
								<h3>Recent Vote</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
				</div>
		</div>
	</div>
<!-- About Page -->

	<div class="about-container">
			<div class="about-header1">
				<h1>National Online voting System</h1>
				<i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>

			</div>
				
				<p>We live in a democracy and voting is one of our
				fundamental duties as responsible citizens of the country,
				but nowhere around the country a 100% people come to
				vote during the elections in their territory. There have
				been many reasons for that some of them are:</p>
				
					
						<p>1) In the rural areas the influential people keep their men at
					the polling booths to threaten the common man to vote for
					them</p>
						<p>2) There are many portions of the country like the North
					East where there is locally sponsored terrorism, at such
					places the security conditions are also not very bright, so
					naturally people feel afraid to come out of their houses and
					go to vote</p>
						<p>3) Net savvy new generation want hassle free voting
					system. Also the people in metros want a system thru
					which they can vote for their territory without traveling.
					Keeping in mind these situations and to improve the state
					of democracy in the country Online Polling System can be
					thought as a solution, in conjunction with the ongoing
					current manual voting system.</p>
					
				
				<br>
				
					<div class ="about-twin-container">
						<div class="about-header2">
							<h2>Features</h2>
					    </div>
					    <ul>
					    	<li> Secure access of confidential data user's details</li>
					    	<li> 24 X 7 availability</li>
					    	<li> Graphical Representation of Percentage voting done in different areas, regions, the overall voting percentage</li>
					    </ul>
					</div>
					<div class ="about-twin-container">
						<div class="about-header2">
							<h2>Features</h2>
						</div>
							<ul>
					    	<li>Better Component Design</li>
					    	<li>Flexible Arcitecture</li>
					    	<li> Graphical Representation of Percentage voting done in different areas, regions, the overall voting percentage</li>
					    </ul>
					</div>
			</div>

	<!-- Contact Page -->
	<div class="form-container">		
		<div class="form-wrapper">
			<div class="form-header">
				<h1>Contact Form</h1>
				<i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
			</div>
			<form action="./php/contact.php" method="POST"> 
				<label for="fname">Name:</label>
				<input type="text" id="fname" name="fname" placeholder="Enter your first name" required maxlength="20" minlength="6">

				<label for="femail">Email:</label>
				<input type="email" name="femail" id="femail" placeholder="Enter your email address" required>

				<label for="fmsg">Message:</label>
				<textarea rows="15" placeholder="Enter Message" id="fmsg" name="fmsg" required></textarea>

				<input type="submit" name="submit" value="Submit">
			</form>
		</div>

		<div class='contact-icon-container'>
			<div class="form-header">
				<h1>Team</h1>
				<img src="./images/team.png">
			</div>
			<div class="contact-icon">
				<img src="./images/dev.png">
				<h1 id="title">Kartik Sharma</h1>
				<p>Web Developer</p>
				<p>Jaypee University</p>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				  <a href="#"><i class="fa fa-twitter"></i></a>
				  <a href="#"><i class="fa fa-linkedin"></i></a>
				  <a href="#"><i class="fa fa-facebook"></i></a>
				  <p><button id="card-button">Contact</button></p>
			</div>

			<div class="contact-icon">

				<img src="./images/dev.png">
				 <h1 id="title">Mayank Sharma</h1>
				 <p>Web Developer</p>
				 <p>Jaypee University</p>
				 <a href="#"><i class="fa fa-dribbble"></i></a>
				  <a href="#"><i class="fa fa-twitter"></i></a>
				  <a href="#"><i class="fa fa-linkedin"></i></a>
				  <a href="#"><i class="fa fa-facebook"></i></a>
				  <p><button id="card-button">Contact</button></p>
			</div>

		</div>		
	</div>

	<?php

		   if(isset($_SESSION['username'])||isset($_SESSION['cand-username']))
		   {
		   		echo "<script type='text/javascript'>
							$(document).ready(function(){
								$('#right-menu #right-menu-login').css('display','none');
								$('#right-menu #right-menu-logout').css('display', 'inline-block');
								$('#right-menu #right-menu-register').css('display', 'none');
							});
					  </script>";
		   }
		    else
		    {
		 
		    	echo "<script type='text/javascript'>
		    				console.log('inside else');
							$(document).ready(function(){
								$('#right-menu #right-menu-login').css('display','inline-block');
								$('#right-menu #right-menu-logout').css('display', 'none');
								$('#right-menu #right-menu-register').css('display', 'inline-block');
							});
					  </script>";
		    }
	 ?>

	
</body>
</html>