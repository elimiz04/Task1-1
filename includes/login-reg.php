<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the user exists in the database
    $query = "SELECT * FROM application WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $user = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify2($password, $user["password"])) {

            session_unset();

            session_destroy();

            session_start();
            // Set session variables
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_role"] = $user["Role"];
            $_SESSION["user"] = $user;

            echo "Login successful!";

            // Redirect to a logged-in user's homepage
            header("Location: ../homepage.php");
        } else {
            // Password is incorrect
            echo "Invalid password!";
            exit();

        }
    } else {
        // User not found
        echo "User not found!";
    }

    mysqli_stmt_close($stmt);
} else {
    // Invalid request method
    echo "Invalid request method!";
}
?>
