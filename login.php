<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username == 'admin' && $password == 'password') {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        // Redirect to the home page
        header("Location: Home.html");
    } else {
        // Redirect back to the login page with an error message
        header("Location: login.html?error=Incorrect username or password");
    }
}
