<?php
		session_start();
		if(isset($_SESSION['username'])||isset($_SESSION['cand-username']))
				header('location: ./index.php');

		$username = $_SESSION['username'];

		//form data
	$uid= strip_tags($_POST['uuid']);
	$name= strip_tags($_POST['uname']);
	$pass= strip_tags($_POST['upass']);
	$email=strip_tags($_POST['uemail']);
	$city= strip_tags($_POST['ucity']);
	$state= strip_tags($_POST['ustate']);
	$address= strip_tags($_POST['uaddress']);

	$query =" UPDATE `users` SET `name` = '$name', `pass` = '$pass', `email` = '$email', `city` = '$city', `state` = '$state', `address` = '$address' WHERE `users`.`uid` = $uid;";

	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		if(mysqli_query($connect,$query))
			header('location: ./user-page.php');
		  

 ?>