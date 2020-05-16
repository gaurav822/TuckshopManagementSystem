<?php

$uname="tuckshoptest71@gmail.com";
$pwd="admin";

session_start();


if($_POST['uname']==$uname && $_POST['pwd']==$pwd){

	$_SESSION['uname']=$uname;

	echo "<h1>WELCOME ADMIN</h1>";

	header("location:adminpage.php");

	echo "<a href='adminpage.php'>ADMIN</a><br>";

	echo "<br><a href='adminlogin.php'><input type=button value=logout name=logout></a>";
	}


else{
	$message='Invalid email or password';
	echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('adminlogin.php');
    </SCRIPT>";


	}
?>



