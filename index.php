<?php
require 'db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


// Query for total revenue
$revenue_query = "SELECT SUM(credit_amount) AS total_revenue FROM transactions WHERE account_type = 'Revenue'";
$revenue_stmt = $conn->prepare($revenue_query);
$revenue_stmt->execute();
$revenue_result = $revenue_stmt->fetch(PDO::FETCH_ASSOC);
$total_revenue = $revenue_result['total_revenue'] ?? 0;

// Query for total expenses
$expenses_query = "SELECT SUM(debit_amount) AS total_expenses FROM transactions WHERE account_type = 'Expense'";
$expenses_stmt = $conn->prepare($expenses_query);
$expenses_stmt->execute();
$expenses_result = $expenses_stmt->fetch(PDO::FETCH_ASSOC);
$total_expenses = $expenses_result['total_expenses'] ?? 0;

// Calculate net profit
$net_profit = $total_revenue - $total_expenses;

// Sample query for monthly data for the past 6 months
$chart_data_query = "SELECT MONTH(transaction_date) AS month, SUM(credit_amount) AS revenue, SUM(debit_amount) AS expenses 
                     FROM transactions 
                     WHERE account_type IN ('Revenue', 'Expense') AND YEAR(transaction_date) = YEAR(CURRENT_DATE) 
                     GROUP BY MONTH(transaction_date)";
$chart_data_stmt = $conn->prepare($chart_data_query);
$chart_data_stmt->execute();

$months = [];
$revenues = [];
$expenses = [];
while ($data = $chart_data_stmt->fetch(PDO::FETCH_ASSOC)) {
    $months[] = date('M', mktime(0, 0, 0, $data['month'], 10)); // Get month abbreviation
    $revenues[] = $data['revenue'];
    $expenses[] = $data['expenses'];
}
?>

<?php include './inc/header.php'; ?>

<!-- Include Sidebar -->
<?php include './inc/sidebar.php'; ?>

<main role="main" class="main-content bg-light">
    <!-- Include Navbar -->
    <?php include './inc/navbar.php'; ?>

    <!-- Enhanced Dummy Data Content -->
    <div class="container mt-4">
        <h1 class="text-primary mb-4">
            <?php
            require_once 'utils.php';
            $page_url = basename($_SERVER['REQUEST_URI']);
            $title = get_title($page_url);
            echo $title;
            ?>
        </h1>
        <hr>
        <div class="row text-center mb-5">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Revenue</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($total_revenue, 2); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Expenses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($total_expenses, 2); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Net Profit</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($net_profit, 2); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Outstanding Debts</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$10,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                <h3 class="text-center">Recent Activities</h3>
                <?php
                $activities_query = "SELECT activity, status FROM activities ORDER BY date DESC LIMIT 5";
                $activities_stmt = $conn->prepare($activities_query);
                $activities_stmt->execute();
                ?>
                <ul class="list-group shadow">
                    <?php while ($activity = $activities_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $activity['activity']; ?>
                            <span class="badge badge-<?php echo ($activity['status'] == 'Completed' ? 'success' : 'warning'); ?> badge-pill">
                                <?php echo $activity['status']; ?>
                            </span>
                        </li>
                    <?php } ?>
                </ul>

            </div>
            <div class="col-md-6">
                <h3 class="text-center">Quick Actions</h3>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-block mb-3">Create New Invoice</button>
                    <button class="btn btn-secondary btn-block mb-3">Record Expense</button>
                    <button class="btn btn-success btn-block">Generate Report</button>
                </div>
            </div>
        </div>

        <div class="financial-chart-container">
            <div class="chart-title">Financial Overview</div>
            <div class="card shadow">
                <div class="card-body">
                    <canvas id="financialChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var financialData = {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                    label: 'Revenue',
                    data: <?php echo json_encode($revenues); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Expenses',
                    data: <?php echo json_encode($expenses); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        };

        var ctx = document.getElementById('financialChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: financialData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>

</html>