<?php
session_start();
$admin = $_SESSION['alogin'];
?>


<html>
<head>
<title>Choose an action</title>



</head>
<body>
<h1>Welcome <?php echo $admin;?></h1>
<ul>
<li><a href="manage_complaints.php">Manage Complaints</a></li>
<li><a href="change_password.php">Change Password</a></li>
<li><a href="access_users.php">All Users</a></li>
<li><a href="user_logs.php">User Logs</a></li>
</ul>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>