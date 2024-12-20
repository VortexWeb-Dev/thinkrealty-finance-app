<?php include './inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Include Sidebar -->
        <?php include './inc/sidebar.php'; ?>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
            <!-- Include Navbar -->
            <?php include './inc/navbar.php'; ?>

            <!-- Dummy Data Content -->
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <?php
                        require_once 'utils.php';
                        $page_url = basename($_SERVER['REQUEST_URI']);
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>
                    <a href="add-voucher.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Voucher</a>
                </div>

                <hr>

                <!-- Table -->
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vouchers = [
                                    [
                                        'voucher_id' => 1,
                                        'voucher_name' => 'Payment',
                                        'voucher_description' => 'PMT-001',
                                        'voucher_amount' => 200,
                                        'voucher_date' => '2024-07-01',
                                    ],
                                    [
                                        'voucher_id' => 2,
                                        'voucher_name' => 'Receipt',
                                        'voucher_description' => 'RCT-001',
                                        'voucher_amount' => 200,
                                        'voucher_date' => '2024-07-02',
                                    ],
                                    [
                                        'voucher_id' => 3,
                                        'voucher_name' => 'Journal',
                                        'voucher_description' => 'JNL-001',
                                        'voucher_amount' => 200,
                                        'voucher_date' => '2024-07-03',
                                    ],
                                    [
                                        'voucher_id' => 4,
                                        'voucher_name' => 'Contra',
                                        'voucher_description' => 'CNT-001',
                                        'voucher_amount' => 200,
                                        'voucher_date' => '2024-07-04',
                                    ],
                                    [
                                        'voucher_id' => 5,
                                        'voucher_name' => 'Sales',
                                        'voucher_description' => 'SLS-001',
                                        'voucher_amount' => 200,
                                        'voucher_date' => '2024-07-05',
                                    ],
                                ];

                                if (!empty($vouchers)) {
                                    foreach ($vouchers as $voucher) {
                                        echo "<tr>
                                        <td>{$voucher['voucher_id']}</td>
                                        <td>{$voucher['voucher_name']}</td>
                                        <td>{$voucher['voucher_description']}</td>
                                        <td>\${$voucher['voucher_amount']}</td>
                                        <td>{$voucher['voucher_date']}</td>
                                    </tr>";
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="empty-state">No vouchers found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
        </main>
    </div>
</div>

<?php include './inc/footer.php'; ?>