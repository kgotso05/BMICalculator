<?php
// Start session
session_start();

// Include database connection
include 'db_connect.php';

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
    
    // Calculate BMI
    $bmi = $weight / ($height * $height);
    $bmi = round($bmi, 1);
    
    // Determine BMI status
    if ($bmi < 18.5) {
        $status = "Underweight";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $status = "Normal weight";
    } elseif ($bmi >= 25 && $bmi < 30) {
        $status = "Overweight";
    } else {
        $status = "Obese";
    }
    
    // Store in session for result.php
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['age'] = $age;
    $_SESSION['bmi'] = $bmi;
    $_SESSION['status'] = $status;
    
    // INSERT INTO DATABASE (no date field)
    $sql = "INSERT INTO calculations (firstname, lastname, age, weight, height, bmi, status) 
            VALUES ('$firstname', '$lastname', $age, $weight, $height, $bmi, '$status')";
    
    $result = mysqli_query($conn, $sql);
    
    // Check if insert was successful
    if (!$result) {
        // For debugging (remove in production)
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    
    // Redirect to results page
    header("Location: result.php");
    exit();
    
} else {
    header("Location: index.php");
    exit();
}
?>