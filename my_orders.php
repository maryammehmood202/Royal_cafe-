<?php
session_start();
include('config/db.php');
include('header.php');
?>

<style>

:root{
    --gold:#C5A059;
    --gold-light:#e0c07a;
    --dark:#120b0a;
    --dark-2:#1a0f0d;
    --card:#1f1715;
    --border:rgba(197,160,89,0.16);
    --red:#c62828;
}

/* =========================
   BODY
========================= */
body{
    background:var(--dark);
    color:#fff;
    font-family:'Poppins',sans-serif;
    overflow-x:hidden;
}

/* =========================
   HERO SECTION
========================= */
.order-hero{
    min-height:60vh;
    background:
        linear-gradient(rgba(18,11,10,0.75), rgba(18,11,10,0.92)),
        url('images/banner.jpg') center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:140px 20px 100px;
    position:relative;
    overflow:hidden;
}

.order-hero::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    background:rgba(197,160,89,0.08);
    filter:blur(120px);
    top:-120px;
    right:-100px;
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:850px;
}

.hero-badge{
    display:inline-block;
    padding:10px 24px;
    border-radius:50px;
    border:1px solid rgba(197,160,89,0.4);
    background:rgba(197,160,89,0.08);
    color:var(--gold);
    font-size:13px;
    font-weight:700;
    letter-spacing:2px;
    text-transform:uppercase;
    margin-bottom:25px;
}

.hero-title{
    font-size:clamp(3rem,7vw,5.5rem);
    font-family:'Playfair Display',serif;
    font-weight:800;
    line-height:1.1;
    margin-bottom:20px;
}

.hero-title span{
    color:var(--gold);
}

.hero-text{
    color:rgba(255,255,255,0.72);
    font-size:1.1rem;
    line-height:1.8;
    max-width:700px;
    margin:auto;
}

/* =========================
   MAIN SECTION
========================= */
.order-history-section{
    padding:90px 0;
    background:
        radial-gradient(circle at top right,#2b1b1a,#1a0f0d);
    position:relative;
}

/* =========================
   CARD
========================= */
.history-card{
    background:linear-gradient(145deg,#1f1715,#181110);
    border-radius:34px;
    padding:50px;
    border:1px solid var(--border);
    box-shadow:0 25px 60px rgba(0,0,0,0.55);
    position:relative;
    overflow:hidden;
}

.history-card::before{
    content:'';
    position:absolute;
    width:300px;
    height:300px;
    background:rgba(197,160,89,0.05);
    border-radius:50%;
    top:-120px;
    right:-120px;
    filter:blur(20px);
}

/* =========================
   TITLE
========================= */
.history-title{
    font-size:clamp(2.5rem,5vw,4rem);
    font-family:'Playfair Display',serif;
    font-weight:800;
    text-align:center;
    color:#fff;
    margin-bottom:15px;
}

.history-title span{
    color:var(--gold);
}

.gold-line{
    width:90px;
    height:4px;
    background:var(--gold);
    margin:0 auto 25px;
    border-radius:10px;
}

.history-subtitle{
    text-align:center;
    color:rgba(255,255,255,0.7);
    max-width:700px;
    margin:0 auto 45px;
    line-height:1.8;
}

/* =========================
   TABLE WRAPPER
========================= */
.table-wrapper{
    background:#161110;
    border-radius:28px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.05);
}

/* =========================
   TABLE
========================= */
.table{
    margin:0;
    color:#fff !important;
    background:transparent !important;
}

/* =========================
   TABLE HEADER
========================= */
.table thead{
    background:#221816 !important;
}

.table thead th{
    background:#221816 !important;
    color:var(--gold) !important;
    border:none !important;
    padding:24px 18px;
    font-size:12px;
    font-weight:700;
    letter-spacing:2px;
    text-transform:uppercase;
}

/* =========================
   TABLE BODY
========================= */
.table tbody tr{
    background:#1a1514 !important;
    border-bottom:1px solid rgba(255,255,255,0.05);
    transition:0.35s ease;
}

.table tbody tr:hover{
    background:#241b19 !important;
    transform:translateY(-2px);
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

.table tbody td{
    background:transparent !important;
    color:#fff !important;
    border:none !important;
    padding:26px 18px;
    vertical-align:middle;
}

/* =========================
   ORDER ID
========================= */
.order-id{
    color:var(--gold);
    font-size:20px;
    font-weight:800;
}

/* =========================
   CUSTOMER
========================= */
.customer-name{
    font-weight:700;
    color:#fff;
}

/* =========================
   ITEMS
========================= */
.item-badge{
    background:#2a1f1c;
    border:1px solid rgba(197,160,89,0.3);
    color:#fff;
    padding:14px 18px;
    border-radius:16px;
    display:inline-block;
    line-height:1.7;
    font-size:14px;
    transition:0.35s;
}

.table tbody tr:hover .item-badge{
    border-color:var(--gold);
    box-shadow:0 0 18px rgba(197,160,89,0.2);
}

/* =========================
   TOTAL PRICE
========================= */
.total-price{
    color:var(--gold);
    font-size:22px;
    font-weight:800;
}

/* =========================
   DATE
========================= */
.order-date{
    color:rgba(255,255,255,0.72);
    font-weight:500;
}

/* =========================
   EMPTY ORDERS
========================= */
.empty-orders{
    text-align:center;
    padding:80px 20px !important;
}

.empty-orders i{
    font-size:70px;
    color:var(--gold);
    margin-bottom:20px;
    display:block;
}

.empty-orders h4{
    font-weight:800;
    margin-bottom:10px;
}

.empty-orders p{
    color:rgba(255,255,255,0.6);
}

/* =========================
   BUTTON
========================= */
.btn-continue{
    background:linear-gradient(135deg,#c62828,#a61d1d);
    border:none !important;
    color:#fff !important;
    padding:16px 42px;
    border-radius:16px;
    font-size:15px;
    font-weight:800;
    letter-spacing:1px;
    text-transform:uppercase;
    display:inline-flex;
    align-items:center;
    gap:12px;
    transition:0.35s ease;
    box-shadow:
        0 12px 25px rgba(198,40,40,0.35),
        inset 0 1px 0 rgba(255,255,255,0.08);
    position:relative;
    overflow:hidden;
}

.btn-continue::before{
    content:'';
    position:absolute;
    top:0;
    left:-120%;
    width:100%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.15),
        transparent
    );
    transition:0.7s;
}

.btn-continue:hover{
    transform:translateY(-4px);
    color:#fff !important;
    box-shadow:
        0 18px 35px rgba(198,40,40,0.45),
        0 0 20px rgba(198,40,40,0.25);
}

.btn-continue:hover::before{
    left:120%;
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:768px){

    .order-hero{
        padding-top:120px;
    }

    .history-card{
        padding:25px;
    }

    .table thead{
        display:none;
    }

    .table,
    .table tbody,
    .table tr,
    .table td{
        display:block;
        width:100%;
    }

    .table tr{
        margin-bottom:20px;
        border-radius:20px;
        overflow:hidden;
    }

    .table td{
        padding:16px 18px;
        text-align:right;
        position:relative;
        border-bottom:1px solid rgba(255,255,255,0.04) !important;
    }

    .table td::before{
        content:attr(data-label);
        position:absolute;
        left:18px;
        color:var(--gold);
        font-weight:700;
        text-transform:uppercase;
        font-size:12px;
    }

    .item-badge{
        width:100%;
    }

}
</style>

<!-- =========================
     HERO SECTION
========================= -->
<section class="order-hero">

    <div class="hero-content">

        <div class="hero-badge">
            Royal Café Luxury Dashboard
        </div>

        <h1 class="hero-title">
            My <span>Order History</span>
        </h1>

        <p class="hero-text">
            View all your premium food, coffee, desserts, and café orders inside your personalized Royal Café experience.
        </p>

    </div>

</section>

<!-- =========================
     MAIN SECTION
========================= -->
<section class="order-history-section">

<div class="container">

<div class="history-card">

    <!-- TITLE -->
    <h2 class="history-title">
        Recent <span>Orders</span>
    </h2>

    <div class="gold-line"></div>

    <p class="history-subtitle">
        Track every delicious order you placed from the Royal Café premium collection.
    </p>

    <!-- TABLE -->
    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order Details</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                <?php

                $query = "
                    SELECT 
                        o.id,
                        o.customer_name,
                        o.total_amount,
                        o.order_date,

                        GROUP_CONCAT(
                            CONCAT(
                                oi.item_name,
                                ' (x',
                                oi.quantity,
                                ')'
                            )
                            SEPARATOR ', '
                        ) AS items_list

                    FROM orders o

                    JOIN order_items oi
                    ON o.id = oi.order_id

                    GROUP BY o.id

                    ORDER BY o.order_date DESC
                ";

                $result = mysqli_query($conn,$query);

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){

                ?>

                <tr>

                    <!-- ORDER ID -->
                    <td data-label="Order ID">
                        <span class="order-id">
                            #<?php echo $row['id']; ?>
                        </span>
                    </td>

                    <!-- CUSTOMER -->
                    <td data-label="Customer">
                        <span class="customer-name">
                            <?php echo htmlspecialchars($row['customer_name']); ?>
                        </span>
                    </td>

                    <!-- ITEMS -->
                    <td data-label="Items">
                        <span class="item-badge">
                            <?php echo htmlspecialchars($row['items_list']); ?>
                        </span>
                    </td>

                    <!-- TOTAL -->
                    <td data-label="Total">
                        <span class="total-price">
                            Rs. <?php echo number_format($row['total_amount'],2); ?>
                        </span>
                    </td>

                    <!-- DATE -->
                    <td data-label="Date">
                        <span class="order-date">
                            <?php
                            echo date(
                                "d M, Y",
                                strtotime($row['order_date'])
                            );
                            ?>
                        </span>
                    </td>

                </tr>

                <?php

                    }

                }else{

                ?>

                <tr>

                    <td colspan="5" class="empty-orders">

                        <i class="bi bi-bag-x"></i>

                        <h4>
                            No Orders Found
                        </h4>

                        <p>
                            You haven't placed any order yet.
                        </p>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- BUTTON -->
    <div class="text-center mt-5">

        <a href="campus-special.php" class="btn btn-continue">

            <i class="bi bi-arrow-left-circle"></i>

            Continue Shopping

        </a>

    </div>

</div>

</div>

</section>

<?php include('footer.php'); ?>