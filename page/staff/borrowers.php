<?php require_once(__DIR__ . '/../../controllers/borrowers.php'); ?>
<?php

$borrower = new Borrower();
$response = [];
$active = $borrower->active;

$borrowers_data = $borrower->getData();

?>
<?php require(__DIR__ . '/../../header.php'); ?>
    <div style="height: calc(100vw * (9/16));width: 100%;">
        <nav class="navbar bg-light">
            <?php require(__DIR__ . '/../../navbar.php'); ?>
        </nav>
        
        <div class="w-100 d-flex justify-content-center" style="height: 100%;">
            <div class="p-5" style="width: 90%;height: 100%;background-color: #f5f5dc;">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-4">Borrowers</h1>
                    <a class="btn btn-outline-primary d-flex justify-content-between align-items-center" href="<?php echo BASE_URL; ?>page/staff/borrowerform.php">
                        <span class="material-icons mx-1">
                            person_add
                        </span>
                        New Borrower
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Borrower ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Birthdate</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($borrowers_data["data"] as $data) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($data['BorrowerID']); ?></td>
                            <td><?php echo htmlspecialchars($data['Fname']); ?></td>
                            <td><?php echo htmlspecialchars($data['Mname']); ?></td>
                            <td><?php echo htmlspecialchars($data['Lname']); ?></td>
                            <td><?php echo htmlspecialchars($data['ContactNumber']); ?></td>
                            <td><?php echo htmlspecialchars($data['EmailAddress']); ?></td>
                            <td><?php echo htmlspecialchars($data['Birthdate']); ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="<?php echo BASE_URL; ?>page/staff/editborrower.php?id=<?php echo $data['BorrowerID'];?>">Edit</a> | 
                                <a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>page/staff/removeborrower.php?id=<?php echo $data['BorrowerID'];?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>