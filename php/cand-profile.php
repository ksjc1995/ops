<?php
		session_start();
		if(!isset($_SESSION['cand-username']))
			header('location: ../index.php');

		$candUsername = $_SESSION['cand-username'];

		//form data
	$name= strip_tags($_POST['cname']);
	$id= strip_tags($_POST['cid']);
	$email=strip_tags($_POST['cemail']);
	$pass= strip_tags($_POST['cpass']);
	$city= strip_tags($_POST['ccity']);
	$state= strip_tags($_POST['cstate']);
	$party= strip_tags($_POST['cparty']);
	$selected = 1;
	$votes = 0;

	$query =" UPDATE `candidates` SET `name` = '$name', `id` = '$id', `email` = '$email', `pass` = '$pass', `city` = '$city', `state` = '$state', `party` = '$party', `selected` = '$selected', `votes` = '$votes' WHERE `candidates`.`id` = '$candUsername' ";

	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		if(mysqli_query($connect,$query))
			header('location: ./cand-page.php');
		  

 ?>