<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
?>
<html>
<head>
<title>NOT PROCESSED COMPLAINTS</title>


</head>
<body>
<table>
<thead>
<tr>
<th>Complaint number</th>
<th>Student name</th>
<th>Reg Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql = "select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.status is null";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
?>
<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>
											<td>Not Process Yet</td>
											<td><a href="complaint_details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>&from=1"> View Details</a></td>

											
</tr>
<?php
}
?>
</tbody>
</table>
<p>
<a href="manage_complaints.php">Move to Manage Complaints Page</a>
</p>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>

