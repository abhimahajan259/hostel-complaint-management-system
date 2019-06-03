<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$username = $_SESSION['alogin'];
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sql = "SELECT password from admin where username='$username'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if($_POST['current_password'] == $row['password'])
	{
		if($_POST['new_password1'] == $_POST['new_password2'])
		{
			$sql = "UPDATE admin set password='{$_POST['new_password1']}' where username='{$username}'";
			$result = mysqli_query($db,$sql);
			$error = "PASSWORD CHANGED SUCCESSFULLY";
		}
		else
		{
			$error = "RETYPE NEW PASSWORD AGAIN";
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

<div>
<p><a href="welcome_admin.php">Move to Welcome Page</a>
</div>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>









	