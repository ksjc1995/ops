<?php
	session_start();

	$name= strip_tags($_POST["fname"]);
	$email= strip_tags($_POST["femail"]);
	$msg= strip_tags($_POST["fmsg"]);

	$query = "INSERT INTO `contacts` (`name`, `email`, `message`) VALUES ('$name', '$email', '$msg')";
	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

	if(mysqli_query($connect,$query))
		header('location: ../xml/mail.xml');

 ?>

