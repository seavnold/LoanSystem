<?php require_once(__DIR__ . '/../../controllers/borrowers.php'); ?>
<?php

$borrower = new Borrower();

$borrower->removeBorrower($_GET['id']);

?>