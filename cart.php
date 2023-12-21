<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" class="page">
    
</head>
<body>
    
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        
        
        <div class="container-fluid">
            <header class="navbar-brand"  href="#">Shop By</header>
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
    
    <!--Products in cart with remove buttons as well as quantity adjutment-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">
                <div class="card mb-4">
                    <img src="images/pinta german.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="Pinta German">
                    <div class="card-body card-body text-center">
                        <h3 class="card-title mb-4">Pinta German Style Blonde Ale Beer 4.9%</h3>     
                        
                        <h4 class="card-body">€5.00</h4>
                        
                        <!-- Amount Tab with Plus and Minus Buttons -->
                        <div class="input-group mb-4">
                            <button class="btn btn-outline-primary minusBtn" type="button">-</button>
                            <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
                            <button class="btn btn-outline-primary plusBtn" type="button">+</button>
                        </div>
                        
                        <button class="remove-btn" onclick="removeCartItem(this)">Remove</button>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                
                <div class="card mb-4">
                    <img src="images/pinta english.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="pinta English">
                    <div class="card-body card-body text-center">
                        <h3 class="card-title mb-4">Pinta English IPA Pale Ale Beer 5.9% vol</h3>     
                        
                        <h4 class="card-body">€5.00</h4>
                        
                        <!-- Amount Tab with Plus and Minus Buttons -->
                        <div class="input-group mb-4">
                            <button class="btn btn-outline-primary minusBtn" type="button">-</button>
                            <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
                            <button class="btn btn-outline-primary plusBtn" type="button">+</button>
                        </div>
                        
                        <button class="remove-btn" onclick="removeCartItem(this)">Remove</button>
                        
                    </div>
                </div>
            </div>

            <!--Order summary-->
            <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-header">
                        Order Summary
                    </div>
                    <div class="card-body">
                        <!-- Order details -->
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pinta German Style Blonde Ale Beer 4.9%      €5.00
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pinta English IPA Pale Ale Beer 5.9% vol     €5.00
                            </li>
                            <!-- Add more list items for other products -->
                        </ul>
            
                        <!-- Total Price -->
                        <div class="mt-3">
                            <h5>Total Price: €10.00</h5>
                        </div>

                        <div class="row">
                            <div>
                                <!-- Checkout button or additional information -->
                                <button class="btn btn-primary">Proceed to Checkout</button>
                            </div>
                        <div class="row">
                            <div>
                                <!-- Checkout button or additional information -->
                                <button class="btn btn-secondary">Cancel Order</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            </div>
            
        
        
        
        <!--Script control for item quanities-->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                //All elements that have a class with minusBtn, plusBtn, amountInput
                const minusBtns = document.querySelectorAll('.minusBtn');
                const plusBtns = document.querySelectorAll('.plusBtn');
                const amountInputs = document.querySelectorAll('.amountInput');
                
                // Event listener for all minus buttons
                minusBtns.forEach( function (minusBtn) {
                    minusBtn.addEventListener('click', function(){
                        const currentAmount = parseInt(minusBtn.nextElementSibling.value,10);
                        if(currentAmount >1){
                            minusBtn.nextElementSibling.value = currentAmount-1;
                        }
                    })
                });
                
                // Event listener for all plus buttons
                plusBtns.forEach( function (plusBtn) {
                    plusBtn.addEventListener ('click',function(){
                        const currentAmount = parseInt(plusBtn.previousElementSibling.value,10);
                        plusBtn.previousElementSibling.value = currentAmount+1;
                    });
                });
            });
            
        </script>
        
        <!--script for remove elements in cart-->
        <script>
            function removeCartItem(button) {
                var card = button.closest('.col-lg-3');
                card.style.display = 'none';
            }
        </script>
        
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