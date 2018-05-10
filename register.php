<?php
		session_start();
		if(isset($_SESSION['username'])||isset($_SESSION['cand-username']))
				header('location: ./index.php');
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="./css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="./js/jquery.js"></script>
</head>
<body>

		<div class="ui warning message" style="display: none;" id="warn-msg">
			  <div class="header">
			  	 <?php
			  	 		if(isset($_SESSION['tooLong']))
			  	 		{
			  	 			echo "Id/Name Too Long <br>";
			  	 			unset($_SESSION['tooLong']);
			  	 		}
			  	 		if(isset($_SESSION['idTaken'])){

			  	 			echo "Id not available <br>";
			  	 			unset($_SESSION['idTaken']);
			  	 		}
			  	 		if(isset($_SESSION['tooShort'])){

			  	 			echo "Password Too Short <br>";
			  	 			unset($_SESSION['tooShort']);
			  	 		}
			  	 		if(isset($_SESSION['passNotMatch'])){

			  	 			echo "Password doesn't match <br>";
			  	 			unset($_SESSION['passNotMatch']);
			  	 		}
			  	 		if (isset($_SESSION['detailsNotFilled'])) {
			  	 			echo "Fill all fields <br>";
			  	 			unset($_SESSION['detailsNotFilled']);
			  	 		}

			  	  ?>
			  </div>
		</div>


		<?php 
				if(isset($_SESSION['wrong']))
				{

					echo "<script>
							$(document).ready(function(){

									$('#warn-msg').css('display','block');
									$('#warn-msg').fadeOut(1500,function(){

									});
							});
							
						  </script>";
					unset($_SESSION['wrong']);	  
				}
		?>

		<div class="form-container">
			<fieldset>
			<div class="switch-group-container">
				<div class="switch active" id="switch-button-1">User</div>
				<div class="switch" id="switch-button-2">Candidate</div>
			</div>
				<form method="POST" action="./php/registration.php" id="form-user">
					<label>Name:</label>
					<input type="text" name="fname" placeholder="Enter FullName">
					<label>Voter Id/Uid:</label>
					<input type="text" name="fid" placeholder="Enter user id">
					<label>Email:</label>
					<input type="email" name="femail" placeholder="Enter email">
					<label>Password:</label>
					<input type="password" name="fpassword" placeholder="Enter password">
					<label>Re Enter Password:</label>
					<input type="password" name="frepassword" placeholder="Type password again">
					<input type="hidden" name="form-user" value="user">
					<button id="fUserSubmit"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></button>
				</form>
				<form id="form-cand" method="POST" action="./php/cand-reg.php">
					<label>Candidate Name:</label>
					<input type="text" name="fcname" placeholder="Enter Name">
					<label>Candidate id:</label>
					<input type="text" name="fcid" placeholder="Enter id">
					<label>Email:</label>
					<input type="email" name="fcemail" placeholder="Enter valid email">
					<label>Password:</label>
					<input type="password" name="fcpassword" placeholder="Enter Password">
					<label>Re Enter Password:</label>
					<input type="password" name="fcrepassword" placeholder="Type password again">
					<input type="hidden" name="form-cand" value="cand">
					<button id="fCandSubmit"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></button>
				</form>
			</fieldset>
		</div>

	<script type="text/javascript">
		$(document).ready(function(){
		var userButton = $('#switch-button-1');
		var candButton = $('#switch-button-2');
		var userForm  = $('#form-user');
		var candForm  = $('#form-cand');
	    activeButton = userButton;

		userButton.on('click',function(){

			if(activeButton==candButton)
			{
				userButton.addClass("active");
				candButton.removeClass("active");
				candForm.fadeOut(300,function(){
					userForm.fadeIn(300,function(){

					});
				});
				setActiveButton(userButton);
			}

			
	});
		candButton.on('click',function(){
			
			if(activeButton==userButton)
			{
				candButton.addClass("active");
				userButton.removeClass("active");
				userForm.fadeOut(300,function(){
					candForm.fadeIn(300,function(){

					});
				});
				setActiveButton(candButton);
			}
	});

});

		function setActiveButton(id){
				activeButton = id;
		};
		</script>


</body>
</html>