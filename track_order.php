<?php
include('header.php');
include('config/db.php');

// =============================
// GET ORDER ID SAFELY
// =============================
$order_id = isset($_GET['order_id']) 
? intval($_GET['order_id']) 
: 0;

$order = null;

$error = "";

// =============================
// FETCH ORDER
// =============================
if($order_id > 0){

    $stmt = $conn->prepare(
        "SELECT * FROM orders WHERE id = ?"
    );

    $stmt->bind_param("i", $order_id);

    $stmt->execute();

    $result = $stmt->get_result();

    $order = $result->fetch_assoc();

    if(!$order){

        $error = "Order not found!";
    }

}else{

    if(isset($_GET['order_id'])){

        $error = "Please enter a valid Order ID.";
    }
}

// =============================
// SAFE STATUS
// =============================
$status = $order['status'] ?? 'Placed';
?>

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

.track-bg{

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

.track-overlay{

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

.track-wrapper{

    min-height:100vh;

    padding:110px 0;

    display:flex;

    align-items:center;
}

/* =========================================================
   GLASS CARD
========================================================= */

.track-box{

    background:rgba(20,16,14,.72);

    border:1px solid var(--border);

    backdrop-filter:blur(18px);

    border-radius:34px;

    padding:50px;

    box-shadow:0 10px 40px rgba(0,0,0,.45);

    position:relative;

    overflow:hidden;

    max-width:850px;

    margin:auto;
}

.track-box::before{

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

    text-align:center;
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

    text-align:left;
}

/* =========================================================
   SEARCH
========================================================= */

.search-form{

    margin-top:40px;
}

.search-wrap{

    position:relative;
}

.search-input{

    width:100%;

    height:68px;

    border-radius:18px;

    border:1px solid rgba(255,255,255,.08);

    background:#16110f;

    color:#fff;

    padding:0 170px 0 24px;

    outline:none;

    transition:var(--transition);
}

.search-input:focus{

    border-color:var(--primary-gold);

    box-shadow:0 0 25px rgba(212,175,55,.08);
}

.search-input::placeholder{

    color:rgba(255,255,255,.35);
}

.search-btn{

    position:absolute;

    top:8px;

    right:8px;

    height:52px;

    border:none;

    border-radius:14px;

    padding:0 28px;

    background:linear-gradient(
        135deg,
        var(--primary-gold),
        #9e7620
    );

    color:#000;

    font-weight:800;

    transition:var(--transition);
}

.search-btn:hover{

    transform:translateY(-2px);
}

/* =========================================================
   ERROR
========================================================= */

.error-box{

    margin-top:25px;

    background:rgba(255,0,0,.08);

    border:1px solid rgba(255,0,0,.15);

    padding:18px 20px;

    border-radius:18px;

    color:#ffb0b0;
}

/* =========================================================
   ORDER INFO
========================================================= */

.order-info{

    margin-top:40px;

    background:rgba(255,255,255,.03);

    border:1px solid rgba(255,255,255,.05);

    border-radius:26px;

    padding:30px;
}

.order-id{

    color:var(--primary-gold);

    font-size:28px;

    font-weight:900;

    margin-bottom:12px;
}

.order-status{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:12px 20px;

    border-radius:50px;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.18);

    color:var(--gold-light);

    font-weight:700;
}

/* =========================================================
   TIMELINE
========================================================= */

.timeline{

    margin-top:50px;

    position:relative;

    display:flex;

    justify-content:space-between;

    gap:20px;
}

.timeline::before{

    content:"";

    position:absolute;

    top:35px;

    left:0;

    width:100%;

    height:2px;

    background:rgba(255,255,255,.08);

    z-index:0;
}

.step{

    position:relative;

    z-index:1;

    flex:1;

    text-align:center;
}

.step-circle{

    width:72px;

    height:72px;

    border-radius:50%;

    margin:auto;

    background:#16110f;

    border:2px solid rgba(255,255,255,.08);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:1.5rem;

    color:rgba(255,255,255,.4);

    transition:var(--transition);
}

.step-label{

    margin-top:15px;

    font-weight:700;

    color:var(--white-muted);
}

.step.active .step-circle{

    background:rgba(212,175,55,.08);

    border-color:var(--primary-gold);

    color:var(--primary-gold);

    box-shadow:0 0 25px rgba(212,175,55,.15);
}

.step.active .step-label{

    color:#fff;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:768px){

    .track-wrapper{

        padding:90px 0;
    }

    .track-box{

        padding:28px;
    }

    .hero-description{

        border-left:none;

        border-top:3px solid var(--primary-gold);

        padding-left:0;

        padding-top:20px;

        text-align:center;
    }

    .search-input{

        padding-right:20px;

        margin-bottom:15px;
    }

    .search-btn{

        position:relative;

        width:100%;

        top:auto;

        right:auto;
    }

    .timeline{

        flex-direction:column;
    }

    .timeline::before{

        display:none;
    }
}

</style>

<div class="track-bg"></div>
<div class="track-overlay"></div>

<section class="track-wrapper">

<div class="container">

<div class="track-box reveal">

<div class="text-center">

<div class="hero-badge">

<span style="color:var(--primary-gold); font-weight:700; letter-spacing:2px;">
    Royal Cafe • Live Tracking
</span>

</div>

<h1 class="editorial-title">

Track Your <br>

<span>Order Status</span>

</h1>

<p class="hero-description">
Stay updated with your premium Royal Cafe order journey from placement to doorstep delivery.
</p>

</div>

<!-- SEARCH -->

<form method="GET" class="search-form">

<div class="search-wrap">

<input
type="number"
name="order_id"
class="search-input"
placeholder="Enter your order ID..."
required>

<button type="submit" class="search-btn">

<i class="bi bi-search"></i>

Track Order

</button>

</div>

</form>

<!-- ERROR -->

<?php if($error): ?>

<div class="error-box">

<i class="bi bi-exclamation-triangle-fill"></i>

<?php echo $error; ?>

</div>

<?php endif; ?>

<!-- ORDER INFO -->

<?php if($order): ?>

<div class="order-info">

<div class="order-id">

#<?php echo $order['id']; ?>

</div>

<div class="order-status">

<i class="bi bi-check-circle-fill"></i>

Current Status:
<b>
<?php echo htmlspecialchars($status); ?>
</b>

</div>

<!-- TIMELINE -->

<div class="timeline">

<!-- PLACED -->

<div class="step <?php if($status=="Placed" || $status=="Processing" || $status=="Shipped" || $status=="Delivered") echo "active"; ?>">

<div class="step-circle">

<i class="bi bi-bag-check-fill"></i>

</div>

<div class="step-label">
Placed
</div>

</div>

<!-- PROCESSING -->

<div class="step <?php if(in_array($status,["Processing","Shipped","Delivered"])) echo "active"; ?>">

<div class="step-circle">

<i class="bi bi-gear-fill"></i>

</div>

<div class="step-label">
Processing
</div>

</div>

<!-- SHIPPED -->

<div class="step <?php if(in_array($status,["Shipped","Delivered"])) echo "active"; ?>">

<div class="step-circle">

<i class="bi bi-truck"></i>

</div>

<div class="step-label">
Shipped
</div>

</div>

<!-- DELIVERED -->

<div class="step <?php if($status=="Delivered") echo "active"; ?>">

<div class="step-circle">

<i class="bi bi-house-check-fill"></i>

</div>

<div class="step-label">
Delivered
</div>

</div>

</div>

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