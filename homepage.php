    
    <?php 
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";
?>
    
    
    
    
    <!--Carousel for first page-->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
    <img src="./assets/images/pastries.jpg" alt="pastries Image" width="100%" height="auto">
</div>
x            
            <div class="carousel-item" data-bs-interval="2000">
            <img src="./assets/images/grocery-store-supermarket-vegetable-shop-thumb.jpg" alt="supermarket Image" width="100%" height="auto">
            </div>
            
            <div class="carousel-item"data-bs-interval="2000">
            <img src="./assets/images/hamper.jpg" alt="hameper Image" width="100%" height="auto">
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
<?php include 'includes/footer.php'; ?>

