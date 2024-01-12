<?php
include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";
// require_once "includes/addToCart.php";
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Get user information
$userInfo = isset($_SESSION["user"]) ? $_SESSION["user"] : [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    // Get the new values from the form
    $newName = $_POST["newName"];
    $newSurname = $_POST["newSurname"];
    $newEmail = $_POST["newEmail"];
    
    // Check that none of them are empty
    if (empty($newName) || empty($newEmail) || empty($newSurname)) {
        echo "Name/Email or surname is required.";
        exit();
    }
    
    // Update user information in the database
    updateUserInfo($conn, $_SESSION["user_id"], $newName,$newSurname, $newEmail);
    
    // Update session with the new information
    $_SESSION["user"]["firstName"] = $newName;
    $_SESSION["user"]["lastName"] = $newSurname;
    $_SESSION["user"]["email"] = $newEmail;
    
    // Redirect to the profile page after updating
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile</title>
</head>
<body>

<h2>Edit Profile</h2>

<form action="edit_profile.php" method="POST">
<!-- Added input fields for the user to edit their information -->
<label for="newName">Name:</label>
<input type="text" id="newName" name="newName" value="<?php echo $userInfo['firstName']; ?>" required>
<label for="newSurname">Surname:</label>
<input type="text" id="newSurname" name="newSurname" value="<?php echo $userInfo['lastName']; ?>" required>
<label for="newEmail">Email:</label>
<input type="email" id="newEmail" name="newEmail" value="<?php echo $userInfo['email']; ?>" required>

<button type="submit">Save Changes</button>
</form>

</body>
</html>
