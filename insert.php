<?php 

	session_start();
	include('connection.php');

	if(isset($_POST['save'])){

		$memberNum = $_POST['member_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['calendar'];
		$status = $_POST['active'];

		$sql = "INSERT INTO tbl_members (member_no,first_name,last_name,email,contact_no,membership_date,status)
			VALUES ('$memberNum','$firstname','$lastname','$email','$phone','$date','$status')";
		$result = mysqli_query($con,$sql);

		if ($result) {
			$_SESSION['message'] = "Inserted Successfully";
			header("location:form.php");
		} else {
			$_SESSION['message'] = "Insertion Failed";
			header("location:form.php");
		}

	}

 ?>