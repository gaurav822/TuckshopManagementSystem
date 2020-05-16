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
<h2>View Feedbacks</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Email</strong></th>
<th><strong>Message</strong></th>
</tr>
</thead>
<tbody>

<?php
$count=1;
$con=mysqli_connect('localhost','root','','dbmsproject');
$result = mysqli_query($con,"SELECT * from feedbacks ORDER BY email desc");
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["message"]; ?></td>
<td align="center">
</td>
</tr>
<?php $count++; }?>
</tbody>
</table>
</div>
</body>
</html>
