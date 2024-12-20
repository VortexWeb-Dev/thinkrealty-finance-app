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
                <h1>
                    <?php
                    require_once 'utils.php';
                    $page_url = basename($_SERVER['REQUEST_URI']); // trial_balance.php
                    $title = get_title($page_url);
                    echo $title;
                    ?>
                </h1>

                <hr>

                <!-- Trial Balance Table -->
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Account Type</th>
                                    <th>Debit Balance</th>
                                    <th>Credit Balance</th>
                                    <th>Net Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Dummy data for demonstration
                                $trial_balance = [
                                    ['type' => 'Assets', 'debit_balance' => '$10,000.00', 'credit_balance' => '$5,000.00', 'net_balance' => '$5,000.00'],
                                    ['type' => 'Liabilities', 'debit_balance' => '$3,000.00', 'credit_balance' => '$7,000.00', 'net_balance' => '-$4,000.00'],
                                    ['type' => 'Equity', 'debit_balance' => '$0.00', 'credit_balance' => '$5,000.00', 'net_balance' => '-$5,000.00'],
                                    ['type' => 'Income', 'debit_balance' => '$15,000.00', 'credit_balance' => '$0.00', 'net_balance' => '$15,000.00'],
                                    ['type' => 'Expenses', 'debit_balance' => '$3,000.00', 'credit_balance' => '$0.00', 'net_balance' => '-$3,000.00'],
                                ];

                                foreach ($trial_balance as $row) {
                                    echo '<tr>';
                                    echo '<td>' . $row['type'] . '</td>';
                                    echo '<td>' . $row['debit_balance'] . '</td>';
                                    echo '<td>' . $row['credit_balance'] . '</td>';
                                    echo '<td>' . $row['net_balance'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include './inc/footer.php'; ?>