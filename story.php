<?php include('header.php'); ?>

<!-- 🌌 ULTRA PRO STORY PAGE -->
<style>

:root{
    --royal-bg:#0b0605;
    --royal-maroon:#1a0f0d;
    --royal-card:rgba(255,255,255,0.06);
    --royal-border:rgba(255,255,255,0.08);
    --royal-gold:#C5A059;
    --soft:#FDFBF7;
}

/* 🌍 GLOBAL */
body{
    background:
    radial-gradient(circle at top right,#2d1916,#0b0605 60%);
    color:white;
    overflow-x:hidden;
    scroll-behavior:smooth;
}

/* ✨ FLOATING GLOW */
.hero-glow{
    position:absolute;
    width:700px;
    height:700px;
    background:rgba(197,160,89,0.12);
    border-radius:50%;
    filter:blur(120px);
    animation:floatGlow 10s ease-in-out infinite;
}

.hero-glow.two{
    right:-200px;
    bottom:-200px;
    animation-delay:2s;
}

@keyframes floatGlow{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-40px);}
}

/* 🎭 HERO */
.story-hero{
    min-height:100vh;
    position:relative;
    display:flex;
    align-items:center;
    overflow:hidden;
    background:
    linear-gradient(
    to right,
    rgba(0,0,0,0.82),
    rgba(20,10,8,0.62)
    ),
    url('images/history-bg.jpg') center/cover fixed no-repeat;
}

/* 🧊 GLASS */
.glass-pro{
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.08);
    box-shadow:0 15px 50px rgba(0,0,0,0.35);
}

/* 🌟 BADGE */
.hero-badge{
    background:rgba(197,160,89,0.12);
    color:var(--royal-gold);
    border:1px solid rgba(197,160,89,0.25);
    padding:12px 24px;
    border-radius:999px;
    letter-spacing:2px;
    font-size:.85rem;
    display:inline-flex;
    gap:10px;
    align-items:center;
    backdrop-filter:blur(12px);
}

/* 🪄 TEXT */
.story-title{
    font-size:clamp(3rem,8vw,7rem);
    line-height:.95;
    font-weight:900;
    letter-spacing:-4px;
}

.story-title span{
    color:var(--royal-gold);
}

/* ✨ BUTTONS */
.btn-royal-pro{
    background:linear-gradient(135deg,#C5A059,#e3c27d);
    color:#111;
    border:none;
    border-radius:18px;
    padding:16px 34px;
    font-weight:700;
    transition:.45s ease;
    box-shadow:0 10px 30px rgba(197,160,89,0.25);
}

.btn-royal-pro:hover{
    transform:translateY(-5px) scale(1.03);
    box-shadow:0 25px 50px rgba(197,160,89,0.35);
}

.btn-outline-royal{
    border:1px solid rgba(255,255,255,0.18);
    color:white;
    padding:16px 34px;
    border-radius:18px;
    backdrop-filter:blur(12px);
    transition:.4s ease;
}

.btn-outline-royal:hover{
    background:white;
    color:#111;
    transform:translateY(-4px);
}

/* 📜 SECTION */
.story-section{
    padding:120px 0;
    position:relative;
}

/* ✨ REVEAL */
.reveal{
    opacity:0;
    transform:translateY(70px);
    transition:1s cubic-bezier(.2,.8,.2,1);
}

.reveal.active{
    opacity:1;
    transform:translateY(0);
}

/* 🧠 TIMELINE */
.timeline-line{
    position:absolute;
    left:24px;
    top:0;
    width:3px;
    height:100%;
    background:
    linear-gradient(
    to bottom,
    var(--royal-gold),
    transparent
    );
}

.timeline-card{
    position:relative;
    transition:.45s ease;
    overflow:hidden;
}

.timeline-card:hover{
    transform:translateY(-10px) rotateX(2deg);
    border-color:rgba(197,160,89,0.25);
}

/* GOLD DOT */
.timeline-dot{
    width:18px;
    height:18px;
    background:var(--royal-gold);
    border-radius:50%;
    position:absolute;
    left:-39px;
    top:40px;
    box-shadow:0 0 20px rgba(197,160,89,.7);
}

/* 👑 STATS */
.stat-box{
    padding:40px;
    border-radius:28px;
    transition:.45s ease;
}

.stat-box:hover{
    transform:translateY(-10px);
}

/* 💫 PARALLAX IMAGE */
.parallax-wrap{
    transform-style:preserve-3d;
    perspective:1000px;
}

.parallax-wrap img{
    transition:.5s ease;
}

.parallax-wrap:hover img{
    transform:rotateY(-5deg) rotateX(5deg) scale(1.03);
}

/* 🎬 CINEMATIC OVERLAY */
.hero-overlay{
    position:absolute;
    inset:0;
    background:
    linear-gradient(
    to bottom,
    transparent,
    rgba(0,0,0,.45)
    );
}

/* ✨ FLOAT */
.floating{
    animation:floating 6s ease-in-out infinite;
}

@keyframes floating{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-14px);}
}

/* 🔥 PREMIUM TEXT */
.text-gold{
    color:var(--royal-gold);
}

/* 📱 MOBILE */
@media(max-width:768px){

.story-title{
    font-size:3.4rem;
}

.story-section{
    padding:80px 0;
}

}

</style>

<!-- 🎭 HERO -->
<section class="story-hero">

    <div class="hero-overlay"></div>

    <div class="hero-glow"></div>
    <div class="hero-glow two"></div>

    <div class="container position-relative" style="z-index:2;">

        <div class="row justify-content-center text-center">

            <div class="col-xl-9">

                <div class="hero-badge mb-4 reveal active">
                    ✨ EST. 1971 • PREMIUM COFFEE HERITAGE
                </div>

                <h1 class="story-title text-white reveal active">
                    Brewing <span>Legacy</span><br>
                    Since 1971
                </h1>

                <p class="lead text-white opacity-75 mt-4 mx-auto reveal active"
                style="max-width:760px;">
                    A cinematic journey through craftsmanship, roasting mastery,
                    luxury café culture and unforgettable student experiences.
                </p>

                <div class="d-flex justify-content-center gap-3 flex-wrap mt-5 reveal active">

                    <a href="history.php"
                    class="btn btn-royal-pro">
                        Explore Journey
                    </a>

                    <a href="menu.php"
                    class="btn btn-outline-royal">
                        Discover Menu
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- 📜 STORY -->
<section class="story-section" id="timeline">

<div class="container">

<div class="text-center mb-5 reveal">

<span class="text-gold fw-bold ls-2">
OUR EVOLUTION
</span>

<h2 class="display-3 fw-bold mt-3">
From London To Pakistan
</h2>

<p class="text-white opacity-75 mx-auto mt-4"
style="max-width:760px;">
From handcrafted espresso bars in London to modern student cafés
in Faisalabad — Royal Coffee continues to redefine premium experiences.
</p>

</div>

<div class="row g-5 align-items-center">

<!-- TIMELINE -->
<div class="col-lg-6">

<div class="position-relative ps-5">

<div class="timeline-line"></div>

<!-- CARD -->
<div class="timeline-card glass-pro rounded-5 p-5 mb-5 reveal">

<div class="timeline-dot"></div>

<span class="hero-badge mb-4">
1971
</span>

<h3 class="fw-bold mb-3">
The London Beginning
</h3>

<p class="opacity-75 lh-lg mb-0">
Founded by passionate coffee artisans bringing authentic
Italian espresso culture into London’s luxury café scene.
</p>

</div>

<!-- CARD -->
<div class="timeline-card glass-pro rounded-5 p-5 mb-5 reveal">

<div class="timeline-dot"></div>

<span class="hero-badge mb-4">
2005
</span>

<h3 class="fw-bold mb-3">
Global Recognition
</h3>

<p class="opacity-75 lh-lg mb-0">
Royal Coffee evolved into a premium global brand known for
signature roasting and café innovation.
</p>

</div>

<!-- CARD -->
<div class="timeline-card glass-pro rounded-5 p-5 reveal">

<div class="timeline-dot"></div>

<span class="hero-badge mb-4">
TODAY
</span>

<h3 class="fw-bold mb-3">
Pakistan Chapter
</h3>

<p class="opacity-75 lh-lg mb-0">
Now inspiring students, creators and coffee lovers
across Faisalabad, Okara and beyond.
</p>

</div>

</div>

</div>

<!-- IMAGE -->
<div class="col-lg-6 reveal">

<div class="parallax-wrap floating">

<div class="glass-pro p-3 rounded-5">

<img src="images/journeys.png"
class="img-fluid rounded-5 shadow-lg">

</div>

</div>

</div>

</div>

</div>

</section>

<!-- 📊 STATS -->
<section class="story-section pt-0">

<div class="container">

<div class="glass-pro rounded-5 p-5 reveal">

<div class="row text-center g-4">

<div class="col-md-3">
<div class="stat-box">
<h2 class="display-4 fw-bold text-gold counter" data-count="50">0</h2>
<p class="opacity-75 mb-0">Years Legacy</p>
</div>
</div>

<div class="col-md-3">
<div class="stat-box">
<h2 class="display-4 fw-bold text-gold counter" data-count="112">0</h2>
<p class="opacity-75 mb-0">Signature Blends</p>
</div>
</div>

<div class="col-md-3">
<div class="stat-box">
<h2 class="display-4 fw-bold text-gold counter" data-count="25000">0</h2>
<p class="opacity-75 mb-0">Happy Customers</p>
</div>
</div>

<div class="col-md-3">
<div class="stat-box">
<h2 class="display-4 fw-bold text-gold counter" data-count="3">0</h2>
<p class="opacity-75 mb-0">Cities Expanding</p>
</div>
</div>

</div>

</div>

</div>

</section>

<!-- 🔥 SCRIPT -->
<script>

/* ✨ REVEAL */
const observer=new IntersectionObserver(entries=>{
entries.forEach(entry=>{
if(entry.isIntersecting){
entry.target.classList.add('active');
}
});
},{threshold:.15});

document.querySelectorAll('.reveal').forEach(el=>{
observer.observe(el);
});

/* 📊 COUNTER */
const counters=document.querySelectorAll('.counter');

counters.forEach(counter=>{

let started=false;

window.addEventListener('scroll',()=>{

const top=counter.getBoundingClientRect().top;

if(top<window.innerHeight && !started){

started=true;

let target=+counter.dataset.count;
let count=0;

const update=()=>{

count += Math.ceil(target/100);

if(count<target){
counter.innerText=count.toLocaleString();
requestAnimationFrame(update);
}else{
counter.innerText=target.toLocaleString() + (target==25000?'+':'');
}

};

update();

}

});

});

/* 🌌 PARALLAX */
window.addEventListener('scroll',()=>{

const hero=document.querySelector('.story-hero');

hero.style.backgroundPositionY =
window.scrollY * 0.5 + 'px';

});

</script>

<?php include('footer.php'); ?>