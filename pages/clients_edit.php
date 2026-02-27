<?php
include "../db.php";
 
if (!isset($_GET['id'])) {
    header("Location: clients_list.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$get = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = $id");
$client = mysqli_fetch_assoc($get);
 
$message = "";
 
if (isset($_POST['update'])) {
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
 
  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "UPDATE clients
            SET full_name='$full_name', email='$email', phone='$phone', address='$address'
            WHERE client_id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: clients_list.php");
        exit;
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
  }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Client</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "../nav.php"; ?>
 
<h2>Edit Client: <?php echo htmlspecialchars($client['full_name']); ?></h2>
<p style="color:red;"><?php echo $message; ?></p>
 
<form method="post">
  <label>Full Name*</label><br>
  <input type="text" name="full_name" value="<?php echo htmlspecialchars($client['full_name']); ?>" required><br><br>
 
  <label>Email*</label><br>
  <input type="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required><br><br>
 
  <label>Phone</label><br>
  <input type="text" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>"><br><br>
 
  <label>Address</label><br>
  <input type="text" name="address" value="<?php echo htmlspecialchars($client['address']); ?>"><br><br>
 
  <button type="submit" name="update">Update Client Info</button>
  <a href="clients_list.php">Cancel</a>
</form>
</body>
</html>