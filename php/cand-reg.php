<?php

	session_start();
		if(isset($_SESSION['username'])||isset($_SESSION['cand-username']))
			header('location: ../index.php');

	//form data
	$name= strip_tags($_POST['fcname']);
	$id= strip_tags($_POST['fcid']);
	$email= strtolower(strip_tags($_POST['fcemail']));
	$pass= strip_tags($_POST['fcpassword']);
	$repeatpass=strip_tags($_POST['fcrepassword']);
	$votes = 0;
	$selected = 0;

	$query = "INSERT INTO `candidates` (`name`, `id`, `email`, `pass`, `city`, `state`, `party`, `selected`, `votes`) VALUES ('$name', '$id', '$email', '$pass', '', '', '', '$selected', '$votes')";

	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$idcheck = mysqli_query($connect,"SELECT id FROM candidates WHERE id ='$id'");
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
						mysqli_query($connect,$query);

						$registered = true;

						echo "registered";
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