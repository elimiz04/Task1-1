<?php 
require_once "includes/functions.php";

require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";
?>

<header class="container-fluid bg-light border-bottom border-secondary p-4">
<div class="row">
<div class="col-12">
<h1>Login</h1>
</div>
</div>
</header>

<div class="container mt-3 text-center">
    <form action="includes/login-reg.php" method="POST">
        <!-- Main Form -->
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3 class="text-center">Personal Details</h3>
<div class="form-floating mb-3">
<input type="email" class="form-control" id="email" name="email" required>
<label for="email">Email</label>
</div>
<div class="form-floating mb-3">
<input type="password" class="form-control" id="password" name="password" required>
<label for="password">Password</label>
</div>
</div>
<div class="col-lg-5 col-md-12">

    <!-- <?php
    foreach($signupapplication as $row):
        ?>
        <option value = "<?php echo $row["name"]; ?>"></option>
        <?php
    endforeach;
    ?> -->

</select>

</div>
</select>
</div>
</div>
</div>
</div>

<!-- Form Buttons -->
<div class="row">
<div class="col-12 mb-3">
<button type="submit" class="btn btn-success w-100 p-2 fs-5">Submit Application</button>
</div>
<div class="col-12">
<button type="reset" class="btn btn-danger w-100 p-2 fs-5">Reset Form</button>
</div>
</div>
</form>
</div>
<div class="container mt-5 text-center">
    <div class="row">
        <div class="col-12 col-md-3"></div>

        <?php
        if(isset($_GET["error"])):
        ?>
            <div class="col-12 col-md-6 text-center border border-danger-subtle bg-danger-subtle text-danger p-2">
                <?php
                $error = $_GET["error"];
                if($error == "stmtfailed"){
                    echo"Something went wrong, please contact admin.";
                }
                elseif($error == "passwordsDoNotMatch"){
                    echo "Passwords Do Not Match";
                }
                ?>
            </div>
        <?php endif; ?>

        <?php
        if(isset($_GET["success"])){
            if($_GET["success"]==true){
            ?>
                <div class="col-12 col-md-6 text-center border border-success-subtle bg-success-subtle text-success p-2">
                    Application Registration completed successfully.
                </div>
            <?php
            }
        }
        ?>

<p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>

        <div class="col-12 col-md-3"></div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
