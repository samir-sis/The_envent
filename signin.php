<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $dbPassword = "root";
    $dbname = "evento";

    // Create connection
    $conn = new mysqli($servername, $username, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute statement
    $stmt = $conn->prepare("SELECT name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name, $hashedPassword);
    
    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        // Successful login
        $_SESSION['user_name'] = $name;

        // Generate a session token
        if (function_exists('openssl_random_pseudo_bytes')) {
            $_SESSION['user_token'] = bin2hex(openssl_random_pseudo_bytes(32));
        } else {
            // If openssl_random_pseudo_bytes is not available, fall back to a less secure method
            $_SESSION['user_token'] = md5(uniqid(mt_rand(), true));
        }

        // Set a cookie with the token (optional)
        setcookie("user_token", $_SESSION['user_token'], time() + 3600, "/");

        // Redirect to the index page
        header("Location: http://localhost:82/evento/index.php");
        exit(); // Ensure no further code is executed
    } else {
        // Invalid credentials
        echo "Invalid email or password";
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
