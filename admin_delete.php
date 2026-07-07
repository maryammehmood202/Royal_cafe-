<?php
session_start();
include('config/db.php');

// Security: Check karein ke ID exist karti hai aur valid integer hai
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // 1. Transaction start karein (Professional DB handling)
    mysqli_begin_transaction($conn);

    try {
        // 2. Pehle order items delete karein (Constraint handling)
        mysqli_query($conn, "DELETE FROM order_items WHERE order_id = $id");
        
        // 3. Phir main order delete karein
        mysqli_query($conn, "DELETE FROM orders WHERE id = $id");

        // 4. Sab kuch commit kar dein
        mysqli_commit($conn);
        
        // Success message ke sath redirect
        header("Location: admin_orders.php?status=deleted");
        exit();
        
    } catch (Exception $e) {
        // Agar error aaye to rollback kar dein
        mysqli_rollback($conn);
        echo "Error deleting order: " . $e->getMessage();
    }
} else {
    // Agar invalid request ho
    header("Location: admin_orders.php");
    exit();
}
?>