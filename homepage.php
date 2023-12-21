<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" class="page">
    
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        
        
        <div class="container-fluid">
            <header class="navbar-brand"  href="#">Shop By</header>
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
                
                <a href="cart.html">
                    <button type="button" class="btn">
                        <img src="images/cart.png" alt="Cart" width="20" height="auto" href="cart.html">
                    </button>
                </a>
                <a href="user.html">
                    <button type="button" class="btn">
                        <div class="nav-item dropdown">
                            <a class="btn" href="user.html" role="button" data-bs-toggle="dropdown" >
                                <img src="images/profile.png" alt="profile" width="20" height="auto" href="user.html">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="signup.html">Create account</a></li>
                                <li><a class="dropdown-item" href="#">Sign into account</a></li>
                                <li><a class="dropdown-item" href="#">Professional view</a></li>
                                <li><a class="dropdown-item" href="editaccount.html">Edit Account Details</a></li>
                            </ul>
                        </div>
                        
                    </button>
                </a>
                
        
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                        <!-- Link to the results page -->
                        <a class="btn btn-outline-success" href="alcohol.html" onclick="return handleSearch()">Search</a>
                    </form>
            </div>
        </div>
    </nav>
    
    
    
    
    <!--Carousel for first page-->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/grocery-store-supermarket-vegetable-shop-thumb.jpg" class=" d-block w-100" alt="grocery store">
            </div>
            
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/hamper.jpg" class="d-block w-100" alt="hamper">
            </div>
            
            <div class="carousel-item"data-bs-interval="2000">
                <img src="images/pastries.jpg" class="d-block w-100" alt="pastries">
            </div>
            
        </div>
        <!--Buttons on the side to allow user to change image from arrows.-->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <!--Footer-->
    <div class="footer-content">
        <footer>
            <div class="footer-text">
                <span class="bold">DELIVERIES</span>
            </div>
            <div class="footer-text">
                We deliver across Malta.
                <br>
                <span class="bold">Monday-Saturday: 09:00-19:00</span>
            </div>
            <div class="footer-text">
                Tel: 
                <span class="bold">
                    +356 7956 5870
                </span>
                <br>
                Email: 
                <span class="bold"> Shopby@gmail.com</span>
            </div>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
