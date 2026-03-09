<?php

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$age = $_GET['age'];
$bmi = $_GET['bmi'];
$status = $_GET['status'];

?>

<!DOCTYPE html>
<html>

<head>
<title>BMI Results</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>Results</h1>

<p><strong>First Name:</strong> <?php echo $firstname; ?></p>

<p><strong>Last Name:</strong> <?php echo $lastname; ?></p>

<p><strong>Age:</strong> <?php echo $age; ?></p>

<p><strong>BMI:</strong> <?php echo round($bmi,2); ?></p>

<p><strong>Status:</strong> <?php echo $status; ?></p>

<br>

<a href="index.html">
<button>Back</button>
</a>

</div>

</body>

</html>