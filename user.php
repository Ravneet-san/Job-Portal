<?php
session_start();

// Replace these with your DB credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Preetsystem";

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get submitted data safely
$user_id = $_POST['user-id'] ?? '';
$password = $_POST['password'] ?? '';

if (!$user_id || !$password) {
    die("User ID and password are required.");
}

// Prepare and execute statement to prevent SQL injection
$stmt = $conn->prepare("SELECT Password FROM Users WHERE User_ID = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($password);
    $stmt->fetch();

    // Verify password using password_verify()
    if (password_verify($password, $password)) {
        // Password correct - login success
        $_SESSION['user_id'] = $user_id;
        echo "Login successful! Welcome, " . htmlspecialchars($user_id);
        // Redirect or load user dashboard here
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User ID not found.";
}

$stmt->close();
$conn->close();
?>
