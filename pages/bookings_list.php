<?php include "../db.php"; ?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include "../nav.php"; ?>
    <h2>Booking Schedule</h2>
    <div class="stat-card">
        <table width="100%">
            <tr style="color: #94a3b8; text-align: left;">
                <th>Date</th>
                <th>Client</th>
                <th>Service</th>
                <th>Status</th>
            </tr>
            <?php
            $sql = "SELECT b.*, c.name, s.service_name 
                    FROM bookings b
                    JOIN clients c ON b.client_id = c.id
                    JOIN services s ON b.service_id = s.id
                    ORDER BY b.booking_date DESC";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <td>{$row['booking_date']}</td>
                        <td><b>{$row['name']}</b></td>
                        <td>{$row['service_name']}</td>
                        <td><span style='color:green;'>Confirmed</span></td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>