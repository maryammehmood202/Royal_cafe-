<?php
session_start();
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

.cart-bg{
    position:fixed;
    inset:0;

    background:
    linear-gradient(
        to bottom,
        rgba(0,0,0,.85),
        rgba(0,0,0,.92)
    ),
    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;

    z-index:-2;

    filter:brightness(.35);
}

.cart-overlay{
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

.cart-hero{
    padding:120px 0 60px;
    position:relative;
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
    max-width:720px;

    font-size:1.08rem;

    line-height:1.9;

    color:var(--white-soft);

    border-left:4px solid var(--primary-gold);

    padding-left:24px;

    margin-top:28px;
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
   CART BOX
========================================================= */

.cart-box{
    padding:40px;
}

/* =========================================================
   TABLE
========================================================= */

.cart-table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 18px;
}

/* HEAD */

.cart-table thead th{

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    color:#000;

    padding:20px;

    font-size:13px;

    font-weight:800;

    letter-spacing:1px;

    text-transform:uppercase;

    border:none;
}

.cart-table thead th:first-child{
    border-radius:18px 0 0 18px;
}

.cart-table thead th:last-child{
    border-radius:0 18px 18px 0;
}

/* ROW */

.cart-table tbody tr{

    background:#16110f;

    border:1px solid rgba(255,255,255,.05);

    transition:var(--transition);
}

.cart-table tbody tr:hover{

    transform:translateY(-6px);

    border-color:var(--primary-gold);

    box-shadow:0 15px 35px rgba(0,0,0,.3);
}

/* TD */

.cart-table td{

    padding:24px 18px;

    vertical-align:middle;

    border-top:1px solid rgba(255,255,255,.05);

    border-bottom:1px solid rgba(255,255,255,.05);

    color:#fff;
}

.cart-table td:first-child{

    border-left:1px solid rgba(255,255,255,.05);

    border-radius:18px 0 0 18px;
}

.cart-table td:last-child{

    border-right:1px solid rgba(255,255,255,.05);

    border-radius:0 18px 18px 0;
}

/* =========================================================
   PRODUCT
========================================================= */

.product-wrap{
    display:flex;
    align-items:center;
    gap:18px;
}

.cart-product-img{

    width:90px;
    height:90px;

    object-fit:cover;

    border-radius:22px;

    border:2px solid rgba(212,175,55,.22);

    transition:var(--transition);
}

.cart-product-img:hover{

    transform:scale(1.08);

    border-color:var(--primary-gold);

    box-shadow:0 10px 30px rgba(212,175,55,.25);
}

.cart-product-name{

    font-size:20px;

    font-weight:700;

    color:#fff;

    margin-bottom:8px;
}

.product-tag{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:50px;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    color:var(--primary-gold);

    font-size:12px;

    font-weight:700;
}

/* =========================================================
   PRICE
========================================================= */

.cart-price{

    color:var(--primary-gold);

    font-size:19px;

    font-weight:800;
}

/* =========================================================
   QUANTITY
========================================================= */

.qty-badge{

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    color:var(--primary-gold);

    padding:12px 18px;

    border-radius:16px;

    font-weight:800;

    display:inline-flex;

    align-items:center;

    gap:8px;
}

/* =========================================================
   TOTAL
========================================================= */

.cart-total{

    font-size:20px;

    font-weight:900;

    color:#fff;
}

/* =========================================================
   BUTTONS
========================================================= */

.btn-remove{

    background:linear-gradient(
        135deg,
        #ff4d4d,
        #b30000
    );

    border:none;

    color:#fff;

    padding:14px 20px;

    border-radius:16px;

    font-weight:700;

    text-decoration:none;

    transition:var(--transition);

    display:inline-flex;

    align-items:center;

    gap:10px;
}

.btn-remove:hover{

    transform:translateY(-4px);

    box-shadow:0 15px 35px rgba(255,0,0,.25);

    color:#fff;
}

/* =========================================================
   SUMMARY
========================================================= */

.summary-card{

    margin-top:45px;

    padding:35px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    flex-wrap:wrap;
}

.summary-title{

    color:#fff;

    font-size:26px;

    font-weight:700;
}

.summary-total{

    color:var(--primary-gold);

    font-size:42px;

    font-weight:900;
}

/* CHECKOUT */

.btn-checkout{

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    color:#000;

    border:none;

    padding:18px 32px;

    border-radius:18px;

    font-weight:800;

    text-decoration:none;

    transition:var(--transition);
}

.btn-checkout:hover{

    transform:translateY(-4px);

    box-shadow:0 15px 40px rgba(212,175,55,.25);

    color:#000;
}

/* =========================================================
   EMPTY CART
========================================================= */

.empty-cart{

    text-align:center;

    padding:90px 20px;
}

.empty-cart-icon{

    width:130px;
    height:130px;

    border-radius:50%;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    display:flex;

    align-items:center;

    justify-content:center;

    margin:auto auto 30px;

    font-size:3rem;

    color:var(--primary-gold);
}

.empty-cart h3{

    font-size:2rem;

    font-weight:800;

    margin-bottom:15px;
}

.empty-cart p{

    color:var(--white-muted);

    max-width:500px;

    margin:auto;
}

.btn-explore{

    margin-top:30px;

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:16px 30px;

    border-radius:16px;

    text-decoration:none;

    font-weight:800;

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    color:#000;

    transition:var(--transition);
}

.btn-explore:hover{

    transform:translateY(-4px);

    box-shadow:0 15px 40px rgba(212,175,55,.25);

    color:#000;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:991px){

    .summary-card{
        flex-direction:column;
        text-align:center;
    }

    .hero-description{

        border-left:none;

        border-top:3px solid var(--primary-gold);

        padding-left:0;

        padding-top:20px;
    }
}

@media(max-width:768px){

    .cart-hero{
        padding:90px 0 40px;
        text-align:center;
    }

    .cart-box{
        padding:22px;
    }

    .cart-table thead{
        display:none;
    }

    .cart-table,
    .cart-table tbody,
    .cart-table tr,
    .cart-table td{
        display:block;
        width:100%;
    }

    .cart-table tr{
        margin-bottom:25px;
    }

    .cart-table td{

        text-align:right;

        padding-left:50%;

        position:relative;
    }

    .cart-table td::before{

        content:attr(data-label);

        position:absolute;

        left:18px;

        color:var(--primary-gold);

        font-weight:800;
    }

    .product-wrap{

        flex-direction:column;

        align-items:flex-end;
    }
}

</style>

<div class="cart-bg"></div>
<div class="cart-overlay"></div>

<section class="cart-hero">

<div class="container">

<div class="hero-badge reveal">
    <span class="text-uppercase fw-semibold" style="color:var(--primary-gold); letter-spacing:2px;">
        Royal Cafe • Premium Cart
    </span>
</div>

<h1 class="editorial-title reveal">
    Shopping <br>
    <span>Cart</span>
</h1>

<p class="hero-description reveal">
    Review your selected premium products before checkout and complete your luxury Royal Cafe experience.
</p>

</div>

</section>

<section class="pb-5">

<div class="container">

<div class="glass-card cart-box reveal">

<?php if (!empty($_SESSION['cart'])): ?>

<div class="table-responsive">

<table class="cart-table">

<thead>
<tr>
    <th>Product</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th class="text-center">Action</th>
</tr>
</thead>

<tbody>

<?php
$grand_total = 0;

foreach ($_SESSION['cart'] as $id => $item):

    $item_total = $item['price'] * $item['quantity'];

    $grand_total += $item_total;
?>

<tr>

<!-- PRODUCT -->

<td data-label="Product">

<div class="product-wrap">

<img 
src="/ROYAL_CAFE/images/<?php echo $item['image']; ?>" 
class="cart-product-img">

<div>

<div class="cart-product-name">
    <?php echo $item['name']; ?>
</div>

<span class="product-tag">
    <i class="bi bi-stars"></i>
    Premium Item
</span>

</div>

</div>

</td>

<!-- PRICE -->

<td data-label="Unit Price">

<div class="cart-price">
    Rs. <?php echo number_format($item['price'], 2); ?>
</div>

</td>

<!-- QUANTITY -->

<td data-label="Quantity">

<span class="qty-badge">
    <i class="bi bi-bag-fill"></i>
    <?php echo $item['quantity']; ?>
</span>

</td>

<!-- TOTAL -->

<td data-label="Total">

<div class="cart-total">
    Rs. <?php echo number_format($item_total, 2); ?>
</div>

</td>

<!-- ACTION -->

<td data-label="Action" class="text-center">

<a 
href="remove_item.php?id=<?php echo $id; ?>" 
class="btn-remove">

<i class="bi bi-trash-fill"></i>
Remove

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<!-- SUMMARY -->

<div class="glass-card summary-card">

<div>

<div class="summary-title">
    Grand Total
</div>

<div class="summary-total">
    Rs. <?php echo number_format($grand_total, 2); ?>
</div>

</div>

<a href="checkout.php" class="btn-checkout">

<i class="bi bi-lightning-charge-fill me-2"></i>

Proceed to Checkout

</a>

</div>

<?php else: ?>

<!-- EMPTY -->

<div class="empty-cart">

<div class="empty-cart-icon">
    <i class="bi bi-cart-x-fill"></i>
</div>

<h3>
    Your Cart Is Empty
</h3>

<p>
    Looks like you haven’t added any premium products yet. Explore our luxury Royal Cafe menu.
</p>

<a href="campus-special.php" class="btn-explore">

<i class="bi bi-cup-hot-fill"></i>

Explore Menu

</a>

</div>

<?php endif; ?>

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