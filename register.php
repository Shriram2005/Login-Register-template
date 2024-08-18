<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', 'root', 'logindemo');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $username, $password);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to the login page
            header("Location: login.html?success=Registration successful, please log in.");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>