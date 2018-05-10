<?php
		
		session_start();
		if(!isset($_SESSION['username']))
			header('location: ../index.php');

		$dbusername1 = $_SESSION['username'];

		$connect = mysqli_connect("localhost","root","","ops");
		if (mysqli_connect_errno())
		  {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$query= mysqli_query($connect,"SELECT * From candidates");
 		$query2 = mysqli_query($connect,"SELECT * From users where uid='$dbusername1'");
		$rowUser = mysqli_fetch_assoc($query2);
		$voted = $rowUser['voted'];
		
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
	<link rel="stylesheet" type="text/css" href="../css/user.css">
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
			  <a  href="../index.php" class="item teal" id="user-home-button">Home</a>
			  <a  class="item teal active" id="user-vote-button">Vote</a>
			 

		  <div class="right menu" id="right-menu">

		  		<div class="item" id="user-right-menu-profile">
    				<div class="fluid ui teal basic button" id="userProfileButton">
    					<a style="color: teal;" > Profile</a>
    				</div>
  				</div>

  				<div class="item" id="user-right-menu-logout">
    				<div class="fluid ui red basic button" id="logoutButton"><a style="color: red;" href="./logout.php">Logout</a></div>
  				</div>

		   </div>

	</div>
		<?php
				if($voted){
					echo"<div id='thankmsg'>";
					echo "<h1>You have successfully voted</h1>";
					echo"<h3>Thank You For Your Vote</h3>";
					echo "<img src='../images/smile3.png'>";
					echo"</div>"; 
				}
				
		?>
		<div id="candidates-cards-container">
			<div class="user-page-header">
				<h1>Candidates List</h1>
			</div>
			<?php
			while($row = mysqli_fetch_array($query))
		      {
		      echo '<div class="card"><img src="../images/user4.png" alt="John" style="width:100%">';

				  echo "<h2>";
				  echo $row["name"];
				  echo '</h2>';
				  echo '<p class="card-title">';
				  echo $row["city"].", ".$row["state"];
				  echo '</p>';
				  echo '<p>';
				  echo $row["party"];
				  echo '</p>';
				  echo '<form method="POST" action="./count.php">';
				  echo '<input type="hidden" value="';
				  echo $row["id"];
				  echo '" name="candid">';
				  echo '<button type="submit" class="vote-button">Vote</button>
					</div></form>';	
		      }

			?>
		</div>

		<div class="user-profile-container">
			<div class="user-page-header">
				<h1>Profile</h1>
			</div>

			<form action="./user-profile.php" method="POST">
				<div class="row">
			      <div class="col-25">
			        <label for="uuid">Uid</label>
			      </div>
			      <div class="col-75">
			        <input type="text" id="uuid" name="uuid" placeholder="Your uid.." value="<?php echo $rowUser['uid']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="uname">Name</label>
			      </div>
			      <div class="col-75">
			        <input type="text" id="uname" name="uname" placeholder="Your name.." value="<?php echo $rowUser['name']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="uemail">Email</label>
			      </div>
			      <div class="col-75">
			        <input type="email" id="uemail" name="uemail" placeholder="Your Last Email.." value="<?php echo $rowUser['email']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="ucity">City</label>
			      </div>
			      <div class="col-75">
			       		 <input type="text" id="ucity" name="ucity" placeholder="Your City.." value="<?php echo $rowUser['city']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="ustate">State</label>
			      </div>
			      <div class="col-75">
			       		 <input type="text" id="ustate" name="ustate" placeholder="Your State.." value="<?php echo $rowUser['state']; ?>" required="required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="upass">Password</label>
			      </div>
			      <div class="col-75">
			       		 <input type="password" id="upass" name="upass" placeholder="Your Last Password.." value="<?php echo $rowUser['pass']; ?>" required="required">
			      </div>
			    </div>

			    <div class="row">
			      <div class="col-25">
			        <label for="uaddress">Address</label>
			      </div>
			      <div class="col-75">
			        <textarea id="uaddress" name="uaddress" placeholder="Write your address.." style="height:200px" required="required" >
			        	<?php echo $rowUser['address'];?>
			        </textarea>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" value="Submit">
			    </div>
			  </form>
		</div>

		<?php
				if($voted){

					echo " <script>
								$('.vote-button').attr('disabled','disabled');
						   </script>";
				}
		?>

		<script type="text/javascript">
			
			// attach ready event
		$(document).ready(function(){
			previousPage = $('#candidates-cards-container');

			$('#user-vote-button').on('click',function(){
				setPreviousPage($('#candidates-cards-container'));
				$('#candidates-cards-container').show();
			});

			$('#userProfileButton').on('click',function(){
				setPreviousPage($('.user-profile-container'));
				$('.user-profile-container').show();
			});
		});


		function setPreviousPage(id){
			previousPage.hide();
			previousPage = id;
		}
		</script>
</body>
</html>