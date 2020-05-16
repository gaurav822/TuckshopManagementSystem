<?php

$db=mysqli_connect('localhost','root','','dbmsproject');
session_start();
$email=$_SESSION['email'];
$query = "SELECT * from userregdata WHERE email='$email'";

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
<p><a href="index.php">Dashboard</a> 
<h1>View Profile</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$email=$_REQUEST['email'];
$fname =$_REQUEST['fname'];
$towerno =$_REQUEST['towerno'];
$roomno =$_REQUEST['roomno'];
$phone =$_REQUEST['phone'];
$pass=$_REQUEST['pwd'];
$update="UPDATE userregdata SET
email='".$email."', fname='".$fname."',towerno='".$towerno."',roomno='".$roomno."',phone='".$phone."',pwd='".$pass."' where email='".$email."'";
mysqli_query($db, $update) or die(mysqli_error($db));
$status = "Record Updated Successfully. </br></br>";
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
Password:
<p><input type="password" name="pass" placeholder="Enter Password" 
required value="<?php echo $row['pwd'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>