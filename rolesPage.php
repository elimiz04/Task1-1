<link rel="stylesheet" type="text/css" href="style.css">


<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

$rolesContents = loadRoles($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the delete button is clicked
    if (isset($_POST["delete_id"])) {
        $deleteId = $_POST["delete_id"];
        
        deleteRole($conn, $deleteId);
        
        // Redirect to the same page after deleting
        header("Location: rolesPage.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the edit button is clicked
    if (isset($_POST["edit_id"]) && isset($_POST["new_role"])) {
        $editId = $_POST["edit_id"];
        $newRole = $_POST["new_role"];
        
        updateRole($conn, $editId, $newRole);
        
        // Redirect to the same page after updating
        header("Location: rolesPage.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new_role"])) {
    $newRoleName = $_POST["new_role"];

    createRole($conn, $newRoleName);
    
    // Redirect to the same page after creating the role
    header("Location: rolesPage.php");
    exit();
}

?>

<div class="container">
    <h2>Role Management</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rolesContents as $role): ?>
                <tr>
                    <td><?= $role['id']; ?></td>
                    <td contenteditable="false"><?= $role['role']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="edit_id" value="<?= $role['id']; ?>">
                            <input type="text" name="new_role" value="<?= $role['role']; ?>" class="editable-input">
                            <button class="save-btn" type="submit" >Save</button>
                        </form>     
                        <form method="post" action="">
                            <input type="hidden" name="delete_id" value="<?= $role['id']; ?>">
                            <button class="delete-btn" type="submit">Delete</button>
                        </form>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        <div class="centered-container">
        <h2>Create Role</h2>
        
        <form action="" method="post">
            <label for="new_role">Role Name:</label>
            <input type="text" id="new_role" name="new_role" required>
            <button type="submit">Add</button>
        </form>

        </div>
        </tbody>
    </table>
</div>
