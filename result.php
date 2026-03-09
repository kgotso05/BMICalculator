<?php
// Start session
session_start();

// Check if session data exists
if (!isset($_SESSION['firstname']) || !isset($_SESSION['bmi'])) {
    header("Location: index.php");
    exit();
}

// Get data from session
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$age = $_SESSION['age'];
$bmi = $_SESSION['bmi'];
$status = $_SESSION['status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Results</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .view-link {
            text-align: center;
            margin-top: 20px;
        }
        .view-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            display: inline-block;
            border: 2px solid #667eea;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .view-link a:hover {
            background: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Results</h1>
        
        <div class="result-card">
            <div class="result-row">
                <span class="label">First Name:</span>
                <span class="value"><?php echo htmlspecialchars($firstname); ?></span>
            </div>
            
            <div class="result-row">
                <span class="label">Last Name:</span>
                <span class="value"><?php echo htmlspecialchars($lastname); ?></span>
            </div>
            
            <div class="result-row">
                <span class="label">Age:</span>
                <span class="value"><?php echo htmlspecialchars($age); ?></span>
            </div>
            
            <div class="result-row">
                <span class="label">BMI:</span>
                <span class="value"><?php echo htmlspecialchars($bmi); ?></span>
            </div>
            
            <div class="result-row">
                <span class="label">Status:</span>
                <span class="value status-<?php echo strtolower(str_replace(' ', '-', $status)); ?>">
                    <?php echo htmlspecialchars($status); ?>
                </span>
            </div>
        </div>
        
        <div class="bmi-scale">
            <h3>BMI Categories:</h3>
            <div class="scale-item underweight">Underweight: < 18.5</div>
            <div class="scale-item normal">Normal weight: 18.5 - 24.9</div>
            <div class="scale-item overweight">Overweight: 25 - 29.9</div>
            <div class="scale-item obese">Obese: >= 30</div>
        </div>
        
        <div class="button-group">
            <a href="index.php" class="btn-back">New Calculation</a>
        </div>
        
        <div class="view-link">
            <a href="view_records.php">📊 View All Saved Records</a>
        </div>
    </div>
</body>
</html>