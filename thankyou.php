<?php include('header.php'); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>

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

/* ===================================
BODY
=================================== */

body{
    background:var(--bg-main);
    color:#fff;
    font-family:'Inter',sans-serif;
    overflow-x:hidden;
}

.text-gold{
    color:var(--primary-gold)!important;
}

/* ===================================
THANK YOU SECTION
=================================== */

.thankyou-section{
    position:relative;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    padding:120px 0;
}

/* ===================================
BACKGROUND
=================================== */

.parallax-bg{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to bottom,
        rgba(0,0,0,.72),
        rgba(0,0,0,.88)
    ),

    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    transform:scale(1.05);
    filter:brightness(.45);
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:
    radial-gradient(circle at top right,
    rgba(212,175,55,.12),
    transparent 30%);
}

/* ===================================
GOLD GLOW
=================================== */

.glow-orb{
    position:absolute;
    width:450px;
    height:450px;
    border-radius:50%;
    background:rgba(212,175,55,.10);
    filter:blur(120px);
    z-index:1;
}

.glow-1{
    top:-150px;
    right:-150px;
}

.glow-2{
    bottom:-180px;
    left:-150px;
    background:rgba(255,255,255,.04);
}

/* ===================================
CONFETTI
=================================== */

.confetti{
    position:absolute;
    width:10px;
    height:10px;
    border-radius:50%;
    background:var(--primary-gold);
    opacity:.6;
    animation:fall linear infinite;
    z-index:2;
}

@keyframes fall{

    0%{
        transform:translateY(-10vh) rotate(0deg);
    }

    100%{
        transform:translateY(110vh) rotate(360deg);
    }
}

/* ===================================
MAIN CARD
=================================== */

.thankyou-card{
    position:relative;
    z-index:10;

    background:rgba(20,16,14,.72);

    border:1px solid var(--border);

    backdrop-filter:blur(22px);

    border-radius:34px;

    padding:60px;

    max-width:900px;

    width:100%;

    box-shadow:0 25px 80px rgba(0,0,0,.5);

    text-align:center;
}

/* ===================================
BADGE
=================================== */

.top-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:12px 22px;

    border-radius:50px;

    background:rgba(212,175,55,.10);

    border:1px solid rgba(212,175,55,.22);

    color:var(--primary-gold);

    font-size:.85rem;

    font-weight:700;

    letter-spacing:2px;

    text-transform:uppercase;

    margin-bottom:30px;
}

/* ===================================
ICON
=================================== */

.success-icon{
    width:120px;
    height:120px;

    border-radius:50%;

    margin:auto auto 35px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.22);

    color:var(--primary-gold);

    font-size:4rem;

    box-shadow:0 0 40px rgba(212,175,55,.15);
}

/* ===================================
TITLE
=================================== */

.editorial-title{
    font-family:'Playfair Display', serif;
    font-size:clamp(2.8rem,7vw,5rem);
    line-height:1.1;
    font-weight:800;
    margin-bottom:20px;
}

.editorial-title span{
    color:var(--primary-gold);
}

.subtitle{
    max-width:700px;
    margin:auto;
    color:var(--white-soft);
    font-size:1.1rem;
    line-height:1.9;
}

/* ===================================
ORDER ID
=================================== */

.order-badge{
    display:inline-flex;
    align-items:center;
    gap:12px;

    margin-top:40px;

    padding:16px 34px;

    border-radius:60px;

    background:rgba(212,175,55,.08);

    border:1px solid rgba(212,175,55,.20);

    color:var(--primary-gold);

    font-weight:800;

    letter-spacing:1px;
}

/* ===================================
TIMELINE
=================================== */

.timeline{
    margin-top:55px;
    display:flex;
    justify-content:space-between;
    position:relative;
    gap:20px;
}

.timeline::before{
    content:"";
    position:absolute;
    top:28px;
    left:0;
    width:100%;
    height:2px;
    background:rgba(255,255,255,.08);
}

.step{
    position:relative;
    z-index:2;
    flex:1;
}

.step-circle{
    width:56px;
    height:56px;

    margin:auto auto 16px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#1d1714;

    border:1px solid rgba(255,255,255,.08);

    color:#fff;

    font-size:1.2rem;

    transition:var(--transition);
}

.step.active .step-circle{
    background:rgba(212,175,55,.12);
    border-color:rgba(212,175,55,.30);
    color:var(--primary-gold);
    box-shadow:0 0 25px rgba(212,175,55,.18);
}

.step-title{
    font-size:.9rem;
    font-weight:700;
    color:#fff;
}

.step.active .step-title{
    color:var(--primary-gold);
}

/* ===================================
BUTTONS
=================================== */

.btn-group-pro{
    margin-top:55px;

    display:flex;
    justify-content:center;
    gap:18px;
    flex-wrap:wrap;
}

.btn-ultra-gold{
    background:linear-gradient(135deg,var(--primary-gold),#9e7620);
    border:none;
    color:#000;
    font-weight:800;
    padding:16px 34px;
    border-radius:14px;
    transition:var(--transition);
    text-decoration:none;
}

.btn-ultra-gold:hover{
    transform:translateY(-4px);
    color:#000;
}

.btn-outline-blur{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.10);
    color:#fff;
    padding:16px 34px;
    border-radius:14px;
    transition:var(--transition);
    text-decoration:none;
}

.btn-outline-blur:hover{
    border-color:var(--primary-gold);
    transform:translateY(-4px);
    color:#fff;
}

/* ===================================
REVEAL
=================================== */

.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:1s ease;
}

.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* ===================================
RESPONSIVE
=================================== */

@media(max-width:991px){

    .thankyou-card{
        padding:40px 25px;
    }

    .timeline{
        flex-direction:column;
    }

    .timeline::before{
        display:none;
    }
}

</style>

<section class="thankyou-section">

    <!-- BACKGROUND -->
    <div class="parallax-bg"></div>
    <div class="hero-overlay"></div>

    <!-- GLOW -->
    <div class="glow-orb glow-1"></div>
    <div class="glow-orb glow-2"></div>

    <!-- CONFETTI -->
    <div class="confetti" style="left:10%; animation-duration:7s;"></div>
    <div class="confetti" style="left:20%; animation-duration:5s;"></div>
    <div class="confetti" style="left:35%; animation-duration:8s;"></div>
    <div class="confetti" style="left:50%; animation-duration:6s;"></div>
    <div class="confetti" style="left:65%; animation-duration:7s;"></div>
    <div class="confetti" style="left:80%; animation-duration:5s;"></div>
    <div class="confetti" style="left:92%; animation-duration:8s;"></div>

    <div class="container position-relative z-index-10">

        <div class="thankyou-card reveal">

            <!-- TOP BADGE -->
            <div class="top-badge">
                <i class="bi bi-stars"></i>
                Royal Cafe Premium Experience
            </div>

            <!-- ICON -->
            <div class="success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <!-- TITLE -->
            <h1 class="editorial-title">
                Order <span>Confirmed</span>
            </h1>

            <!-- SUBTITLE -->
            <p class="subtitle">
                Thank you for choosing Royal Cafe.
                Your premium order has been successfully placed
                and our team has already started preparing it.
            </p>

            <!-- ORDER ID -->
            <div class="order-badge">
                <i class="bi bi-receipt"></i>

                ORDER ID:
                #<?php echo htmlspecialchars($_GET['order_id'] ?? 'N/A'); ?>
            </div>

            <!-- TIMELINE -->
            <div class="timeline">

                <div class="step active">

                    <div class="step-circle">
                        <i class="bi bi-check2"></i>
                    </div>

                    <div class="step-title">
                        Placed
                    </div>

                </div>

                <div class="step active">

                    <div class="step-circle">
                        <i class="bi bi-gear-fill"></i>
                    </div>

                    <div class="step-title">
                        Processing
                    </div>

                </div>

                <div class="step">

                    <div class="step-circle">
                        <i class="bi bi-truck"></i>
                    </div>

                    <div class="step-title">
                        Shipped
                    </div>

                </div>

                <div class="step">

                    <div class="step-circle">
                        <i class="bi bi-house-check"></i>
                    </div>

                    <div class="step-title">
                        Delivered
                    </div>

                </div>

            </div>

            <!-- BUTTONS -->
            <div class="btn-group-pro">

                <a href="campus-special.php"
                   class="btn-ultra-gold">

                    Continue Shopping

                </a>

                <a href="track_order.php?order_id=<?php echo htmlspecialchars($_GET['order_id'] ?? ''); ?>"
                   class="btn-outline-blur">

                    Track Order

                </a>

                <a href="https://wa.me/923000000000"
                   class="btn-outline-blur">

                    WhatsApp Support

                </a>

            </div>

        </div>

    </div>

</section>

<script>

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