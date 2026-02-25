<?php
session_start();

if (
    !isset($_SESSION['name']) &&
    !isset($_SESSION['mail']) &&
    !isset($_SESSION['num'])  &&
    !isset($_SESSION['web'])  &&
    !isset($_SESSION['age'])  &&
    !isset($_SESSION['gen'])  &&
    !isset($_SESSION['pass'])
) {
    header("Location: form.php");
    exit();
}
?>

<?php
    

         echo "<h2>Input</h2>";
            echo "Name: " . htmlspecialchars($_SESSION['name']) . "<br>";
            echo "Email Address: " . htmlspecialchars($_SESSION['mail']) . "<br>";
            echo "Phone Number: " . htmlspecialchars($_SESSION['num']) . "<br>";
            echo "Website URL: " . htmlspecialchars($_SESSION['web']) . "<br>";
            echo "Age: " . htmlspecialchars($_SESSION['age']) . "<br>";
            echo "Gender: " . htmlspecialchars($_SESSION['gen']) . "<br>";
            echo "Password: " . htmlspecialchars($_SESSION['pass']) . "<br>";
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

    <a href="log.php">logout</a>

</body>
</html>
