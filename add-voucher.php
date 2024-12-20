<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voucher_name = $_POST['voucher_name'];
    $voucher_description = $_POST['voucher_description'];
    $voucher_amount = $_POST['voucher_amount'];
    $voucher_date = $_POST['voucher_date'];

    // Add voucher to database

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Module</title>
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
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="add-voucher.php" method="POST">
                                <div class="form-group">
                                    <label for="voucher_name">Voucher Name</label>
                                    <input type="text" class="form-control" id="voucher_name" name="voucher_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="voucher_description">Voucher Description</label>
                                    <input type="text" class="form-control" id="voucher_description" name="voucher_description" required>
                                </div>
                                <div class="form-group">
                                    <label for="voucher_amount">Voucher Amount</label>
                                    <input type="number" class="form-control" id="voucher_amount" name="voucher_amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="voucher_date">Voucher Date</label>
                                    <input type="date" class="form-control" id="voucher_date" name="voucher_date" required>
                                </div>
                                <a href="voucher-systems.php" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
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