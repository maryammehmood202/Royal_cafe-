<?php include('header.php'); ?>

<!-- =========================================
🌌 ULTRA PRO HISTORY PAGE — ROYAL COFFEE
========================================= -->

<style>
:root{
    --rc-black:#0b0a09;
    --rc-maroon:#1b110f;
    --rc-maroon-2:#2a1815;
    --rc-gold:#d4af37;
    --rc-gold-soft:#f6d77a;
    --rc-white:#fdfbf7;
    --glass:rgba(255,255,255,.06);
    --glass-border:rgba(255,255,255,.09);
}

/* =========================================
BODY
========================================= */
body{
    background:
    radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 30%),
    radial-gradient(circle at bottom left, rgba(212,175,55,.06), transparent 30%),
    linear-gradient(to bottom, #0b0908, #120c0b, #1a100e);
    color:var(--rc-white);
    overflow-x:hidden;
}

/* =========================================
FLOATING GLOW ORBS
========================================= */
.glow-orb{
    position:absolute;
    border-radius:50%;
    filter:blur(90px);
    z-index:0;
    opacity:.35;
    animation:floatOrb 12s ease-in-out infinite;
}

.glow-orb.one{
    width:340px;
    height:340px;
    background:#d4af37;
    top:-100px;
    left:-120px;
}

.glow-orb.two{
    width:300px;
    height:300px;
    background:#6d3b2c;
    right:-100px;
    bottom:0;
}

@keyframes floatOrb{
    0%,100%{transform:translateY(0px);}
    50%{transform:translateY(-35px);}
}

/* =========================================
HERO
========================================= */
.history-hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    display:flex;
    align-items:center;
    background:
    linear-gradient(to right,
    rgba(0,0,0,.88),
    rgba(18,10,8,.78),
    rgba(18,10,8,.55)),
    url('images/history-bg.jpg') center/cover fixed no-repeat;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:
    radial-gradient(circle at center, rgba(212,175,55,.08), transparent 40%);
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 24px;
    border-radius:100px;
    border:1px solid rgba(212,175,55,.25);
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(14px);
    color:var(--rc-gold);
    font-weight:700;
    letter-spacing:2px;
    text-transform:uppercase;
    font-size:.82rem;
}

.hero-title{
    font-size:clamp(3.4rem,8vw,7rem);
    line-height:.95;
    font-weight:900;
    letter-spacing:-4px;
    margin:30px 0;
    color:#fff;
}

.gold-gradient{
    background:linear-gradient(to right,#fff,#f7d87b,#d4af37);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero-desc{
    font-size:1.15rem;
    color:rgba(255,255,255,.72);
    max-width:850px;
    margin:auto;
    line-height:1.9;
}

.hero-btn-wrap{
    display:flex;
    gap:18px;
    justify-content:center;
    flex-wrap:wrap;
    margin-top:50px;
}

/* =========================================
BUTTONS
========================================= */
.btn-royal-pro{
    padding:16px 36px;
    border-radius:18px;
    border:none;
    font-weight:700;
    letter-spacing:.5px;
    position:relative;
    overflow:hidden;
    transition:.45s ease;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:12px;
}

.btn-gold{
    background:linear-gradient(135deg,#f5d06c,#d4af37);
    color:#111;
    box-shadow:0 15px 40px rgba(212,175,55,.25);
}

.btn-gold:hover{
    transform:translateY(-6px) scale(1.03);
    box-shadow:0 25px 60px rgba(212,175,55,.35);
    color:#111;
}

.btn-glass{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.1);
    color:#fff;
    backdrop-filter:blur(14px);
}

.btn-glass:hover{
    transform:translateY(-6px);
    border-color:rgba(212,175,55,.35);
    color:#fff;
}

/* =========================================
GLASS CARD
========================================= */
.glass-card{
    background:var(--glass);
    border:1px solid var(--glass-border);
    backdrop-filter:blur(18px);
    border-radius:30px;
    overflow:hidden;
    position:relative;
    transition:.45s ease;
}

.glass-card:hover{
    transform:translateY(-10px);
    border-color:rgba(212,175,55,.25);
    box-shadow:0 30px 80px rgba(0,0,0,.35);
}

/* =========================================
SECTION TITLE
========================================= */
.section-sub{
    color:var(--rc-gold);
    letter-spacing:4px;
    text-transform:uppercase;
    font-weight:800;
    font-size:.85rem;
}

.section-title{
    font-size:clamp(2.3rem,5vw,4.7rem);
    font-weight:900;
    line-height:1;
    margin:18px 0;
    letter-spacing:-2px;
}

.section-desc{
    color:rgba(255,255,255,.68);
    line-height:1.9;
    font-size:1.05rem;
}

/* =========================================
OFFICE IMAGE
========================================= */
.office-image{
    height:550px;
    width:100%;
    object-fit:cover;
    transition:1s ease;
}

.office-wrap:hover .office-image{
    transform:scale(1.06);
}

/* =========================================
VISIONARY SECTION
========================================= */
.vision-list li{
    margin-bottom:20px;
    color:rgba(255,255,255,.75);
    line-height:1.8;
}

.vision-list i{
    color:var(--rc-gold);
    margin-right:10px;
}

.quote-box{
    border-left:4px solid var(--rc-gold);
    padding-left:22px;
    margin-top:30px;
    color:rgba(255,255,255,.75);
    font-style:italic;
    line-height:1.9;
}

/* =========================================
IMAGE FRAME
========================================= */
.ceo-frame{
    position:relative;
    overflow:hidden;
    border-radius:30px;
}

.ceo-frame::before{
    content:"";
    position:absolute;
    inset:0;
    background:
    linear-gradient(
    to top,
    rgba(0,0,0,.65),
    transparent 50%
    );
    z-index:2;
}

.ceo-img{
    width:100%;
    transition:1s ease;
}

.ceo-frame:hover .ceo-img{
    transform:scale(1.05);
}

.ceo-tag{
    position:absolute;
    left:20px;
    bottom:20px;
    z-index:5;
    padding:14px 20px;
    border-radius:18px;
    background:rgba(0,0,0,.45);
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,.08);
}

.ceo-tag h5{
    margin:0;
    color:#fff;
    font-weight:800;
}

.ceo-tag span{
    color:var(--rc-gold);
    font-size:.85rem;
    letter-spacing:1px;
}

/* =========================================
STATS
========================================= */
.stat-box{
    text-align:center;
    padding:35px 25px;
}

.stat-box h2{
    font-size:3rem;
    color:var(--rc-gold);
    font-weight:900;
}

.stat-box p{
    color:rgba(255,255,255,.65);
}

/* =========================================
SCROLL REVEAL
========================================= */
.reveal{
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}

.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* =========================================
PARALLAX FLOAT
========================================= */
.float-anim{
    animation:floaty 5s ease-in-out infinite;
}

@keyframes floaty{
    0%,100%{transform:translateY(0px);}
    50%{transform:translateY(-12px);}
}

/* =========================================
RESPONSIVE
========================================= */
@media(max-width:768px){

    .history-hero{
        min-height:90vh;
        text-align:center;
    }

    .hero-title{
        font-size:3.5rem;
        letter-spacing:-2px;
    }

    .office-image{
        height:320px;
    }

}
</style>

<!-- =========================================
HERO
========================================= -->

<section class="history-hero">

    <div class="hero-overlay"></div>

    <div class="glow-orb one"></div>
    <div class="glow-orb two"></div>

    <div class="container position-relative" style="z-index:2;">

        <div class="row justify-content-center text-center">

            <div class="col-xl-10 reveal">

                <div class="hero-badge">
                    ✨ EST. 1971 • LONDON HERITAGE
                </div>

                <h1 class="hero-title">
                    A Legacy Brewed <br>
                    <span class="gold-gradient">
                        Across Generations
                    </span>
                </h1>

                <p class="hero-desc">
                    The Royal Coffee journey began with the premium café culture of London,
                    inspired by elite European roasting traditions and timeless craftsmanship.
                    From London to Faisalabad and Okara, our story blends luxury aesthetics,
                    artisan bakery culture, and a futuristic digital experience designed for
                    the next generation of coffee lovers.
                </p>

                <div class="hero-btn-wrap">

                    <a href="#storySection" class="btn-royal-pro btn-gold">
                        Explore Story
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="menu.php" class="btn-royal-pro btn-glass">
                        Signature Collection
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
MAIN
========================================= -->

<main id="storySection" class="py-5 position-relative">

    <div class="container py-5">

        <!-- OFFICE IMAGE -->
        <div class="row mb-5">

            <div class="col-12 reveal">

                <div class="glass-card office-wrap p-3">

                    <div class="overflow-hidden rounded-5">

                        <img src="images/office.png"
                        class="office-image"
                        alt="Royal Coffee Headquarters">

                    </div>

                </div>

            </div>

        </div>

        <!-- STORY + CEO -->
        <div class="row align-items-center g-5 py-5">

            <!-- LEFT -->
            <div class="col-lg-7 reveal">

                <span class="section-sub">
                    THE ARCHITECT OF EXCELLENCE
                </span>

                <h2 class="section-title">
                    Maryam Bandesha
                </h2>

                <p class="section-desc">
                    Behind the international success of Royal Coffee lies the vision,
                    discipline and strategic brilliance of Maryam Bandesha — the force
                    that transformed a premium café concept into a modern luxury lifestyle brand.
                </p>

                <p class="section-desc">
                    Her mission was never only about coffee. It was about building
                    inspiring spaces where craftsmanship, innovation and culture meet.
                    By blending London’s luxury café standards with Pakistan’s energetic
                    youth culture, she created an experience that feels both global and local.
                </p>

                <!-- ACHIEVEMENTS -->
                <ul class="list-unstyled vision-list mt-5">

                    <li>
                        <i class="bi bi-stars"></i>
                        <strong>Strategic Expansion:</strong>
                        Premium café hubs near GCUF, Okara and modern student communities.
                    </li>

                    <li>
                        <i class="bi bi-stars"></i>
                        <strong>Craftsmanship Excellence:</strong>
                        Developed 112+ experimental blends for signature flavor perfection.
                    </li>

                    <li>
                        <i class="bi bi-stars"></i>
                        <strong>Digital Innovation:</strong>
                        Integrated immersive café technology with traditional roasting heritage.
                    </li>

                </ul>

                <!-- QUOTE -->
                <div class="quote-box">
                    “True success is achieved when your vision for community
                    becomes greater than your business goals.”
                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-5 reveal">

                <div class="glass-card p-3 float-anim">

                    <div class="ceo-frame">

                        <img src="images/head.png"
                        class="ceo-img"
                        alt="Maryam Bandesha">

                        <div class="ceo-tag">

                            <h5>
                                Maryam Bandesha
                            </h5>

                            <span>
                                CHIEF EXECUTIVE • ROYAL COFFEE
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- STATS -->
        <div class="row g-4 mt-5">

            <div class="col-md-3 reveal">

                <div class="glass-card stat-box h-100">

                    <h2>50+</h2>
                    <p>Years Heritage</p>

                </div>

            </div>

            <div class="col-md-3 reveal">

                <div class="glass-card stat-box h-100">

                    <h2>112</h2>
                    <p>Signature Blends</p>

                </div>

            </div>

            <div class="col-md-3 reveal">

                <div class="glass-card stat-box h-100">

                    <h2>25K+</h2>
                    <p>Happy Customers</p>

                </div>

            </div>

            <div class="col-md-3 reveal">

                <div class="glass-card stat-box h-100">

                    <h2>3</h2>
                    <p>Premium Cities</p>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- =========================================
SCROLL REVEAL JS
========================================= -->

<script>
const revealObserver = new IntersectionObserver((entries)=>{
    entries.forEach((entry)=>{
        if(entry.isIntersecting){
            entry.target.classList.add('active');
        }
    });
},{
    threshold:.15
});

document.querySelectorAll('.reveal').forEach((el)=>{
    revealObserver.observe(el);
});

/* =========================================
PARALLAX HERO
========================================= */
window.addEventListener('scroll',()=>{

    const scrolled = window.pageYOffset;

    document.querySelector('.history-hero').style.backgroundPositionY =
    scrolled * 0.5 + 'px';

});
</script>

<?php include('footer.php'); ?>