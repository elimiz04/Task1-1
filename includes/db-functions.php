<!--harder functions for application-->
<?php

function loadTowns($conn){
    $sql= "SELECT * FROM Town;";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load Towns";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;

}

//This is the post request for the sign up
function createApplication($conn, $email, $password, $firstName, $lastName, $address, $street, $town) {
    $sql = "INSERT INTO application (email, password, firstName, lastName, address, street, town) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signinapplication.php?error=stmtfailed");
        exit();
    }

    // Hashed Password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $email, $hashedPassword, $firstName, $lastName, $address, $street, $town);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../homepage.php?success=true");
    exit();
}



//This is the get request to load all products for alchohol page
function loadAllProducts($conn) {
    $sql = "SELECT * FROM products";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Products";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Close the statement after fetching the result
    mysqli_stmt_close($stmt);

    return $result;
}

//This is the get request to load all products for baking page
function loadAllBaking($conn) {
    $sql = "SELECT * FROM baking";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Baking";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//This is the add to cart function
function addToCart($conn,$product_name,$product_quantity,$product_price,$imageLink) {

    $sql = "INSERT INTO cart(name, qty, price, imageLink) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // header("location: ../alchol.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "siis", $product_name, $product_quantity, $product_price, $imageLink);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../cart.php?success=true");
    exit();
    
    
    }

    //This loads the contents within the cart
function loadCart($conn) {
    $sql = "SELECT * FROM cart";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Cart";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function getCartContents() {
    return isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : array();
}

//Edit of the quantity within the cart
function editCartItemQuantity($conn, $cart_id, $new_quantity) {
    $sql = "UPDATE cart SET qty = ? WHERE id = ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle the SQL error as needed
        die("SQL error: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_bind_param($stmt, "ii", $new_quantity, $cart_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../cart.php?success=true");
    exit();

}

//Delete product from cart
function deleteCartItem($conn, $cart_id) {
    $sql = "DELETE FROM cart WHERE id = ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle the SQL error as needed
        die("SQL error: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_bind_param($stmt, "i", $cart_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../cart.php?success=true");
    exit();
}


//This shows the product according to its id
function loadProduct($conn, $productId) {
    // Use $conn->prepare() instead of prepare() directly
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    
    // Check for errors in the prepared statement
    if (!$stmt) {
        die("Error in prepared statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

//This is to connect to the database
function connectToDatabase($servername, $dbUsername, $dbPassword, $dbName) {
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

?>
