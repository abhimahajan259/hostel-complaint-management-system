<?php
session_start();
   include("config.php");
   
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
	  
      
      $sql = "SELECT * FROM users WHERE userEmail = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);	  
      if($count == 1) {
		  $_SESSION['login']=$myusername;
          $_SESSION['id']=$row['id'];
		  
		  $uip=$_SERVER['REMOTE_ADDR'];
          $status=1;
		  
		  $sql = "insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')";
		  $result=mysqli_query($db,$sql);
		  
         header("Location: welcome_user.php");
      }else {
		  $_SESSION['login']=$myusername;
		  $uip=$_SERVER['REMOTE_ADDR'];
          $status=0;
		  $sql = "insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')";
		  $result = mysqli_query($db,$sql);
         $error = "Your Login Name or Password is invalid";
      }
   }
   
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
	  <center><p><a href="forgot_password.php">Forgot Password</a></p></center>
	  <center><p><a href="signup.php">Sign Up</a></p></center>
<div>
<center><h2><a href="../" style="text-decoration:none">Home</a></h2></center>
</div>
   </body>
</html>