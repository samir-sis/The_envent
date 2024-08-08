<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Remove token cookie if set
if (isset($_COOKIE['user_token'])) {
    setcookie('user_token', '', time() - 3600, '/');
}

// Redirect to the index page
header("Location: http://localhost:82/evento/index.php");
exit();
?>
