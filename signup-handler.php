<?php
session_start(); // Start the session at the beginning

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $phone = htmlspecialchars($_POST['phone']);
    $country = htmlspecialchars($_POST['country']);
    $company = htmlspecialchars($_POST['company']);

    // For security reasons, do not store plaintext passwords in a real application
    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, country, company) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $hashedPassword, $phone, $country, $company);

    // Execute the statement
    if ($stmt->execute()) {
        // Store user information in session
        $_SESSION['user_name'] = $name;

        // Set a session token (for demonstration; in practice, this should be more secure)
        $_SESSION['user_token'] = bin2hex(random_bytes(32));

        // Redirect to the index page
        header("Location: http://localhost:82/evento/index.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
