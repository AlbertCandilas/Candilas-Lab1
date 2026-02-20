<?php include "../db.php"; ?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include "../nav.php"; ?>
    <h2>Available Services</h2>
    <div class="stats-container">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM services");
        while($s = mysqli_fetch_assoc($res)): ?>
            <div class="stat-card">
                <span class="stat-label">Service ID: #<?php echo $s['id']; ?></span>
                <div class="stat-value" style="font-size: 24px;"><?php echo $s['service_name']; ?></div>
                <p>Base Price: ₱<?php echo number_format($s['price'], 2); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>