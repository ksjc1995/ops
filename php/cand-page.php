<?php
		
		session_start();
		if(!isset($_SESSION['cand-username']))
			header('location: ../index.php');

		$dbusername1 = $_SESSION['cand-username'];

		$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$query= mysqli_query($connect,"SELECT * From candidates");
 		$query2 = mysqli_query($connect,"SELECT * From candidates where id='$dbusername1'");
		$rowCand = mysqli_fetch_assoc($query2);
		$selected = $rowCand['selected'];
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/cand.css">
	<link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/semantic.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- menu bar -->
	<div class="ui stackable secondary fixed red small menu" id="user-menu">
			  <div class="item">
			  	<img class="fluid ui centered mini rounded image" src="../images/vote.png">
			  </div>
			  <a href="../index.php" class="item teal active" id="cand-home-button">Home</a>
			 

		  <div class="right menu" id="right-menu">

  				<div class="item" id="user-right-menu-logout">
    				<div class="fluid ui red basic button" id="logoutButton"><a style="color: red;" href="./logout.php">Logout</a></div>
  				</div>

		   </div>

	</div>
		<?php
				if($selected){
					echo"<div id='thankmsg'>";
					echo "<h1>Congratatulation you are selected</h1>";
					echo"<h3>Thanks for your participation</h3>";
					echo "<h5>Results will be published soon</h5>";
					echo "<img src='../images/smile3.png'>";
					echo"</div>"; 

					echo "<div id='candidates-cards-container'>";
				    echo '<div class="card"><img src="../images/user4.png" alt="John" style="width:100%">';

						  echo "<h2>";
						  echo $rowCand["name"];
						  echo '</h2>';
						  echo '<p class="card-title">';
						  echo $rowCand["city"].", ".$rowCand["state"];
						  echo '</p>';
						  echo '<p>';
						  echo $rowCand["party"];
						  echo '</p>';
						
		                  echo"</div> </div>";
		
		              }

					?>

		<div class="cand-profile-container" style="display: block; margin-top:100px;">
			<div class="cand-page-header">
				<h1>Fill and Submit this form to be eligible</h1>
			</div>

			<form action="./cand-profile.php" method="POST">
				<div class="row">
			      <div class="col-25">
			        <label for="cid">Id</label>
			      </div>
			      <div class="col-75">
			        <input type="text" id="cid" name="cid" placeholder="Your id.." value="<?php echo $rowCand['id']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="cname">Name</label>
			      </div>
			      <div class="col-75">
			        <input type="text" id="cname" name="cname" placeholder="Your name.." value="<?php echo $rowCand['name']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="cemail">Email</label>
			      </div>
			      <div class="col-75">
			        <input type="text" id="cemail" name="cemail" placeholder="Your Last Email.." value="<?php echo $rowCand['email']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="ccity">City</label>
			      </div>
			      <div class="col-75">
			       		 <input type="text" id="ccity" name="ccity" placeholder="Your City.." value="<?php echo $rowCand['city']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="cstate">State</label>
			      </div>
			      <div class="col-75">
			       		 <input type="text" id="cstate" name="cstate" placeholder="Your State.." value="<?php echo $rowCand['state']; ?>" required="required"> 
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="cpass">Password</label>
			      </div>
			      <div class="col-75">
			       		 <input type="password" id="cpass" name="cpass" placeholder="Your Last Password.." value="<?php echo $rowCand['pass']; ?>" required="required">
			      </div>
			    </div>

			     <div class="row">
			      <div class="col-25">
			        <label for="cparty">Party</label>
			      </div>
			      <div class="col-75">
			       		 <input type="text" id="cparty" name="cparty" placeholder="Your Party name.." value="<?php echo $rowCand['party']; ?>" required="required">
			      </div>
			    </div>


			   
			    <div class="row">
			      <input type="submit" value="Update">
			    </div>
			  </form>
		</div>


		<?php
					if($selected)
					{

			 			echo "<script>
		           		  		$('.cand-profile-container').css('display','none');
		           		  	  </script>";
					}

		 ?>

</body>
</html>