<!--harder functions for application-->
<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


function loadProducts($conn){
    $sql= "SELECT * FROM products;";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load products";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;

}

// Edit Product
function updateProduct($conn, $productId, $newProduct, $newProductPrice, $newProductQty) {
    // Update product according to its id
    $sql = "UPDATE products SET productName = ?, price = ?, qty = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $newProduct, $newProductPrice, $newProductQty, $productId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error updating product: " . mysqli_error($conn);
        exit();
    }
}


function deleteProduct($conn, $productId) {
    // Delete product according to its id
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error deleting product: " . mysqli_error($conn);
        exit();
    }
}

function createProduct($conn, $newProductName,$newProductPrice,$newProductQty) {
    // Create a new product
    $sql = "INSERT INTO products (productName, price, qty) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $newProductName,$newProductPrice,$newProductQty);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error creating product Name: " . mysqli_error($conn);
        exit();
    }
}
function loadRoles($conn){
    $sql= "SELECT * FROM roles;";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load Roles";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;

}

// Edit Role
function updateRole($conn, $roleId, $newRole) {
    // Update role according to its id
    $sql = "UPDATE roles SET role = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $newRole, $roleId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error updating role: " . mysqli_error($conn);
        exit();
    }
}

function deleteRole($conn, $roleId) {
    // Delete role according to its id
    $sql = "DELETE FROM roles WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $roleId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error deleting role: " . mysqli_error($conn);
        exit();
    }
}

function createRole($conn, $roleName) {
    // Create a new role
    $sql = "INSERT INTO roles (role) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $roleName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error creating role: " . mysqli_error($conn);
        exit();
    }
}

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

function updateUserInfo($conn, $newName, $newSurname, $newEmail,$userId) {
    // Assuming you have a table named 'users'
    $sql = "UPDATE application SET firstName = ?, lastName = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $newName, $newSurname, $newEmail,$userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL error
        echo "Error updating user information: " . mysqli_error($conn);
        exit();
    }
}

//This is the post request for the sign up
function createApplication($conn, $email, $password, $firstName, $lastName, $address, $street, $town, $role) {
    $sql = "INSERT INTO application (email, password, firstName, lastName, address, street, town, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signinapplication.php?error=stmtfailed");
        exit();
    }

    // Hashed Password for security

    mysqli_stmt_bind_param($stmt, "ssssssss", $email, $password, $firstName, $lastName, $address, $street, $town, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../homepage.php?success=true");
    exit();
}

function password_verify2($password, $passwordFromApi){

    if($password === $passwordFromApi ){
        return true;
    }
    else{
        return false;
    }

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
