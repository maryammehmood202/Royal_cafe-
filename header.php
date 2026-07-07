<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Royal Cafe</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

/* ===================== ROOT THEME ===================== */
:root {
    --bg:         #0b0908;
    --card:       #16110f;
    --text:       #ffffff;
    --text-muted: rgba(255,255,255,0.65);
    --gold:       #D4AF37;
    --gold-dim:   rgba(212,175,55,0.15);
    --nav-bg:     rgba(10,8,7,0.92);
    --sidebar-bg: rgba(12,10,9,0.98);
    --border:     rgba(255,255,255,0.08);
}

/* ── LIGHT MODE ── */
body.light-mode {
    --bg:         #f3f0eb;
    --card:       #ffffff;
    --text:       #1a1208;
    --text-muted: rgba(26,18,8,0.55);
    --nav-bg:     rgba(255,250,240,0.95);
    --sidebar-bg: rgba(255,250,240,0.99);
    --border:     rgba(0,0,0,0.08);
}

/* ── GLOBAL ── */
*, *::before, *::after { box-sizing: border-box; }

body {
    margin: 0;
    padding: 0;
    background: var(--bg);
    color: var(--text);
    font-family: 'Inter', sans-serif;
    transition: background 0.35s ease, color 0.35s ease;
    overflow-x: hidden;
}

/* ===================== NAVBAR ===================== */
.rc-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: var(--nav-bg);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-bottom: 1px solid var(--border);
    padding: 0;
    transition: background 0.35s ease, border-color 0.35s ease;
}

.rc-navbar-inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

/* ── LOGO ── */
.rc-logo {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 22px;
    color: var(--gold) !important;
    text-decoration: none;
    letter-spacing: 0.5px;
    white-space: nowrap;
    flex-shrink: 0;
}

.rc-logo:hover {
    color: var(--gold) !important;
    opacity: 0.85;
}

/* ── DESKTOP NAV LINKS ── */
.rc-nav-links {
    display: flex;
    align-items: center;
    gap: 2px;
    list-style: none;
    margin: 0;
    padding: 0;
    flex: 1;
    justify-content: center;
}

.rc-nav-links li a {
    display: block;
    color: var(--text-muted) !important;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    padding: 8px 11px;
    border-radius: 8px;
    transition: color 0.25s, background 0.25s;
    white-space: nowrap;
    letter-spacing: 0.2px;
}

.rc-nav-links li a:hover {
    color: var(--gold) !important;
    background: var(--gold-dim);
}

.rc-nav-links li a.active {
    color: var(--gold) !important;
}

/* ── NAVBAR RIGHT CLUSTER ── */
.rc-nav-right {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

/* Cart icon button */
.rc-cart-btn {
    position: relative;
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 20px;
    cursor: pointer;
    padding: 8px;
    border-radius: 10px;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: color 0.25s, background 0.25s;
}

.rc-cart-btn:hover {
    color: var(--gold);
    background: var(--gold-dim);
}

.rc-cart-count {
    position: absolute;
    top: 2px;
    right: 2px;
    background: #e53935;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

/* User / Login link */
.rc-user-link {
    color: var(--gold) !important;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    padding: 7px 13px;
    border-radius: 20px;
    border: 1px solid rgba(212,175,55,0.35);
    transition: background 0.25s, border-color 0.25s;
    white-space: nowrap;
}

.rc-user-link:hover {
    background: var(--gold-dim);
    border-color: var(--gold);
}

/* ── THEME TOGGLE ── */
.rc-theme-switch {
    position: relative;
    width: 50px;
    height: 27px;
    flex-shrink: 0;
}

.rc-theme-switch input {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}

.rc-slider {
    position: absolute;
    inset: 0;
    cursor: pointer;
    background: rgba(255,255,255,0.06);
    border: 1px solid var(--border);
    border-radius: 50px;
    transition: background 0.3s;
}

.rc-slider::before {
    content: "";
    position: absolute;
    height: 19px;
    width: 19px;
    left: 3px;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, var(--gold), #8a6e2f);
    border-radius: 50%;
    transition: transform 0.35s cubic-bezier(.4,0,.2,1);
    box-shadow: 0 1px 4px rgba(0,0,0,0.4);
}

.rc-theme-switch input:checked + .rc-slider::before {
    transform: translate(23px, -50%);
}

body.light-mode .rc-slider {
    background: rgba(0,0,0,0.06);
}

/* ── HAMBURGER ── */
.rc-hamburger {
    display: none;
    background: none;
    border: none;
    color: var(--text);
    font-size: 26px;
    cursor: pointer;
    padding: 6px;
    border-radius: 8px;
    line-height: 1;
    transition: color 0.25s;
    flex-shrink: 0;
}

.rc-hamburger:hover {
    color: var(--gold);
}

/* ===================== SIDEBAR ===================== */
.rc-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    opacity: 0;
    visibility: hidden;
    z-index: 8000;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.rc-overlay.open {
    opacity: 1;
    visibility: visible;
}

.rc-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 290px;
    height: 100dvh;
    background: var(--sidebar-bg);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-right: 1px solid var(--border);
    z-index: 9000;
    transform: translateX(-100%);
    transition: transform 0.38s cubic-bezier(.4,0,.2,1);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.rc-sidebar.open {
    transform: translateX(0);
}

/* Sidebar header */
.rc-sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 22px 22px 16px;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
}

.rc-sidebar-logo {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 20px;
    color: var(--gold);
}

.rc-close-btn {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 22px;
    cursor: pointer;
    padding: 4px;
    border-radius: 8px;
    line-height: 1;
    transition: color 0.2s, background 0.2s;
}

.rc-close-btn:hover {
    color: var(--text);
    background: var(--gold-dim);
}

/* Sidebar links scroll area */
.rc-sidebar-links {
    flex: 1;
    overflow-y: auto;
    padding: 12px 14px;
}

.rc-sidebar-links::-webkit-scrollbar { width: 3px; }
.rc-sidebar-links::-webkit-scrollbar-thumb { background: var(--gold-dim); border-radius: 4px; }

.rc-sidebar-links a {
    display: flex;
    align-items: center;
    gap: 13px;
    color: var(--text-muted) !important;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    padding: 13px 16px;
    border-radius: 12px;
    margin-bottom: 3px;
    transition: color 0.25s, background 0.25s, transform 0.2s;
}

.rc-sidebar-links a i {
    font-size: 18px;
    width: 22px;
    text-align: center;
    flex-shrink: 0;
    color: var(--text-muted);
    transition: color 0.25s;
}

.rc-sidebar-links a:hover {
    color: var(--gold) !important;
    background: var(--gold-dim);
    transform: translateX(4px);
}

.rc-sidebar-links a:hover i {
    color: var(--gold);
}

/* Cart badge inside sidebar */
.rc-sidebar-cart-badge {
    margin-left: auto;
    background: #e53935;
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 20px;
    line-height: 1.5;
}

/* Sidebar footer */
.rc-sidebar-footer {
    padding: 16px 22px;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
}

.rc-sidebar-footer span {
    font-size: 12px;
    color: var(--text-muted);
}

/* ===================== RESPONSIVE ===================== */

/* Slightly shrink link font on large-but-not-huge screens */
@media (max-width: 1400px) {
    .rc-nav-links li a {
        font-size: 12.5px;
        padding: 7px 7px;
    }
}

/* ── DESKTOP (>=1280px): show all nav links, hide hamburger ── */
@media (min-width: 1280px) {
    .rc-hamburger {
        display: none !important;
    }
    .rc-nav-links {
        display: flex !important;
    }
}

/* ── TABLET + MOBILE (<1280px): show hamburger, collapse nav ── */
@media (max-width: 1279px) {
    /* Hide all desktop nav links */
    .rc-nav-links {
        display: none !important;
    }

    /* Show hamburger button */
    .rc-hamburger {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }

    /* Cart and user move into sidebar */
    .rc-nav-right .rc-cart-btn,
    .rc-nav-right .rc-user-link {
        display: none !important;
    }

    /* Keep theme toggle in navbar */
    .rc-nav-right .rc-theme-switch {
        display: inline-block !important;
    }

    /* Tighter padding */
    .rc-navbar-inner {
        padding: 0 16px;
        gap: 10px;
    }
}

/* Page spacing below fixed navbar */
.rc-page-space {
    height: 68px;
}

</style>
</head>

<body>

<!-- ===================== NAVBAR ===================== -->
<nav class="rc-navbar" role="navigation" aria-label="Main navigation">
    <div class="rc-navbar-inner">

        <!-- LOGO -->
        <a class="rc-logo" href="index.php">Royal Cafe</a>

        <!-- DESKTOP NAV LINKS -->
        <ul class="rc-nav-links" id="desktopNav">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="campus-special.php">Campus Special</a></li>
            <li><a href="my_orders.php">My Orders</a></li>
            <li><a href="story.php">Our Story</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="locations.php">Locations</a></li>
            <li><a href="admin_orders.php">Admin</a></li>
        </ul>

        <!-- RIGHT CLUSTER -->
        <div class="rc-nav-right">

            <!-- CART -->
            <a class="rc-cart-btn" href="cart.php" aria-label="View cart">
                <i class="bi bi-cart-fill"></i>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <span class="rc-cart-count"><?php echo count($_SESSION['cart']); ?></span>
                <?php endif; ?>
            </a>

            <!-- USER / LOGIN -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="rc-user-link" href="dashboard.php">
                    ✨ <?php echo htmlspecialchars($_SESSION['full_name'] ?? 'User'); ?>
                </a>
            <?php else: ?>
                <a class="rc-user-link" href="login.php">Login</a>
            <?php endif; ?>

            <!-- THEME TOGGLE -->
            <label class="rc-theme-switch" aria-label="Toggle light/dark mode">
                <input type="checkbox" id="themeToggle">
                <span class="rc-slider"></span>
            </label>

            <!-- HAMBURGER (mobile only) -->
            <button class="rc-hamburger" id="menuBtn" aria-label="Open menu" aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>

        </div>

    </div>
</nav>

<!-- ===================== SIDEBAR OVERLAY ===================== -->
<div class="rc-overlay" id="overlay" aria-hidden="true"></div>

<!-- ===================== SIDEBAR ===================== -->
<aside class="rc-sidebar" id="sidebar" aria-label="Mobile navigation">

    <div class="rc-sidebar-header">
        <span class="rc-sidebar-logo">Royal Cafe</span>
        <button class="rc-close-btn" id="closeBtn" aria-label="Close menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="rc-sidebar-links" id="sidebarLinks">

        <a href="index.php">
            <i class="bi bi-house-door"></i>
            Home
        </a>

        <a href="menu.php">
            <i class="bi bi-grid"></i>
            Menu
        </a>

        <a href="campus-special.php">
            <i class="bi bi-stars"></i>
            Campus Special
        </a>

        <a href="my_orders.php">
            <i class="bi bi-bag-check"></i>
            My Orders
        </a>

        <a href="story.php">
            <i class="bi bi-book"></i>
            Our Story
        </a>

        <a href="feedback.php">
            <i class="bi bi-chat-dots"></i>
            Feedback
        </a>

        <a href="contact.php">
            <i class="bi bi-envelope"></i>
            Contact
        </a>

        <a href="locations.php">
            <i class="bi bi-geo-alt"></i>
            Locations
        </a>

        <a href="admin_orders.php">
            <i class="bi bi-speedometer2"></i>
            Admin Dashboard
        </a>

        <a href="cart.php">
            <i class="bi bi-cart-fill"></i>
            Cart
            <?php if (!empty($_SESSION['cart'])): ?>
                <span class="rc-sidebar-cart-badge"><?php echo count($_SESSION['cart']); ?></span>
            <?php endif; ?>
        </a>

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php" style="color:var(--gold) !important; font-weight:600;">
                <i class="bi bi-person-circle" style="color:var(--gold);"></i>
                <?php echo htmlspecialchars($_SESSION['full_name'] ?? 'User'); ?>
            </a>
        <?php else: ?>
            <a href="login.php">
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>
        <?php endif; ?>

    </div>

    <div class="rc-sidebar-footer">
        <span>Theme</span>
        <label class="rc-theme-switch" aria-label="Toggle light/dark mode">
            <input type="checkbox" id="themeToggleMobile">
            <span class="rc-slider"></span>
        </label>
    </div>

</aside>

<!-- Page spacing -->
<div class="rc-page-space"></div>

<!-- ===================== JS ===================== -->
<script>
(function () {

    /* ── Elements ── */
    const sidebar   = document.getElementById('sidebar');
    const overlay   = document.getElementById('overlay');
    const menuBtn   = document.getElementById('menuBtn');
    const closeBtn  = document.getElementById('closeBtn');
    const toggleD   = document.getElementById('themeToggle');
    const toggleM   = document.getElementById('themeToggleMobile');
    const body      = document.body;

    /* ===================== SIDEBAR ===================== */

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('open');
        overlay.setAttribute('aria-hidden', 'false');
        menuBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('open');
        overlay.setAttribute('aria-hidden', 'true');
        menuBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    menuBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    /* Close sidebar when any sidebar link is clicked */
    document.querySelectorAll('#sidebarLinks a').forEach(function (link) {
        link.addEventListener('click', closeSidebar);
    });

    /* Close on Escape key */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeSidebar();
    });

    /* ===================== THEME ===================== */

    function applyTheme(mode) {
        if (mode === 'light') {
            body.classList.add('light-mode');
            if (toggleD) toggleD.checked = true;
            if (toggleM) toggleM.checked = true;
        } else {
            body.classList.remove('light-mode');
            if (toggleD) toggleD.checked = false;
            if (toggleM) toggleM.checked = false;
        }
    }

    function saveAndApply(mode) {
        localStorage.setItem('rc_theme', mode);
        applyTheme(mode);
    }

    /* Initial theme: saved → system preference → dark */
    var saved = localStorage.getItem('rc_theme');
    if (saved === 'light' || saved === 'dark') {
        applyTheme(saved);
    } else {
        var preferLight = window.matchMedia('(prefers-color-scheme: light)').matches;
        applyTheme(preferLight ? 'light' : 'dark');
    }

    /* Desktop toggle */
    if (toggleD) {
        toggleD.addEventListener('change', function () {
            saveAndApply(this.checked ? 'light' : 'dark');
        });
    }

    /* Mobile toggle */
    if (toggleM) {
        toggleM.addEventListener('change', function () {
            saveAndApply(this.checked ? 'light' : 'dark');
        });
    }

    /* ===================== ACTIVE LINK HIGHLIGHT ===================== */
    var currentPath = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.rc-nav-links a, #sidebarLinks a').forEach(function (link) {
        var href = link.getAttribute('href');
        if (href && (href === currentPath || href === './' + currentPath)) {
            link.classList.add('active');
            link.style.color = 'var(--gold)';
        }
    });

})();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>