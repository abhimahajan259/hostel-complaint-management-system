<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
?>
<html>
<head>
<title>User logs</title>


</head>
<body>
<table>

<thead>
<tr>
<th>#</th>
<th>User email</th>
<th>Login Time</th>
<th>Logout Time</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<?php
$sql = "select * from userlog";
$result = mysqli_query($db,$sql);
$cnt =1;
while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
{
?>
<tr>
		<td><?php echo htmlentities($row['id']);?></td>				
		<td> <?php echo htmlentities($row['username']);?></td>
		<td><?php echo htmlentities($row['loginTime']);?></td>
		<td><?php echo htmlentities($row['logout']);?></td>
		<td>
			<?php if($row['status'] == 1){echo "Successful";}
					else{echo "Failed";}?>
		</td>
		
		<?php $cnt=$cnt+1;?>
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







