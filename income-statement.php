<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module - Income Statement</title>
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
                        $page_url = basename($_SERVER['REQUEST_URI']); // income_statement.php
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Income Statement Table -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Dummy data for demonstration
                            $revenues = [
                                ['category' => 'Sales Revenue', 'amount' => '$15,000.00'],
                                ['category' => 'Interest Income', 'amount' => '$1,000.00'],
                            ];

                            $expenses = [
                                ['category' => 'Cost of Goods Sold', 'amount' => '$8,000.00'],
                                ['category' => 'Operating Expenses', 'amount' => '$3,000.00'],
                                ['category' => 'Interest Expense', 'amount' => '$500.00'],
                            ];

                            // Calculate total revenues
                            $total_revenues = array_reduce($revenues, function ($carry, $item) {
                                return $carry + floatval(str_replace(',', '', substr($item['amount'], 1)));
                            }, 0);

                            // Calculate total expenses
                            $total_expenses = array_reduce($expenses, function ($carry, $item) {
                                return $carry + floatval(str_replace(',', '', substr($item['amount'], 1)));
                            }, 0);

                            // Calculate net income
                            $net_income = $total_revenues - $total_expenses;

                            // Display revenues
                            foreach ($revenues as $item) {
                                echo '<tr>';
                                echo '<td>' . $item['category'] . '</td>';
                                echo '<td>' . $item['amount'] . '</td>';
                                echo '</tr>';
                            }

                            // Display expenses
                            foreach ($expenses as $item) {
                                echo '<tr>';
                                echo '<td>' . $item['category'] . '</td>';
                                echo '<td>(' . $item['amount'] . ')</td>';
                                echo '</tr>';
                            }

                            // Display net income
                            echo '<tr class="font-weight-bold">';
                            echo '<td>Net Income</td>';
                            echo '<td>' . ($net_income >= 0 ? '$' . number_format($net_income, 2) : '($' . number_format(abs($net_income), 2) . ')') . '</td>';
                            echo '</tr>';
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