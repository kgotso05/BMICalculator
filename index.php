<?php
// Include database connection
include 'db_connect.php';

// Get 5 most recent records (no date, so order by id DESC)
$recent_sql = "SELECT * FROM calculations ORDER BY id DESC LIMIT 5";
$recent_result = mysqli_query($conn, $recent_sql);
?>

<!-- Add this after your form closing tag -->
<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
    <h3>Recent Calculations</h3>
    <?php if ($recent_result && mysqli_num_rows($recent_result) > 0): ?>
        <ul style="list-style: none; padding: 0;">
            <?php while ($row = mysqli_fetch_assoc($recent_result)): ?>
                <li style="padding: 8px 0; border-bottom: 1px dashed #e0e0e0;">
                    <strong><?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></strong>
                    <span style="float: right;">
                        BMI: <?php echo $row['bmi']; ?> 
                        <span style="color: <?php 
                            echo ($row['status'] == 'Normal weight') ? '#28a745' : 
                                 (($row['status'] == 'Underweight') ? '#ffc107' : 
                                 (($row['status'] == 'Overweight') ? '#fd7e14' : '#dc3545')); 
                        ?>;">(<?php echo $row['status']; ?>)</span>
                    </span>
                </li>
            <?php endwhile; ?>
        </ul>
        <div style="text-align: center; margin-top: 15px;">
            <a href="view_records.php" style="color: #667eea; text-decoration: none; font-weight: 600;">
                View All Records (<?php 
                $count_sql = "SELECT COUNT(*) as total FROM calculations";
                $count_result = mysqli_query($conn, $count_sql);
                $count_row = mysqli_fetch_assoc($count_result);
                echo $count_row['total'];
                ?>) →
            </a>
        </div>
    <?php else: ?>
        <p style="color: #999; text-align: center;">No calculations yet. Be the first!</p>
    <?php endif; ?>
</div>

<?php
// Close connection
mysqli_close($conn);
?>