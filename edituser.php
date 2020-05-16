<?php

$db=mysqli_connect('localhost','root','','dbmsproject');


$query = "SELECT * from userregdata WHERE email='$_GET[email]'";

$result = mysqli_query($db, $query) or die ( mysqli_error($db));

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="adminlogin.php">Dashboard</a> 
| <a href="insertuser.php">Insert New USER</a> 
| <a href="adminlogin.php">Logout</a></p>
<h1>Update User Details</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$email=$_REQUEST['email'];
$trn_date = date("Y-m-d H:i:s");
$fname =$_REQUEST['fname'];
$towerno =$_REQUEST['towerno'];
$roomno =$_REQUEST['roomno'];
$phone =$_REQUEST['phone'];
$update="UPDATE userregdata set
email='".$email."', fname='".$fname."',towerno='".$towerno."',roomno='".$roomno."',phone='".$phone."' where email='".$email."'";
mysqli_query($db, $update) or die(mysqli_error($db));
$status = "Record Updated Successfully. </br></br>
<a href='viewuser.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
Email:
<input name="email" type="hidden" value="<?php echo $row['email'];?>" />
<p><input type="text" name="email" placeholder="Enter Email" 
required value="<?php echo $row['email'];?>" /></p>
Name:
<p><input type="text" name="fname" placeholder="Enter Full Name" 
required value="<?php echo $row['fname'];?>" /></p>
Towerno:
<p><input type="text" name="towerno" placeholder="Enter Tower No" 
required value="<?php echo $row['towerno'];?>" /></p>
Roomno:
<p><input type="text" name="roomno" placeholder="Enter Room no" 
required value="<?php echo $row['roomno'];?>" /></p>
Contact:
<p><input type="text" name="phone" placeholder="Enter Contact Number" 
required value="<?php echo $row['phone'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>