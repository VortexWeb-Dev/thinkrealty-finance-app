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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$120,000</div>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$80,000</div>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                <ul class="list-group shadow">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Invoice #1234 - Paid
                        <span class="badge badge-success badge-pill">Completed</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Invoice #1235 - Due
                        <span class="badge badge-warning badge-pill">Pending</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Payment to Supplier X - Completed
                        <span class="badge badge-success badge-pill">Completed</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Salary Disbursement - Pending
                        <span class="badge badge-warning badge-pill">Pending</span>
                    </li>
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
        console.log('Document loaded, initializing chart');

        // Sample data for financial overview chart
        var financialData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                    label: 'Revenue',
                    data: [30000, 32000, 29000, 31000, 33000, 35000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Expenses',
                    data: [20000, 22000, 21000, 23000, 24000, 25000],
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