<?php
// Include database connection
include 'db_connect.php';

// Query to get all records (no date field)
$sql = "SELECT * FROM calculations ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Check if query failed
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Count total records
$total_records = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All BMI Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .records-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e0e0e0;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }
        .status-badge.underweight { background: #fff3cd; color: #856404; }
        .status-badge.normal-weight { background: #d4edda; color: #155724; }
        .status-badge.overweight { background: #fff3cd; color: #856404; }
        .status-badge.obese { background: #f8d7da; color: #721c24; }
        .summary {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .nav-links {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            display: inline-block;
        }
        .btn-primary { background: #667eea; }
        .btn-secondary { background: #6c757d; }
        .btn-primary:hover { background: #5a67d8; }
        .btn-secondary:hover { background: #5a6268; }
        .empty-state {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="records-container">
        <div class="summary">
            <div>
                <h1>BMI Records</h1>
                <p>Total Calculations: <strong><?php echo $total_records; ?></strong></p>
            </div>
            <div class="nav-links">
                <a href="index.php" class="btn btn-primary">+ New Calculation</a>
                <a href="view_records.php" class="btn btn-secondary">⟳ Refresh</a>
            </div>
        </div>
        
        <?php if ($total_records > 0): ?>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>BMI</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>#<?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['weight']; ?> kg</td>
                                <td><?php echo $row['height']; ?> m</td>
                                <td><strong><?php echo $row['bmi']; ?></strong></td>
                                <td>
                                    <span class="status-badge <?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                        <?php echo $row['status']; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2 style="color: #666; margin-bottom: 20px;">No Records Found</h2>
                <p style="color: #999; margin-bottom: 30px;">Be the first to calculate your BMI!</p>
                <a href="index.php" class="btn btn-primary">Calculate BMI Now</a>
            </div>
        <?php endif; ?>
        
        <?php 
        // Free result memory
        mysqli_free_result($result);
        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>