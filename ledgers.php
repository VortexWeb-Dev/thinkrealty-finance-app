<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        /* Custom Styles */

        .form-inline label {
            font-weight: bold;
        }

        .form-inline .form-control {
            width: auto;
            margin-right: 10px;
        }

        .card-summary {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #4e73df;
            color: white;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #f4f7fc;
            text-align: right;
        }
    </style>
</head>

<body>

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
            </div>

            <hr>

            <!-- Ledger UI Form with Filters -->
            <form class="form-inline mb-4">
                <label class="mr-2" for="accountSelect">Select Account:</label>
                <select class="form-control mr-2" id="accountSelect">
                    <option value="1">Cash</option>
                    <option value="2">Accounts Receivable</option>
                    <option value="3">Office Supplies</option>
                </select>

                <label class="mr-2" for="startDate">Start Date:</label>
                <input type="date" class="form-control mr-2" id="startDate">

                <label class="mr-2" for="endDate">End Date:</label>
                <input type="date" class="form-control mr-2" id="endDate">

                <button type="button" class="btn btn-outline-primary" onclick="filterTransactions()">Apply</button>
            </form>

            <!-- Table for Ledger Entries -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Voucher Number</th>
                                    <th>Description</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dummy Data -->
                                <tr>
                                    <td>2024-07-01</td>
                                    <td>PMT-001</td>
                                    <td>Payment for office supplies</td>
                                    <td>$100.00</td>
                                    <td></td>
                                    <td>$900.00</td>
                                </tr>
                                <tr>
                                    <td>2024-07-02</td>
                                    <td>RCT-001</td>
                                    <td>Receipt from customer</td>
                                    <td></td>
                                    <td>$200.00</td>
                                    <td>$1100.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Financial Summary in a Card -->
            <div class="card-summary mb-4">
                <div class="card-header">
                    <h4>Financial Summary</h4>
                </div>
                <div class="card-body">
                    <p>Opening Balance: $<span id="openingBalance">1000.00</span></p>
                    <p>Total Debits: $<span id="totalDebits">100.00</span></p>
                    <p>Total Credits: $<span id="totalCredits">200.00</span></p>
                    <p>Closing Balance: $<span id="closingBalance">1100.00</span></p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-secondary btn-sm">Export to CSV</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function filterTransactions() {
            // Implement filtering logic here
            alert('Filter transactions based on selected account and date range');
        }
    </script>
</body>

</html>