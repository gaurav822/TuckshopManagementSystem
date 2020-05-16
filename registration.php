<?php

$db=mysqli_connect('localhost','root','','dbmsproject');

if (isset($_POST['reg-btn'])){
  session_start();
  $fname=mysqli_real_escape_string($db,$_POST['fname']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $tno=mysqli_real_escape_string($db,$_POST['tno']);
  $rno=mysqli_real_escape_string($db,$_POST['rno']);
  $contact=mysqli_real_escape_string($db,$_POST['contact']);
  $psw=mysqli_real_escape_string($db,$_POST['psw']);
  $rpsw=mysqli_real_escape_string($db,$_POST['pswrepeat']);

  if($psw==$rpsw){

    $psw=md5($psw);

    $sql = "INSERT INTO userregdata(fname,email,towerno,roomno,phone,pwd) VALUES('$fname','$email','$tno','$rno','$contact','$psw')";

    mysqli_query($db,$sql); 

    $to_email = $email;
   $subject = "Welcome User";
  $body = "Hello new user.Thank you for joining SRM Tuckshop";
  $headers = "From: SRM Tuckshop";
 
  if (mail($to_email, $subject, $body, $headers)) {
    echo "<SCRIPT> //not showing me this
        alert('Feedback submitted sucessfully!')
        window.location.replace('userloginpg.php');
    </SCRIPT>";
  }


    //create user

  }else{

    $message='Password do not match, "Click Ok to register again"';
  echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('registration.php');
    </SCRIPT>";
    
  }

}

?>

<!DOCTYPE html>

<head>
  <meta http-equiv="content-type" content="text/html"/>
  <title> Registration Page</title>
  <link href="userreg.css" rel="stylesheet" type="text/css"/>

</head>

<body>

  <div class = "userreg">

    <form method="post" action="registration.php">

      <h2 style= "color:white" > REGISTER </h2>
      
    <input type="text" placeholder="Enter Full Name" name="fname" required>
    
   
    <input type="text" placeholder="Enter Email" name="email" required>
    
    
    <input type="text" placeholder="Enter Tower Number" name="tno" required>
    
   
    <input type="text" placeholder="Enter Room Number" name="rno" required>

    
    <input type="text" placeholder="Enter Contact Number" name="contact" required>

    
    <input type="password" placeholder="Enter Password" name="psw" required>

    
    <input type="password" placeholder="Repeat Password" name="pswrepeat" required>
      <button type="submit" name="reg-btn">Register</button>
      <br><br><br>

      <div id= "container">
      <a href= "#" style= "margin-left: 5px; margin-right: 10px; font-size: 12px; font-family: sans-serif; color: white"> Reset Password </a>
      <a href= "#" style= "margin-right: 5px; font-size: 12px; font-family: sans-serif; color: white"> Forgot Password? </a>
      </div><br><br><br><br>

      Already Have an Account? <a href= "userlogin.html" style="color:white"> SignIn </a>

    </form> 
  </div>
</body>
</html>

