<?php include('header.php'); ?>

<!-- =========================
🌌 ULTRA ROASTERY EXPERIENCE
========================= -->

<style>

:root{
    --royal-black:#090706;
    --royal-maroon:#160d0c;
    --royal-maroon-2:#241412;
    --gold:#D4AF37;
    --gold-soft:#f4d98a;
    --cream:#F8F5F1;
    --glass:rgba(255,255,255,0.06);
    --glass-border:rgba(255,255,255,0.08);
}

/* =========================
GLOBAL
========================= */

body{
    background:
    radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 35%),
    radial-gradient(circle at bottom left, rgba(212,175,55,.05), transparent 30%),
    linear-gradient(to bottom, #0a0807, #120b09, #0b0706);
    overflow-x:hidden;
    color:white;
}

.text-gold{
    color:var(--gold);
}

.ls-2{
    letter-spacing:2px;
}

.section-padding{
    padding:120px 0;
}

.glass-card{
    background:var(--glass);
    border:1px solid var(--glass-border);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    border-radius:28px;
    transition:.5s ease;
    overflow:hidden;
    position:relative;
}

.glass-card:hover{
    transform:translateY(-8px);
    border-color:rgba(212,175,55,.3);
    box-shadow:
    0 25px 60px rgba(0,0,0,.35),
    0 0 30px rgba(212,175,55,.08);
}

.reveal{
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}

.reveal.active{
    opacity:1;
    transform:none;
}

/* =========================
HERO
========================= */

.ultra-hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    display:flex;
    align-items:center;
    background:
    linear-gradient(
    to right,
    rgba(5,5,5,.88),
    rgba(15,10,8,.75)
    ),
    url('images/coffee-beans-dark.jpg') center/cover no-repeat;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:
    radial-gradient(circle at 20% 20%, rgba(212,175,55,.10), transparent 30%),
    radial-gradient(circle at 80% 80%, rgba(212,175,55,.08), transparent 30%);
}

.hero-glow{
    position:absolute;
    width:700px;
    height:700px;
    border-radius:50%;
    background:rgba(212,175,55,.09);
    filter:blur(120px);
    animation:floatGlow 8s ease-in-out infinite;
}

.hero-glow.one{
    top:-150px;
    right:-100px;
}

.hero-glow.two{
    bottom:-200px;
    left:-150px;
    animation-delay:2s;
}

@keyframes floatGlow{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-35px);}
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 24px;
    border-radius:999px;
    background:rgba(212,175,55,.10);
    border:1px solid rgba(212,175,55,.18);
    color:var(--gold);
    font-weight:600;
    backdrop-filter:blur(10px);
}

.hero-title{
    font-size:clamp(3.5rem, 9vw, 7rem);
    font-weight:900;
    line-height:.95;
    letter-spacing:-4px;
    margin-top:25px;
    margin-bottom:25px;
}

.hero-description{
    font-size:1.1rem;
    line-height:1.9;
    max-width:720px;
    color:rgba(255,255,255,.72);
}

.hero-buttons{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-top:45px;
}

/* =========================
BUTTONS
========================= */

.btn-royal{
    background:linear-gradient(135deg, var(--gold), #f8d979);
    color:#1a120f;
    border:none;
    border-radius:18px;
    padding:16px 34px;
    font-weight:700;
    letter-spacing:.5px;
    transition:.35s ease;
    box-shadow:
    0 10px 30px rgba(212,175,55,.18);
}

.btn-royal:hover{
    transform:translateY(-4px) scale(1.02);
    box-shadow:
    0 25px 45px rgba(212,175,55,.22);
}

.btn-outline-royal{
    border:1px solid rgba(255,255,255,.18);
    background:rgba(255,255,255,.04);
    backdrop-filter:blur(12px);
    color:white;
    border-radius:18px;
    padding:16px 34px;
    font-weight:600;
    transition:.35s ease;
}

.btn-outline-royal:hover{
    background:white;
    color:black;
    transform:translateY(-4px);
}

/* =========================
PROCESS SECTION
========================= */

.process-card{
    padding:40px;
    height:100%;
}

.icon-box{
    width:70px;
    height:70px;
    border-radius:20px;
    background:rgba(212,175,55,.10);
    color:var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.5rem;
    margin-bottom:25px;
    border:1px solid rgba(212,175,55,.15);
}

.process-image{
    border-radius:28px;
    overflow:hidden;
    position:relative;
}

.process-image img{
    transition:1s ease;
}

.process-image:hover img{
    transform:scale(1.06);
}

/* =========================
STATS
========================= */

.stats-card{
    padding:45px;
    text-align:center;
}

.stats-number{
    font-size:4rem;
    font-weight:900;
    color:var(--gold);
    line-height:1;
    margin-bottom:12px;
}

/* =========================
ORIGIN CARDS
========================= */

.origin-card{
    padding:50px 35px;
    text-align:center;
    height:100%;
}

.origin-icon{
    width:95px;
    height:95px;
    border-radius:50%;
    margin:auto;
    margin-bottom:30px;
    background:rgba(212,175,55,.10);
    color:var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:2.2rem;
    border:1px solid rgba(212,175,55,.18);
}

/* =========================
AR SECTION
========================= */

.ar-wrapper{
    position:relative;
    border-radius:32px;
    overflow:hidden;
    padding:50px;
}

.ar-glow{
    position:absolute;
    width:280px;
    height:280px;
    background:rgba(212,175,55,.08);
    border-radius:50%;
    filter:blur(100px);
}

.ar-glow.one{
    top:-80px;
    right:-60px;
}

.ar-glow.two{
    bottom:-100px;
    left:-70px;
}

.ar-pedestal{
    height:620px;
    margin-top:40px;
}

/* =========================
SCROLL INDICATOR
========================= */

.scroll-indicator{
    position:absolute;
    bottom:35px;
    left:50%;
    transform:translateX(-50%);
    z-index:10;
}

.scroll-indicator span{
    display:block;
    width:28px;
    height:48px;
    border:2px solid rgba(255,255,255,.35);
    border-radius:20px;
    position:relative;
}

.scroll-indicator span::before{
    content:"";
    position:absolute;
    top:8px;
    left:50%;
    transform:translateX(-50%);
    width:5px;
    height:10px;
    border-radius:20px;
    background:var(--gold);
    animation:scrollAnim 2s infinite;
}

@keyframes scrollAnim{
    0%{opacity:0; transform:translate(-50%,0);}
    50%{opacity:1;}
    100%{opacity:0; transform:translate(-50%,16px);}
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    .hero-title{
        font-size:3.5rem;
        letter-spacing:-2px;
    }

    .section-padding{
        padding:80px 0;
    }

    .stats-number{
        font-size:3rem;
    }

    .ar-pedestal{
        height:420px;
    }

}

</style>

<!-- =========================
HERO
========================= -->

<section class="ultra-hero">

    <div class="hero-overlay"></div>

    <div class="hero-glow one"></div>
    <div class="hero-glow two"></div>

    <div class="container position-relative" style="z-index:2;">

        <div class="row">

            <div class="col-lg-8 reveal active">

                <div class="hero-badge">
                    <i class="bi bi-stars"></i>
                    THE ART OF PRECISION ROASTING
                </div>

                <h1 class="hero-title text-white">
                    The Royal<br>
                    Roastery
                </h1>

                <p class="hero-description">
                    Inside Royal Coffee’s precision roasting lab, every bean is engineered for perfection — combining heritage craftsmanship, modern roasting science and ultra-premium café culture.
                </p>

                <div class="hero-buttons">

                    <a href="#process" class="btn btn-royal">
                        Explore Process
                    </a>

                    <a href="#traceability" class="btn btn-outline-royal">
                        Bean Origins
                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="scroll-indicator">
        <span></span>
    </div>

</section>

<!-- =========================
PROCESS
========================= -->

<section id="process" class="section-padding">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <span class="text-gold fw-bold ls-2">
                PRECISION CRAFT
            </span>

            <h2 class="display-3 fw-bold text-white mt-3">
                Scale Meets Perfection
            </h2>

            <p class="hero-description mx-auto">
                Every roast profile is monitored with precision heat mapping and artisan calibration to achieve Royal Coffee’s iconic flavor signature.
            </p>

        </div>

        <div class="row g-5 align-items-center">

            <!-- IMAGE -->
            <div class="col-lg-7 reveal">

                <div class="glass-card p-3 process-image">

                    <img src="images/royal-roastery.png"
                    class="img-fluid rounded-4 w-100"
                    alt="Roastery">

                </div>

            </div>

            <!-- CONTENT -->
            <div class="col-lg-5 reveal">

                <div class="glass-card process-card">

                    <div class="icon-box">
                        <i class="bi bi-fire"></i>
                    </div>

                    <span class="text-gold fw-bold ls-2">
                        ADVANCED FACILITY
                    </span>

                    <h3 class="fw-bold text-white my-4">
                        Engineered Flavor Precision
                    </h3>

                    <p class="text-white-50 lh-lg mb-5">
                        Royal Coffee processes thousands of premium-grade beans annually using advanced roasting systems, AI-assisted heat profiling and artisan quality control.
                    </p>

                    <div class="d-grid gap-4">

                        <div class="d-flex gap-3">

                            <div class="icon-box mb-0" style="width:60px;height:60px;">
                                <i class="bi bi-thermometer-half"></i>
                            </div>

                            <div>
                                <h6 class="text-white fw-bold">
                                    Precision Heat Control
                                </h6>

                                <small class="text-white-50">
                                    Exact temperature profiling for consistency.
                                </small>
                            </div>

                        </div>

                        <div class="d-flex gap-3">

                            <div class="icon-box mb-0" style="width:60px;height:60px;">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <div>
                                <h6 class="text-white fw-bold">
                                    Artisan QA Testing
                                </h6>

                                <small class="text-white-50">
                                    Every batch tested by master roasters.
                                </small>
                            </div>

                        </div>

                        <div class="d-flex gap-3">

                            <div class="icon-box mb-0" style="width:60px;height:60px;">
                                <i class="bi bi-globe2"></i>
                            </div>

                            <div>
                                <h6 class="text-white fw-bold">
                                    Ethical Sourcing
                                </h6>

                                <small class="text-white-50">
                                    Beans imported from premium global farms.
                                </small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
STATS
========================= -->

<section class="section-padding pt-0">

    <div class="container">

        <div class="glass-card p-4 p-lg-5 reveal">

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">45K</div>
                        <p class="text-white-50 mb-0">Tonnes Processed</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">18</div>
                        <p class="text-white-50 mb-0">Minute Roast Cycle</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">112</div>
                        <p class="text-white-50 mb-0">Signature Blends</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">50+</div>
                        <p class="text-white-50 mb-0">Years Heritage</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
TRACEABILITY
========================= -->

<section id="traceability" class="section-padding pt-0">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <span class="text-gold fw-bold ls-2">
                TRACEABILITY
            </span>

            <h2 class="display-3 fw-bold text-white mt-3">
                Bean Origins
            </h2>

            <p class="hero-description mx-auto">
                Every Royal bean carries a story of altitude, climate, craftsmanship and elite sourcing standards.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4 reveal">

                <div class="glass-card origin-card">

                    <div class="origin-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <h4 class="text-white fw-bold mb-3">
                        Ethical Origins
                    </h4>

                    <p class="text-white-50 lh-lg mb-0">
                        Hand-selected beans sourced from Ethiopia, Brazil and Colombia.
                    </p>

                </div>

            </div>

            <div class="col-md-4 reveal">

                <div class="glass-card origin-card">

                    <div class="origin-icon">
                        <i class="bi bi-fire"></i>
                    </div>

                    <h4 class="text-white fw-bold mb-3">
                        Roast Intelligence
                    </h4>

                    <p class="text-white-50 lh-lg mb-0">
                        AI-assisted roast curves balanced with artisan expertise.
                    </p>

                </div>

            </div>

            <div class="col-md-4 reveal">

                <div class="glass-card origin-card">

                    <div class="origin-icon">
                        <i class="bi bi-cup-hot"></i>
                    </div>

                    <h4 class="text-white fw-bold mb-3">
                        Signature Flavor
                    </h4>

                    <p class="text-white-50 lh-lg mb-0">
                        Notes of cocoa, toasted hazelnut and rich caramel finish.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
AR EXPERIENCE
========================= -->

<section class="section-padding pt-0">

    <div class="container">

        <div class="glass-card ar-wrapper reveal">

            <div class="ar-glow one"></div>
            <div class="ar-glow two"></div>

            <div class="text-center position-relative" style="z-index:2;">

                <span class="text-gold fw-bold ls-2">
                    IMMERSIVE EXPERIENCE
                </span>

                <h2 class="display-3 fw-bold text-white mt-3">
                    View In Your Space
                </h2>

                <p class="hero-description mx-auto">
                    Explore our professional roasting machine in augmented reality and discover the engineering behind every premium Royal Coffee blend.
                </p>

                <div class="ar-pedestal">

                    <script type="module"
                    src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.3.0/model-viewer.min.js"></script>

                    <model-viewer
                        src="models/coffee_machine.glb"
                        ios-src="models/coffee_machine.usdz"
                        poster="images/roastery.png"
                        alt="Royal Coffee Machine"
                        shadow-intensity="1"
                        camera-controls
                        auto-rotate
                        ar
                        ar-modes="webxr scene-viewer quick-look"
                        style="
                        width:100%;
                        height:100%;
                        background:transparent;
                        ">

                        <button slot="ar-button"
                        class="btn btn-royal position-absolute bottom-0 start-50 translate-middle-x mb-4">

                            <i class="bi bi-badge-ar me-2"></i>
                            PLACE IN ROOM

                        </button>

                    </model-viewer>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
REVEAL SCRIPT
========================= -->

<script>

const observer = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            entry.target.classList.add('active');
        }
    });
},{
    threshold:0.15
});

document.querySelectorAll('.reveal').forEach(el=>{
    observer.observe(el);
});

</script>

<?php include('footer.php'); ?>