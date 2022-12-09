<?php require_once(__DIR__ . '/../../controllers/loanpayments.php'); ?>
<?php

$loans = new LoanPayment();
$response = [];
$active = $loans->active;

$loans = $loans->getData();

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div class="vh-100">
        <nav class="navbar bg-light">
            <?php require(__DIR__ . '/../../navbar.php'); ?>
        </nav>
        
        <div class="w-100 d-flex justify-content-center" style="height: 100%;">
            <div class="p-5" style="width: 900px;height: 100%;background-color: #f5f5dc;">
                <h3 class="mb-4">Loan Payments</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Borrower ID</th>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Loan Amount</th>
                            <th scope="col">Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($loans["data"] as $data) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($data['PaymentID']); ?></td>
                            <td><?php echo htmlspecialchars($data['BorrowerID']); ?></td>
                            <td><?php echo htmlspecialchars($data['LoanID']); ?></td>
                            <td><?php echo htmlspecialchars($data['LoanAmount']); ?></td>
                            <td><?php echo htmlspecialchars($data['PaymentDate']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>