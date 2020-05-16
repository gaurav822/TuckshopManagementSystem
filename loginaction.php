<?php

$db=mysqli_connect('localhost','root','','dbmsproject');
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST")
{

$username = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['pass']);
$password = md5($password);

$sql = "SELECT * FROM userregdata WHERE email='$username' AND pwd='$password'";
$query = mysqli_query($db, $sql);
$res=mysqli_num_rows($query);

if($res == 1)
{
  $_SESSION['email'] = $username;
  header("Location: index.php");
}
else
{
$message='Invalid email or password';
  echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('userloginpg.php');
    </SCRIPT>";
}
}
?>