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

                <!-- Page Content -->
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

                    <!-- Transaction Entry Form -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4>Debit Entry</h4>
                            <form>
                                <div class="form-group">
                                    <label for="debitAccount">Account:</label>
                                    <select class="form-control" id="debitAccount" name="debitAccount">
                                        <option value="">Select Account</option>
                                        <option value="101">Cash</option>
                                        <option value="201">Accounts Receivable</option>
                                        <option value="301">Inventory</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="debitAmount">Amount:</label>
                                    <input type="number" class="form-control" id="debitAmount" name="debitAmount">
                                </div>
                                <div class="form-group">
                                    <label for="debitDescription">Description:</label>
                                    <textarea class="form-control" id="debitDescription" name="debitDescription"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Debit</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h4>Credit Entry</h4>
                            <form>
                                <div class="form-group">
                                    <label for="creditAccount">Account:</label>
                                    <select class="form-control" id="creditAccount" name="creditAccount">
                                        <option value="">Select Account</option>
                                        <option value="401">Sales Revenue</option>
                                        <option value="501">Accounts Payable</option>
                                        <option value="601">Capital</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="creditAmount">Amount:</label>
                                    <input type="number" class="form-control" id="creditAmount" name="creditAmount">
                                </div>
                                <div class="form-group">
                                    <label for="creditDescription">Description:</label>
                                    <textarea class="form-control" id="creditDescription" name="creditDescription"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Credit</button>
                            </form>
                        </div>
                    </div>

                    <!-- Ledger Table -->
                    <h4>Ledger Entries</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Account</th>
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
                                <td>Cash</td>
                                <td>Payment for office supplies</td>
                                <td>$100.00</td>
                                <td></td>
                                <td>$900.00</td>
                            </tr>
                            <tr>
                                <td>2024-07-02</td>
                                <td>Accounts Receivable</td>
                                <td>Receipt from customer</td>
                                <td></td>
                                <td>$200.00</td>
                                <td>$1100.00</td>
                            </tr>
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