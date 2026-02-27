<?php
include "../db.php";

/* ============================
   SOFT DELETE (Deactivate)
   ============================ */
if (isset($_GET['delete_id'])) {
  $delete_id = (int)$_GET['delete_id'];
  mysqli_query($conn, "UPDATE services SET is_active=0 WHERE service_id=$delete_id");
  header("Location: services_list.php");
  exit;
}

/* ============================
   FETCH ALL SERVICES
   ============================ */
$result = mysqli_query($conn, "SELECT * FROM services ORDER BY service_id DESC");
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Services Management</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include "../nav.php"; ?>

<div style="max-width: 1000px; margin: 0 auto;">
  <h2>Services</h2>

  <p>
    <a href="services_add.php" style="background: var(--accent); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.85rem;">
      + Add New Service
    </a>
  </p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Service Name</th>
        <th>Rate</th>
        <th>Status</th>
        <th style="text-align: center;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td style="color: var(--text-muted);">#<?php echo $row['service_id']; ?></td>
          <td><b><?php echo $row['service_name']; ?></b></td>
          <td style="color: var(--accent); font-weight: bold;">
             ₱<?php echo number_format($row['hourly_rate'], 2); ?>
          </td>

          <td>
            <?php if ($row['is_active'] == 1): ?>
              <span style="color: #38a169; background: #f0fff4; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: bold;">Active</span>
            <?php else: ?>
              <span style="color: #e53e3e; background: #fff5f5; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: bold;">Inactive</span>
            <?php endif; ?>
          </td>

          <td style="text-align: center;">
            <a href="services_edit.php?id=<?php echo $row['service_id']; ?>" style="color: var(--accent); text-decoration: none; font-weight: 600;">Edit</a>

            <?php if ($row['is_active'] == 1) { ?>
              <span style="color: var(--border-color); margin: 0 5px;">|</span>
              <a href="services_list.php?delete_id=<?php echo $row['service_id']; ?>" 
                 style="color: #e53e3e; text-decoration: none;"
                 onclick="return confirm('Deactivate this service?')">
                 Deactivate
              </a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>