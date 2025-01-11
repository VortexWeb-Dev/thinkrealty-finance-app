<?php
// Include database connection
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_id = $_POST['account'];
    $amount = (float) $_POST['amount'];
    $description = htmlspecialchars($_POST['description']);
    $entry_type = $_POST['entryType']; // 'debit' or 'credit'

    // Map account names (you can store these in a separate database table)
    $accounts = [
        101 => 'Cash',
        201 => 'Accounts Receivable',
        301 => 'Inventory',
        401 => 'Sales Revenue',
        501 => 'Accounts Payable',
        601 => 'Capital',
    ];

    $account_name = isset($accounts[$account_id]) ? $accounts[$account_id] : 'Unknown Account';

    // Prepare the SQL query
    $sql = "INSERT INTO ledger_entries (account_id, account_name, description, debit, credit) 
            VALUES (:account_id, :account_name, :description, :debit, :credit)";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':account_id', $account_id);
        $stmt->bindParam(':account_name', $account_name);
        $stmt->bindParam(':description', $description);

        if ($entry_type === 'debit') {
            $stmt->bindValue(':debit', $amount);
            $stmt->bindValue(':credit', 0);
        } else {
            $stmt->bindValue(':debit', 0);
            $stmt->bindValue(':credit', $amount);
        }

        $stmt->execute();
        header("Location: double-entry-bookkeeping.php?success=Transaction added successfully");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch ledger entries
$ledger_entries = [];
try {
    $stmt = $conn->prepare("SELECT * FROM ledger_entries ORDER BY date DESC");
    $stmt->execute();
    $ledger_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching ledger entries: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        /* Custom styles for the layout */
        .card {
            border-radius: 10px;
        }

        .card-header {
            background-color: #4e73df;
            color: #fff;
            font-size: 1.25rem;
            padding: 15px;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(79, 115, 223, 0.5);
        }

        .card-body {
            padding: 25px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include './inc/sidebar.php'; ?>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
                <!-- Navbar -->
                <?php include './inc/navbar.php'; ?>

                <!-- Page Content -->
                <div class="container mt-4">
                    <h1 class="text-primary">
                        <?php
                        require_once 'utils.php';
                        $page_url = basename($_SERVER['REQUEST_URI']);
                        $title = get_title($page_url);
                        echo $title;
                        ?>
                    </h1>

                    <hr>

                    <!-- Transaction Entry Form -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h4>Debit Entry</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="entryType" value="debit">
                                        <div class="form-group">
                                            <label for="debitAccount">Account:</label>
                                            <select class="form-control" id="debitAccount" name="account" required>
                                                <option value="">Select Account</option>
                                                <option value="101">Cash</option>
                                                <option value="201">Accounts Receivable</option>
                                                <option value="301">Inventory</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="debitAmount">Amount:</label>
                                            <input type="number" class="form-control" id="debitAmount" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="debitDescription">Description:</label>
                                            <textarea class="form-control" id="debitDescription" name="description" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Debit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h4>Credit Entry</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="entryType" value="credit">
                                        <div class="form-group">
                                            <label for="creditAccount">Account:</label>
                                            <select class="form-control" id="creditAccount" name="account" required>
                                                <option value="">Select Account</option>
                                                <option value="401">Sales Revenue</option>
                                                <option value="501">Accounts Payable</option>
                                                <option value="601">Capital</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="creditAmount">Amount:</label>
                                            <input type="number" class="form-control" id="creditAmount" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="creditDescription">Description:</label>
                                            <textarea class="form-control" id="creditDescription" name="description" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Credit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Ledger Table -->
                    <h4>Ledger Entries</h4>
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Account</th>
                                        <th>Description</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($ledger_entries)) : ?>
                                        <?php foreach ($ledger_entries as $entry) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($entry['date']) ?></td>
                                                <td><?= htmlspecialchars($entry['account_name']) ?></td>
                                                <td><?= htmlspecialchars($entry['description']) ?></td>
                                                <td><?= $entry['debit'] > 0 ? "$" . number_format($entry['debit'], 2) : '' ?></td>
                                                <td><?= $entry['credit'] > 0 ? "$" . number_format($entry['credit'], 2) : '' ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No entries found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <?php include './inc/footer.php'; ?>