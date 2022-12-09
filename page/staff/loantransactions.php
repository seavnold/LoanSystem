<?php require_once(__DIR__ . '/../../controllers/loantransactions.php'); ?>
<?php

$loantransacs = new LoanTransaction();
$response = [];
$active = $loantransacs->active;

$loantransacs_data = $loantransacs->getData();

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div class="vh-100">
        <nav class="navbar bg-light">
            <?php require(__DIR__ . '/../../navbar.php'); ?>
        </nav>
        
        <div class="w-100 d-flex justify-content-center" style="height: 100%;">
            <div class="p-5" style="width: 900px;height: 100%;background-color: #f5f5dc;">
                <h3 class="mb-4">Loan Transactions</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Borrower ID</th>
                            <th scope="col">Loan Date</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Collateral</th>
                            <th scope="col">Loan ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($loantransacs_data["data"] as $data) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($data['TransID']); ?></td>
                            <td><?php echo htmlspecialchars($data['BorrowerID']); ?></td>
                            <td><?php echo htmlspecialchars($data['LoanDate']); ?></td>
                            <td><?php echo htmlspecialchars($data['purpose']); ?></td>
                            <td><?php echo htmlspecialchars($data['Collateral']); ?></td>
                            <td><?php echo htmlspecialchars($data['LoanID']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>