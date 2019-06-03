<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$username = $_SESSION['login'];
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sql = "SELECT password from users where userEmail='$username'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if($_POST['current_password'] == $row['password'])
	{
		if($_POST['new_password1'] == $_POST['new_password2'])
		{
			$sql = "update users set password='".$_POST['new_password1']."' where userEmail='".$_SESSION['login']."'";
			$result = mysqli_query($db,$sql);
			$error = "PASSWORD CHANGED SUCCESSFULLY";
		}
		else
		{
			$error = "Both Passwords dont match";
		}
	}
	else
	{
		$error = "OLD PASSWORD DOES NOT MATCH";
	}
}
?>
<html>
<head>
<title>CHANGE PASSWORD</title>



</head>
<body>
<center>
<div> 
<form action="" method="post">
  CURRENT PASSWORD:<br>
  <input type="text" name="current_password" placeholder="ENTER CURRENT PASSWORD"><br>
  NEW PASSWORD:<br>
  <input type="text" name="new_password1" placeholder="ENTER NEW PASSWORD"><br>
  RETYPE NEW PASSWORD:<br>
  <input type="text" name="new_password2" placeholder="RETYPE NEW PASSWORD"><br>
  <input type="submit" name="submit" value="Submit"><br>
<p><?php echo $error;?></p>
</div>



<p><a href="welcome_user.php">Move to Welcome Page</a></p>
<h3><a href = "logout.php">Sign Out</a></h3>
</center>
</body>
</html>









	