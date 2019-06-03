<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$from =4;
?>
<html>
<head>
<title>All Users</title>


</head>
<body>
<table>

<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Contact No</th>
<th>Reg. date</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$sql = "select * from users";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
{
?>
<tr>
		<td><?php echo htmlentities($row['fullName']);?></td>				
		<td> <?php echo htmlentities($row['userEmail']);?></td>
		<td><?php echo htmlentities($row['contactNo']);?></td>
		<td><?php echo htmlentities($row['regDate']);?></td>
		<td>
						<p><a href="user_profile.php?uid=<?php echo htmlentities($row['id']);?>&from=<?php echo $from;?>">View User Details</a></p>
		</td>
</tr>
<?php
}
?>
</tbody>
</table>
<div>
<p><a href="welcome_admin.php">Move to Welcome Page</a>
</div>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>







