<?php require_once(__DIR__ . '/../../controllers/borrowers.php'); ?>
<?php

$borrower = new Borrower();
$response = [];
$active = $borrower->active;

if(isset($_POST) && count($_POST) > 0) $response = $borrower->newBorrower($_POST);

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div style="height: calc(100vw * (9/16));width: 100%;">
        <nav class="navbar bg-light">
            <?php require(__DIR__ . '/../../navbar.php'); ?>
        </nav>
        
        <div class="w-100 d-flex justify-content-center" style="height: 100%;">
            <div class="p-5" style="width: 700px;height: 100%;background-color: #f5f5dc;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-4">Borrower Form</h1>
                    <a class="btn btn-outline-secondary d-flex justify-content-between align-items-center" href="<?php echo BASE_URL; ?>page/staff/borrowers.php">
                        Back
                    </a>
                </div>
                <?php if (isset($response['status']) && $response['status'] == true): ?>
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <div class="d-flex justify-content-center">
                            <span class="material-icons md-10">done</span>
                            <div class="mx-1"> <?php echo $response['message']; ?> </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif (isset($response['status']) && $response['status'] == false): ?>
                    <div class="alert alert-danger d-flex justify-content-between" role="alert">
                        <div class="d-flex justify-content-center">
                            <!-- <?php var_dump($response["errors"]); ?> -->
                            <ul>
                                <?php for ($i = 0; $i < count($response["errors"]); $i++) : ?>
                                    <li><?php echo $response["errors"][$i]; ?></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="" style="width: 100%;">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="First Name" name="fname" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Middle Name" name="mname" aria-label="mname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Contact Number" name="contact" aria-label="contact" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="BirthDate" name="birthdate" aria-label="birthdate" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                            <button class="btn btn-md btn-primary btn-block" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>