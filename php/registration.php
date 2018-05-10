<?php

	session_start();
		if(isset($_SESSION['username']))
			header('location: ../index.php');

	//form data
	$name= strip_tags($_POST['fname']);
	$id= strip_tags($_POST['fid']);
	$email= strtolower(strip_tags($_POST['femail']));
	$pass= strip_tags($_POST['fpassword']);
	$repeatpass=strip_tags($_POST['frepassword']);
	$voted = 0;
	

	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$idcheck = mysqli_query($connect,"SELECT uid FROM users WHERE uid ='$id'");

		$count = mysqli_num_rows($idcheck);
		if($count!=0)
			{
				$_SESSION['wrong'] = true;
				$_SESSION['idTaken'] = true;
				header('location: ../register.php');
			}

        // check for existance
		else if($id && $email && $pass && $repeatpass)
		{
			if($pass== $repeatpass)
			{
				//check char length of username and fullname
				if(strlen($id) >25 || strlen ($name)>25)
				{
					$_SESSION['wrong'] = true;
					$_SESSION['tooLong'] = true;
					header('location: ../register.php');
				}
				else
					if(strlen($pass) >25 || strlen ($pass)<6)
					{
						$_SESSION['wrong'] = true;
						$_SESSION['tooShort'] = true;
						header('location: ../register.php');
						
					}
					else
					{
						//open database
						mysqli_query($connect,"INSERT INTO users VALUES ('$id','$name','$pass','$email','','','','$voted')");

						$registered = true;
						 header('location: ../xml/success.xml');
						
					}
			

			}
			else{
					$_SESSION['wrong'] = true;
				    $_SESSION['passNotMatch'] = true;
				  	header('location: ../register.php');
					
			}
				  
		
		}

		else
			{
				$_SESSION['wrong'] = true;
				$_SESSION['detailsNotFilled'] = true;
				header('location: ../register.php');

			}

	?>