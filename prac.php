<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		.error {
			color: #ff0000;
		}
	</style>
</head>
<body>

	<?php 

		$nameErr = "";
		$emailErr = "";
		$numErr = "";
		$webErr = "";
		$genErr = "";
		$name = "";
		$email = "";
		$num = "";
		$web = "";
		$gen = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["name"]);
			}
		
			if (empty($_POST["Email"])) {
				$emailErr = "Email is required";
			} else {
				$email = test_input($_POST["Email"]);
			}
		
			if (empty($_POST["Phone"])) {
				$numErr = "Phone Number is required";
			} else {
				$num = test_input($_POST["Phone"]);
			}

			if (empty($_POST["Website"])) {
				$webErr = "Website is required";
			} else {
				$web = test_input($_POST["Website"]);
			}
		
			if (empty($_POST["Gender"])) {
				$genErr = "Gender is required";
			} 
			else {
				$gen = test_input($_POST["Gender"]);
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>

	<h2>PHP Form Validation Activity</h2>
	<p><span class="error">* required field</span></p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		Name: 
		<input type="text" name="name" value="<?php echo $name; ?>">
		<span class="error">* <?php echo $nameErr; ?></span>
		<br><br>
		Email Adress: 
		<input type="text" name="Email" value="<?php echo $email; ?>">
		<span class="error">* <?php echo $emailErr; ?></span>
		<br><br>
		Phone Number: 
		<input type="number" name="Phone" value="<?php echo $num; ?>">
		<span class="error">* <?php echo $numErr; ?></span>
	    <br><br>
		Website URL: 
		<input type="text" name="Website" value="<?php echo $web; ?>">
		<span class="error">* <?php echo $webErr; ?></span>
		<br><br>
		Gender:
		Female <input type="radio" name="Gender" value="female">
		Male <input type="radio" name="Gender" value="male">
		Others <input type="radio" name="Gender" value="other">
		<span class="error">* <?php echo $genErr ?></span>
		<br><br>
		<input type="submit" name="Submit">
	</form>

	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST" &&
			empty($nameErr) && empty($emailErr) && empty($numErr) && empty($webErr) && empty($genErr)) {

			echo "<h2>Your Input<h2>";
			echo htmlspecialchars($name) . "<br>";
			echo htmlspecialchars($email) . "<br>";
			echo htmlspecialchars($num) . "<br>";
			echo htmlspecialchars($web) . "<br>";
			echo htmlspecialchars($gen) . "<br>";
		}
	 ?>
</body>
</html>