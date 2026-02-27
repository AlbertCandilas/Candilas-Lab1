<?php
include "../db.php"; // Connects to the database
 
$message = "";
 
if (isset($_POST['save'])) {
  // Sanitize inputs to prevent SQL errors and basic injection
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
 
  if (empty($full_name) || empty($email)) {
    $message = "Name and Email are required!";
  } else {
    // Insert data into the clients table defined in schema.sql
    $sql = "INSERT INTO clients (full_name, email, phone, address)
            VALUES ('$full_name', '$email', '$phone', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: clients_list.php");
        exit;
    } else {
        $message = "Error saving client: " . mysqli_error($conn);
    }
  }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Client</title>
    <link rel="stylesheet" href="../style.css"> </head>
<body>
<?php include "../nav.php"; ?> <h2>Add Client</h2>
<p style="color:red;"><?php echo $message; ?></p>
 
<form method="post">
  <label>Full Name*</label><br>
  <input type="text" name="full_name" required><br><br>
 
  <label>Email*</label><br>
  <input type="email" name="email" required><br><br>
 
  <label>Phone</label><br>
  <input type="text" name="phone"><br><br>
 
  <label>Address</label><br>
  <input type="text" name="address"><br><br>
 
  <button type="submit" name="save">Save Client</button>
</form>
</body>
</html>