<?php
// Start session to store data
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get and sanitize form data
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $age = intval($_POST['age']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);
    
    // Validate inputs
    if (empty($firstname) || empty($lastname) || $age <= 0 || $weight <= 0 || $height <= 0) {
        header("Location: index.php?error=invalid");
        exit();
    }
    
    // Calculate BMI using height in meters
    // Formula: weight (kg) / (height (m))^2
    $bmi = $weight / ($height * $height);
    $bmi = round($bmi, 1); // Round to 1 decimal place
    
    // Determine BMI status based on WHO standards
    if ($bmi < 18.5) {
        $status = "Underweight";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $status = "Normal weight";
    } elseif ($bmi >= 25 && $bmi < 30) {
        $status = "Overweight";
    } else {
        $status = "Obese";
    }
    
    // Store data in session
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['age'] = $age;
    $_SESSION['bmi'] = $bmi;
    $_SESSION['status'] = $status;
    
    // Redirect to results page - NOTE: using result.php (singular)
    header("Location: result.php");
    exit();
    
} else {
    // If someone tries to access this page directly without POST
    header("Location: index.php");
    exit();
}
?>