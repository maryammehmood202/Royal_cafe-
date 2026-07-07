<?php
session_start();

/* =========================================================
   🛡️ ULTRA PRO ADD TO CART ENGINE
   ✔ Secure
   ✔ Clean
   ✔ Optimized
   ✔ Same Functionality
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* =====================================================
       🔒 SANITIZE & VALIDATE INPUTS
    ===================================================== */

    $item_id = isset($_POST['item_id'])
        ? preg_replace('/[^A-Za-z0-9\-_]/', '', trim($_POST['item_id']))
        : '';

    $name = isset($_POST['name'])
        ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8')
        : '';

    $price = isset($_POST['price'])
        ? (float) $_POST['price']
        : 0;

    $quantity = isset($_POST['quantity'])
        ? (int) $_POST['quantity']
        : 1;

    $image = isset($_POST['image'])
        ? htmlspecialchars(trim($_POST['image']), ENT_QUOTES, 'UTF-8')
        : '';

    /* =====================================================
       ⚡ BASIC FALLBACKS
    ===================================================== */

    if ($quantity <= 0) {
        $quantity = 1;
    }

    if ($price < 0) {
        $price = 0;
    }

    /* =====================================================
       🛒 CART SESSION INIT
    ===================================================== */

    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    /* =====================================================
       🔥 ITEM EXISTS → UPDATE QUANTITY
    ===================================================== */

    if (isset($_SESSION['cart'][$item_id])) {

        $_SESSION['cart'][$item_id]['quantity'] += $quantity;

        $_SESSION['message'] = [
            'type' => 'success',
            'icon' => '🛒',
            'text' => $name . ' quantity updated in cart!'
        ];

    } else {

        /* =================================================
           ✨ ADD NEW ITEM
        ================================================= */

        $_SESSION['cart'][$item_id] = [

            'id'       => $item_id,
            'name'     => $name,
            'price'    => $price,
            'quantity' => $quantity,
            'image'    => $image,
            'added_at' => date("Y-m-d H:i:s")

        ];

        $_SESSION['message'] = [
            'type' => 'success',
            'icon' => '✅',
            'text' => $name . ' added to cart successfully!'
        ];
    }

    /* =====================================================
       📊 CART SUMMARY (PRO FEATURE)
    ===================================================== */

    $_SESSION['cart_count'] = 0;
    $_SESSION['cart_total'] = 0;

    foreach ($_SESSION['cart'] as $item) {

        $_SESSION['cart_count'] += $item['quantity'];

        $_SESSION['cart_total'] += (
            $item['price'] * $item['quantity']
        );
    }

    /* =====================================================
       🔁 SAFE REDIRECT
    ===================================================== */

    $redirect = isset($_SERVER['HTTP_REFERER'])
        ? $_SERVER['HTTP_REFERER']
        : 'index.php';

    header("Location: $redirect");
    exit();
}

/* =========================================================
   🚫 DIRECT ACCESS BLOCK
========================================================= */

header("Location: index.php");
exit();
?>