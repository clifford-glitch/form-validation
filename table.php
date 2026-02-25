<?php 
include('cliff_connection_DB.php');

$sql = "CREATE TABLE tbl_store(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50)
)";

	if (mysqli_query($con,$sql)) {
		echo "Table was created";
	} else {
		echo "Error";
	}

 ?>