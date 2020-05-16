<?php

$db=mysqli_connect('localhost','root','','dbmsproject');

if (isset($_POST['addusr-btn'])){
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

    echo "<script>alert('Data inserted Sucessfully')</script>";

    //create user

  }else{

    echo "<script>alert('Two Passwords do not match')</script>";
    
  }

}

?>



<!DOCTYPE html>

<head>
  <meta http-equiv="content-type" content="text/html"/>
  <title> INSERT USER</title>
  <link href="userreg.css" rel="stylesheet" type="text/css"/>

</head>

<body>

  <div class = "userreg">

    <form method="post" action="insertuser.php">

      <h2 style= "color:white" > ADD NEW USER </h2>
      
    <input type="text" placeholder="Enter Full Name" name="fname" required>
    
   
    <input type="text" placeholder="Enter Email" name="email" required>
    
    
    <input type="text" placeholder="Enter Tower Number" name="tno" required>
    
   
    <input type="text" placeholder="Enter Room Number" name="rno" required>

    
    <input type="text" placeholder="Enter Contact Number" name="contact" required>

    
    <input type="password" placeholder="Enter Password" name="psw" required>

    
    <input type="password" placeholder="Repeat Password" name="pswrepeat" required>
      <button type="submit" name="addusr-btn">Add</button>
      <br><br><br>

    </form> 
  </div>
</body>
</html>