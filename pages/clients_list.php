<?php
include "../db.php";
?>
<!doctype html>
<html>
<head>
    <title>Client List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include "../nav.php"; ?>
    <h2>Clients</h2>
    <div class="stat-card"> <table width="100%" border="0" style="border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; color: #94a3b8; border-bottom: 1px solid #eee;">
                    <th style="padding: 10px;">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM clients");
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr style='border-bottom: 1px solid #f8fafc;'>
                            <td style='padding: 15px;'>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>