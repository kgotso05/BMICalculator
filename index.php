<?php
$bmi = $status = "";
$firstname = $lastname = $age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $bmi = $weight / ($height * $height);

    if ($bmi < 18.5) {
        $status = "Underweight";
    } elseif ($bmi < 25) {
        $status = "Normal Weight";
    } elseif ($bmi < 30) {
        $status = "Overweight";
    } else {
        $status = "Obese";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>BMI Calculator</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>BMI Calculator</h1>

<form method="POST" action="">
    <input type="text" name="firstname" placeholder="First Name" required value="<?php echo $firstname; ?>">
    <input type="text" name="lastname" placeholder="Last Name" required value="<?php echo $lastname; ?>">
    <input type="number" name="age" placeholder="Age" required value="<?php echo $age; ?>">
    <input type="number" step="0.01" name="height" placeholder="Height (meters)" required>
    <input type="number" step="0.01" name="weight" placeholder="Weight (kg)" required>
    <button type="submit">Calculate BMI</button>
</form>

<?php if($bmi != ""): ?>
<div class="container" style="margin-top:20px;">
    <h2>Results</h2>
    <p><strong>First Name:</strong> <?php echo $firstname; ?></p>
    <p><strong>Last Name:</strong> <?php echo $lastname; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>BMI:</strong> <?php echo round($bmi, 2); ?></p>
    <p><strong>Status:</strong> <?php echo $status; ?></p>
</div>
<?php endif; ?>

</div>

</body>
</html>