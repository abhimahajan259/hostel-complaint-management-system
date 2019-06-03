<?php 
session_start();
include("config.php");


?>

<html>
<head>
<title>Complaint history</title>




</head>

<body>
<center>
<h2>Complaint History</h2>
<table>
<thead>
<tr>
<th>Complaint number</th>
<th>Complaint details</th>
<th>Reg date</th>
<th>Last updation date</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<?php 
$sql = "select * from tblcomplaints where userId='".$_SESSION['id']."'";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	?>
<tr>
<td><?php echo htmlentities($row['complaintNumber']);?></td>
<td><?php echo htmlentities($row['complaintDetails']);?></td>
<td><?php echo htmlentities($row['regDate']);?></td>
<td><?php echo htmlentities($row['lastUpdationDate']);?></td>
<td><?php if($row['status'] == ""){$row['status'] = "Not Processed";}echo htmlentities($row['status']);?></td>

</tr>
<?php
}
?>
</tbody>
</table>
<p><a href="welcome_user.php">Move to Welcome Page</a></p>
<h3><a href = "logout.php">Sign Out</a></h3>
</center>
</body>
</html>
