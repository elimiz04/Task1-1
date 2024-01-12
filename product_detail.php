<?php
include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";
require_once "includes/addToCart.php";
?>

<div class="container">
<div class="row">

<?php
$productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;

if ($productId) {
    $product = loadProduct($conn, $productId);
    //Load the selected product 
    if ($product) {
        echo "<div class='col-lg-6'>";
        echo "<img src='{$product['imageLink']}' class='img-fluid' alt='Product Image'>";
        echo "</div>";
        
        echo "<div class='col-lg-6 text-center'>";
            echo "<h2>{$product['productName']}</h2>";
            echo "<p class='h5'>Price: €{$product['price']}</p>";
            
            echo "<div class='input-group mb-4'>";
                echo "<input type='text' class='form-control text-center amountInput' name='quantity' id='quantity' placeholder='Enter an amount' value='1' required>";
            echo "</div>";
            
            //On Submit, add to cart, with these hidden fields
            echo "<form action='includes/addToCart.php' method='post'>";
                echo "<input type='hidden' name='action' value='add_to_cart'>";
                echo "<input type='hidden' id='product_id' name='product_id' value='{$product['id']}'>";
                echo "<input type='hidden' id='product_name' name='product_name' value='" . htmlspecialchars($product['productName']) . "'>";
                echo "<input type='hidden' id='product_price' name='product_price' value='" . htmlspecialchars($product['price']) . "'>";
                echo "<input type='hidden' id='product_quantity' name='product_quantity' value=''>";
                echo "<input type='hidden' id='imageLink' name='imageLink' value='" . htmlspecialchars($product['imageLink']) . "'>";
                echo "<button type='submit' class='btn btn-primary'>Add To Cart</button>";
            echo "</form>";
        echo "</div>";
        
    } else {
        echo "<div class='col-lg-12'>";
        echo "<p>Product not found</p>";
        echo "</div>";
    }
} else {
    echo "<div class='col-lg-12'>";
    echo "<p>Product ID not provided</p>";
    echo "</div>";
}
?>

</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    //Gets the amount set within the field and updates, the hidden one for the add to cart
    const amountInputs = document.querySelectorAll('.amountInput');
    const hiddenQuantityInput = document.getElementById('product_quantity');
    // Iterate over each amount input
    amountInputs.forEach(function (amountInput) {
        amountInput.addEventListener('input', function () {
            hiddenQuantityInput.value = amountInput.value;
        });
    });
});
</script>

<?php include "includes/footer.php"; ?>
