<?php 
session_start();
if(isset($_POST["submit"])){
	
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Handling</title>
	<style type="text/css">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f5f7fa;
        color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        letter-spacing: 1px;
    }

    form {
        background: #ffffff;
        max-width: 420px;
        margin: 0 auto;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    input[type="text"],
    input[type="radio"],
    input[type="password"] {
        margin-top: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        outline: none;
        border-color: #4a90e2;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background: #4a90e2;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background: #357abd;
    }

    .error {
        color: #d9534f;
        font-size: 12px;
    }

    .weak {
        color: #d9534f;
        font-size: 12px;
        font-weight: bold;
    }

    .medium {
        color: #f0ad4e;
        font-size: 12px;
        font-weight: bold;
    }

    .strong {
        color: #5cb85c;
        font-size: 12px;
        font-weight: bold;
    }

    br {
        line-height: 1.6;
    }
</style>

	</style>
</head>
<body>

	<?php

		$nameErr = "";
		$name = "";
		$mailErr = "";
		$mail = "";
		$numErr = "";
		$num = "";
		$webErr = "";
		$web = "";
		$ageErr = "";
		$age = "";	
		$passErr = "";
		$pass = "";
		$genErr = "";
		$gen = "";
		$passAdd = "";
		$Strength = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["name"])) {
				$nameErr = "Name is Required";
			} else {
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            	$nameErr = "Only letters and spaces allowed";
        }
			}

			if (empty($_POST["mail"])) {
				$mailErr = "Email is Required";
			} else {
				$mail = test_input($_POST["mail"]);
				if (!preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $mail)) {
            		$mailErr = "Invalid email format";
        }
			}

			if (empty($_POST["num"])) {
				$numErr = "Phone Number is Required";
			} else {
				$num = test_input($_POST["num"]);
				if (!preg_match("/^[0-9]{10,11}$/", $num)) {
            		$numErr = "Invalid phone number";
        }
			}

			if (empty($_POST["web"])) {
				$webErr = "Website is Required";
			} else {
				$web = test_input($_POST["web"]);
				if (!preg_match("/\bhttps?:\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|]/i", $web)) {
            		$webErr = "In	valid URL";
        }
			}

		    if (empty($_POST["age"])) {
		        $ageErr = "Age is required";
		    } else {
		        $age = test_input($_POST["age"]);
		        if (!preg_match("/^[0-9]+$/", $age)) {
		            $ageErr = "Numbers only";
		        } elseif ($age < 18) {
		            $ageErr = "Age must be 18 and above";
		        }
		    }

			if (empty($_POST["gen"])) {
				$genErr = "Gender is Required";
			} else {
				$gen = test_input($_POST["gen"]);
			}

			if (empty($_POST["pass"])) {
				$passErr = "Password is Required";
			} else {
				$pass = test_input($_POST["pass"]);
				$passAdd = strlen($pass);

				if ($passAdd >= 6 && preg_match("/^.{6,8}$/", $pass)) {
		            $Strength = "Weak";
		        } 
		        elseif ($passAdd >= 9 && preg_match("/^.{9,12}$/", $pass)) {
		            $Strength = "Medium";
		        } 
		        elseif ($passAdd >= 13 && preg_match("/^.{13,}$/", $pass)) {
		            $Strength = "Strong";
		        }
			}

			if (empty($nameErr) && empty($mailErr) && empty($numErr) && empty($webErr) && empty($ageErr) && empty($passErr) && empty($genErr)) {
				$_SESSION['name'] = $name;
				$_SESSION['mail'] = $mail;
				$_SESSION['num'] = $num;
				$_SESSION['web'] = $web;
				$_SESSION['age'] = $age;
				$_SESSION['gen'] = $gen;
				$_SESSION['pass'] = $pass;
				header("location:display.php");
			}

		}	

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>

	<h1>FORM VALIDATION</h1>
	<p><span class="error">* required field</span></p>

	<form method="post">	
	
	Name:
		<input type="text" name="name" value="<?php echo $name; ?>">
		<span class="error">* <?php echo $nameErr; ?></span>
		<br><br>

	Email Address:
		<input type="text" name="mail" value="<?php echo $mail; ?>">
		<span class="error">* <?php echo $mailErr; ?></span>
		<br><br>

	Phone Number:
		<input type="text" name="num" value="<?php echo $num; ?>">
		<span class="error">* <?php echo $numErr; ?></span>
		<br><br>

	Website URL:
		<input type="text" name="web" value="<?php echo $web; ?>">
		<span class="error">* <?php echo $webErr; ?></span>
		<br><br>

	Age:
		<input type="text" name="age" value="<?php echo $age; ?>">
		<span class="error">* <?php echo $ageErr; ?></span>
		<br><br>

	Gender:
		<input type="radio" name="gen" value="Male" <?php if($gen=="Male") echo "checked"; ?>>Male
		<input type="radio" name="gen" value="Female" <?php if($gen=="Female") echo "checked"; ?>>Female
		<input type="radio" name="gen" value="Other" <?php if($gen=="Other") echo "checked"; ?>>Other
		<span class="error">* <?php echo $genErr; ?></span>
		<br><br>

	Password:
		<input type="password" name="pass" value="<?php echo $pass; ?>">
		<span class="<?php 
	        if($Strength=="Weak") echo "weak";
	        elseif($Strength=="Medium") echo "medium";
	        elseif($Strength=="Strong") echo "strong";
	        else echo "error"; ?>">* <?php echo $passErr ?: $Strength; ?></span>
		<br><br>



		<input type="submit" name="submit" value="submit">
	</form>
	

</body>
</html>