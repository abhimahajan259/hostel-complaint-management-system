<?php
session_start();
   include("config.php");
   $msg = "";
   
   
   
   
   if($_SERVER['REQUEST_METHOD']=="POST")
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=($_POST['password']);
	$confirm = ($_POST['confirm']);
	
	$sql = "SELECT * FROM users WHERE userEmail='$email' and contactNo='$contact'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count == 1)
{
	
	if($password == $confirm)
	{
		$sql = "update users set password='$password' WHERE userEmail='$email' and contactNo='$contact' ";
		$result=mysqli_query($db,$sql);
		$msg="Password Changed Successfully";
	}
	else{
	$msg="Both Passwords dont match";
	}

}
else
{
$msg="Invalid email id or Contact no";
}
}
   
?>
   
   
   
   
   
   
   
   
   <html>
   <head>
   <title>Forgot Password</title>
   
   
   
   
   </head>
   <body>
   <center>
   <h2>Reset Password</h2>
   <form action="" method="post">
   <p>Email:</p>
   <p><input type="text" name="email"></p>
   <p>Contact No:</p>
   <p><input type="text" name="contact"></p>
   <p>Pasword:</p>
   <p><input type="text" name="password"></p>
   <p>Confirm Password:</p>
   <p><input type="text" name="confirm"></p>
   <p><input type="submit" name="submit" value="Submit"></p>
   
   </form>
   <p><?php echo $msg;?></p>
   <p><a href="index.php">Login Window</a></p>
   </center>
   </body>
   </html>
   