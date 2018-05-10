<?php
		session_start();
			if(isset($_SESSION['username'])||isset($_SESSION['cand-username']))
				header('location: ./index.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">  
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="./js/jquery.js"></script>
</head>
<body>
		<div class="login-form-container">
			<fieldset>
				<form id="form-login" method="POST" action="./php/login-form.php">
					<h1 align="center" style="color:teal;">Login</h1>
					<label>Login Id:</label>
					<input type="text" name="floginid" placeholder="Enter login id" required="required">
					<label>Password:</label>
					<input type="password" name="floginpassword" placeholder="Enter password" required="required">
					<input type="hidden" name="fgroupValue">
					<input type="submit" name="floginsubmit" value="Login">
				</form>

				<form id="form-login-group" method="POST" onsubmit="event.preventDefault();">
					<h1 style="color:teal;" align="center">Login As:</h1>
					<label>General Public:</label>
					<input type="radio" name="fgroup" value="gp" checked="checked">
					<br><br>
					<label>Candidates:</label>
					<input type="radio" name="fgroup" value="cand">
					<br><br>
					<button value="login-group" id="fgroupSubmit"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></button>
				</form>

			<ul id="bottom-login-links">
				<a href="./register.php"><li>Register</li></a>
				<?php 
					if(isset($_SESSION['wrong']))
					{
						echo "<a style='color: red;'><li>Wrong Password or Id</li></a>";
						unset($_SESSION['wrong']);
					}

				?>	
			</ul>
			</fieldset>

			
		</div>
		
			<script type="text/javascript">
				$(document).ready(function(){
						radioValue = "";
					$("#fgroupSubmit").on("click",function(){
						    radioValue = $("input[name=fgroup]:checked").val();
						    	setFgroupValue(radioValue);
							    showLoginForm();

					});

					
				});
				function showLoginForm(){
						$("#form-login-group").fadeOut(300,function(){
								$("#form-login").fadeIn(300,function(){
								});
							});
				};

				function setFgroupValue(val){
						$('input[name=fgroupValue]').val(val);
				}

			</script>
</body>
</html>