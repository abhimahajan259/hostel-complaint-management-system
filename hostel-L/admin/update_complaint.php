<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
$complaint_number = $_GET['cid'];
$msg = "";

$from = $_GET['from'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$status = $_POST['status'];
	$remark = $_POST['remark'];
	$sql1 = "insert into complaintremark(complaintNumber,status,remark) values('$complaint_number','$status','$remark')";
    $result1=mysqli_query($db,$sql1);
	$sql2 = "update tblcomplaints set status='{$status}' where complaintNumber='{$complaint_number}'";
    $result2=mysqli_query($db,$sql2);
    $msg = "UPDATION SUCCESSFUL";
}
?>


<html>
<head>
<title>UPDATE COMPLAINT</title>



</head>
<body>
<p>Complaint Number:   <?php echo $complaint_number;?></p>
<form action="" method="post">
<p>Status:
			<select name="status">
					<option>In Process</option>
					<option>Closed</option>
			</select>
</p>
<p>Remark:       <input type="text" placeholder="Enter your remark" name="remark"></input></p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>

<p><a href="complaint_details.php?cid=<?php echo $complaint_number;?>&from=<?php echo $from;?>">Move to complaint_details window</a></p>

<p><?php echo $msg;?></p>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>
			
			
			
			