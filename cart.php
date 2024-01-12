<link rel="stylesheet" type="text/css" href="style.css">


<?php
session_start();

include "includes/header.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

$cartContents = loadCart($conn);
?>

<section class="container mt-4">
    <h2>Your Shopping Cart</h2>

    <div class="row">
        <div class="col-md-8">
            <!-- Checks if it is empty -->
            <?php if ($cartContents): ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                </form>
            <?php else: ?>
                <p>Your shopping cart is empty</p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <!-- Calculation for the Total Price -->
                    <?php if ($cartContents): ?>
                        <?php
                        $subtotal = 0;
                        foreach ($cartContents as $item) {
                            if (isset($item['price'], $item['qty'])) {
                                $subtotal += $item['price'] * $item['qty'];
                            }
                        }
                        $total = $subtotal
                        ?>
                        <p class="card-text">Total: €<?php echo number_format($total, 2); ?></p>
                        <!-- Create Order -->
                        <form action="checkout.php" method="post">
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
</form>
                    <?php else: ?>
                        <p class="card-text">Total: €0.00</p>
                        <p>Your shopping cart is empty</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    $result = loadCart($conn);
    
    if ($result) {
    // Check if there are any cart items
        if (mysqli_num_rows($result) > 0) {
            while ($cart = mysqli_fetch_assoc($result)) {
                echo "<div class='stylingForCart'>";
                echo "<div class='col-lg-6 text-center'>";
                echo "<img src='{$cart['imageLink']}' class='img-fluid' alt='Product Image'>";
                echo "</div>";
                
                echo "<div class='text-center'>";
                echo "<h2>{$cart['name']}</h2>";
                echo "<p class='h5'>Price: €{$cart['price']}</p>";
                echo "<p class='h5'>Quantity: {$cart['qty']}</p>";
            
                // Edit
                echo "<form action='includes/editCart.php' method='POST'>";
                echo "<input type='hidden' name='cart_id' value='{$cart['id']}'>";
                echo "<label for='new_quantity'>New Quantity:</label>";
                echo "<input type='number' name='new_quantity' value='{$cart['qty']}' min='1'>";
                echo "<button type='submit' class='btn btn-success'>Edit</button>";
                echo "</form>";

                // Add a form with a delete button
                echo "<form action='includes/deleteCartItem.php' method='POST'>";
                echo "<input type='hidden' name='cart_id' value='{$cart['id']}'>";
                echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                echo "</form>";
            
                echo "</div>";
                echo "</div>";
            }
        }
        else {
                echo "No products in Cart found.";
        }
        mysqli_free_result($result);

    } else {
        echo "<div class='col-lg-12'>";
        echo "<p>Nothing was found in the cart</p>";
        echo "</div>";
    }
    ?>
</section>

<?php
include "includes/footer.php";
?>
