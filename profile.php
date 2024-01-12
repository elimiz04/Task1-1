<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";
include "includes/header.php";

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

$userInfo = isset($_SESSION["user"]) ? $_SESSION["user"] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body.bodyStyling {
            background-color: #f5f5f5;
            text-align: -webkit-center;
        }

        .profile-container {
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center; /* Center the text in the profile container */
        }

        .edit-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body class="bodyStyling">
    <div class="profile-container">
        <!-- Edit button -->
        <button class="edit-button" onclick="window.location.href='edit_profile.php'">Edit</button>

        <!-- User profile information -->
        <h2>User Profile</h2>
        <?php if (!empty($userInfo)): ?>
            <?php foreach ($userInfo as $key => $value): ?>
                <p><strong><?php echo ucfirst($key); ?>:</strong> <?php echo $value; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No user information available.</p>
        <?php endif; ?>

    </div>
</body>

<?php include 'includes/footer.php'; ?>
</html>
