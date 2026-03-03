<?php 

 	include('connection.php');

 	$sql = "CREATE TABLE tbl_members(
 		member_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		member_no VARCHAR(20) NOT NULL,
 		first_name VARCHAR(50) NOT NULL,
 		last_name VARCHAR(50) NOT NULL,
 		email VARCHAR(100) NOT NULL,
 		contact_no VARCHAR(20) NOT NULL,
 		membership_date DATE NOT NULL,
 		status VARCHAR(20) DEFAULT 'Active'
 	)";

 	
	if (mysqli_query($con,$sql)) {
		echo "Table was created";
	} else {
		echo "Error";
	} 
 ?>