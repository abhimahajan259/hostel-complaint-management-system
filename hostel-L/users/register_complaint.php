<?php
session_start();
include("config.php");

if($_SERVER['REQUEST_METHOD'] == "POST" && !$_POST['complaindetails']=="")
{
$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$complaintype=$_POST['complaintype'];
$state=$_POST['state'];
$noc=$_POST['noc'];
$complaintdetials=$_POST['complaindetails'];


$sql = "insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails) values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials')";
$result = mysqli_query($db,$sql);


$sql1 = "select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1";
$result1 = mysqli_query($db,$sql1);
while($row=mysqli_fetch_array($result1,MYSQL_ASSOC))
{
 $cmpn=$row['complaintNumber'];
}
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$cmpn.'")</script>';
}
?>

<html>
<head>
<title>Lodge Complaint</title>



</head>
<body>
<center>
<h2>Lodge Complaint</h2>
<form action="" method="post">
<p>Category:</p>
<p>
<select name ="category">
<?php
$sql2 = "select id,categoryName from category ";
$result2 = mysqli_query($db,$sql2);
while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
	?>
<option><?php echo htmlentities($row['categoryName']); ?></option>
<?php
}
?>
</select>
</p>

<p>Sub Category:</p>
<p>
<select name = "subcategory">
<?php
$sql3 = "select id,subcategory from subcategory ";
$result3 = mysqli_query($db,$sql3);
while($row=mysqli_fetch_array($result3,MYSQLI_ASSOC))
{
	?>
<option><?php echo htmlentities($row['subcategory']); ?></option>
<?php
}
?>
</select>
</p>

<p>Complaint Type:</p>
<p>
<select name="complaintype">
<option>Complaint</option>
<option>General query</option>
</select>
</p>

<p>State:</p>
<p><input type= "text" name ="state"></p>

<p>Nature of Complaint:</p>
<p><input type= "text" name ="noc"></p>

<p>Complaint Details:</p>
<p><input type= "text" name ="complaindetails"></p>

<p><input type= "submit" name ="submit" value="Submit"></p>


</form>
<p><a href="welcome_user.php">Move to Welcome Page</a></p>
<h3><a href = "logout.php">Sign Out</a></h3>
</center>
</body>
</html>

