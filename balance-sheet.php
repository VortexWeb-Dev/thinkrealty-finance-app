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
                    $page_url = basename($_SERVER['REQUEST_URI']); // balance_sheet.php
                    $title = get_title($page_url);
                    echo $title;
                    ?>
                </h1>

                <hr>

                <!-- Balance Sheet Table -->
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
                                // Dummy data for demonstration
                                $assets = [
                                    ['category' => 'Cash and Cash Equivalents', 'amount' => '$20,000.00'],
                                    ['category' => 'Accounts Receivable', 'amount' => '$15,000.00'],
                                    ['category' => 'Inventory', 'amount' => '$10,000.00'],
                                ];

                                $liabilities = [
                                    ['category' => 'Accounts Payable', 'amount' => '$8,000.00'],
                                    ['category' => 'Short-term Loans', 'amount' => '$5,000.00'],
                                ];

                                $equity = [
                                    ['category' => 'Retained Earnings', 'amount' => '$32,000.00'],
                                    ['category' => 'Share Capital', 'amount' => '$10,000.00'],
                                ];

                                // Calculate total assets
                                $total_assets = array_reduce($assets, function ($carry, $item) {
                                    return $carry + floatval(str_replace(',', '', substr($item['amount'], 1)));
                                }, 0);

                                // Calculate total liabilities
                                $total_liabilities = array_reduce($liabilities, function ($carry, $item) {
                                    return $carry + floatval(str_replace(',', '', substr($item['amount'], 1)));
                                }, 0);

                                // Display assets
                                foreach ($assets as $item) {
                                    echo '<tr>';
                                    echo '<td>' . $item['category'] . '</td>';
                                    echo '<td>' . $item['amount'] . '</td>';
                                    echo '</tr>';
                                }

                                // Display liabilities
                                foreach ($liabilities as $item) {
                                    echo '<tr>';
                                    echo '<td>' . $item['category'] . '</td>';
                                    echo '<td>(' . $item['amount'] . ')</td>';
                                    echo '</tr>';
                                }

                                // Display equity
                                foreach ($equity as $item) {
                                    echo '<tr>';
                                    echo '<td>' . $item['category'] . '</td>';
                                    echo '<td>' . $item['amount'] . '</td>';
                                    echo '</tr>';
                                }

                                // Calculate and display total equity
                                $total_equity = $total_assets - $total_liabilities;
                                echo '<tr class="font-weight-bold">';
                                echo '<td>Total Equity</td>';
                                echo '<td>' . ($total_equity >= 0 ? '$' . number_format($total_equity, 2) : '($' . number_format(abs($total_equity), 2) . ')') . '</td>';
                                echo '</tr>';
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