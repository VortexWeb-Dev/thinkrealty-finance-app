<?php include './inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Include Sidebar -->
        <?php include './inc/sidebar.php'; ?>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
            <!-- Include Navbar -->
            <?php include './inc/navbar.php'; ?>

            <!-- Page Content -->
            <div class="container mt-4">
                <h1>Account Details</h1>
                <hr>

                <?php
                // Fetch account number from query parameter
                $account_number = $_GET['number'];

                // Dummy data for demonstration
                $accounts = [
                    '101' => ['number' => '101', 'name' => 'Cash', 'type' => 'Asset', 'opening_balance' => '$1000.00'],
                    '201' => ['number' => '201', 'name' => 'Accounts Receivable', 'type' => 'Asset', 'opening_balance' => '$500.00'],
                    '301' => ['number' => '301', 'name' => 'Accounts Payable', 'type' => 'Liability', 'opening_balance' => '$200.00'],
                    '401' => ['number' => '401', 'name' => 'Sales Revenue', 'type' => 'Revenue', 'opening_balance' => '$0.00'],
                    '501' => ['number' => '501', 'name' => 'Rent Expense', 'type' => 'Expense', 'opening_balance' => '$0.00'],
                ];

                // Get account details based on account number
                $account = $accounts[$account_number];

                if ($account) {
                    echo '<div class="card shadow">';
                    echo '<div class="card-body">';
                    echo '<table class="table table-bordered">';
                    foreach ($account as $key => $value) {
                        echo '<tr><th>' . ucwords(str_replace('_', ' ', $key)) . '</th><td>' . $value . '</td></tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="card shadow">';
                    echo '<div class="card-body">';
                    echo '<p>Account not found.</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

                <a href="chart-of-accounts.php" class="btn btn-secondary mt-3">Back</a>
            </div>
        </main>
    </div>
</div>

<?php include './inc/footer.php'; ?>