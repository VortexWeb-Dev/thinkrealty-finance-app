<?php
// Include database connection
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voucher_name = htmlspecialchars($_POST['voucher_name']);
    $voucher_description = htmlspecialchars($_POST['voucher_description']);
    $voucher_amount = (float)$_POST['voucher_amount'];
    $voucher_date = $_POST['voucher_date'];

    try {
        $sql = "INSERT INTO vouchers (voucher_name, voucher_description, voucher_amount, voucher_date)
                VALUES (:voucher_name, :voucher_description, :voucher_amount, :voucher_date)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':voucher_name', $voucher_name);
        $stmt->bindParam(':voucher_description', $voucher_description);
        $stmt->bindParam(':voucher_amount', $voucher_amount);
        $stmt->bindParam(':voucher_date', $voucher_date);

        $stmt->execute();

        header("Location: voucher-systems.php?success=1");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


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
                                <textarea type="text" class="form-control" id="voucher_description" name="voucher_description" required></textarea>
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

<?php include './inc/footer.php'; ?>