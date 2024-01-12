<?php 
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";

$products = loadAllProducts($conn);

?>
<!-- View list of alcohol products -->
<div class="container-fluid">
    <div class="row">
        <?php foreach ($products as $row): ?>
            <div class="col-lg-3 col-md-4 mb-3">
                <form class="product-form" action="product_detail.php" method="get">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <div class="card mb-4">
                        <img src="<?php echo $row["imageLink"]; ?>" class="card-img-top w-50 h-50 mx-auto" alt="Product Image">
                        <div class="card-body">
                            <span style="display: block; text-align: center;">Price: €<?php echo $row["price"]; ?></span>
                            <strong><?php echo $row["productName"]; ?></strong>
                            <div class="info-row">
                                <button type="submit" class="btn btn-link">More Information</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!--Footer-->
<?php include 'includes/footer.php'; ?>
