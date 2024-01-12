<?php
include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";
?>

<div class="container">
    <div class="row">
        <?php
        $productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;

        if ($productId) {
            $product = loadProduct($conn, $productId);

            if ($product) {
                echo "<div class='col-lg-6'>";
                echo "<img src='{$product['imageLink']}' class='img-fluid' alt='Product Image' style='max-width: 400px;'>";
                echo "</div>";

                echo "<div class='col-lg-6 text-center'>";
                echo "<h2>{$product['productName']}</h2>";
                echo "<p class='h5'>Price: €{$product['price']}</p>";
                // Display other product details as needed

                echo "<div class='input-group mb-4'>";
                echo "<button class='btn btn-outline-primary minusBtn' type='button'>-</button>";
                echo "<input type='text' class='form-control text-center amountInput' placeholder='Enter amount' value='1'>";
                echo "<button class='btn btn-outline-primary plusBtn' type='button'>+</button>";
                echo "</div>";

                echo "<form action='cart.php' method='post'>";
                echo "<input type='hidden' name='action' value='add_to_cart'>";
                echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
                echo "<input type='hidden' name='product_name' value='" . htmlspecialchars($product['productName']) . "'>";
                echo "<input type='hidden' name='product_price' value='" . htmlspecialchars($product['price']) . "'>";
                echo "<input type='hidden' name='imageLink' value='" . htmlspecialchars($product['imageLink']) . "'>";
                echo "<button type='submit' class='btn btn-primary add-to-cart-btn'>Add To Cart</button>";
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
    const amountInput = document.querySelector('.amountInput');
    const minusBtn = document.querySelector('.minusBtn');
    const plusBtn = document.querySelector('.plusBtn');

    minusBtn.addEventListener('click', function () {
        const currentAmount = parseInt(amountInput.value, 10);
        if (currentAmount > 1) {
            amountInput.value = currentAmount - 1;
        }
    });

    plusBtn.addEventListener('click', function () {
        const currentAmount = parseInt(amountInput.value, 10);
        amountInput.value = currentAmount + 1;
    });
});
</script>

<?php include "includes/footer.php"; ?>
