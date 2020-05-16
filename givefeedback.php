<?php

$db=mysqli_connect('localhost','root','','dbmsproject');

if (isset($_POST['feedback-btn'])){

    session_start();

	$username=$_SESSION['email'];
	$message=mysqli_real_escape_string($db,$_POST['comments']);

	$sql = "INSERT INTO feedbacks(email,message) VALUES('$username','$message')";

	mysqli_query($db,$sql);

	$to_email = $username;
	$subject = "Feedback Received";
	$body = "Hello Customer, Thank you for your important Feedback.";
	$headers = "From: SRM Tuckshop";
 
	if (mail($to_email, $subject, $body, $headers)) {
    echo "<SCRIPT> //not showing me this
        alert('Feedback submitted sucessfully!')
        window.location.replace('index.php');
    </SCRIPT>";
	} else {
    echo "<script>alert('Feedback not submitted')</script>";

   }
 

  }

?>

<!DOCTYPE html>
<html>
<head></head>

<body>

<form action="givefeedback.php" method="POST">

Your comments: <br>
<textarea name="comments" rows="15" cols="50"></textarea><br><br>

<button type="Submit" name="feedback-btn">Submit</button>
 
</form>
</body>

</html>