<?php include "../db.php"; ?>
<!doctype html>
<html>
<head><link rel="stylesheet" href="../style.css"></head>
<body>
    <?php include "../nav.php"; ?>
    <h2>Payment History</h2>
    <div class="stat-card">
        <table width="100%">
            <tr>
                <th>Ref #</th>
                <th>Booking ID</th>
                <th>Amount</th>
                <th>Date Paid</th>
            </tr>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM payments");
            while($p = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <td>PAY-{$p['id']}</td>
                        <td>#{$p['booking_id']}</td>
                        <td style='color: #5059c9; font-weight: bold;'>₱" . number_format($p['amount_paid'], 2) . "</td>
                        <td>{$p['payment_date']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>