<?php
// Include database connection
require_once 'db.php';

try {
    // Fetch vouchers from the database
    $sql = "SELECT * FROM vouchers ORDER BY voucher_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $vouchers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching vouchers: " . $e->getMessage());
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
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($vouchers)) {
                                    $count = 1; // Serial number
                                    foreach ($vouchers as $voucher) {
                                        echo "<tr>
                        <td>{$count}</td>
                        <td>{$voucher['voucher_name']}</td>
                        <td>{$voucher['voucher_description']}</td>
                        <td>AED " . number_format($voucher['voucher_amount'], 2) . "</td>
                        <td>" . date('d M Y', strtotime($voucher['voucher_date'])) . "</td>
                        <td>
                            <a href='edit-voucher.php?id={$voucher['id']}' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                            <a href='delete-voucher.php?id={$voucher['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this voucher?')\"><i class='fas fa-trash'></i> Delete</a>
                        </td>
                    </tr>";
                                        $count++;
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-muted">No vouchers found</td></tr>';
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