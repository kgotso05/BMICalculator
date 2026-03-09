<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$bmi = $weight / ($height * $height);

if ($bmi < 18.5) {
$status = "Underweight";
}
elseif ($bmi < 25) {
$status = "Normal Weight";
}
elseif ($bmi < 30) {
$status = "Overweight";
}
else {
$status = "Obese";
}

header("Location: results.php?firstname=".$firstname."&lastname=".$lastname."&age=".$age."&bmi=".$bmi."&status=".$status);
exit();

?>