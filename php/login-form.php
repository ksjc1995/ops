<?php

session_start();

if(isset($_SESSION['username']))
	header('location: ../index.php');

if(isset($_SESSION['cand-username']));
	header('location: ../index.php');
 
$username = $_POST['floginid'];
$password = $_POST['floginpassword'];
$fgroupValue = $_POST['fgroupValue'];


if($fgroupValue == 'gp')
{
	if($username && $password)
{

$connect = mysqli_connect("localhost","root","","ops");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$query= mysqli_query($connect,"SELECT * From users WHERE uid='$username'");
$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
	//code to login
	 while ($row = mysqli_fetch_assoc($query))
	 	{
			$dbusername = $row['uid'];
			$dbpassword = $row['pass'];
		}
		if($username==$dbusername&&$password==$dbpassword)
		{
			
			$_SESSION['username']=$username;
				header('location: ./user-page.php');
		}
		else
		{
			$_SESSION['wrong']=true;
		     	header('location: ../login.php');
		}
		
	}
	else
	{
			$_SESSION['wrong']=true;
				header('location: ../login.php');
	}

	
}
else
{
			$_SESSION['wrong']=true;
				header('location: ../login.php');
}

session_write_close();

}


if($fgroupValue == 'cand')
{
	if($username && $password)
{

$connect = mysqli_connect("localhost","root","","ops");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$query= mysqli_query($connect,"SELECT * From candidates WHERE id='$username'");
$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
	//code to login
	 while ($row = mysqli_fetch_assoc($query))
	 	{
			$dbusername = $row['id'];
			$dbpassword = $row['pass'];
		}
		if($username==$dbusername&&$password==$dbpassword)
		{
			
			$_SESSION['cand-username']=$username;
				header('location: ./cand-page.php');
		}
		else{
			$_SESSION['wrong']=true;
		     	header('location: ../login.php');
		}
		     
		
	}
	else{
		$_SESSION['wrong']=true;
		     	header('location: ../login.php');
	}
			

	
}
else{
	 $_SESSION['wrong']=true;
		     	header('location: ../login.php');
}
  			

session_write_close();

}


?>