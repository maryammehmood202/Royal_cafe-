<?php
session_start();
include('config/db.php');
include('header.php');
?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>

/* =========================================================
   ROOT
========================================================= */

:root{
    --primary-gold:#D4AF37;
    --gold-light:#f7d774;
    --bg-main:#0b0908;
    --bg-card:#16110f;
    --bg-soft:#1d1714;
    --border:rgba(212,175,55,0.18);
    --white-soft:rgba(255,255,255,0.82);
    --white-muted:rgba(255,255,255,0.62);
    --transition:all .45s cubic-bezier(.23,1,.32,1);
}

body{
    background:var(--bg-main);
    color:#fff;
    font-family:'Inter',sans-serif;
    overflow-x:hidden;
}

/* =========================================================
   BACKGROUND
========================================================= */

.dashboard-bg{
    position:fixed;
    inset:0;

    background:
    linear-gradient(
        to bottom,
        rgba(0,0,0,.88),
        rgba(0,0,0,.92)
    ),
    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;

    z-index:-2;

    filter:brightness(.35);
}

.dashboard-overlay{
    position:fixed;
    inset:0;

    background:
    radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 35%);

    z-index:-1;
}

/* =========================================================
   REVEAL
========================================================= */

.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:1s ease;
}

.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* =========================================================
   HERO
========================================================= */

.admin-hero{
    padding:120px 0 70px;
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:12px 24px;

    border-radius:50px;

    background:rgba(20,16,14,.72);

    border:1px solid var(--border);

    backdrop-filter:blur(18px);

    margin-bottom:28px;
}

.editorial-title{
    font-family:'Playfair Display', serif;
    font-size:clamp(3rem,8vw,6rem);
    line-height:1.05;
    font-weight:800;
    color:#fff;
}

.editorial-title span{
    color:var(--primary-gold);
}

.hero-description{
    max-width:760px;

    font-size:1.08rem;

    line-height:1.9;

    color:var(--white-soft);

    border-left:4px solid var(--primary-gold);

    padding-left:24px;

    margin-top:28px;
}

/* =========================================================
   BUTTONS
========================================================= */

.btn-gold{
    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    border:none;

    color:#000;

    font-weight:700;

    padding:15px 30px;

    border-radius:16px;

    text-decoration:none;

    transition:var(--transition);

    display:inline-flex;
    align-items:center;
    gap:10px;
}

.btn-gold:hover{
    transform:translateY(-4px);
    color:#000;
}

.btn-outline-dark{
    background:rgba(255,255,255,.06);

    border:1px solid rgba(255,255,255,.12);

    color:#fff;

    padding:15px 28px;

    border-radius:16px;

    text-decoration:none;

    transition:var(--transition);

    display:inline-flex;
    align-items:center;
    gap:10px;
}

.btn-outline-dark:hover{
    border-color:var(--primary-gold);
    transform:translateY(-4px);
    color:#fff;
}

/* =========================================================
   GLASS CARD
========================================================= */

.glass-card{
    background:rgba(20,16,14,.72);

    border:1px solid var(--border);

    backdrop-filter:blur(18px);

    border-radius:30px;

    box-shadow:0 10px 30px rgba(0,0,0,.35);
}

/* =========================================================
   TABLE WRAPPER
========================================================= */

.table-card{
    padding:35px;
}

/* =========================================================
   TABLE
========================================================= */

.table-responsive{
    border-radius:24px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.05);
}

.table{
    margin-bottom:0;
    color:#fff;
    background:transparent !important;
}

/* HEAD */

.table thead th{

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    ) !important;

    color:#000 !important;

    border:none !important;

    padding:22px 18px;

    font-size:13px;

    font-weight:800;

    text-transform:uppercase;

    letter-spacing:1px;
}

/* BODY */

.table tbody tr{

    background:#16110f !important;

    transition:var(--transition);
}

.table tbody tr:hover{

    transform:translateY(-5px);

    box-shadow:0 12px 30px rgba(0,0,0,.25);
}

.table tbody td{

    background:#16110f !important;

    color:#fff !important;

    border-color:rgba(255,255,255,.05) !important;

    padding:24px 18px;

    vertical-align:middle;
}

/* =========================================================
   ORDER ID
========================================================= */

.order-id{
    color:var(--primary-gold);
    font-weight:800;
    font-size:16px;
}

/* =========================================================
   CUSTOMER
========================================================= */

.customer-box{
    display:flex;
    align-items:center;
    gap:15px;
}

.customer-avatar{

    width:58px;
    height:58px;

    border-radius:50%;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    display:flex;

    align-items:center;

    justify-content:center;

    color:var(--primary-gold);

    font-size:1.2rem;
}

.customer-name{
    font-weight:700;
    font-size:16px;
}

.customer-email{
    color:var(--white-muted);
    font-size:13px;
}

/* =========================================================
   PHONE
========================================================= */

.phone-text{
    color:#fff;
    font-weight:600;
}

/* =========================================================
   TOTAL
========================================================= */

.total-price{
    color:var(--primary-gold);
    font-weight:800;
    font-size:18px;
}

/* =========================================================
   ITEMS
========================================================= */

.item-badge{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:12px 16px;

    border-radius:18px;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    color:var(--gold-light);

    font-size:13px;

    line-height:1.7;
}

/* =========================================================
   DELETE BUTTON
========================================================= */

.btn-delete{

    width:48px;
    height:48px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #ff3b3b,
        #b30000
    );

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    transition:var(--transition);

    margin:auto;
}

.btn-delete:hover{

    transform:translateY(-4px);

    box-shadow:0 15px 35px rgba(255,0,0,.25);

    color:#fff;
}

/* =========================================================
   EMPTY STATE
========================================================= */

.empty-orders{
    text-align:center;
    padding:80px 20px !important;
}

.empty-orders i{

    width:120px;
    height:120px;

    border-radius:50%;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    display:flex;

    align-items:center;

    justify-content:center;

    margin:auto auto 25px;

    color:var(--primary-gold);

    font-size:3rem;
}

.empty-orders h4{
    font-weight:800;
    margin-bottom:12px;
}

.empty-orders p{
    color:var(--white-muted);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:991px){

    .admin-hero{
        text-align:center;
        padding-top:90px;
    }

    .hero-description{

        border-left:none;

        border-top:3px solid var(--primary-gold);

        padding-left:0;

        padding-top:20px;

        margin:auto;
    }
}

@media(max-width:768px){

    .table-card{
        padding:22px;
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
        margin-bottom:25px;
        border-radius:20px;
        overflow:hidden;
    }

    .table td{

        text-align:right;

        padding-left:50%;

        position:relative;
    }

    .table td::before{

        content:attr(data-label);

        position:absolute;

        left:18px;

        color:var(--primary-gold);

        font-weight:800;
    }

    .customer-box{
        flex-direction:column;
        align-items:flex-end;
    }
}

</style>

<div class="dashboard-bg"></div>
<div class="dashboard-overlay"></div>

<!-- HERO -->

<section class="admin-hero">

<div class="container">

<div class="hero-badge reveal">

<span style="color:var(--primary-gold); font-weight:700; letter-spacing:2px;">
    Royal Cafe • Orders Management
</span>

</div>

<h1 class="editorial-title reveal">
    Premium <br>
    <span>Orders Panel</span>
</h1>

<p class="hero-description reveal">
    Manage customer orders, payments and order activity through your luxury Royal Cafe administration dashboard.
</p>

<div class="mt-5 d-flex gap-3 flex-wrap reveal">

<a href="admin.php" class="btn-gold">

<i class="bi bi-arrow-left-circle-fill"></i>

Back to Dashboard

</a>

</div>

</div>

</section>

<!-- TABLE -->

<section class="pb-5">

<div class="container">

<div class="glass-card table-card reveal">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<div>

<h2 class="editorial-title fs-1 mb-2">
    Customer <span>Orders</span>
</h2>

<p style="color:var(--white-muted); margin:0;">
    All customer orders and purchase records.
</p>

</div>

</div>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>
    <th>Order ID</th>
    <th>Customer Info</th>
    <th>Contact</th>
    <th>Total Amount</th>
    <th>Items</th>
    <th>Actions</th>
</tr>

</thead>

<tbody>

<?php

$query = "
    SELECT 
        o.*,

        GROUP_CONCAT(
            CONCAT(
                oi.item_name,
                ' (',
                oi.quantity,
                ')'
            )
            SEPARATOR ', '
        ) AS items_list

    FROM orders o

    LEFT JOIN order_items oi
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

<div class="customer-box">

<div class="customer-avatar">
    <i class="bi bi-person-fill"></i>
</div>

<div>

<div class="customer-name">
    <?php echo htmlspecialchars($row['customer_name']); ?>
</div>

<div class="customer-email">
    <?php echo htmlspecialchars($row['email']); ?>
</div>

</div>

</div>

</td>

<!-- PHONE -->

<td data-label="Phone">

<span class="phone-text">

<?php echo htmlspecialchars($row['phone']); ?>

</span>

</td>

<!-- TOTAL -->

<td data-label="Total">

<span class="total-price">

Rs.
<?php
echo number_format(
    $row['total_amount'],
    2
);
?>

</span>

</td>

<!-- ITEMS -->

<td data-label="Items" style="max-width:260px;">

<span class="item-badge">

<i class="bi bi-bag-check-fill"></i>

<?php
echo htmlspecialchars(
    $row['items_list']
);
?>

</span>

</td>

<!-- ACTION -->

<td data-label="Action">

<a href="admin_delete.php?id=<?php echo $row['id']; ?>"

class="btn-delete"

onclick="return confirm('Permanently delete this order?')">

<i class="bi bi-trash-fill"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="6" class="empty-orders">

<i class="bi bi-bag-x-fill"></i>

<h4>
    No Active Orders
</h4>

<p>
    No customer orders found right now.
</p>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

</section>

<script>

// REVEAL ANIMATION

const observer = new IntersectionObserver((entries)=>{

entries.forEach(entry=>{

    if(entry.isIntersecting){
        entry.target.classList.add('active');
    }

});

},{ threshold:0.15 });

document.querySelectorAll('.reveal').forEach(el=>{

observer.observe(el);

});

</script>

<?php include('footer.php'); ?>