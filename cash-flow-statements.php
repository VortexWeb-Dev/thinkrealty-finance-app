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
            <div class="container mt-5">
                <h1 class="">
                    <?php
                    require_once 'utils.php';
                    $page_url = basename($_SERVER['REQUEST_URI']); // cash_flow_statement.php
                    $title = get_title($page_url);
                    echo $title;
                    ?>
                </h1>

                <hr>

                <!-- Cash Flow Statement Sections -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Cash Flow from Operating Activities</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount ($)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Net Income</td>
                                            <td>1,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Depreciation</td>
                                            <td>100,000</td>
                                        </tr>
                                        <tr>
                                            <td>Changes in Working Capital</td>
                                            <td>(50,000)</td>
                                        </tr>
                                        <tr>
                                            <td>Other Operating Activities</td>
                                            <td>20,000</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th>Total Operating Activities</th>
                                            <td>1,070,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Cash Flow from Investing Activities</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount ($)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Purchase of Property, Plant, Equipment</td>
                                            <td>(200,000)</td>
                                        </tr>
                                        <tr>
                                            <td>Sale of Investments</td>
                                            <td>50,000</td>
                                        </tr>
                                        <tr>
                                            <td>Other Investing Activities</td>
                                            <td>(10,000)</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th>Total Investing Activities</th>
                                            <td>(160,000)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Cash Flow from Financing Activities</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount ($)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Proceeds from Issuance of Stock</td>
                                            <td>300,000</td>
                                        </tr>
                                        <tr>
                                            <td>Repayment of Debt</td>
                                            <td>(150,000)</td>
                                        </tr>
                                        <tr>
                                            <td>Dividends Paid</td>
                                            <td>(50,000)</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th>Total Financing Activities</th>
                                            <td>100,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Net Increase (Decrease) in Cash</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount ($)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Net Cash Flow from Operating Activities</td>
                                            <td>1,070,000</td>
                                        </tr>
                                        <tr>
                                            <td>Net Cash Flow from Investing Activities</td>
                                            <td>(160,000)</td>
                                        </tr>
                                        <tr>
                                            <td>Net Cash Flow from Financing Activities</td>
                                            <td>100,000</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th>Total Net Increase (Decrease) in Cash</th>
                                            <td>1,010,000</td>
                                        </tr>
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

<?php include './inc/footer.php'; ?>