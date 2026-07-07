<?php
session_start();

// 1. Validation: ID check karein aur ensure karein ke cart exist karti hai
if (isset($_GET['id']) && isset($_SESSION['cart'])) {
    
    $item_id = $_GET['id'];

    // 2. Check karein ke item waqai cart mein hai
    if (array_key_exists($item_id, $_SESSION['cart'])) {
        // Item remove karein
        unset($_SESSION['cart'][$item_id]);
        
        // Optional: Agar cart khali ho jaye to session array ko reset kar dein
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
}

// 3. Wapis cart par bhej dein
header("Location: cart.php");
exit();
?>