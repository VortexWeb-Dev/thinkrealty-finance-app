<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module - Chart of Accounts</title>
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

                <!-- Page Content -->
                <div class="container mt-4">
                    <h1>
                        <?php
                        require_once 'utils.php';
                        $page_url = basename($_SERVER['REQUEST_URI']); // accounts.php
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Accounts List -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Account Name</th>
                                <th>Account Type</th>
                                <th>Opening Balance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Dummy data for demonstration
                            $accounts = [
                                ['number' => '101', 'name' => 'Cash', 'type' => 'Asset', 'opening_balance' => '$1000.00'],
                                ['number' => '201', 'name' => 'Accounts Receivable', 'type' => 'Asset', 'opening_balance' => '$500.00'],
                                ['number' => '301', 'name' => 'Accounts Payable', 'type' => 'Liability', 'opening_balance' => '$200.00'],
                                ['number' => '401', 'name' => 'Sales Revenue', 'type' => 'Revenue', 'opening_balance' => '$0.00'],
                                ['number' => '501', 'name' => 'Rent Expense', 'type' => 'Expense', 'opening_balance' => '$0.00'],
                            ];

                            foreach ($accounts as $account) {
                                echo '<tr>';
                                echo '<td>' . $account['number'] . '</td>';
                                echo '<td>' . $account['name'] . '</td>';
                                echo '<td>' . $account['type'] . '</td>';
                                echo '<td>' . $account['opening_balance'] . '</td>';
                                echo '<td><a href="chart-of-account-details.php?number=' . $account['number'] . '">View Details</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>