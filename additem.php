<?php
$db=mysqli_connect('localhost','root','','dbmsproject');
$query="SELECT * from product";
$result=mysqli_query($db,$query);
$productname='';
if (isset($_POST['btn'])){
    session_start();
    $db=mysqli_connect('localhost','root','','dbmsproject');
    
    $add1 =mysqli_real_escape_string($db,$_POST['quantity']);

    $opt=$_POST['myoptions'];

    $query2= "UPDATE product SET stock=stock+ '$add1' WHERE pname='$opt'";
    $result2=mysqli_query($db,$query2);

    if(!@result2)
{
    die('<p>Error Retrieving</br>');
}

  
  echo '<script type="text/javascript">alert("Stock Updated Successfully");</script>';
}
 
?>

<!DOCTYPE html>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
  <script>
  $(function(){

    $("#options").change(function(){
      var displayname=$("#options option:selected").text();
      $("#txtresults").val(displayname);
    })
  })  
  </script>

  </head>

   <body>
    <a href="adminpage.php">Dashboard</a> 

   	<h1>ADD ITEM IN STOCK</h1>

   	<select id="options">
   	<option >Choose Product from here</option>
   	<?php

   	if($result){

   		while($row=mysqli_fetch_array($result)){

   			$productname=$row["pname"];
   			echo"<option>$productname</option>";
   		}
   	}

   	?>	
   	</select>


	<form method="post" action="additem.php">

   	Quantity	
   	<input type="text" name="quantity"></input>

    <input type="text" readonly="readonly" id="txtresults" name="myoptions">

   	<button type="submit" name="btn">Submit</button>
  

   	</form>

  </body>

  </html>