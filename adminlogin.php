<?php
session_start();

// Database connection details
$servername = "localhost";
$dbUsername = "elim";
$dbPassword = "elim";
$dbName = "admin";

include "includes/config.php";

// Establish a database connection using mysqli
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = ['id' => $user['id'], 'username' => $user['username'], 'role' => $user['role']];
        header("Location: index.php");
        exit();
    } else {
        $loginError = "Invalid username or password";
    }

    $stmt->close();
}
?>
