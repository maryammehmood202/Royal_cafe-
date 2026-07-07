<?php include('header.php'); ?>

<style>

/* =========================
GLOBAL THEME
========================= */
body{
    overflow-x:hidden;
    background:
    radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 35%),
    linear-gradient(to bottom, #0b0b0c, #121214, #0d0d0d);
    color:#fff;
}

/* =========================
GLASS CARD
========================= */
.glass{
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:28px;
}

/* =========================
HERO
========================= */
.location-hero{
    min-height:70vh;
    display:flex;
    align-items:center;
    position:relative;
    background:
    linear-gradient(to right, rgba(10,8,7,0.92), rgba(20,12,10,0.75)),
    url('images/cafe-location-bg.jpg') center/cover no-repeat;
}

.hero-glow{
    position:absolute;
    width:650px;
    height:650px;
    background:rgba(212,175,55,0.08);
    border-radius:50%;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    filter:blur(80px);
    opacity:.6;
}

/* =========================
TEXT
========================= */
.title-gradient{
    background:linear-gradient(135deg,#fff,#f6dd8c,#D4AF37);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.text-gold{
    color:#D4AF37;
}

/* =========================
SEARCH BAR
========================= */
.search-bar{
    display:flex;
    align-items:center;
    gap:10px;
    padding:14px 18px;
    border-radius:18px;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.08);
}

.search-bar input{
    width:100%;
    background:transparent;
    border:none;
    outline:none;
    color:#fff;
}

/* =========================
BUTTON
========================= */
.btn-gold{
    background:linear-gradient(135deg,#fff2b0,#D4AF37,#b8860b);
    color:#111 !important;
    font-weight:800;
    border:none;
    border-radius:16px;
    padding:14px 20px;
    transition:.3s ease;
}

.btn-gold:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 35px rgba(212,175,55,.25);
}

/* =========================
MAP
========================= */
#mapFrame{
    border:0;
    border-radius:22px;
    filter:contrast(1.05) brightness(.95);
}

/* LOADER */
.loader{
    display:none;
    text-align:center;
    margin-bottom:10px;
}

</style>

<!-- =========================
HERO
========================= -->
<section class="location-hero">

<div class="hero-glow"></div>

<div class="container text-center">

    <span class="badge px-4 py-2 mb-4"
    style="background:rgba(212,175,55,.12);color:#D4AF37;">
         GLOBAL LOCATION SYSTEM
    </span>

    <h1 class="display-2 fw-bold title-gradient mb-3">
        Find ROYAL CAFE Anywhere
    </h1>

    <p class="text-white-50 mx-auto" style="max-width:700px;">
        Search any country, city or street in the world and instantly locate it on the map.
    </p>

</div>

</section>

<!-- =========================
SEARCH + MAP
========================= -->
<section class="py-5">

<div class="container-fluid px-lg-5">

<div class="row g-4">

<!-- LEFT -->
<div class="col-lg-4">

    <div class="glass p-4">

        <h4 class="text-gold fw-bold mb-3">
             Smart Location Search
        </h4>

        <p class="text-white-50 small mb-3">
            Try: London, Dubai, New York, Lahore, Pakistan, Turkey, everywhere!
        </p>

        <!-- SEARCH -->
        <div class="search-bar mb-3">
            <i class="bi bi-search text-gold"></i>
            <input type="text" id="locationInput" placeholder="Search any place in the world...">
        </div>

        <button class="btn btn-gold w-100" onclick="searchMap()">
             Search Location
        </button>

        <small class="text-white-50 d-block mt-3">
            Powered by Google Maps Global Search
        </small>

    </div>

</div>

<!-- MAP -->
<div class="col-lg-8">

    <div class="glass p-3" style="height:80vh;">

        <div class="loader" id="loader">
            <div class="spinner-border text-warning"></div>
        </div>

        <iframe
        id="mapFrame"
        width="100%"
        height="100%"
        src="https://maps.google.com/maps?q=Pakistan&output=embed"
        loading="lazy">
        </iframe>

    </div>

</div>

</div>

</div>

</section>

<!-- =========================
SCRIPT
========================= -->
<script>

function searchMap(){

    let query = document.getElementById("locationInput").value;
    let map = document.getElementById("mapFrame");
    let loader = document.getElementById("loader");

    if(query.trim() === ""){
        alert("Please enter a location");
        return;
    }

    loader.style.display = "block";

    map.src = "https://maps.google.com/maps?q=" + encodeURIComponent(query) + "&output=embed";

    map.onload = function(){
        loader.style.display = "none";
    };

}

// ENTER KEY SUPPORT
document.getElementById("locationInput").addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        searchMap();
    }
});

</script>

<?php include('footer.php'); ?>