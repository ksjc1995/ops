<?php
   session_start();
   $userId = $_SESSION['username'];
   $id = $_POST['candid'];
	$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		if(mysqli_query($connect,"UPDATE candidates SET votes=votes+1 WHERE id='$id'"))
		{
			$query3 = mysqli_query($connect,"UPDATE users SET voted=1 WHERE uid='$userId'");
			if($query3)
			{
				header('location: ./user-page.php'); 
			}
		}
		
		
?>		