<?php
require_once "includes/functions.php";

require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";

session_start();

function isUserAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>

<body>

    <h1>Welcome to Product Management</h1>

    <?php if (isUserAdmin()): ?>
        <p>
            <a href="create_product.php">Create New Product</a>
            <a href="edit_product.php">Edit Product</a>
            <a href="delete_product.php">Delete Product</a>
        </p>
    <?php endif; ?>

    <!-- Other content of your main page -->

</body>

</html>
