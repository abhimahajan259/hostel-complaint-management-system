<?php
session_start();
$user = $_SESSION['login'];
?>


<html>
<head>
<title>Choose an action</title>



</head>
<body>
<h1>Welcome <?php echo $user;?></h1>
<ul>
<li><a href="register_complaint.php">Register Complaint</a></li>
<li><a href="user_profile.php">Edit Profile</a></li>
<li><a href="change_password.php">Change Password</a></li>
<li><a href="complaint_history.php">Complaint History</a></li>
</ul>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>