<?php 

	include('connection.php');
	$id = $_GET['edit'];
	$sql = "SELECT * FROM tbl_members WHERE member_id = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);


if(isset($_POST['update'])) {
	$memberNum = $_POST['member_no'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$date = $_POST['calendar'];
	$status = $_POST['active'];

	$update = "UPDATE tbl_members SET first_name = '$firstname', last_name = '$lastname', email = '$email', contact_no = '$phone', membership_date = '$date', status = '$status' WHERE member_id = '$id'";
	$query = mysqli_query($con,$update);

	if ($query) {
		header("location:form.php");
	} else {
		echo mysqli_error($con);
	}

}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>

 	<form method="POST">
		
		<input type="text" name="member_no" value= "<?php echo $row['member_no']; ?>">
		<input type="text" name="firstname" value="<?php echo $row['first_name']; ?>">
		<input type="text" name="lastname" value="<?php echo $row['last_name']; ?>">
		<input type="text" name="email" value="<?php echo $row['email']; ?>">
		<input type="number" name="phone" value="<?php echo $row['contact_no']; ?>">
		<input type="text" name="calendar" value="<?php echo $row['membership_date']; ?>">
		<input type="text" name="active" value="<?php echo $row['status']; ?>">
		<input type="submit" name="update">


	</form>
 
 </body>
 </html>