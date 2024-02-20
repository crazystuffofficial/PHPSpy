<?php 
$username = "";
$password = '';
session_start();
if ($username == "" && $password == "") {
    // Set session key
    $_SESSION["logged_in"] = true;

    // Redirect to the desired page
    header("Location: setup.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Get user input
$input_username = $_POST["username"];
$input_password = $_POST["password"];

// Check if username and password are correct
if ($input_username == $username && $input_password == $password) {
    // Set session key
    $_SESSION["logged_in"] = true;

    // Redirect to the desired page
    header("Location: setup.php");
    exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  <style>
    .error{
      color:red;
    }
  </style>
</head>
<body>
  <center><img src='favicon.ico'></center>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
      <br>
      <br>
      <div class="error">
        <?php

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get user input
            $input_username = $_POST["username"];
            $input_password = $_POST["password"];

            // Check if username and password are correct
            if (!($input_username == $username && $input_password == $password)) {
                // Incorrect username or password
                echo "Incorrect username or password. Please try again.";
            }
        }
        ?>
      </div>
    </form>
</body>
</html>