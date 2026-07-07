<?php
session_start();
include('config/db.php');
include('header.php');

// Simple stats fetch
$total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders"))['count'];
$total_revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) as total FROM orders"))['total'];
?>

<style>
    .stat-card {
        background: rgba(26, 15, 13, 0.9);
        border: 1px solid rgba(197, 160, 89, 0.3);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        transition: 0.3s;
    }
    .stat-card:hover { border-color: #C5A059; transform: translateY(-10px); }
    .stat-value { font-size: 2.5rem; color: #C5A059; font-weight: 800; }
    .nav-btn {
        display: block;
        background: transparent;
        border: 1px solid #C5A059;
        color: white;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 12px;
        text-decoration: none;
        transition: 0.3s;
    }
    .nav-btn:hover { background: #C5A059; color: #1a0f0d; }
</style>

<section style="padding: 100px 0; background: radial-gradient(circle at top, #2b1b1a, #1a0f0d);">
    <div class="container">
        <h2 class="text-center text-white mb-5 fw-bold" style="font-family: 'Playfair Display', serif;">
            Admin <span class="text-gold">Control Panel</span>
        </h2>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="stat-card">
                    <h5 class="text-uppercase text-muted">Total Orders</h5>
                    <div class="stat-value"><?php echo $total_orders; ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-card">
                    <h5 class="text-uppercase text-muted">Total Revenue</h5>
                    <div class="stat-value">Rs. <?php echo number_format($total_revenue, 2); ?></div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="admin_orders.php" class="nav-btn text-center fw-bold">Manage Orders</a>
                <a href="index.php" class="nav-btn text-center fw-bold">Back to Website</a>
                <a href="logout.php" class="nav-btn text-center fw-bold text-danger">Logout</a>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>