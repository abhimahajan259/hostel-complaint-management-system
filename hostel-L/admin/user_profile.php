<?php
session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );

$sql = "select * FROM users where id='".$_GET['uid']."'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$name=$row['fullName'];
$regdate=$row['regDate'];
$useremail=$row['userEmail'];
$contactno=$row['contactNo'];
$address=$row['address'];
$state=$row['State'];
$country=$row['country'];
$pincode=$row['pincode'];
$lastupdation=$row['updationDate'];
$status=$row['status'];

$from = $_GET['from'];
if($status == 1)
{
	$status="active";
}
else
{
	$status="inactive";
}
?>
<html>
<head>
<title>Student Details</title>


</head>
<body>
<h2><?php echo $name;?>'s Profile</h2>
<p>Reg Date:             <?php echo $regdate;?></p>
<p>User Email:           <?php echo $useremail;?></p>
<p>User Contact No:      <?php echo $contactno;?></p>
<p>Address:     		 <?php echo $address;?></p>
<p>State:     			 <?php echo $state;?></p>
<p>Country:     		 <?php echo $country;?></p>
<p>Pin Code:     		 <?php echo $pincode;?></p>
<p>Last Updation:        <?php echo $lastupdation;?></p>
<p>Status:    			 <?php echo $status;?></p>
<?php
if($from <4)
{
		$cid = $_GET['cid'];
?>
<p><a href="complaint_details.php?cid=<?php echo $cid;?>&from=<?php echo $from?>">Move to complaint_details window</a></p>
<?php
}
?>

<?php
if($from == 4)
{
?>
<p><a href="access_users.php">Close window</a></p>
<?php
}
?>
<div>
<h3><a href = "logout.php">Sign Out</a></h3>
</div>
</body>
</html>