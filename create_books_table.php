<?php 

	include('connection.php');

	$sql = "CREATE TABLE tbl_books(
		book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(150) NOT NULL,
		author VARCHAR(100) NOT NULL,
		genre VARCHAR(100) NOT NULL,
		published_year YEAR NOT NULL,
		isbn VARCHAR(20) NOT NULL,
		date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)";

	if (mysqli_query($con,$sql)) {
		echo "Table was created";
	} else {
		echo "Error";
	}

 ?>