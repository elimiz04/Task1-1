<?php 
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";

$baking = loadAllBaking($conn);
/*$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task1";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}*/
?>

<div class="container-fluid">
    <div class="row">
        <?php foreach($baking as $row): ?>
            <div class="col-lg-3 col-md-3 mb-3 mb-lg-0">
                <div class="card mb-4">
                    <img src="<?php echo $row["imageLink"];?>" class="card-img-top w-50 h-50 mx-auto" alt="Baking Image">
                    <div class="card-body">
                        <span style="display: block; text-align: center;">Price: €<?php echo $row["price"]; ?></span>
                        <strong><?php echo $row["productName"]; ?></strong>
                        <div class="info-row">
                            <div class="input-group mb-4">
                                <button class="btn btn-outline-primary minusBtn" type="button">-</button>
                                <input type="text" class="form-control text-center amountInput" placeholder="Enter amount" value="1">
                                <button class="btn btn-outline-primary plusBtn" type="button">+</button>
                            </div> 
                            <a href="cart.php" class="btn btn-primary mb-4 w-100">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Event listener for all container-fluid elements
    document.querySelectorAll('.container-fluid').forEach(function(container) {
        container.addEventListener('click', function(event) {
            const target = event.target;

            // Check if the clicked element has the class minusBtn
            if (target.classList.contains('minusBtn')) {
                const currentAmount = parseInt(target.nextElementSibling.value, 10);
                if (currentAmount > 1) {
                    target.nextElementSibling.value = currentAmount - 1;
                }
            }

            // Check if the clicked element has the class plusBtn
            if (target.classList.contains('plusBtn')) {
                const currentAmount = parseInt(target.previousElementSibling.value, 10);
                target.previousElementSibling.value = currentAmount + 1;
            }
        });
    });
});
</script>

<!--Footer-->
<?php include 'includes/footer.php'; ?>
