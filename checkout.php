<?php
session_start();
include('config/db.php');

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name    = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $total = 0;

    foreach ($_SESSION['cart'] as $item) {

        $total += ($item['price'] * $item['quantity']);
    }

    $order_query = "
        INSERT INTO orders
        (
            customer_name,
            email,
            phone,
            address,
            total_amount
        )

        VALUES
        (
            '$name',
            '$email',
            '$phone',
            '$address',
            '$total'
        )
    ";

    if (mysqli_query($conn, $order_query)) {

        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION['cart'] as $item) {

            $item_name = mysqli_real_escape_string($conn, $item['name']);

            $qty   = (int)$item['quantity'];

            $price = (float)$item['price'];

            mysqli_query(
                $conn,

                "INSERT INTO order_items
                (
                    order_id,
                    item_name,
                    quantity,
                    price
                )

                VALUES
                (
                    '$order_id',
                    '$item_name',
                    '$qty',
                    '$price'
                )"
            );
        }

        unset($_SESSION['cart']);

        header("Location: thankyou.php?order_id=" . $order_id);

        exit();
    }
}
?>

<?php include('header.php'); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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

/* =========================================================
   BODY
========================================================= */

body{

    background:var(--bg-main);

    color:#fff;

    font-family:'Inter',sans-serif;

    overflow-x:hidden;
}

/* =========================================================
   BACKGROUND
========================================================= */

.checkout-bg{

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

.checkout-overlay{

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
   SECTION
========================================================= */

.checkout-section{

    padding:110px 0;

    min-height:100vh;

    display:flex;

    align-items:center;
}

/* =========================================================
   GLASS CARD
========================================================= */

.glass-card{

    background:rgba(20,16,14,.72);

    border:1px solid var(--border);

    backdrop-filter:blur(18px);

    border-radius:34px;

    padding:45px;

    box-shadow:0 10px 40px rgba(0,0,0,.45);

    position:relative;

    overflow:hidden;
}

.glass-card::before{

    content:"";

    position:absolute;

    top:-120px;

    right:-120px;

    width:260px;

    height:260px;

    background:rgba(212,175,55,.08);

    border-radius:50%;

    filter:blur(20px);
}

/* =========================================================
   HERO TEXT
========================================================= */

.hero-badge{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:12px 24px;

    border-radius:50px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    margin-bottom:25px;
}

.editorial-title{

    font-family:'Playfair Display', serif;

    font-size:clamp(2.8rem,7vw,5rem);

    line-height:1.05;

    font-weight:800;

    color:#fff;
}

.editorial-title span{

    color:var(--primary-gold);
}

.hero-description{

    font-size:1.05rem;

    line-height:1.9;

    color:var(--white-soft);

    border-left:4px solid var(--primary-gold);

    padding-left:24px;

    margin-top:24px;

    margin-bottom:35px;
}

/* =========================================================
   FORM
========================================================= */

.form-label{

    color:var(--gold-light);

    font-size:13px;

    font-weight:700;

    margin-bottom:10px;

    letter-spacing:1px;

    text-transform:uppercase;
}

.form-control{

    background:#16110f !important;

    border:1px solid rgba(255,255,255,.08) !important;

    color:#fff !important;

    border-radius:16px;

    min-height:60px;

    padding:16px 20px;

    transition:var(--transition);

    box-shadow:none !important;
}

textarea.form-control{

    min-height:130px;

    resize:none;
}

.form-control:focus{

    border-color:var(--primary-gold) !important;

    box-shadow:0 0 25px rgba(212,175,55,.08) !important;
}

.form-control::placeholder{

    color:rgba(255,255,255,.35);
}

/* =========================================================
   BUTTON
========================================================= */

.btn-ultra-gold{

    width:100%;

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    border:none;

    color:#000;

    font-weight:800;

    padding:18px 28px;

    border-radius:18px;

    transition:var(--transition);

    letter-spacing:1px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:10px;
}

.btn-ultra-gold:hover{

    transform:translateY(-4px);

    box-shadow:0 20px 40px rgba(212,175,55,.22);

    color:#000;
}

/* =========================================================
   ORDER SUMMARY
========================================================= */

.summary-box{

    background:rgba(255,255,255,.03);

    border:1px solid rgba(255,255,255,.05);

    border-radius:24px;

    padding:25px;

    margin-bottom:30px;
}

.summary-title{

    font-size:20px;

    font-weight:800;

    margin-bottom:20px;
}

.summary-item{

    display:flex;

    justify-content:space-between;

    margin-bottom:14px;

    color:var(--white-soft);
}

.summary-item strong{

    color:var(--primary-gold);
}

.grand-total{

    border-top:1px solid rgba(255,255,255,.08);

    margin-top:18px;

    padding-top:18px;

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.grand-total h3{

    margin:0;

    font-size:18px;

    font-weight:700;
}

.grand-total span{

    color:var(--primary-gold);

    font-size:28px;

    font-weight:900;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:991px){

    .checkout-section{

        padding:90px 0;
    }

    .editorial-title{

        text-align:center;
    }

    .hero-description{

        border-left:none;

        border-top:3px solid var(--primary-gold);

        padding-left:0;

        padding-top:20px;

        text-align:center;
    }

    .hero-badge{

        margin:auto auto 25px;
    }
}

@media(max-width:768px){

    .glass-card{

        padding:25px;
    }

    .editorial-title{

        font-size:2.4rem;
    }
}

</style>

<div class="checkout-bg"></div>
<div class="checkout-overlay"></div>

<section class="checkout-section">

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="glass-card reveal">

<div class="hero-badge">

<span style="color:var(--primary-gold); font-weight:700; letter-spacing:2px;">
    Royal Cafe • Secure Payment
</span>

</div>

<h1 class="editorial-title">
    Secure <br>
    <span>Checkout</span>
</h1>

<p class="hero-description">
    Complete your premium Royal Cafe order securely and enjoy a smooth luxury dining experience delivered to your doorstep.
</p>

<!-- ORDER SUMMARY -->

<div class="summary-box">

<div class="summary-title">
    Order Summary
</div>

<?php

$grand_total = 0;

foreach($_SESSION['cart'] as $item):

$item_total = $item['price'] * $item['quantity'];

$grand_total += $item_total;

?>

<div class="summary-item">

<div>

<?php echo htmlspecialchars($item['name']); ?>

x <?php echo $item['quantity']; ?>

</div>

<strong>

Rs. <?php echo number_format($item_total,2); ?>

</strong>

</div>

<?php endforeach; ?>

<div class="grand-total">

<h3>Total Amount</h3>

<span>

Rs. <?php echo number_format($grand_total,2); ?>

</span>

</div>

</div>

<!-- FORM -->

<form method="POST">

<div class="mb-4">

<label class="form-label">

<i class="bi bi-person-fill"></i>

Full Name

</label>

<input
type="text"
name="customer_name"
class="form-control"
placeholder="Enter your full name"
required>

</div>

<div class="mb-4">

<label class="form-label">

<i class="bi bi-envelope-fill"></i>

Email Address

</label>

<input
type="email"
name="email"
class="form-control"
placeholder="example@gmail.com"
required>

</div>

<div class="mb-4">

<label class="form-label">

<i class="bi bi-telephone-fill"></i>

Phone Number

</label>

<input
type="tel"
name="phone"
class="form-control"
placeholder="+92 XXX XXXXXXX"
required>

</div>

<div class="mb-4">

<label class="form-label">

<i class="bi bi-geo-alt-fill"></i>

Delivery Address

</label>

<textarea
name="address"
class="form-control"
placeholder="Enter your complete delivery address"
required></textarea>

</div>

<button type="submit" class="btn-ultra-gold">

<i class="bi bi-shield-check"></i>

PLACE ORDER NOW

</button>

</form>

</div>

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