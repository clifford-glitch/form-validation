<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php 

		$name = "";
		$nameErr = "";
		$age = "";
		$ageErr = "";
		$gen = "";
		$ageErr = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST["$name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["$name"]);
				if(!preg_match("/^[a-zA-Z ]*$/", "$name")) {
				$nameErr = "Only letters";
				}
			}
			if(empty($_POST["$age"])) {
				$ageErr = "age is required";
			} else {
				$age = test_input($_POST["$age"]);
				if(!preg_match("/^[0-9]*$/", "$age")) {
				$nameErr = "Only letters";
				}
			}
			if(empty($_POST["$name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["$name"]);
				if(!preg_match("/^[a-zA-Z ]*$/", "$name")) {
				$nameErr = "Only letters";
				}
			}
    	}
	 ?>

</body>
</html>