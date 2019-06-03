<?php
session_start();
   include("config.php");
   $msg = "";
   if($_SERVER['REQUEST_METHOD']=="POST" && trim($_POST['fullname'])!="" && trim($_POST['email'])!="" && trim($_POST['password'])!="" && trim($_POST['contact'])!="")
   { 
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contactno=$_POST['contact'];
	$status=1;
	$sql = "insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')";
	$result = mysqli_query($db,$sql);
	$msg="Registration successfull. Now You can login !";
   }
   
   ?>
   <html>
   <head>
   <title>Register</title>
   
   
   </head>
   <body>
   <center>
   <form action="" method="post">
   <p>Full Name:</p>
   <p><input type="text" name="fullname"></p>
   <p>Email:</p>
   <p><input type="text" name="email"></p>
   <p>Password:</p>
   <p><input type="text" name="password"></p>
   <p>Contact No:</p>
   <p><input type="text" name="contact"></p>
   <p><input type="submit" name="submit" value="Submit"></p>
   </form>
   <p><?php echo $msg;?></p>
   <p><a href="index.php" style="text-decoration:none">Already Registered.....Login!!!</a></p>
   </center>
   
   <div>
<center><h2><a href="../" style="text-decoration:none">Home</a></h2></center>
</div>
   </body>
   </html>
   
   
   
   