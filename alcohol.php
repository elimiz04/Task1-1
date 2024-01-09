
<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";

    $products = loadAllProducts($conn);


?>


<!--Cards for items-->
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">
    <?php foreach($products as $row): ?>
    <div class="card mb-4">
    <img src="<?php echo $row["imageLink"];?>" class="card-img-top w-50 h-50 mx-auto"  alt="Product Image">

        <!--Allows centre allignment of text in html-->
        <div class="card-body card-body text-center">
            <h3 class="card-title mb-4">Cisk</h3>     
            <br>
            <h4 class="card-body">€2.00</h4>

        <!-- Amount Tab with Plus and Minus Buttons -->
            <div class="input-group mb-4">
                <button class="btn btn-outline-primary minusBtn" type="button">-</button>
                <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
                <button class="btn btn-outline-primary plusBtn" type="button">+</button>
            </div>

            <a href="cart.html" class="btn btn-primary mb-4 w-100">Add to cart</a>

        </div>
        <?php endforeach; ?>
    </div>
    </div>

        <!-- <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                
            <div class="card mb-4">
                <img src="images/pinta english.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="pinta English">
                <div class="card-body card-body text-center">
                <h3 class="card-title mb-4">Pinta English IPA Pale Ale Beer 5.9% vol</h3>     

                <h4 class="card-body">€5.00</h4>

        <div class="input-group mb-4">
            <button class="btn btn-outline-primary minusBtn" type="button">-</button>
            <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
            <button class="btn btn-outline-primary plusBtn" type="button">+</button>
        </div>

    <a href="cart.html" class="btn btn-primary mb-4 w-100">Add to cart</a>

    </div>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                
    <div class="card mb-4">
    <img src="images/pinta german.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="Pinta German">
    <div class="card-body card-body text-center">
    <h3 class="card-title mb-4">Pinta German Style Blonde Ale Beer 4.9%</h3>     

    <h4 class="card-body">€5.00</h4>

    <div class="input-group mb-4">
    <button class="btn btn-outline-primary minusBtn" type="button">-</button>
    <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
    <button class="btn btn-outline-primary plusBtn" type="button">+</button>
    </div>

    <a href="cart.html" class="btn btn-primary mb-4 w-100">Add to cart</a>

    </div>
    </div>
    </div>


    <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                
    <div class="card mb-4">
    <img src="images/Savina Amarettu Almond Liqueur.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="Almond Liquer">
    <div class="card-body card-body text-center">
    <h3 class="card-title mb-4">Savina Amarettu Almond Liqueur</h3>     

    <h4 class="card-body">€16.10</h4>

    <div class="input-group mb-4">
    <button class="btn btn-outline-primary minusBtn" type="button">-</button>
    <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
    <button class="btn btn-outline-primary plusBtn" type="button">+</button>
    </div>

    <a href="#" class="btn btn-primary mb-4 w-100">Add to cart</a>

    </div>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                
    <div class="card mb-4">
    <img src="images/Savina cherry Liquer with rum.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="Cherry Liquer">
    <div class="card-body card-body text-center">
    <h3 class="card-title mb-4">Savina Cherry Liqueur Spiced with Kirsch</h3>     

    <h4 class="card-body">€21.80</h4>

    <div class="input-group mb-4">
    <button class="btn btn-outline-primary minusBtn" type="button">-</button>
    <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
    <button class="btn btn-outline-primary plusBtn" type="button">+</button>
    </div>

    <a href="#" class="btn btn-primary mb-4 w-100">Add to cart</a>

    </div>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">                <div class="card mb-4">
    <img src="images/Savina cocinut Liquer with rum.jpg" class="card-img-top w-50 h-50 mx-auto"  alt="Coconut liquer">
    <div class="card-body card-body text-center">
    <h3 class="card-title mb-4">Savina Coconut Liqueur Spiced with Rum</h3>     

    <h4 class="card-body">€21.18</h4>

    <div class="input-group mb-4">
    <button class="btn btn-outline-primary minusBtn" type="button">-</button>
    <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
    <button class="btn btn-outline-primary plusBtn" type="button">+</button>
    </div>

    <a href="#" class="btn btn-primary mb-4 w-100">Add to cart</a>

    </div>
    </div> -->
    </div>




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



    </div>
    </div>



<!--Footer-->
<?php include'includes/footer.php'; ?>