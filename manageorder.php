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
<h2>Orders Received</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>TransactionID</strong></th>
<th><strong>Email</strong></th>
<th><strong>TotalPrice</strong></th>
<th><strong>Approvalstatus</strong></th>
<th><strong>Action</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$con=mysqli_connect('localhost','root','','dbmsproject');
$result = mysqli_query($con,"SELECT * from transaction ORDER BY email desc");
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["transid"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["totalprice"]; ?></td>
<td align="center"><?php echo $row["approvestatus"]; ?></td>
<td align="center">
<a href="approveorder.php?email=<?php echo $row["email"]; ?>">Approve</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>