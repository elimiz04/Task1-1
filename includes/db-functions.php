<!--harder functions for application-->
<?php
function loadCoursesByLevel($conn, $level){
    $sql= "SELECT * FROM Course WHERE Level = {$level};";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load Courses";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    
    $result =mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    
    return $result;
}

function loadCourseById($conn, $id){
    $sql= "SELECT * FROM Course WHERE id = {$id};";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load Courses";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result -> fetch_assoc();

}

function loadCourseByMode($conn, $mode){
    $sql= "SELECT * FROM coursemode WHERE id = {$mode};";
    
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load Courses";
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result -> fetch_assoc();

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
function createApplication ($conn,  $password, $email, $firstName, $lastName, $address, $street, $town){
    //echo "<h1> We have reached our destination. Counter: {($username), ($password), ($email), ($firstName), ($lastName), ($address), ($street), ($town)}.</h1>";
    $sql = "INSERT INTO application( password, email, firstName, lastName, address, street, town) VALUES(?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../homepage.php?error=stmtfailed");
        exit();
    }
    
    //Automated application date - user does not insert this
    $applicationDate= date ("Y-m-d");

    //Hashed Password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssssss",  $hashedPassword, $email, $firstName, $lastName, $address, $street, $town);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../homepage.php?success=true");
    
}

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

function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "killersvault";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function addToCart($productId, $productName, $productPrice, $quantity, $imageLink) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $productId) {
            $_SESSION['cart'][$index]['quantity'] += $quantity;
            $_SESSION['cart'][$index]['total'] = $item['price'] * $_SESSION['cart'][$index]['quantity'];
            return;
        }
    }

    // Make sure $productDetails has the expected structure
    $productDetails = array(
        'id' => $Id,
        'name' => $Name,
        'price' => $Price,
        'quantity' => $quantity, // Ensure this is defined in $_POST['quantity']
        'total' => $Price * $quantity,
        'imageLink' => $imageLink,
    );

    $_SESSION['cart'][] = $product;
}

function removeFromCart($productId) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if (is_array($item) && isset($item['id']) && $item['id'] == $productId) {
                unset($_SESSION['cart'][$index]);
                return;
            }
        }
    }
}

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

function getProduct($conn, $productId) {
    $sql = "SELECT * FROM products WHERE id = ?";
    
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle the error appropriately
        return null;
    }
    
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    // Assuming you want to return an associative array
    $productDetails = mysqli_fetch_assoc($result);
    
    mysqli_stmt_close($stmt);

    return $productDetails;
}



?>
