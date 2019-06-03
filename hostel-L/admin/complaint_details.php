<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$from = $_GET['from'];
?>
<html>
<head>
<title>NOT PROCESSED COMPLAINTS DETAILS</title>


</head>
<body>
<table>
<thead>
<tr>
<th>Complaint number</th>
<th>Student name</th>
<th>Reg Date</th>
<th>Category</th>
<th>Sub Category</th>
<th>Complaint Type</th>
<th>State</th>
<th>Nature of Complaint</th>
<th>Complaint Details</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$sql = "select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
{
?>
<tr>
		<td><?php echo htmlentities($row['complaintNumber']);?></td>				
		<td> <?php echo htmlentities($row['name']);?></td>
		<td><?php echo htmlentities($row['regDate']);?>
		<td><?php echo htmlentities($row['catname']);?></td>
		<td> <?php echo htmlentities($row['subcategory']);?></td>
		<td><?php echo htmlentities($row['complaintType']);?>
		<td><?php echo htmlentities($row['state']);?></td>
		<td> <?php echo htmlentities($row['noc']);?></td>
		<td> <?php echo htmlentities($row['complaintDetails']);?></td>
		<td>
				<p>
					<?php
						if($from !=3)
						{
							?>
						<a href="update_complaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>&from=<?php echo $from;?>">Take Action</a>
						<?php
						}
						?>
						<a href="user_profile.php?uid=<?php echo htmlentities($row['userId']);?>&from=<?php echo $from;?>&cid=<?php echo htmlentities($row['complaintNumber']);?>">View User Details</a>
				</p>
		</td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
if($from == 1)
{
?>
<p><a href="notprocess_complaint.php">Move to not processed complaints window</a></p>
<?php
}
?>
<?php
if($from == 2)
{
?>
<p><a href="inprocess_complaint.php">Move to in process complaints window</a></p>
<?php
}
?>
<?php
if($from == 3)
{
?>
<p><a href="closed_complaint.php">Move to closed complaints window</a></p>
<?php
}
?>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>







