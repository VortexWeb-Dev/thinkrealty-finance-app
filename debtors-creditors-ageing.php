<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module - Debtors & Creditors Ageing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
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
                        $page_url = basename($_SERVER['REQUEST_URI']); // debtors_creditors_ageing.php
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Filters -->
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="filter-type">Filter by:</label>
                                    <select class="form-control" id="filter-type">
                                        <option value="both">Both</option>
                                        <option value="debtors">Debtors</option>
                                        <option value="creditors">Creditors</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-date">Start Date:</label>
                                    <input type="date" class="form-control" id="start-date">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-date">End Date:</label>
                                    <input type="date" class="form-control" id="end-date">
                                </div>
                                <div class="col-md-3 d-flex align-items-end justify-content-end">
                                    <button class="btn btn-primary" id="apply-filters">Apply Filters</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <!-- Debtors Ageing Table -->
                        <div class="">
                            <div class="card shadow overflow-hidden">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="mt-4 text-primary text-uppercase mb-4">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Debtors (Accounts Receivable) Ageing
                                        </h3>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>0-30 Days</th>
                                                <th>31-60 Days</th>
                                                <th>61-90 Days</th>
                                                <th>Over 90 Days</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="debtors-table-body">
                                            <?php
                                            // Dummy data for debtors ageing
                                            $debtors = [
                                                ['customer' => 'Customer A', '0_30_days' => '$5,000.00', '31_60_days' => '$2,000.00', '61_90_days' => '$1,000.00', 'over_90_days' => '$500.00'],
                                                ['customer' => 'Customer B', '0_30_days' => '$3,000.00', '31_60_days' => '$1,500.00', '61_90_days' => '$800.00', 'over_90_days' => '$200.00'],
                                            ];

                                            foreach ($debtors as $debtor) {
                                                echo '<tr>';
                                                echo '<td>' . $debtor['customer'] . '</td>';
                                                echo '<td>' . $debtor['0_30_days'] . '</td>';
                                                echo '<td>' . $debtor['31_60_days'] . '</td>';
                                                echo '<td>' . $debtor['61_90_days'] . '</td>';
                                                echo '<td>' . $debtor['over_90_days'] . '</td>';

                                                // Calculate total for each customer
                                                $total = floatval(str_replace(',', '', substr($debtor['0_30_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($debtor['31_60_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($debtor['61_90_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($debtor['over_90_days'], 1)));

                                                echo '<td>$' . number_format($total, 2) . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Creditors Ageing Table -->
                        <div class="">
                            <div class="card shadow overflow-hidden">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="mt-4 text-danger text-uppercase mb-4">
                                            <i class="fas fa-money-bill-wave mr-2"></i>
                                            Creditors (Accounts Payable) Ageing
                                        </h3>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Supplier</th>
                                                <th>0-30 Days</th>
                                                <th>31-60 Days</th>
                                                <th>61-90 Days</th>
                                                <th>Over 90 Days</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="creditors-table-body">
                                            <?php
                                            // Dummy data for creditors ageing
                                            $creditors = [
                                                ['supplier' => 'Supplier X', '0_30_days' => '$3,000.00', '31_60_days' => '$1,500.00', '61_90_days' => '$800.00', 'over_90_days' => '$200.00'],
                                                ['supplier' => 'Supplier Y', '0_30_days' => '$2,000.00', '31_60_days' => '$1,000.00', '61_90_days' => '$500.00', 'over_90_days' => '$100.00'],
                                            ];

                                            foreach ($creditors as $creditor) {
                                                echo '<tr>';
                                                echo '<td>' . $creditor['supplier'] . '</td>';
                                                echo '<td>' . $creditor['0_30_days'] . '</td>';
                                                echo '<td>' . $creditor['31_60_days'] . '</td>';
                                                echo '<td>' . $creditor['61_90_days'] . '</td>';
                                                echo '<td>' . $creditor['over_90_days'] . '</td>';

                                                // Calculate total for each supplier
                                                $total = floatval(str_replace(',', '', substr($creditor['0_30_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($creditor['31_60_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($creditor['61_90_days'], 1)))
                                                    + floatval(str_replace(',', '', substr($creditor['over_90_days'], 1)));

                                                echo '<td>$' . number_format($total, 2) . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

    <!-- Custom JS for filtering -->
    <script>
        document.getElementById('apply-filters').addEventListener('click', function() {
            const filterType = document.getElementById('filter-type').value;
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;

            // Add your filtering logic here
            // For demonstration purposes, we'll just log the values
            console.log('Filter Type:', filterType);
            console.log('Start Date:', startDate);
            console.log('End Date:', endDate);

            // You can use AJAX or form submission to send the filter values to the server
            // and update the table contents based on the response
        });
    </script>
</body>

</html>