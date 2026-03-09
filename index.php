<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        
        <form action="calculate.php" method="POST" class="bmi-form">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter first name" required>
            </div>
            
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter last name" required>
            </div>
            
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" min="1" max="120" placeholder="Enter age" required>
            </div>
            
            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" step="0.1" min="1" max="300" placeholder="Enter weight in kg" required>
            </div>
            
            <div class="form-group">
                <label for="height">Height (m):</label>
                <input type="number" id="height" name="height" step="0.01" min="0.5" max="2.5" placeholder="Enter height in meters (e.g., 1.75)" required>
                <small class="hint">Enter height in meters (e.g., 1.75 for 175cm)</small>
            </div>
            
            <button type="submit" class="btn-calculate">Calculate BMI</button>
        </form>
    </div>
</body>
</html>