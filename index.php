<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #sidebar {
            height: 100vh;
            position: fixed;
        }

        .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .main-content {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <!-- Include Sidebar -->
        <?php include './inc/sidebar.php'; ?>
    </div>

    <main role="main" class="main-content">
        <!-- Include Navbar -->
        <?php include './inc/navbar.php'; ?>

        <!-- Dummy Data Content -->
        <div class="container mt-4">
            <h1>
                <?php
                require_once 'utils.php';
                $page_url = basename($_SERVER['REQUEST_URI']); 
                $title = get_title($page_url);
                echo $title;
                ?>
            </h1>
            <hr>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue</h5>
                            <p class="card-text">$120,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Expenses</h5>
                            <p class="card-text">$80,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Net Profit</h5>
                            <p class="card-text">$40,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Outstanding Debts</h5>
                            <p class="card-text">$10,000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h3>Recent Activities</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Invoice #1234 - Paid</li>
                        <li class="list-group-item">Invoice #1235 - Due</li>
                        <li class="list-group-item">Payment to Supplier X - Completed</li>
                        <li class="list-group-item">Salary Disbursement - Pending</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Quick Actions</h3>
                    <button class="btn btn-primary btn-block mb-2">Create New Invoice</button>
                    <button class="btn btn-secondary btn-block mb-2">Record Expense</button>
                    <button class="btn btn-success btn-block mb-2">Generate Report</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Financial Overview</h3>
                    <canvas id="financialChart"></canvas>
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