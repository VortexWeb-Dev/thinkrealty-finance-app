<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module - Cash Flow Statement</title>
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
                        $page_url = basename($_SERVER['REQUEST_URI']); // cash_flow_statement.php
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Cash Flow Statement Sections -->
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Cash Flow from Operating Activities</h3>
                            <table class="table table-striped">
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
                        <div class="col-md-6">
                            <h3>Cash Flow from Investing Activities</h3>
                            <table class="table table-striped">
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

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h3>Cash Flow from Financing Activities</h3>
                            <table class="table table-striped">
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
                        <div class="col-md-6">
                            <h3>Net Increase (Decrease) in Cash</h3>
                            <table class="table table-striped">
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
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>