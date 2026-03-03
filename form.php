<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DataBase</title>
</head>
<body>

	<?php 

		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			session_unset();
		}

	 ?>

	<form method="POST" action="insert.php">
		
		<input type="text" name="member_no" placeholder="membership">
		<input type="text" name="firstname" placeholder="First Name">
		<input type="text" name="lastname" placeholder="Last Name">
		<input type="text" name="email" placeholder="Email">
		<input type="number" name="phone" placeholder="Contact No.">
		<input type="text" name="calendar" placeholder="Membership Date">
		<input type="text" name="active" placeholder="status">
		<input type="submit" name="save">


	</form>

	<table border = "1px solid black">
		<thead>
			<tr>
				<th>Membership</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Membership Date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				include('connection.php');
				$sql = "SELECT * FROM tbl_members";
				$result = mysqli_query($con,$sql);
				while($row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $row['member_no']; ?></td>
				<td><?php echo $row['first_name']; ?></td>
				<td><?php echo $row['last_name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['contact_no']; ?></td>
				<td><?php echo $row['membership_date']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><a href="edit.php?edit=<?php echo $row['member_id'];?>">Edit</a></td>
				<td><a href="">Delete</a></td>
			</tr>
			<?php		
				}
			 ?>
		</tbody>
	</table>

</body>
</html>