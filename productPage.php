<link rel="stylesheet" type="text/css" href="style.css">


<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

$productsContents = loadProducts($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the delete button is clicked
    if (isset($_POST["delete_id"])) {
        $deleteId = $_POST["delete_id"];
        
        deleteProduct($conn, $deleteId);
        
        header("Location: productPage.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the edit button is clicked
    if (isset($_POST["edit_id"]) && isset($_POST["new_product"])) {
        //Get details from form
        $editId = $_POST["edit_id"];
        $newProduct = $_POST["new_product"];
        $newProductPrice = $_POST["price"];
        $newProductQty = $_POST["qty"];
        

        updateProduct($conn, $editId, $newProduct,$newProductPrice,$newProductQty);
        
        header("Location: productPage.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new_product"])) {
    $newProductName = $_POST["new_product"];
    $newProductPrice = $_POST["price"];
    $newProductQty = $_POST["qty"];

    createProduct($conn, $newProductName,$newProductPrice,$newProductQty);
    
    header("Location: productPage.php");
    exit();
}

?>

<div class="container">
    <h2>Product Management</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ProductName</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsContents as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td contenteditable="false"><?= $product['productName']; ?></td>
                    <td contenteditable="false"><?= $product['price']; ?></td>
                    <td contenteditable="false"><?= $product['qty']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="edit_id" value="<?= $product['id']; ?>">
                            <input placeholder="Name" type="text" name="new_product" value="<?= $product['productName']; ?>" class="editable-input">
                            <input placeholder="Price" type="text" name="price" value="<?= $product['price']; ?>" class="editable-input">
                            <input placeholder="Quantity" type="text" name="qty" value="<?= $product['qty']; ?>" class="editable-input">

                            <button class="save-btn" type="submit" >Save</button>
                        </form>     
                        <form method="post" action="">
                            <input type="hidden" name="delete_id" value="<?= $product['id']; ?>">
                            <button class="delete-btn" type="submit">Delete</button>
                        </form>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        <div class="centered-container">
        <h2>Create Product</h2>
        
        <form action="" method="post">
            <label for="new_product">Product Name:</label>
            <input type="text" id="new_product" name="new_product" required>

            <label for="new_product">Product Price:</label>
            <input type="text" id="price" name="price" required>

            <label for="new_product">Product Quantity:</label>
            <input type="text" id="qty" name="qty" required>
            <button type="submit">Add</button>
        </form>

        </div>
        </tbody>
    </table>
</div>
