<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Change header to a -->
            <a class="navbar-brand" href="#">Shop By</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="alcohol.php">Alcohol</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Cart button -->
                <a href="cart.php">
                    <button type="button" class="btn">
                        <img src="./assets/images/cart.png" alt="Cart" width="20" height="auto">
                    </button>
                </a>

                <!-- User profile dropdown button -->
                <div class="nav-item dropdown">
                    <?php
                    $userIsLoggedIn = false;
                    if ($userIsLoggedIn) {
                        $userImageLink = "path/to/user/image.jpg";
                        ?>
                        <a href="cart.php"class="btn"  >
                            <img src="./assets/images/cart.png" alt="Cart" width="20" height="auto">
                        </a>
                        <?php
                    } else {
                        // If the user is not logged in
                        ?>
                        <a href= "profile.php" xclass="btn" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="./assets/images/profile.png" alt="Header Image" width="20" height="auto">
                        </a>
                        <?php
                    }
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="profile.php">Professional view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-your-correct-sha384-hash" crossorigin="anonymous"></script>
</body>
</html>
