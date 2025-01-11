<?php
// Include database connection
require_once 'db.php';

// Initialize variables
$voucher_name = $voucher_description = $voucher_amount = $voucher_date = '';
$voucher_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($voucher_id > 0) {
    try {
        // Fetch the voucher details based on the ID
        $sql = "SELECT * FROM vouchers WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $voucher_id, PDO::PARAM_INT);
        $stmt->execute();
        $voucher = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($voucher) {
            $voucher_name = htmlspecialchars($voucher['voucher_name']);
            $voucher_description = htmlspecialchars($voucher['voucher_description']);
            $voucher_amount = $voucher['voucher_amount'];
            $voucher_date = $voucher['voucher_date'];
        } else {
            // If no voucher is found, redirect with an error
            header("Location: voucher-systems.php?error=Voucher not found");
            exit();
        }
    } catch (PDOException $e) {
        die("Error fetching voucher: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voucher_name = htmlspecialchars($_POST['voucher_name']);
    $voucher_description = htmlspecialchars($_POST['voucher_description']);
    $voucher_amount = (float)$_POST['voucher_amount'];
    $voucher_date = $_POST['voucher_date'];

    try {
        // Update the voucher in the database
        $sql = "UPDATE vouchers 
                SET voucher_name = :voucher_name, 
                    voucher_description = :voucher_description, 
                    voucher_amount = :voucher_amount, 
                    voucher_date = :voucher_date 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':voucher_name', $voucher_name);
        $stmt->bindParam(':voucher_description', $voucher_description);
        $stmt->bindParam(':voucher_amount', $voucher_amount);
        $stmt->bindParam(':voucher_date', $voucher_date);
        $stmt->bindParam(':id', $voucher_id, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: voucher-systems.php?success=1");
        exit();
    } catch (PDOException $e) {
        echo "Error updating voucher: " . $e->getMessage();
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

            <!-- Edit Voucher Content -->
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
                        <form action="edit-voucher.php?id=<?php echo $voucher_id; ?>" method="POST">
                            <div class="form-group">
                                <label for="voucher_name">Voucher Name</label>
                                <input type="text" class="form-control" id="voucher_name" name="voucher_name" value="<?php echo $voucher_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="voucher_description">Voucher Description</label>
                                <input type="text" class="form-control" id="voucher_description" name="voucher_description" value="<?php echo $voucher_description; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="voucher_amount">Voucher Amount</label>
                                <input type="number" class="form-control" id="voucher_amount" name="voucher_amount" value="<?php echo $voucher_amount; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="voucher_date">Voucher Date</label>
                                <input type="date" class="form-control" id="voucher_date" name="voucher_date" value="<?php echo $voucher_date; ?>" required>
                            </div>
                            <a href="voucher-systems.php" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include './inc/footer.php'; ?>