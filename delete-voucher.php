<?php
// Include database connection
require_once 'db.php';

// Get the voucher ID from the URL
$voucher_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($voucher_id > 0) {
    try {
        // Prepare the delete query
        $sql = "DELETE FROM vouchers WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Bind the voucher ID parameter
        $stmt->bindParam(':id', $voucher_id, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect with success message
            header("Location: voucher-systems.php?success=Voucher deleted successfully");
            exit();
        } else {
            // Redirect with error message
            header("Location: voucher-systems.php?error=Failed to delete voucher");
            exit();
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error deleting voucher: " . $e->getMessage();
    }
} else {
    // Redirect if no valid ID is provided
    header("Location: voucher-systems.php?error=Invalid voucher ID");
    exit();
}
