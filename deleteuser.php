<?php


$db=mysqli_connect('localhost','root','','dbmsproject');


$sql = "DELETE FROM userregdata WHERE email='$_GET[email]'";

if(mysqli_query($db,$sql))

	header("refresh:1,url=viewuser.php");

else

	echo "Not deleted";
?>



