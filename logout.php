<?php
session_start();

/* =========================
   SECURITY CLEAN LOGOUT
========================= */
$_SESSION = [];

// destroy session cookie properly
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

/* OPTIONAL: prevent caching of authenticated pages */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signing Out | Royal Cafe</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

:root{
    --gold:#C5A059;
    --gold2:#f5d76e;
    --bg1:#0b0908;
    --bg2:#120d0c;
}

/* =========================
 GLOBAL ULTRA CLEAN BACKGROUND
========================= */
body{
    margin:0;
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    font-family:'Inter', sans-serif;
    color:#fff;

    background:
        radial-gradient(circle at 20% 20%, rgba(197,160,89,0.12), transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.04), transparent 50%),
        linear-gradient(180deg,var(--bg1),var(--bg2),var(--bg1));
}

/* =========================
 PREMIUM FLOATING ORBS (SOFT + SLOW)
========================= */
.orb{
    position:absolute;
    width:520px;
    height:520px;
    border-radius:50%;
    background:rgba(197,160,89,0.07);
    filter:blur(160px);
    animation:float 9s ease-in-out infinite;
}

.orb1{ top:-150px; left:-150px; }
.orb2{ bottom:-150px; right:-150px; }

@keyframes float{
    0%,100%{ transform:translateY(0px) scale(1); }
    50%{ transform:translateY(-35px) scale(1.08); }
}

/* =========================
 ULTRA GLASS CARD (MODERN SAAS STYLE)
========================= */
.card{
    width:380px;
    padding:60px 50px;
    text-align:center;

    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.14);
    border-radius:30px;

    backdrop-filter:blur(30px);
    -webkit-backdrop-filter:blur(30px);

    box-shadow:
        0 30px 90px rgba(0,0,0,0.7),
        inset 0 1px 0 rgba(255,255,255,0.05);

    z-index:2;
    animation:enter 0.8s ease;
    transition:0.3s ease;
}

.card:hover{
    transform:translateY(-6px);
    border-color:rgba(197,160,89,0.5);
}

/* =========================
 ICON (SOFT GLOW + FLOAT)
========================= */
.icon{
    font-size:64px;
    margin-bottom:10px;
    animation:spin 3.5s linear infinite;
    filter:drop-shadow(0 0 18px rgba(197,160,89,0.35));
}

/* TITLE (BRAND LUXURY STYLE)
========================= */
h2{
    font-family:'Playfair Display', serif;
    font-size:2.1rem;
    font-weight:800;
    margin:10px 0;

    background:linear-gradient(135deg,#ffffff,#C5A059);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* SUB TEXT */
p{
    font-size:14px;
    color:rgba(255,255,255,0.65);
    line-height:1.6;
}

/* =========================
 PROGRESS STEP INDICATOR (ADVANCED UX)
========================= */
.steps{
    margin-top:25px;
    display:flex;
    justify-content:center;
    gap:6px;
}

.dot{
    width:8px;
    height:8px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
    animation:pulse 1.2s infinite;
}

.dot:nth-child(2){ animation-delay:0.2s; }
.dot:nth-child(3){ animation-delay:0.4s; }

@keyframes pulse{
    0%,100%{ transform:scale(1); opacity:0.3; }
    50%{ transform:scale(1.5); opacity:1; background:var(--gold); }
}

/* =========================
 LOADER (SMOOTHER)
========================= */
.loader{
    margin:20px auto;
    width:48px;
    height:48px;
    border-radius:50%;
    border:3px solid rgba(255,255,255,0.15);
    border-top:3px solid var(--gold);
    animation:rotate 1s linear infinite;
}

/* SMALL TEXT */
.small{
    font-size:12px;
    opacity:0.6;
    margin-top:10px;
}

/* =========================
 ANIMATIONS
========================= */
@keyframes rotate{
    100%{transform:rotate(360deg);}
}

@keyframes spin{
    100%{transform:rotate(360deg);}
}

@keyframes enter{
    from{
        opacity:0;
        transform:translateY(25px) scale(0.95);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}

</style>
</head>

<body>

<!-- BACKGROUND ORBS -->
<div class="orb orb1"></div>
<div class="orb orb2"></div>

<!-- LOGOUT CARD -->
<div class="card">

    <div class="icon"></div>

    <h2>Signing You Out</h2>

    <p>
        Securely ending your session and protecting your account data
    </p>

    <div class="loader"></div>

    <div class="steps">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <p class="small">Redirecting to homepage...</p>

</div>

<script>
/* SMART REDIRECT (SLIGHT DELAY FOR UX SMOOTHNESS) */
setTimeout(() => {
    window.location.href = "index.php";
}, 2200);
</script>

</body>
</html>