<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful
            // You can redirect to the homepage or any other page here
            echo "Login successful!";
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    $conn->close();
}
?>
