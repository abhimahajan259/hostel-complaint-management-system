<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$username = $_SESSION['login'];
$msg = "";

$sql = "select * from users where userEmail='{$username}' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$id = $row['id'];
$fullName = $row['fullName'];
$userEmail = $row['userEmail'];
$password = $row['password'];
$contactNo = $row['contactNo'];
$address = $row['address'];
$State = $row['State'];
$country = $row['country'];
$pincode = $row['pincode'];
$regDate = $row['regDate'];
$updationDate = $row['updationDate'];

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$e = $_POST['userEmail'];
	$c = $_POST['contactNo'];
	$p = $_POST['password'];
	$a = $_POST['address'];
	$s = $_POST['State'];
	$countr = $_POST['country'];
	$pi = $_POST['pincode'];
$sql1 = "update users set userEmail = '{$e}' , contactNo = '{$c}' , password = '{$p}' , address = '{$a}' , State = '{$s}' , country = '{$countr}' , pincode = '{$pi}'   where userEmail='".$_SESSION['login']."'";
$result1 = mysqli_query($db,$sql1);
if($result1)
{
	$msg = "Updation Successful";
}
else
{
$msg = "Updation Unsuccessful";	
}
}
?>

<html>
<head>
<title>Student Profile</title>


</head>
<body>
<center>
<h2><?php echo htmlentities($fullName);?>'s Profile</h2>
<p><?php echo htmlentities($fullName);?>'s Id:  <?php echo htmlentities($id);?></p>
<p>Registered at:<?php echo htmlentities($regDate);?></p>
<p>Last Updated at:<?php echo htmlentities($updationDate);?></p>
<form action="" method="post">
<p>User Email: </p>
<p><input type="text" value="<?php echo htmlentities($userEmail);?>" name="userEmail"></p>
<p>Contact No: </p>
<p><input type="text" value="<?php echo htmlentities($contactNo);?>" name="contactNo"></p>
<p>Password: </p>
<p><input type="text" value="<?php echo htmlentities($password);?>" name="password"></p>
<p>Address: </p>
<p><input type="text" value="<?php echo htmlentities($address);?>" name="address"></p>
<p>State: </p>
<p><input type="text" value="<?php echo htmlentities($State);?>" name="State"></p>
<p>Country: </p>
<p><input type="text" value="<?php echo htmlentities($country);?>" name="country"></p>
<p>PinCode: </p>
<p><input type="text" value="<?php echo htmlentities($pincode);?>" name="pincode"></p>
<p><input type="submit" value="Submit" name="submit"></p>
</form>
<p><?php echo htmlentities($msg);?></p>

<p><a href="welcome_user.php">Move to Welcome Page</a></p>
<h3><a href = "logout.php">Sign Out</a></h3>
</center>
</body>
</html>