<?php
session_start();
require_once "includes/db-functions.php";
include "includes/header.php";

// Define $cartContents
$cartContents = getCartContents();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, you can redirect to the login page or show a message
    header("Location: login.php"); // Redirect to your login page
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_to_cart':
            if (isset($_POST['product_id'])) {
                $productDetails = getProduct($conn, $_POST['product_id']);
                addToCart($productDetails['id'], $productDetails['name'], $productDetails['price'], $_POST['quantity']);
            }
            break;

        case 'remove':
            if (isset($_POST['product_id'])) {
                removeFromCart($_POST['product_id']);
            }
            break;

        case 'create_order':
            // Implement your create order logic here
            createOrder($_SESSION['user_id'], $cartContents);
            // Clear the cart after creating the order
            $_SESSION['cart'] = array();
            break;

        case 'edit_order':
            // Implement your edit order logic here
            // You may need to provide an interface to edit order details
            break;

        case 'cancel_order':
            // Implement your cancel order logic here
            // You may need to confirm the cancellation and update order status
            break;
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;

        if ($_POST['action'] === 'add_to_cart' && $product_id) {
            // Fetch product details using getProduct()
            $product = getProduct($conn, $product_id);
            addToCart($product['id'], $product['name'], $product['price'], $_POST['quantity'], $product['imageLink']);
        } elseif ($_POST['action'] === 'remove' && $product_id) {
            removeFromCart($product_id);
        }
    }

    ?>

    <section class="container mt-4">
        <h2>Your Shopping Cart</h2>

        <div class="row">
            <div class="col-md-8">
                <?php if ($cartContents): ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartContents as $item): ?>
                                    <tr>
                                        <td><?php echo isset($item['name']) ? $item['name'] : 'N/A'; ?></td>
                                        <td><?php echo isset($item['price']) ? $item['price'] : 'N/A'; ?></td>
                                        <td><?php echo isset($item['quantity']) ? $item['quantity'] : 'N/A'; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger" name="action" value="remove">
                                                Remove
                                            </button>
                                            <input type="hidden" name="product_id" value="<?php echo isset($item['id']) ? $item['id'] : ''; ?>">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                <?php else: ?>
                    <p>Your shopping cart is empty</p>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <?php if ($cartContents): ?>
                            <?php
                            $subtotal = 0;
                            foreach ($cartContents as $item) {
                                $subtotal += isset($item['price']) ? $item['price'] * $item['quantity'] : 0;
                            }
                            $shippingCostPercentage = 0.10; // 10% of the subtotal as shipping cost
                            $shippingCost = $subtotal * $shippingCostPercentage;
                            $total = $subtotal + $shippingCost;
                            ?>
                            <p class="card-text">Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                            <p class="card-text">Shipping Cost: $<?php echo number_format($shippingCost, 2); ?></p>
                            <p class="card-text">Total: $<?php echo number_format($total, 2); ?></p>
                            <form method="get" action="checkout.php">
                                <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                                <input type="hidden" name="shipping_cost" value="<?php echo $shippingCost; ?>">
                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                            </form>
                        <?php else: ?>
                            <p class="card-text">Subtotal: $0.00</p>
                            <p class="card-text">Shipping Cost: $0.00</p>
                            <p class="card-text">Total: $0.00</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php"; ?>
