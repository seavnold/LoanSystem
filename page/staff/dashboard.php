<?php require_once(__DIR__ . '/../../controllers/dashboard.php'); ?>
<?php

$dashboard = new Dashboard();
$response = [];
$active = $dashboard->active;

$staff_data = $dashboard->getData();

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div class="vh-100">
        <nav class="navbar bg-light">
            <?php require(__DIR__ . '/../../navbar.php'); ?>
        </nav>
        
        <div class="w-100 d-flex justify-content-center" style="height: 92.9%;">
            <div class="h-100 p-5" style="width: 900px;background-color: #f5f5dc;">
                <h3>Hello, <?php echo $staff_data['Sfname']; ?></h1>
            </div>
        </div>
    </div>
  </body>
</html>