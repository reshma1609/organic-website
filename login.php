<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert a new user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, show a popup and redirect to login
        echo "<script>
                alert('Registration successful! You can now log in.');
                window.location.href = 'aihtml.html';
              </script>";
    } else {
        // If there's an error during insertion
        echo "<script>
                alert('Error: Could not register user.');
                window.location.href = 'signup.html';
              </script>";
    }

    $conn->close();
}
?>