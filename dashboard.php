<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include('config/db.php');

if(!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit; 
}

$user_id   = $_SESSION['user_id'] ?? 0;
$username  = $_SESSION['username'] ?? 'User';
$full_name = $_SESSION['full_name'] ?? 'Guest';
$role      = $_SESSION['role'] ?? 'user';

$is_admin = ($role === 'admin');

/* USERS */
$users = [];
$total_users = 0;
$total_admins = 0;

if($conn){
    $q = "SELECT id, username, full_name, role, created_at FROM users ORDER BY id DESC";
    $r = $conn->query($q);

    if($r){
        while($row = $r->fetch_assoc()){
            $users[] = $row;
            $total_users++;

            if($row['role'] === 'admin'){
                $total_admins++;
            }
        }
    }
}

include('header.php');
?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

/* =========================
BACKGROUND
========================= */

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
    background:radial-gradient(circle at top right, rgba(212,175,55,.08), transparent 35%);
    z-index:-1;
}

/* =========================
TYPOGRAPHY
========================= */

.editorial-title{
    font-family:'Playfair Display', serif;
    font-size:clamp(2.5rem,6vw,5rem);
    line-height:1.05;
    font-weight:800;
    color:#fff;
}

.editorial-title span{
    color:var(--primary-gold);
}

.text-gold{
    color:var(--primary-gold)!important;
}

.small-muted{
    color:var(--white-muted);
    font-size:13px;
}

/* =========================
GLASS CARD
========================= */

.glass-card{
    background:rgba(20,16,14,.72);
    border:1px solid var(--border);
    backdrop-filter:blur(18px);
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.35);
}

/* =========================
TOP HERO
========================= */

.dashboard-hero{
    padding:90px 0 40px;
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 22px;
    border-radius:50px;
    border:1px solid var(--border);
    background:rgba(255,255,255,.03);
    backdrop-filter:blur(12px);
    margin-bottom:25px;
}

.hero-description{
    max-width:720px;
    color:var(--white-soft);
    font-size:1.05rem;
    line-height:1.9;
    border-left:4px solid var(--primary-gold);
    padding-left:22px;
}

/* =========================
BUTTONS
========================= */

.btn-gold{
    background:linear-gradient(135deg,var(--primary-gold),#9e7620);
    border:none;
    color:#000;
    font-weight:700;
    padding:13px 28px;
    border-radius:14px;
    transition:var(--transition);
}

.btn-gold:hover{
    transform:translateY(-4px);
    color:#000;
}

.btn-darkx{
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12);
    color:#fff;
    padding:13px 22px;
    border-radius:14px;
    transition:var(--transition);
}

.btn-darkx:hover{
    border-color:var(--primary-gold);
    color:#fff;
    transform:translateY(-4px);
}

/* =========================
STATS CARDS
========================= */

.stat-card{
    padding:30px;
    height:100%;
    transition:var(--transition);
    position:relative;
    overflow:hidden;
}

.stat-card::before{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    background:rgba(212,175,55,.08);
    border-radius:50%;
    top:-40px;
    right:-40px;
}

.stat-card:hover{
    transform:translateY(-8px);
    border-color:var(--primary-gold);
}

.stat-icon{
    width:75px;
    height:75px;
    border-radius:50%;
    background:rgba(212,175,55,.08);
    border:1px solid rgba(212,175,55,.2);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--primary-gold);
    font-size:1.7rem;
    margin-bottom:20px;
}

.stat-number{
    font-size:2.2rem;
    font-weight:800;
    color:var(--primary-gold);
}

/* =========================
SEARCH
========================= */

.search-box{
    position:relative;
}

.search-input{
    width:100%;
    height:65px;
    border-radius:18px;
    border:1px solid rgba(255,255,255,.08);
    background:#16110f;
    color:#fff;
    padding:0 70px 0 24px;
    outline:none;
}

.search-input:focus{
    border-color:var(--primary-gold);
}

.search-btn{
    position:absolute;
    top:50%;
    right:10px;
    transform:translateY(-50%);
    width:48px;
    height:48px;
    border:none;
    border-radius:14px;
    background:var(--primary-gold);
    color:#000;
}

/* =========================
PROFILE
========================= */

.profile-card{
    padding:35px;
}

.profile-avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:rgba(212,175,55,.08);
    border:2px solid rgba(212,175,55,.3);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    color:var(--primary-gold);
    font-size:2rem;
}

/* =========================
BADGES
========================= */

.badgex{
    background:linear-gradient(135deg,#f7d774,#D4AF37);
    color:#000;
    padding:7px 15px;
    border-radius:30px;
    font-size:11px;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:1px;
}

/* =========================
USER CARDS
========================= */

.user-card{
    background:#16110f;
    border:1px solid rgba(255,255,255,.05);
    border-radius:20px;
    padding:20px;
    transition:var(--transition);
    margin-bottom:15px;
}

.user-card:hover{
    transform:translateY(-5px);
    border-color:var(--primary-gold);
    box-shadow:0 10px 25px rgba(0,0,0,.3);
}

.user-avatar{
    width:60px;
    height:60px;
    border-radius:50%;
    background:rgba(212,175,55,.08);
    border:1px solid rgba(212,175,55,.2);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--primary-gold);
    font-size:1.3rem;
}

/* =========================
ALERT
========================= */

.alert-custom{
    background:rgba(255,193,7,.08);
    border:1px solid rgba(255,193,7,.25);
    color:#ffd86b;
    border-radius:18px;
    padding:18px;
}

/* =========================
ANIMATION
========================= */

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
RESPONSIVE
========================= */

@media(max-width:991px){

    .dashboard-hero{
        text-align:center;
        padding-top:70px;
    }

    .hero-description{
        border-left:none;
        border-top:3px solid var(--primary-gold);
        padding-left:0;
        padding-top:20px;
        margin:auto;
    }

}

</style>

<div class="dashboard-bg"></div>
<div class="dashboard-overlay"></div>

<main>

<!-- HERO -->
<section class="dashboard-hero">
    <div class="container">

        <div class="hero-badge reveal">
            <span class="text-gold fw-bold">
                Royal Cafe • Premium Dashboard
            </span>
        </div>

        <div class="row align-items-center">

            <div class="col-lg-8 reveal">

                <h1 class="editorial-title mb-4">
                    Control Your <br>
                    <span>Royal System</span>
                </h1>

                <p class="hero-description">
                    Manage users, administrators, analytics and platform activity through your premium Royal Cafe management dashboard.
                </p>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <button class="btn btn-gold">
                        <i class="bi bi-lightning-charge-fill me-2"></i>
                        Dashboard Active
                    </button>

                    <a href="logout.php" class="btn btn-darkx">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

<div class="container pb-5">

<?php if(!$is_admin): ?>
<div class="alert-custom mb-4 reveal">
    ⚠ Limited Access Mode (User Account)
</div>
<?php endif; ?>

<!-- STATS -->
<div class="row g-4 mb-5">

    <div class="col-lg-4 col-md-6 reveal">
        <div class="glass-card stat-card">

            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div class="small-muted mb-2">
                Total Users
            </div>

            <div class="stat-number">
                <?= $total_users ?>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-6 reveal">
        <div class="glass-card stat-card">

            <div class="stat-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div class="small-muted mb-2">
                Total Admins
            </div>

            <div class="stat-number">
                <?= $total_admins ?>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-12 reveal">
        <div class="glass-card stat-card">

            <div class="stat-icon">
                <i class="bi bi-broadcast-pin"></i>
            </div>

            <div class="small-muted mb-2">
                System Status
            </div>

            <div class="stat-number">
                ONLINE
            </div>

        </div>
    </div>

</div>

<!-- SEARCH -->
<div class="glass-card p-4 mb-5 reveal">

    <div class="row align-items-center g-4">

        <div class="col-lg-5">
            <h2 class="editorial-title fs-1 mb-2">
                Search <span>Users</span>
            </h2>

            <p class="small-muted mb-0">
                Instantly filter users from your Royal Cafe management system.
            </p>
        </div>

        <div class="col-lg-7">

            <div class="search-box">

                <input 
                    type="text" 
                    id="searchBox"
                    class="search-input"
                    placeholder="Search users by name...">

                <button class="search-btn">
                    <i class="bi bi-search"></i>
                </button>

            </div>

        </div>

    </div>

</div>

<div class="row g-4">

<!-- PROFILE -->
<div class="col-lg-4 reveal">

    <div class="glass-card profile-card text-center">

        <div class="profile-avatar mb-4">
            <i class="bi bi-person-fill"></i>
        </div>

        <h3 class="mb-2">
            <?= htmlspecialchars($full_name) ?>
        </h3>

        <div class="small-muted mb-4">
            @<?= htmlspecialchars($username) ?>
        </div>

        <span class="badgex">
            <?= htmlspecialchars($role) ?>
        </span>

        <hr class="my-4" style="border-color:rgba(255,255,255,.08);">

        <div class="row text-center">

            <div class="col-6">
                <div class="stat-number fs-3">
                    <?= $total_users ?>
                </div>
                <div class="small-muted">
                    Users
                </div>
            </div>

            <div class="col-6">
                <div class="stat-number fs-3">
                    <?= $total_admins ?>
                </div>
                <div class="small-muted">
                    Admins
                </div>
            </div>

        </div>

    </div>

</div>

<!-- USERS -->
<div class="col-lg-8 reveal">

    <div class="glass-card p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>
                <h2 class="editorial-title fs-2 mb-1">
                    Users <span>List</span>
                </h2>

                <div class="small-muted">
                    All registered platform users
                </div>
            </div>

            <span class="badgex">
                <?= $total_users ?> Users
            </span>

        </div>

        <div id="userList">

        <?php foreach($users as $u): ?>

        <div class="user-card user-item">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div class="d-flex align-items-center gap-3">

                    <div class="user-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div>
                        <h5 class="mb-1 name">
                            <?= htmlspecialchars($u['full_name']) ?>
                        </h5>

                        <div class="small-muted">
                            @<?= htmlspecialchars($u['username']) ?>
                        </div>
                    </div>

                </div>

                <div class="text-end">

                    <span class="badgex mb-2 d-inline-block">
                        <?= htmlspecialchars($u['role']) ?>
                    </span>

                    <div class="small-muted">
                        <?= $u['created_at'] ?? '' ?>
                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

        </div>

    </div>

</div>

</div>

</div>
</main>

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

// LIVE SEARCH
document.getElementById("searchBox").addEventListener("keyup", function(){

    let value = this.value.toLowerCase();
    let items = document.querySelectorAll(".user-item");

    items.forEach(item => {

        let name = item.querySelector(".name").innerText.toLowerCase();

        item.style.display = name.includes(value)
            ? "block"
            : "none";

    });

});

</script>

<?php include('footer.php'); ?>