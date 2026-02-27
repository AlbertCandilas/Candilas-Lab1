<?php
include "../db.php";
// Fetch all clients, newest first
$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clients List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "../nav.php"; ?>
 
<h2>Clients</h2>
<p><a href="clients_add.php" style="background:#4c51bf; color:white; padding:8px; border-radius:5px; text-decoration:none;">+ Add New Client</a></p>
 
<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; margin-top:20px;">
  <tr style="background-color: #eee;">
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Action</th>
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['client_id']; ?></td>
      <td><?php echo htmlspecialchars($row['full_name']); ?></td>
      <td><?php echo htmlspecialchars($row['email']); ?></td>
      <td><?php echo htmlspecialchars($row['phone']); ?></td>
      <td><?php echo htmlspecialchars($row['address']); ?></td>
      <td>
        <a href="clients_edit.php?id=<?php echo $row['client_id']; ?>">Edit</a>
      </td>
    </tr>
  <?php } ?>
</table>
</body>
</html>