<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="form">
<p><a href="adminpage.php">Dashboard</a> 
| <a href="insertuser.php">Insert New USER</a> 
| <a href="adminlogin.php">Logout</a></p>	
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>FullName</strong></th>
<th><strong>Email</strong></th>
<th><strong>Tower No.</strong></th>
<th><strong>Roomno</strong></th>
<th><strong>Contact</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$con=mysqli_connect('localhost','root','','dbmsproject');
$result = mysqli_query($con,"SELECT * from userregdata ORDER BY email desc");
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["fname"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["towerno"]; ?></td>
<td align="center"><?php echo $row["roomno"]; ?></td>
<td align="center"><?php echo $row["phone"]; ?></td>
<td align="center">
<a href="edituser.php?email=<?php echo $row["email"]; ?>">Edit</a>
</td>
<td align="center">	
<a href="deleteuser.php?email=<?php echo $row["email"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>