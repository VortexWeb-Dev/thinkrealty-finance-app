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
                    <h1>
                        <?php
                        require_once 'utils.php';
                        $page_url = basename($_SERVER['REQUEST_URI']); 
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Ledger UI -->
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

                        <button type="button" class="btn btn-primary" onclick="filterTransactions()">Apply</button>
                    </form>

                    <table class="table table-striped">
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
                            <!-- Dummy data for demonstration -->
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

                    <div class="mt-4">
                        <p>Opening Balance: $<span id="openingBalance">1000.00</span></p>
                        <p>Total Debits: $<span id="totalDebits">100.00</span></p>
                        <p>Total Credits: $<span id="totalCredits">200.00</span></p>
                        <p>Closing Balance: $<span id="closingBalance">1100.00</span></p>
                    </div>
                </div>
            </main>
        </div>
    </div>

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