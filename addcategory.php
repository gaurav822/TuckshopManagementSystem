<?php
$db=mysqli_connect('localhost','root','','dbmsproject');

if (isset($_POST['additem-btn'])){
  session_start();
  $pname=mysqli_real_escape_string($db,$_POST['pname']);
  $ptype=mysqli_real_escape_string($db,$_POST['ptype']);
  $desc=mysqli_real_escape_string($db,$_POST['description']);
  $stk=mysqli_real_escape_string($db,$_POST['stock']);
  $pric=mysqli_real_escape_string($db,$_POST['price']);

  $target_path="images/";
  $target_path=$target_path.basename($_FILES['uploadedfile']['name']);

  $imagename=$_FILES['uploadedfile']['name'];

  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)){


   $sql = "INSERT INTO product (pname,ptype,description,stock,price,pimage) values ('$pname','$ptype','$desc','$stk','$pric','$imagename')";

   $result=mysqli_query($db,$sql);
   if($result){
     echo "<script>alert('Data inserted Sucessfully')</script>";

   }

    else{
        echo "<script>alert('There was a problem')</script>";

    }

  }

  else{
    echo "<script>alert('There was a problem')</script>";
    //create user
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
     <h1> ADD PRODUCT</h1>
  </head>  
<body>
  <p><a href="adminpage.php">Dashboard</a> 
| <a href="adminlogin.php">Logout</a></p>
<form action="testpage.php" method="post" enctype="multipart/form-data">  
     <table>
            <tr>
                 <td>       
                   Product Name:      
                 </td>      
                 <td>       
                  <input type="text" name="pname">      
                 </td>    
           </tr>
           <tr>     
               <td>       
                   Product Type:     
               </td>      
                <td>        
                   <input type="text" name="ptype">      
                </td>   
           </tr>
            <tr>
                 <td>       
                   Description:      
                 </td>      
                 <td>       
                  <input type="text" name="description">     
                 </td>    
           </tr>
           <tr>     
               <td>       
                   Stock:     
               </td>      
                <td>        
                   <input type="text" name="stock">      
                </td>   
           </tr>
            <tr>
                 <td>       
                   Price:      
                 </td>      
                 <td>       
                  <input type="text" name="price">     
                 </td>    
           </tr>
           <tr>
                 <td>       
                   Image:      
                 </td>      
                 <td>       
                  <input type="file" name="uploadedfile" />     
                 </td>    
           </tr>  
     </table>
     <button name="additem-btn">ADD</button>
</form> 

</body>
</html>
