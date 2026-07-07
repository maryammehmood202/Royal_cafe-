<?php
// ========================================
// START SESSION SAFELY
// ========================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ========================================
// DATABASE CONNECTION
// ========================================
include('config/db.php');

$search_query = "";
?>

<?php include('header.php'); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
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

body{
    background:var(--bg-main);
    color:#fff;
    font-family:'Inter',sans-serif;
    overflow-x:hidden;
}

.text-gold{ color:var(--primary-gold)!important; }
.mono{ font-family:'JetBrains Mono', monospace; }
.ls-2{ letter-spacing:2px; }
.ls-3{ letter-spacing:3px; }

.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:1s ease;
}
.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* =========================
HERO SECTION
========================= */
.hero-section{
    position:relative;
    min-height:100vh;
    display:flex;
    align-items:center;
    overflow:hidden;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(
        to right,
        rgba(0,0,0,.92),
        rgba(0,0,0,.72),
        rgba(0,0,0,.35)
    );
    z-index:1;
}

.parallax-bg{
    position:absolute;
    inset:0;
    background:
    linear-gradient(
        to bottom,
        rgba(0,0,0,.55),
        rgba(0,0,0,.75)
    ),
    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    transform:scale(1.05);
    filter:brightness(.55);
}

.z-index-10{ z-index:10; }

.glass-card{
    background:rgba(20,16,14,.72);
    border:1px solid var(--border);
    backdrop-filter:blur(18px);
    border-radius:20px;
    padding:18px 25px;
    box-shadow:0 10px 30px rgba(0,0,0,.35);
}

.editorial-title{
    font-family:'Playfair Display', serif;
    font-size:clamp(3rem,8vw,6.5rem);
    line-height:1.05;
    font-weight:800;
    color:#fff;
}
.editorial-title span{ color:var(--primary-gold); }

.hero-description{
    font-size:1.1rem;
    line-height:1.9;
    color:var(--white-soft);
    max-width:700px;
    border-left:4px solid var(--primary-gold);
    padding-left:24px;
}

/* =========================
BUTTONS
========================= */
.btn-ultra-gold{
    background:linear-gradient(135deg, var(--primary-gold), #9e7620);
    border:none;
    color:#000;
    font-weight:700;
    padding:15px 38px;
    border-radius:12px;
    transition:var(--transition);
    text-decoration:none;
}
.btn-ultra-gold:hover{ transform:translateY(-4px); color:#000; }

.btn-outline-blur{
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12);
    color:#fff;
    padding:15px 38px;
    border-radius:12px;
    transition:var(--transition);
}
.btn-outline-blur:hover{ border-color:var(--primary-gold); transform:translateY(-4px); color:#fff; }

/* =========================
SEARCH
========================= */
.search-input{
    width:100%;
    height:65px;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.08);
    background:#16110f;
    color:#fff;
    padding:0 70px 0 25px;
    outline:none;
}
.search-input:focus{ border-color:#D4AF37; }

.search-btn{
    position:absolute;
    right:10px;
    top:50%;
    transform:translateY(-50%);
    width:48px;
    height:48px;
    border:none;
    border-radius:12px;
    background:#D4AF37;
    color:#000;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

/* =========================
CARDS
========================= */
.why-card, .testimonial-card{
    background:#16110f;
    border:1px solid rgba(255,255,255,.05);
    border-radius:24px;
    transition:.4s ease;
}

.why-card{ padding:40px 25px; }
.testimonial-card{ padding:35px; }

.why-card:hover, .testimonial-card:hover{
    transform:translateY(-8px);
    border-color:#D4AF37;
}

.why-icon{
    width:90px;
    height:90px;
    border-radius:50%;
    background:rgba(212,175,55,.08);
    border:1px solid rgba(212,175,55,.2);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    color:#D4AF37;
    font-size:2rem;
}

.testimonial-img{
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:50%;
    border:2px solid #D4AF37;
}

/* =========================
GALLERY
========================= */
.thumb-card{ overflow:hidden; border-radius:24px; }
.thumb-card img{ width:100%; height:280px; object-fit:cover; transition:.5s ease; }
.thumb-card:hover img{ transform:scale(1.08); }

@media(max-width:991px){
    .hero-section{ padding:120px 0 80px; text-align:center; }
    .hero-description{ border-left:none; border-top:3px solid var(--primary-gold); padding-left:0; padding-top:20px; margin:auto; }
}
</style>

<section class="hero-section">
    <div class="parallax-bg"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative z-index-10">
        <div class="row align-items-center">
            <div class="col-lg-8 reveal">
                <div class="glass-card d-inline-flex align-items-center mb-4">
                    <span class="text-gold fw-semibold text-uppercase ls-3 small">
                        Royal Cafe • Premium Experience
                    </span>
                </div>
                <h1 class="editorial-title mb-4">
                    Fueling the <br>
                    <span>Academic Elite</span>
                </h1>
                <p class="hero-description">
                    Premium coffee experience crafted for students,
                    creators, developers, and coffee lovers.
                </p>
                <div class="mt-5 d-flex flex-wrap gap-3">
                    <a href="menu.php" class="btn btn-ultra-gold">Order Online</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="searchSection">
    <div class="container">
        <div class="glass-card p-4 p-lg-5 reveal">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h2 class="editorial-title fs-1 mb-3">
                        Search Your <span>Favorite Brew</span>
                    </h2>
                    <p class="text-white-50">
                        Explore coffee, juices, desserts, burgers and premium beverages instantly inside our campus repository channels.
                    </p>
                </div>
                <div class="col-lg-6">
                    <form method="GET" action="campus-special.php">
                        <div class="position-relative">
                            <input
                                type="text"
                                name="search"
                                class="search-input"
                                placeholder="Search campus coffee, shake, dessert..."
                                required>
                            <button type="submit" class="search-btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#080605;">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <span class="text-uppercase text-gold ls-3 fw-semibold">Premium Experience</span>
            <h2 class="editorial-title mt-3">Why Choose <span>Royal Cafe</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 reveal">
                <div class="why-card text-center h-100">
                    <div class="why-icon"><i class="bi bi-cup-hot"></i></div>
                    <h4 class="mt-4">Premium Coffee</h4>
                    <p class="text-white-50">Fresh roasted beans with premium taste.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 reveal">
                <div class="why-card text-center h-100">
                    <div class="why-icon"><i class="bi bi-lightning-charge"></i></div>
                    <h4 class="mt-4">Fast Service</h4>
                    <p class="text-white-50">Quick preparation and instant support.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 reveal">
                <div class="why-card text-center h-100">
                    <div class="why-icon"><i class="bi bi-wifi"></i></div>
                    <h4 class="mt-4">Free WiFi</h4>
                    <p class="text-white-50">Best environment for students.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 reveal">
                <div class="why-card text-center h-100">
                    <div class="why-icon"><i class="bi bi-stars"></i></div>
                    <h4 class="mt-4">Luxury Ambience</h4>
                    <p class="text-white-50">Elegant interior and modern lighting.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <span class="text-uppercase text-gold ls-3 fw-semibold">Customer Reviews</span>
            <h2 class="editorial-title mt-3">What Our <span>Customers Say</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 reveal">
                <div class="testimonial-card h-100">
                    <div class="d-flex align-items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="testimonial-img me-3">
                        <div>
                            <h5 class="mb-1">Ali Hassan</h5>
                            <small class="text-gold">Software Engineering Student</small>
                        </div>
                    </div>
                    <p class="text-white-50 mb-0">
                        Amazing coffee quality and peaceful environment. Best place for assignments and group study.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal">
                <div class="testimonial-card h-100">
                    <div class="d-flex align-items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="testimonial-img me-3">
                        <div>
                            <h5 class="mb-1">Sana Malik</h5>
                            <small class="text-gold">Designer</small>
                        </div>
                    </div>
                    <p class="text-white-50 mb-0">
                        Interior design and ambiance are absolutely premium. Their burgers and cold coffee are my favorites.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal">
                <div class="testimonial-card h-100">
                    <div class="d-flex align-items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/51.jpg" class="testimonial-img me-3">
                        <div>
                            <h5 class="mb-1">Hamza Khan</h5>
                            <small class="text-gold">Web Developer</small>
                        </div>
                    </div>
                    <p class="text-white-50 mb-0">
                        Fast service, excellent taste and professional staff. Highly recommended cafe near university.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#080605;">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <span class="text-uppercase text-gold ls-3 fw-semibold">Royal Moments</span>
            <h2 class="editorial-title mt-3">Our <span>Gallery</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 reveal"><div class="thumb-card"><img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80" alt="Coffee"></div></div>
            <div class="col-lg-4 col-md-6 reveal"><div class="thumb-card"><img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80" alt="Cafe"></div></div>
            <div class="col-lg-4 col-md-6 reveal"><div class="thumb-card"><img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80" alt="Coffee Shop"></div></div>
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

document.querySelectorAll('.reveal').forEach(el=>{ observer.observe(el); });
</script>

<?php include('footer.php'); ?>