<?php
// login.php

// Include the connect.php file
include 'connect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query to check if the username and password exist in the database
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

  // Execute the query
  $result = $conn->query($query);

  // Check if the query returned any results
  if ($result->num_rows > 0) {
    // Login successful, redirect to dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    // Login failed, display error message
    $error = "Invalid username or password";
  }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zoo Arcadia</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- HTML form for login -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="username">Pseudo:</label>
  <input type="text" id="username" name="username"><br><br>
  <label for="password">mot de pass:</label>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Soumettre">
  <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
</form>
</body>
</html>