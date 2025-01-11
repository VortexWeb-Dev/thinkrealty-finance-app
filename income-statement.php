<?php
require 'db.php'; // Database connection file

try {
    // Query for total revenues
    $revenues_query = "SELECT SUM(credit_amount) AS total_revenues FROM transactions WHERE account_type = :account_type_revenue";
    $revenues_stmt = $conn->prepare($revenues_query);
    $revenues_stmt->execute([':account_type_revenue' => 'Revenue']);
    $revenues_result = $revenues_stmt->fetch(PDO::FETCH_ASSOC);
    $total_revenues = $revenues_result['total_revenues'] ?? 0;

    // Query for total expenses
    $expenses_query = "SELECT SUM(debit_amount) AS total_expenses FROM transactions WHERE account_type = :account_type_expense";
    $expenses_stmt = $conn->prepare($expenses_query);
    $expenses_stmt->execute([':account_type_expense' => 'Expense']);
    $expenses_result = $expenses_stmt->fetch(PDO::FETCH_ASSOC);
    $total_expenses = $expenses_result['total_expenses'] ?? 0;

    // Calculate net income
    $net_income = $total_revenues - $total_expenses;
} catch (PDOException $e) {
    // Handle database query error
    echo "Error: " . $e->getMessage();
}
?>


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
                    $page_url = basename($_SERVER['REQUEST_URI']); // income_statement.php
                    $title = get_title($page_url);
                    echo $title;
                    ?>
                </h1>

                <hr>

                <!-- Income Statement Table -->
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    // Fetch all revenue accounts
                                    $revenue_query = "SELECT account_name, SUM(credit_amount) AS amount FROM transactions WHERE account_type = :account_type_revenue GROUP BY account_name";
                                    $revenue_stmt = $conn->prepare($revenue_query);
                                    $revenue_stmt->execute([':account_type_revenue' => 'Revenue']);

                                    while ($row = $revenue_stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr><td>{$row['account_name']}</td><td>$" . number_format($row['amount'], 2) . "</td></tr>";
                                    }

                                    // Fetch all expense accounts
                                    $expense_query = "SELECT account_name, SUM(debit_amount) AS amount FROM transactions WHERE account_type = :account_type_expense GROUP BY account_name";
                                    $expense_stmt = $conn->prepare($expense_query);
                                    $expense_stmt->execute([':account_type_expense' => 'Expense']);

                                    while ($row = $expense_stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr><td>{$row['account_name']}</td><td>($" . number_format($row['amount'], 2) . ")</td></tr>";
                                    }

                                    // Display net income
                                    echo "<tr class='font-weight-bold'><td>Net Income</td><td>" . ($net_income >= 0 ? '$' . number_format($net_income, 2) : '($' . number_format(abs($net_income), 2) . ')') . "</td></tr>";
                                } catch (PDOException $e) {
                                    echo "<tr><td colspan='2'>Error: " . $e->getMessage() . "</td></tr>";
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