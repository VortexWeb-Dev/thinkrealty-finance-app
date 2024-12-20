<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module - Analytics</title>
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
    <div class="container-fluid">
        <div class="row">
            <!-- Include Sidebar -->
            <?php include './inc/sidebar.php'; ?>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
                <!-- Include Navbar -->
                <?php include './inc/navbar.php'; ?>

                <!-- Analytics Content -->
                <div class="container mt-4">
                    <h1>
                        <?php
                        require_once 'utils.php';
                        $page_url = basename($_SERVER['REQUEST_URI']); // analytics.php
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Analytics Sections -->
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Revenue Analysis</h3>
                            <canvas id="revenueChart" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h3>Expense Analysis</h3>
                            <canvas id="expenseChart" height="200"></canvas>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h3>Profit and Loss</h3>
                            <canvas id="profitLossChart" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h3>Cash Flow</h3>
                            <canvas id="cashFlowChart" height="200"></canvas>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3>Key Performance Indicators</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Indicator</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Net Profit Margin</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>Current Ratio</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Debt to Equity Ratio</td>
                                        <td>0.8</td>
                                    </tr>
                                    <tr>
                                        <td>Return on Assets (ROA)</td>
                                        <td>15%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data for charts
        var revenueData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [30000, 32000, 29000, 31000, 33000, 35000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var expenseData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Expenses',
                data: [20000, 22000, 21000, 23000, 24000, 25000],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var profitLossData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Profit/Loss',
                data: [10000, 10000, 8000, 8000, 9000, 10000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var cashFlowData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Cash Flow',
                data: [15000, 16000, 14000, 15000, 16000, 17000],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        // Initialize charts
        var ctx1 = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: revenueData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx2 = document.getElementById('expenseChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: expenseData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx3 = document.getElementById('profitLossChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: profitLossData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx4 = document.getElementById('cashFlowChart').getContext('2d');
        new Chart(ctx4, {
            type: 'line',
            data: cashFlowData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
