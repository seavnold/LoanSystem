<?php require_once(__DIR__ . '/../../controllers/login.php'); ?>
<?php

$login = new Login();
$response = [];
$active = $login->active;

if(isset($_POST) && count($_POST) > 0) $response = $login->login($_POST);

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-5" style="width: 30rem;">
            <h1 class="text-center mb-3"> LoanSystem </h1>
            <?php if(isset($response['status']) && !$response['status']) : ?>
                <div class="alert alert-danger d-flex justify-content-between" role="alert">
                    <div class="d-flex justify-content-center">
                        <span class="material-icons md-10">warning</span>
                        <div class="mx-1"> <B>Oops!</B> Invalid Credentials Used. </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><span class="material-icons">mail</span></span>
                <input type="text" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><span class="material-icons">lock</span></span>
                <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>
            </div>
            </form>
        </div>
    </div>
  </body>
</html>