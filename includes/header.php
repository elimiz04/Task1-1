<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0',false);
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
                        <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="alcohol.html">Alcohol</a></li>
                            <li><a class="dropdown-item" href="beverages.html">Beverages</a></li>
                            <li><a class="dropdown-item" href="baking.html">Baking</a></li>
                            <li><a class="dropdown-item" href="cannedfood.html">Canned Food</a></li>
                            <li><a class="dropdown-item" href="fruitandvegies.html">Fruit and Veggies</a></li>
                            <li><a class="dropdown-item" href="fish.html">Fish</a></li>
                            <li><a class="dropdown-item" href="meat.html">Meat</a></li>
                            <li><a class="dropdown-item" href="pasta.html">Pasta</a></li>
                            <li><a class="dropdown-item" href="hygiene.html">Hygiene</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Cart button -->
                <a href="cart.html">
                    <button type="button" class="btn">
                        <img src="images/cart.png" alt="Cart" width="20" height="auto">
                    </button>
                </a>

                <!-- User profile dropdown button -->
                <div class="nav-item dropdown">
                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="images/profile.png" alt="profile" width="20" height="auto">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Create account</a></li>
                        <li><a class="dropdown-item" href="#">Sign into account</a></li>
                        <li><a class="dropdown-item" href="#">Professional view</a></li>
                    </ul>
                </div>

                <!-- Add search form -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rn0nGfrUAdKbRL5ktscezRtGibmKlXx8EA4fN3eUq1a4e0Iq0bcewMVJvsTE9tbn" crossorigin="anonymous"></script>
